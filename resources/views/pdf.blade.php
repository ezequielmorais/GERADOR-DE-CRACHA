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

        @page {
            size: A4;
            margin: 0.5cm; /* Margem da página */
        }

        .cracha-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 0;
        }

        .cracha {
            width: 8.5cm; /* Largura do crachá */
            height: 5.5cm; /* Altura do crachá */
            margin-bottom: 10px;
            page-break-before: always; /* Garante que cada crachá esteja em uma página separada */
            page-break-after: always; /* Garante que o crachá termine com uma quebra de página */
        }

        /* Primeira quebra de página é opcional, apenas para o primeiro crachá */
        .cracha:first-of-type {
            page-break-before: auto;
        }

        /* Layout para a imagem */
        .drop-area {
            width: 100px;
            height: 120px;
            border: 2px solid #245ca8;
            border-radius: 8px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 15px;
        }

        .drop-area img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;  /* Ajusta a imagem para caber sem distorção */
            border-radius: 8px;
        }

        .usuario {
            color: #1c56a8;
            font-weight: bold;
            font-family: "Inter", Courier, monospace;
            padding: 5px;
            margin-bottom: 0;
            font-size: 15px;
            text-align: center;
        }

        .cargo {
            font-family: "Inter", Courier, monospace;
            margin-top: 0;
            font-size: 12px;
            font-weight: 700;
            color: gray;
            text-align: center;
        }

        .footer-img {
            width: 8.5cm;
            height: 1.5cm;
            margin-top: 15px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .qr-code {
            width: 90px;
            height: 90px;
            border: 2px solid #245ca8;
            border-radius: 8px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }

        .matricula {
            font-size: 12px;
            color: #ffffff;
            background-color: transparent;
            padding: 5px;
            text-align: center;
        }

    </style>
</head>
<body>

    <!-- Container de Crachás -->
    <div class="cracha-container">

        <!-- Crachá 1 -->
        <div class="cracha">
            <div class="card-body" style="position: relative;">
                <img src="img/cracha-frente-barra1.png" alt="Imagem do Cracha">

                <div class="drop-area">
                    <img id="preview-image" src="file://{{ public_path($imagePath)}}" alt="Imagem carregada">
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
                <img src="img/rodape.png" alt="Imagem do Cracha">

                <div class="qr-code">
                    <img src="data:image/png;base64,{{ $qrcodeUrl }}" alt="QR Code">
                </div>

                <img class="footer-img" src="img/cracha-rodape-costas.png" alt="footer">
            </div>
        </div>

    </div>

</body>
</html>
