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
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .cracha-container {
            width: 100%;
            height: 100%;
            display: grid;
            grid-template-columns: 1fr;
            grid-template-rows: 1fr 1fr;
            gap: 1cm;
            text-align: center;
        }

        .cracha {
            width: 100%;
            max-height: 100%;
            border: 1px solid #ddd;
            padding: 10px;
            box-sizing: border-box;
        }

        .cracha img {
            width: 100%;
            height: auto;
        }

        .drop-area img {
            justify-content: center;
            width: 255px;
            height: 210px;
            object-fit: contain;
            margin-top: 39px;

            <?php if ($tipo != 'png') {
            ?>transform: rotate(270deg);
            <?php
            }

            ?>
        }

        .drop-area {

            width: 250px;
            height: 280px;
            margin: 10px auto;
            border: 2px solid #245ca8;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 70px;
        }

        .footer-img {
            width: 100%;
            height: 300px;
            display: block;
            margin-top: 90px;
        }

        .drop-area1 {
            width: 100%;
            width: 290px;
            height: 290px;
            margin: 10px auto;
            border: 2px solid #245ca8;
            border-radius: 8px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 120px;
        }



        .drop-area1 img {
            width: 90%;
            height: 90%;
            object-fit: contain;
        }

        .usuario {
            font-family: 'Inter', Arial, sans-serif;
            color: #1c56a8;
            padding: 5px;
            margin-top: 35px;
            font-size: 30px;
        }

        .cargo {
            font-family: 'Inter', Arial, sans-serif;
            margin-top: 15px;
            font-size: 28px;
            font-weight: 700;
            color: gray;
        }



        .footer-img1 {
            width: 100%;
            height: 300px;
            display: block;
            margin-top: 115px;
        }

        .matricula {
            position: absolute;
            top: 608px;
            right: 60px;
            font-size: 32px;
            color: #ffffff;
            background-color: transparent;
            padding: 5px;
            z-index: 10;
            margin-top: 312px;
            margin-bottom: 600px;
        }

        .cod-matricula {
            font-weight: 700;
        }

        .drop-area1 img {
            margin-top: 25px;
            width: 240px;
            height: 240px;
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
            <p class="usuario"><strong>{{ $nome }}</strong></p>
            <p class="cargo">{{ $cargo }}</p>
            <img class="footer-img"
                src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/CRACHA-BAIXO.png'))) }}"
                alt="footer">
            <p class="matricula"><span class="cod-matricula">{{ $matricula }}</span></p>
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