<!DOCTYPE html>
<html lang="pt-br">
<link
    href="https://fonts.googleapis.com/css2?family=Danfo&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crachás</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

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
            /* Ajuste conforme necessário */
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
            top: 27px;
            right: 865px;
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
            margin-top: 20px;
        }

        .cod-matricula {
            font-weight: 700;
        }

        .qr-code {

            margin-top: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 90px;
            border: 2px solid #245ca8;
            height: 90px;
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <!-- Crachá 1 -->
    <div class="cracha">
        <div class="card-body" style="position: relative;">
            <img src="{{ asset('img/cracha-frente-barra1.png') }}" alt="Imagem do Cracha">

            <div class="drop-area">
                <img id="preview-image" src="{{ asset($imagePath) }}" alt="Imagem carregada">
            </div>

            <p class="usuario">{{ $nome }}</p>
            <p class="cargo">{{ $cargo }}</p>

            <img class="footer-img" src="{{ asset('img/footer-img1.png') }}" alt="footer">

            <p class="matricula">Matrícula <span class="cod-matricula">{{ $matricula }}</span></p>
        </div>
    </div>

    <!-- Crachá 2 -->
    <div class="cracha">
        <div class="card-body">
            <img src="{{ asset('img/rodape.png') }}" alt="Imagem do Cracha">


            <div class="qr-code">
                <img src="{{ $qrcodeUrl }}" alt="QR Code">
            </div>

            <img class="footer-img1" src="{{ asset('img/cracha-rodape-costas.png') }}" alt="footer">
        </div>
    </div>

</body>

</html>