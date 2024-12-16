@extends('templates.template')
@section('title', 'Sistema Fibra')
@section('Conteudo')
{{-- tested2eze --}}
<link
  href="https://fonts.googleapis.com/css2?family=Danfo&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
  rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/cracha.css') }}">
<link rel="stylesheet" href="{{ asset('css/font-neosanspro.css') }}">

<body>
  <style>
    @font-face {
      font-family: "NeoSansProRegular";
      src: url("{{ public_path('fonts/neosanspro/NeoSansProRegular.ttf') }}") format("truetype");
      font-weight: bold;
    }
  </style>
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

        <img class="footer-img" src="img/CRACHA-MATRICULA.PNG" alt="footer">

        <!-- Tag Matricula que ficará sobre a imagem -->
        <p class="matricula" sy>
          Matrícula<span class="cod-matricula"> {{ $matricula }}
          </span></p>
      </div>

      <!-- cracha2 -->
      <div class="card-header">

      </div>
      <div class="card-body">
        <img src="img/CRACHA-VERSO.PNG" alt="Imagem do Cracha" class="centralizar-imagem">

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

        <img class="footer-img1" src="img/CRACHA-VERSO-BAIXO.PNG" alt="footer">
      </div>
      <form method="POST" action="{{ route('gerarPdf') }}" id="form-gerar-pdf">
        @csrf
        <input type="hidden" name="nome" value="{{ $nome }}">
        <input type="hidden" name="cargo" value="{{ $cargo }}">
        <input type="hidden" name="matricula" value="{{ $matricula }}">
        <input type="hidden" name="casa" value="{{ $casa }}">
        <input type="hidden" name="qrcode_url" value="{{ $qrcodeUrl }}">
        <input type="hidden" name="image" value="{{ asset($imagePath ?? '') }}"> <!-- Caminho da imagem carregada -->

        <button type="submit" class="botao btn btn-primary">IMPRIMIR</button>
      </form>
    </div>
  </div>

</body>


@endsection