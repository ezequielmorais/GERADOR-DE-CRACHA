<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <link href="https://fonts.cdnfonts.com/css/neo-sans-pro" rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css2?family=Danfo&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">
  <title>Sistema Fibra</title>
  <style>
    @page {
      size: 54mm 86mm;
      margin: 0cm;
    }

    @font-face {
      font-family: 'NeoSansPro-Black';
      src: url("../fonts/NeoSansPro-Black.ttf");
    }

    @font-face {
      font-family: 'NeoSansPro-Black';
      src: url('{{ public_path("fonts/NeoSansPro-Black.ttf") }}') format('truetype');
    }

    @font-face {
      font-family: 'Neo Sans Pro Black';
      src: url('{{ public_path(" fonts/NeoSansPro-Black.ttf") }}') format('truetype');

      /* Black */

    }

    @font-face {
      font-family: "Neo Sans Pro Black";
      src: local("Neo Sans Pro Black"), url(" fonts/NeoSansPro-Black.ttf") format("truetype");
      font-weight: normal;
      font-style: normal;

    }

    @font-face {
      font-family: 'Neo Sans Pro';
      src: url('/Fonts/NeoSansProMedium.OTF') format('opentype');

      /* Medium */

    }

    @font-face {
      font-family: 'Neo Sans Pro';
      src: url('/Fonts/NeoSansProRegular.OTF') format('opentype');

      /* Regular */

    }

    body {
      font-family: 'Neo Sans Pro', sans-serif !important;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .cracha-container {

      display: grid;
      grid-template-columns: 1fr;
      grid-template-rows: 1fr 1fr;
      gap: 1cm;
      text-align: center;
    }



    .cracha img {
      width: 100%;
      height: auto;
    }

    .drop-area img {
      justify-content: center;
      max-width: 100%;
      max-height: 100%;


    }

    .drop-area {
      width: 90px;
      height: 113px;
      left: 55px;
      border: 2px solid #245ca8;
      border-radius: 5px;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #1c56a8;
      font-size: 5px;
      cursor: pointer;
      text-align: center;
      position: relative;
      overflow: hidden;
      margin-top: 20px;

    }

    .footer-img {
      width: 226px;
      height: 40px !important;
      position: absolute;
      bottom: 0;
    }

    .usuario {
      color: #1c56a8;
      font-weight: 900;
      font-family: 'Neo Sans Pro Black', sans-serif;
      padding: 5px;
      margin-bottom: 0px;
      font-size: 15px;
      margin-top: 5px;


    }

    .cargo {
      font-family: 'Neo Sans Pro Medium', sans-serif;
      word-wrap: break-word;
      margin-top: 0px;
      font-size: 12px;
      color: gray;
      font-weight: 700;

    }

    .card-body {
      position: relative;
    }

    .footer-img1 {
      width: 100%;
      height: calc(100vh -
          /* altura dos outros elementos */
        );
      position: absolute;
      bottom: 0;
    }

    .matricula {
      position: absolute;
      top: -18px;
      right: 6px;
      font-size: 13px;
      color: #ffffff;
      background-color: transparent;
      padding: 5px;
      z-index: 10;
      margin-top: 306px;
      margin-bottom: 600px;
      font-family: 'Neo Sans Pro Regular', sans-serif;

    }

    .cod-matricula {
      font-weight: 700;
      font-family: 'Neo Sans Pro black', sans-serif;
    }


    .crachaHeader {
      width: 100%;
      height: auto;
      display: block;
      position: relative;
    }

    .drop-area1 {
      width: 95px;
      height: 95px;
      border: 1px solid #245ca8;
      border-radius: 7px;
      display: flex;
      left: 55px;
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

    .drop-area1 img {
      margin-top: 10px;
      width: 75px;
      height: 75px;
      object-fit: contain;

    }
  </style>
</head>

<body>
  <div class="cracha-container">
    <!-- Crachá 1 -->
    <div class="cracha">
      <img class="crachaHeader"
        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/CRACHA1.png'))) }}"
        alt="Imagem do Cracha">
      <div class="drop-area">
        <img src="{{ (public_path($imagePath)) }}" alt="Imagem carregada">
      </div>
      <p class="usuario"><strong>{{ $nome }}</strong></p>
      <p class="cargo">{{ $cargo }}</p>
      <img class="footer-img"
        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/CRACHA-MATRICULA.png'))) }}"
        alt="footer">

      <p class="matricula">
        Matrícula<span class="cod-matricula"> {{ $matricula }}
        </span></p>
    </div>

    <!-- Crachá 2 -->
    <div class="cracha">
      <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/CRACHA-VERSO.png'))) }}"
        alt="Imagem do Cracha">
      <div class="drop-area1">
        <img class="qr-code1" src="data:image/png;base64,{{ $qrcodeUrl }}" alt="QR Code">
      </div>
      <img class="footer-img1"
        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/CRACHA-VERSO-BAIXO.png'))) }}"
        alt="Rodapé">
    </div>
  </div>
</body>

</html>