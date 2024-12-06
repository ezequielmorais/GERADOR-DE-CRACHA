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
            size: A4;
            margin: 1cm;
        }

        body {
            font-family: 'Inter', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .cracha-container {
            width: 100%;

            text-align: center;
        }

        .cracha {
            width: 100%;
            height: 100%;
            margin: 0 auto 1cm auto;
            border: 1px solid #ddd;
            padding: 10px;
            page-break-inside: avoid;
            /* Evita quebras no meio de um crachá */
        }

        .cracha:nth-child(2) {
            page-break-before: always;
            /* Força quebra antes do segundo crachá */
        }

        .cracha img {
            width: 100%;
            height: auto;

        }

        .drop-area,
        .qr-code {
            width: 300px;
            height: 400px;
            margin: 10px auto;
            margin-top: 20px;
            border: 2px solid #245ca8;
            border-radius: 8px;
        }

        .usuario {
            font-family: 'Inter', Arial, sans-serif;
            color: #1c56a8;

            padding: 5px;
            margin-top: -5px;
            font-size: 15px;
        }

        .cargo {
            font-family: 'Inter', Arial, sans-serif;
            margin-top: -13px;
            font-size: 12px;
            font-weight: 700;
            color: gray;
        }

        .footer-img {
            width: 100%;
            height: 400px;
            display: block;
            margin-top: 12px;
        }

        .matricula {
            position: absolute;
            top: 7px;
            right: 263px;
            font-size: 12px;
            color: #ffffff;
            background-color: transparent;
            padding: 5px;
            z-index: 10;
            margin-top: 312px;
            margin-bottom: 600px;
        }

        .image-preview {
            margin-top: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100px;
            border: 2px solid #245ca8;
            height: 120px;
        }

        .drop-area img {
            justify-content: center;
            width: 400px;
            height: 350px;
            object-fit: contain;
            margin-top: 10px;
            <?php if ($tipo != 'png') { ?>transform: rotate(270deg);
            <?php } ?>
        }

        .drop-area {
            width: 370px;
            height: 440px;
        }

        .cod-matricula {
            font-weight: 700;
        }

        .footer-img1 {
            width: 230px;
            height: -10px;
            margin-top: 60px;
        }

        .drop-area1 {
            width: 350px;
            height: 350px;
            border: 2px solid #245ca8;
            border-radius: 8px;
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
            right: -220px;
        }

        .drop-area1 img {
            margin-top: 10px;
            width: 300px;
            
            height: 300px;
            object-fit: contain;

        }
    </style>
</head>

<body>
    <div class="cracha-container">
        <!-- Crachá 1 -->
        <div class="cracha">
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/CRACHA1.png'))) }}"
                alt="Imagem do Cracha">
            <div class="drop-area">
                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path($imagePath))) }}"
                    alt="Imagem carregada">
            </div>
            <p class="usuario" style="font-family: 'Inter', Arial, sans-serif;"><strong>{{ $nome }}</strong></p>
            <p class="cargo">{{ $cargo }}</p>
            <img class="footer-img"
                src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/CRACHA-BAIXO.png'))) }}"
                alt="footer">

            <p class="matricula"> <span class="cod-matricula">{{ $matricula }}</span></p>
        </div>

        <!-- Crachá 2 -->
        <div class="cracha" style="page-break-before: always;">
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