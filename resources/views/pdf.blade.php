<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <title>Crachás</title>
  <style>
  @page {
    size: 54mm 86mm;
    margin: 0cm;
  }

<<<<<<< Updated upstream
  @font-face {
    font-family: 'Neo Sans Pro';
    src: url('fonts/NeoSansPro-Black.ttf') format('truetype');
    font-weight: 900;
    /* Black */
  }

  @font-face {
    font-family: 'Neo Sans Pro';
    src: url('fonts/NeoSansPro-Medium.ttf') format('truetype');
    font-weight: 500;
    /* Medium */
  }

  body {
    font-family: 'Inter', Arial, sans-serif;
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
=======
    @font-face {
        font-family: 'NeoSansProBlack';
        src: url("{{ public_path('fonts/NeoSansProBlack.ttf') }}") format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    .custom-font {
        font-family: 'NeoSansProBlack';
        font-size: 20px;
    }
    body {
      font-family: "NeoSansProBlack";
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
>>>>>>> Stashed changes



  .cracha img {
    width: 100%;
    height: auto;
  }

  .drop-area img {
    justify-content: center;
    max-width: 100%;
    /* Garante que a largura máxima seja igual à do contêiner */
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
    font-family: 'Neo Sans Pro', sans-serif;
    padding: 5px;
    margin-bottom: 0px;
    font-size: 15px;
    margin-top: 5px;


  }

  .cargo {
    font-family: 'Neo Sans Pro', sans-serif;
    margin-top: 0px;
    font-size: 12px;
    color: gray;
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

<<<<<<< Updated upstream
  .matricula {
    position: absolute;
    top: -18px;
    right: 6px;
    font-size: 13px;
    color: #ffffff;
    background-color: transparent;
    padding: 5px;
    z-index: 10;
    margin-top: 312px;
    margin-bottom: 600px;
  }

  .cod-matricula {
    font-weight: 700;
    font-family: 'Neo Sans Pro', sans-serif;
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
    border: 2px solid #245ca8;
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
    margin-top: 9px;
    width: 75px;

    height: 75px;
=======
    .usuario {
      color: #1c56a8;
      font-weight: 900;
      padding: 5px;
      margin-bottom: 0px;
      font-size: 15px;
      margin-top: 5px;
    }
    .cargo {
      margin-top: 0px;
      font-size: 10px;
      color: #677c92;
      font-weight: 700;
      text-transform: uppercase;
     width: 100px;
    word-break: break-word;
      right: 100px !important;
      font-family: "Neo Sans Pro Black";  
    }
>>>>>>> Stashed changes

    object-fit: contain;

<<<<<<< Updated upstream
  }
=======
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

    }

    .cod-matricula {
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
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
      <p class="cargo"><strong>{{ $cargo }}</strong></p>
      <img class="footer-img"
        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/CRACHA-BAIXO.png'))) }}"
=======
      <div class="box-cargo">
      <p class="cargo"><strong>{{ $cargo }}</strong></p>
      </div>
      <img class="footer-img"
        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/CRACHA-MATRICULA.PNG'))) }}"
>>>>>>> Stashed changes
        alt="footer">
      <p class="matricula"><span class="cod-matricula">{{ $matricula }}</span></p>
    </div>

    <!-- Crachá 2 -->
    <div class="cracha">
      <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/CRACHA-VERSO.PNG'))) }}"
        alt="Imagem do Cracha">
      <div class="drop-area1">
        <img class="qr-code1" src="data:image/png;base64,{{ $qrcodeUrl }}" alt="QR Code">
      </div>
      <img class="footer-img1"
        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/CRACHA-VERSO-BAIXO.PNG'))) }}"
        alt="Rodapé">
    </div>
  </div>
</body>

</html>