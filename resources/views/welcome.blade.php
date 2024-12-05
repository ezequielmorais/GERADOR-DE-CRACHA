@extends('templates.template')

@section('title', 'Gerar QR Code e PDF')

@section('Conteudo')
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0px;
    background-color: #f9f9f9;
    padding: 0;
  }

  h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
    margin-top: 50px;
  }

  .form-container {
    max-width: 600px;
    margin: 70px auto;
    height: 650px;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  label {
    font-size: 14px;
    color: #555;
  }

  input[type="text"],
  input[type="file"] {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border-radius: 4px;
    border: 1px solid black;
    font-size: 14px;
    background-color: #f9f9f9;
    color: black;

  }

  input[type="file"] {
    padding: 6px;

  }

  .button-container {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 10px;
  }

  button {
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    background-color: #0E4194;
    font-family: 'inter';
    font-weight: 600;
    color: white;
    border: none;
    border-radius: 4px;
    transition: background-color 0.3s;
    margin-top: 25px;
  }

  button:hover {
    background-color: #0E4194;
  }

  .casa {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border-radius: 4px;
    border: 1px solid black;
    font-size: 14px;
    background-color: #f9f9f9;
  }

  input[type="text"],
  input[type="file"],
  .select {
    margin: -1px 0;
  }

  .qr-code {
    margin-top: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 80px;
    /* Diminuir a largura */
    height: 80px;
    /* Diminuir a altura */
    border: 2px solid #245ca8;
    border-radius: 8px;
  }
</style>
@if (session('user'))
    <p>Bem-vindo, {{ session('user')['nome'] }}!</p>
@endif
<div class="form-container">
  <h2>Gerar QR Code e Imprimir PDF</h2>
  <form id="form" action="{{ route('preview') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label for="nome"><strong>Nome:</strong></label>
    <input type="text" name="nome" id="nome" required><br><br>

    <label for="cargo"><strong>Cargo:</strong></label>
    <input type="text" name="cargo" id="cargo" required><br><br>

    <label for="matricula"><strong>Matrícula:</strong></label>
    <input type="text" name="matricula" id="matricula" required><br><br>

    <label for="casa"><strong>Casa:</strong></label>
    <select class="casa" name="casa" id="casa" required>
      <option value="SENAI">SENAI</option>
      <option value="SESI">SESI</option>
      <option value="IEL">IEL</option>
      <option value="FIBRA">FIBRA</option>
    </select><br><br>

    <input type="file" name="image" accept="image/*">
    <div id="qrcode-container" style="margin-top: 0px; text-align: center; display: none;">
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
    // Função para gerar o QR Code automaticamente
    function gerarQRCode() {
      const nome = document.getElementById("nome").value;
      const cargo = document.getElementById("cargo").value;
      const matricula = document.getElementById("matricula").value;
      const casa = document.getElementById("casa").value;

      // Verifica se todos os campos foram preenchidos
      if (!nome || !cargo || !matricula || !casa) {
        document.getElementById("qrcode-container").style.display =
          "none"; // Esconde o QR code caso algum campo esteja vazio
        document.querySelector(".form-container").style.height = "650px"; // Redefine a altura original do formulário
        return;
      }

      const base64String = converteBase64(matricula, casa, nome);

      // Criar o QR Code
      const qrcodeUrl = `https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=${base64String}`;
      const qrcodeContainer = document.getElementById("qrcode");
      qrcodeContainer.innerHTML = `<img src="${qrcodeUrl}" alt="QR Code">`;

      // Exibe o QR Code
      document.getElementById("qrcode-container").style.display = "block";

      // Aumenta a altura do form-container quando o QR Code for gerado
      document.querySelector(".form-container").style.height = "800px"; // Ajuste a altura conforme necessário

      // Adiciona o QR Code ao formulário
      const qrCodeInput = document.createElement("input");
      qrCodeInput.type = "hidden";
      qrCodeInput.name = "qrcode_url";
      qrCodeInput.value = qrcodeUrl;
      document.getElementById("form").appendChild(qrCodeInput);
    }

    // Função para converter dados em base64
    function converteBase64(matricula, casa, nome) {
      let unidade = 0;
      if (casa.startsWith("FIBRA")) unidade = 3;
      else if (casa.startsWith("SENAI")) unidade = 2;
      else if (casa.startsWith("SESI")) unidade = 1;
      else if (casa.startsWith("IEL")) unidade = 4;
      const concatenado = `${unidade}-${matricula}-${nome}`;
      return btoa(concatenado); // Retorna a string em base64
    }

    // Adiciona eventos de input para gerar QR Code enquanto os dados são preenchidos
    document.getElementById("nome").addEventListener("input", gerarQRCode);
    document.getElementById("cargo").addEventListener("input", gerarQRCode);
    document.getElementById("matricula").addEventListener("input", gerarQRCode);
    document.getElementById("casa").addEventListener("change", gerarQRCode);
  });
</script>

@endsection