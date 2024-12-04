<!DOCTYPE html>
<html lang="pt-br">
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

        .cracha {
            page-break-before: always; /* Garante que cada crachá fique em uma página separada */
            width: 360px;
            margin: 20px auto;
            border: 1px solid #ddd;
            border-radius: 0px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: transparent;
        }

        .card-header {
            padding: 0;
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
            border-radius: 0;
        }

        .usuario {
            color: #1c56a8;
            font-weight: 500;
            font-family: "inter", Courier, monospace;
            padding: 5px;
            margin-bottom: 0;
            font-size: 12px;
        }

        .cargo {
            font-family: "inter", Courier, monospace;
            margin-top: 0;
            font-size: 10px;
        }

        .matricula {
            position: absolute;
            top: 10px;
            right: 90px;
            font-size: 10px;
            color: #ffffff;
            background-color: transparent;
            padding: 5px;
            z-index: 10;
        }

        .footer-img {
            width: 196px;
            height: 36px;
            margin-top: 30px;
        }

        .qr-code {
            margin-top: 20px;
        }

        .titulo {
            font-size: 16px;
            font-weight: bold;
            color: #1c56a8;
            margin-top: 30px;
            margin-bottom: 2px;
        }

        .footer-img1 {
            width: 196px;
            height: 36px;
            margin-top: 60px;
        }
    </style>
</head>
<body>
    <!-- Crachá 1 -->
    <div class="cracha">
        <div class="card-body" style="position: relative;">
            <img src="img/cracha-frente-barra1.png" alt="Imagem do Cracha" class="centralizar-imagem">

            <div class="drop-area">
                <img id="preview-image" src="{{ asset($imagePath) }}" alt="Imagem carregada">
            </div>

            <p class="usuario">{{ $nome }}</p>
            <p class="cargo">{{ $cargo }}</p>

            <img class="footer-img" src="img/footer-img1.png" alt="footer">

            <p class="matricula">Matrícula <span class="cod-matricula">{{ $matricula }}</span></p>
        </div>
    </div>

    <!-- Crachá 2 -->
    <div class="cracha">
        <div class="card-body">
            <img src="img/rodape.png" alt="Imagem do Cracha" class="centralizar-imagem">
            <p class="titulo">Presença</p>

            <div class="qr-code">
                <img src="{{ $qrcodeUrl }}" alt="QR Code">
            </div>

            <img class="footer-img1" src="img/cracha-rodape-costas.png" alt="footer">
        </div>
    </div>

</body>
</html>
