@extends('templates.template')
@section('title', 'welcome')
@section('Conteudo')
{{-- tested --}}
<link rel="stylesheet" href="{{ asset('css/cracha.css') }}">
<style>
  .drop-area {
    width: 40px;
    height: 80px;
    border: 2px solid black;
    border-radius: 5px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #1c56a8;
    font-size: 5px;
    cursor: pointer;
    text-align: center;
    position: relative;

  }


  .drop-area,
  .image-preview {
    margin-top: 15px;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100px;
    border: 2px solid #245ca8;
    height: 120px;
  }

  .drop-area.dragover {
    background-color: #f0f8f0;
  }

  .drop-area img {
    max-width: 100%;
    max-height: 100%;
    border-radius: 8px;
  }

  .image-preview {
    display: none;
    margin-top: 70px;
    text-align: center;

  }

  .form-container {
    margin-top: 20px;
    text-align: center;
    display: none;
  }

  .centralizar-imagem {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 226px;
  }

  .card-container {
    width: 360px;
    margin: 20px auto;
    border: 1px solid #ddd;
    border-radius: 0px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    background-color: transparent;
  }

  .card-header {
    padding: 0px;
    background-color: transparent;
    color: white;
    font-size: 14px;
    text-align: center;
  }

  .card-body {
    padding: 20px;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }

  .card-body img {
    max-width: 100%;
    border-radius: 0px;
  }

  .usuario {
    color: #1c56a8;
    font-weight: 900;
    font-family: "inter", Courier, monospace;
    padding: 5px;
    margin-bottom: 0px;
    font-size: 15px;
  }

  .cargo {
    font-family: "inter", Courier, monospace;
    margin-top: 0px;
    font-size: 12px;
    font-weight: 700;
    color: gray;
  }

  .usuario,
  .cargo {
    margin-bottom: 0px;

  }

  .footer-img {
    width: 226px;
    height: 40px;
    margin-top: 20px;
  }


  .crachas-container {
    display: flex;
    flex-direction: column;
    gap: 20px;
    align-items: center;
  }

  /* Nova classe para aumentar a margem do preview da imagem */
  .preview-image-second-cracha {
    margin-top: 10px;

  }

  .footer-img1 {
    width: 226px;
    height: 40px;
    margin-top: 57px;
  }

  .titulo {
    font-size: 16px;
    font-weight: bold;
    color: #1c56a8;
    margin-top: 30px;
    margin-bottom: 2px;
  }

  .drop-area1 {
    width: 90px;
    height: 90px;
    border: 2px solid #245ca8;
    border-radius: 5px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #245ca8;
    font-size: 5px;
    cursor: pointer;
    text-align: center;
    position: relative;
    margin-top: 50px;
    margin-bottom: -6px;
  }

  .card-body {
    position: relative;
  }

  .matricula {
    position: absolute;
    top: 14px;
    right: 80px;
    font-size: 12px;
    color: #ffffff;
    background-color: transparent;
    padding: 5px;
    z-index: 10;
    margin-top: 312px;
    margin-bottom: 600px;
  }

  .footer-img {
    position: relative;
    z-index: 1;

  }

  .cod-matricula {
    font-weight: 700;
    top: 10px;
    right: 100px;
  }

  .drop-area1 img {
    margin-top: 2px;
    width: 70px;

    height: 70px;

    object-fit: contain;

  }
</style>

<body>
  <form method="POST" action="{{ route('gerarPdf') }}" id="form-gerar-pdf">
    @csrf
    <input type="hidden" name="nome" value="{{ $nome }}">
    <input type="hidden" name="cargo" value="{{ $cargo }}">
    <input type="hidden" name="matricula" value="{{ $matricula }}">
    <input type="hidden" name="casa" value="{{ $casa }}">
    <input type="hidden" name="qrcode_url" value="{{ $qrcodeUrl }}">
    <input type="hidden" name="image" value="{{ asset($imagePath ?? '') }}"> <!-- Caminho da imagem carregada -->

    <button type="submit" class="btn btn-primary">Gerar PDF</button>
  </form>
  <div class="crachas-container">
    <!-- Crachá 1 -->
    <div class="card-container">
      <div class="card-header">

      </div>
      <div class="card-body" style="position: relative;">
        <img src="img/CRACHA1.png" alt="Imagem do Cracha" class="centralizar-imagem">

        <div class="drop-area" id="drop-area">
          <!-- Exibe a imagem enviada, se houver -->
          @if($imagePath)
          <img id="preview-image" src="{{ asset($imagePath) }}" alt="Imagem carregada">
          @else
          <img id="preview-image" src="img/upload.png" alt="Pré-visualização">
          @endif
        </div>

        <div class="image-preview" id="image-preview">
          @if($imagePath)
          <img id="preview-image" src="{{ asset($imagePath) }}" alt="Imagem carregada">
          @else
          <img id="preview-image" src="img/upload.png" alt="Pré-visualização">
          @endif
        </div>

        <div class="form-container" id="form-container">

        </div>
        <p class="usuario">{{ $nome }}</p>
        <p class="cargo">{{ $cargo }}</p>

        <img class="footer-img" src="img/CRACHA-BAIXO.png" alt="footer">

        <!-- Tag Matricula que ficará sobre a imagem -->
        <p class="matricula"> <span class="cod-matricula">{{ $matricula }}</span></p>
      </div>

      <!-- cracha2 -->
      <div class="card-header">

      </div>
      <div class="card-body">
        <img src="img/CRACHA-VERSO.png" alt="Imagem do Cracha" class="centralizar-imagem">

        <div class="drop-area1" id="drop-area">
          <img id="preview-image" src="{{ $qrcodeUrl }}" alt="QR Code">
        </div>

        <div class="image-preview" id="image-preview">
          <img id="preview-image" src="{{ $qrcodeUrl }}" alt="QR Code">
        </div>

        <div class="form-container" id="form-container">
          <form method="POST" action="/upload" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="image_data" id="image_data">
            <button type="submit" class="btn btn-primary">Enviar Imagem</button>
          </form>
        </div>

        <img class="footer-img1" src="img/CRACHA-VERSO-BAIXO.png" alt="footer">
      </div>
    </div>
  </div>

</body>


@endsection