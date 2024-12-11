@extends('templates.template')

@section('title', 'Sistema Fibra')

@section('Conteudo')

<head>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<div class="form-container">

  <h2 class="titulo">Gerar QR Code e Imprimir PDF</h2>
  <form id="form" action="{{ route('preview') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label for="nome"><strong>Nome:</strong></label>
    <input type="text" name="nome" id="nome" required><br><br>

    <label for="cargo"><strong>Cargo:</strong></label>
    <input type="text" name="cargo" id="cargo" required><br><br>

    <label for="matricula"><strong>Matrícula:</strong></label>
    <input type="number" maxlength="5" name="matricula" id="matricula" required><br><br>

    <label for="casa"><strong>Casa:</strong></label>
    <select class="casa" name="casa" id="casa" required>
      <option value="SENAI">SENAI</option>
      <option value="SESI">SESI</option>
      <option value="IEL">IEL</option>
      <option value="FIBRA">FIBRA</option>
    </select><br><br>

    <input type="file" name="image" accept="image/*" required>
    <div id="qrcode-container" style="margin-top: 20px; text-align: center; display: none;">
      <p>QR Code gerado:</p>
      <div id="qrcode"></div>
    </div>
    <div class="button-container">
      <button type="submit">Gerar PDF</button>
    </div>
  </form>
</div>



<script>
  document.addEventListener('DOMContentLoaded', function() {

    function formatarNome(nome) {
      return nome.replace(/\b\w+/g, (palavra) =>
        palavra.charAt(0).toUpperCase() + palavra.slice(1).toLowerCase()
      );
    }

    document.getElementById("nome").addEventListener("input", function() {
      this.value = formatarNome(this.value);
      gerarQRCode(); // Recalcula o QR Code
    });

    function gerarQRCode() {
      const nome = document.getElementById("nome").value;
      const cargo = document.getElementById("cargo").value;
      const matricula = document.getElementById("matricula").value;
      const casa = document.getElementById("casa").value;

      if (!nome || !cargo || !matricula || !casa) {
        document.getElementById("qrcode-container").style.display = "none";
        document.querySelector(".form-container").style.height = "650px";
        return;
      }

      const base64String = converteBase64(matricula, casa, nome);
      const qrcodeUrl = `https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=${base64String}`;
      const qrcodeContainer = document.getElementById("qrcode");

      qrcodeContainer.innerHTML = `<img src="${qrcodeUrl}" alt="QR Code">`;

      document.getElementById("qrcode-container").style.display = "block";
      document.querySelector(".form-container").style.height = "800px";

      const qrCodeInput = document.createElement("input");
      qrCodeInput.type = "hidden";
      qrCodeInput.name = "qrcode_url";
      qrCodeInput.value = qrcodeUrl;
      document.getElementById("form").appendChild(qrCodeInput);
    }

    function converteBase64(matricula, casa, nome) {
      let unidade = 0;
      if (casa.startsWith("FIBRA")) unidade = 3;
      else if (casa.startsWith("SENAI")) unidade = 2;
      else if (casa.startsWith("SESI")) unidade = 1;
      else if (casa.startsWith("IEL")) unidade = 4;
      const concatenado = `${unidade}-${matricula}-${nome}`;
      return btoa(concatenado);
    }

    document.getElementById("cargo").addEventListener("input", gerarQRCode);
    document.getElementById("matricula").addEventListener("input", gerarQRCode);
    document.getElementById("casa").addEventListener("change", gerarQRCode);
  });
</script>

@endsection