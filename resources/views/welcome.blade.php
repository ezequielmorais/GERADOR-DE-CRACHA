@extends('templates.template')

@section('title', 'Sistema Fibra')

@section('Conteudo')

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Gerar QR Code e Imprimir PDF</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="{{ asset('Fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">

</head>
<style>
  .login100-form-title,
  .container-login100-form-btn {
    text-align: right !important;
    margin-right: 200px !important;
    display: flex !important;
    justify-content: center !important;
    align-items: center !important;
    white-space: nowrap;
  }

  .container-login100-form-btn {
    text-align: right;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .input100 {
    margin-left: auto;
    margin-right: 20px !important;
    display: block;
  }

  /* Estilo exclusivo para o contêiner do campo "Escolher ficheiro" */
  /* Contêiner clicável */
  .upload-field-container {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    width: 400px;
    max-width: 400px;
    height: 50px;
    background: #e6e6e6;
    border-radius: 25px;
    margin-bottom: 10px;
    padding-left: 15px;
    /* Espaço para texto e ícone */
    padding-right: 45px;
    /* Espaço reservado para o ícone */
    cursor: pointer;
  }

  /* Esconde o input original */
  .upload-field-input {
    opacity: 0;
    position: absolute;
    width: 100%;
    height: 100%;
    left: 10px;
    top: 0;
    cursor: pointer;
  }

  /* Estilo do rótulo */
  .upload-field-label {
    font-family: Poppins-Medium;
    font-size: 15px;
    color: #666666;
    pointer-events: none;
    margin-left: 50px;
    /* Adicione margem esquerda para afastar o texto do ícone */
    overflow: hidden;
    /* Garante que o texto não ultrapasse o contêiner */
    white-space: nowrap;
    /* Evita quebra de linha */
    text-overflow: ellipsis;
    /* Adiciona reticências se o texto for muito longo */
  }

  /* Ícone à direita */
  .upload-field-container .symbol-input100 {
    position: absolute;
    right: 30px;
    color: #666666;
  }

  /* Efeito de hover */
  .upload-field-container:hover .upload-field-label {
    color: #1988ca;
  }

  .back-button {
    display: none;
  }
</style>

<body>
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="img/img-01.png" alt="IMG" />
        </div>

        <form id="form" class="login100-form validate-form" action="{{ route('preview') }}" method="POST"
          enctype="multipart/form-data">
          @csrf
          <span class="login100-form-title">
            <p class="titulo">Gerar QR Code e Imprimir PDF</p>
          </span>

          <div class="wrap-input100 validate-input" data-validate="Nome é obrigatório">
            <input class="input100" type="text" name="nome" id="nome" placeholder="Nome" required />
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-user" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Cargo é obrigatório">
            <input class="input100" type="text" name="cargo" id="cargo" placeholder="Cargo" required />
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-briefcase" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Matrícula é obrigatória">
            <input class="input100" type="number" name="matricula" id="matricula" max="99999" placeholder="Matrícula"
              required />
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-id-card" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Casa é obrigatória">
            <select class="input100" name="casa" id="casa" required>
              <option value="" disabled selected>Casa</option>
              <option value="SENAI">SENAI</option>
              <option value="SESI">SESI</option>
              <option value="IEL">IEL</option>
              <option value="FIBRA">FIBRA</option>
            </select>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-building" aria-hidden="true"></i>
            </span>
          </div>
          <div class="wrap-input100 validate-input upload-field-container" data-validate="Arquivo obrigatório">
            <label for="file-upload" class="upload-field-label" id="file-name-label">
              Escolher ficheiro
            </label>
            <input class="upload-field-input" id="file-upload" type="file" name="image" accept="image/*" required />
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-upload" aria-hidden="true"></i>
            </span>
          </div>



          <div id="qrcode-container" style="margin-top: 20px; text-align: center; display: none">
            <p>QR Code gerado:</p>
            <div id="qrcode"></div>
          </div>
          <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">Gerar PDF</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      function formatarNome(nome) {
        return nome.replace(/\b\w+/g, (palavra) => palavra.charAt(0).toUpperCase() + palavra.slice(1).toLowerCase());
      }

      function gerarQRCode() {
        const nome = document.getElementById("nome").value;
        const cargo = document.getElementById("cargo").value;
        const matricula = document.getElementById("matricula").value;
        const casa = document.getElementById("casa").value;

        if (!nome || !cargo || !matricula || !casa) {
          document.getElementById("qrcode-container").style.display = "none";
          return;
        }

        const base64String = converteBase64(matricula, casa, nome);
        const qrcodeUrl =
          `https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=${encodeURIComponent(base64String)}`;
        document.getElementById("qrcode").innerHTML = `<img src="${qrcodeUrl}" alt="QR Code">`;
        document.getElementById("qrcode-container").style.display = "block";

        let qrCodeInput = document.querySelector("input[name='qrcode_url']");
        if (!qrCodeInput) {
          qrCodeInput = document.createElement("input");
          qrCodeInput.type = "hidden";
          qrCodeInput.name = "qrcode_url";
          qrCodeInput.value = qrcodeUrl;
          document.getElementById("form").appendChild(qrCodeInput);
        } else {
          qrCodeInput.value = qrcodeUrl;
        }
      }

      function converteBase64(matricula, casa, nome) {
        const unidade = {
          FIBRA: 3,
          SENAI: 2,
          SESI: 1,
          IEL: 4
        } [casa.toUpperCase()] || 0;
        const concatenado = `${unidade}-${matricula}-${nome}`;
        return btoa(concatenado);
      }

      document.getElementById("nome").addEventListener("input", function() {
        this.value = formatarNome(this.value);
        gerarQRCode();
      });
      document.getElementById("cargo").addEventListener("input", gerarQRCode);
      document.getElementById("matricula").addEventListener("input", gerarQRCode);
      document.getElementById("casa").addEventListener("change", gerarQRCode);
    });
    document.getElementById("file-upload").addEventListener("change", function() {
      const fileName = this.files[0] ? this.files[0].name : "Escolher ficheiro";
      document.getElementById("file-name-label").textContent = fileName;
    });
  </script>
  @if (Session::has('login_success'))
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      background: "#1988ca",
      color: "#fff",
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })
    Toast.fire({
      icon: 'success',
      text: "{{ session('login_success') }}"
    })
  </script>
  @endif

  @endsection