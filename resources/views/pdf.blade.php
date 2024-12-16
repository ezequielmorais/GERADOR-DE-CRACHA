<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

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
      font-family: "NeoSansProBold";
      src: url("{{ public_path('fonts/neosanspro/NeoSansProBold.ttf') }}") format("truetype");
      font-weight: bold;
    }

    @font-face {
      font-family: "Neo Sans Pro Medium";
      src: url("{{ public_path('fonts/neosanspro/Neo Sans Pro Medium.ttf') }}") format("truetype");
      font-weight: bold;
    }


    @font-face {
      font-family: "NeoSansProRegular";
      src: url("{{ public_path('fonts/neosanspro/NeoSansProRegular.ttf') }}") format("truetype");
      font-weight: bold;
    }






    body {
      font-family: 'NeoSansProRegular' !important;
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
      font-weight: 1000;
      font-family: 'NeoSansProbold';
      padding: 5px;
      margin-bottom: -18px;
      font-size: 15px;
      margin-top: 2px;
      text-transform: uppercase;

    }


    .cargo {
      font-family: 'Neo Sans Pro Medium';
      word-wrap: break-word;
      margin-top: 15px;
      font-size: 12px;
      color: #545c5c;
      font-weight: 700;
      text-transform: uppercase;
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
      font-family: 'NeoSansProRegular', sans-serif !important;
    }

    .matricula {
      font-family: 'NeoSansProRegular', sans-serif !important;
      color: #ffffff;
      font-size: 13px;
      background-color: transparent;
      padding: 5px;
      position: absolute;
      top: -18px;
      right: 6px;
      z-index: 10;
      margin-top: 303px;
      margin-bottom: 600px;
    }

    .cod-matricula {
      font-family: 'NeoSansProBold', sans-serif !important;
      font-weight: 700;
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

      <h1 class="matricula" style="font-family:'NeoSansProRegular '">
        Matrícula<span class="cod-matricula"> {{ $matricula }}
        </span></h1>
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