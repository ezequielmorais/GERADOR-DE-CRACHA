@extends('templates.template')

@section('title', 'Gerar QR Code e PDF')

@section('Conteudo')
<h2>Gerar QR Code e Imprimir PDF</h2>

<div class="form-container">
    <form id="form" action="{{ route('gerar.pdf') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Campos do formulário -->
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required><br><br>

        <label for="cargo">Cargo:</label>
        <input type="text" name="cargo" id="cargo" required><br><br>

        <label for="matricula">Matrícula:</label>
        <input type="text" name="matricula" id="matricula" required><br><br>

        <label for="casa">Casa:</label>
        <input type="text" name="casa" id="casa" required><br><br>


        <!-- Input de arquivo escondido -->
        <input type="file" name="image" accept="image/*">

    
        <!-- Botões -->
        <div style="margin-top: 20px;">
            <button type="button" id="generate-qrcode">Gerar QR Code</button>
            <button type="submit">Gerar PDF</button>
        </div>
    </form>
</div>

<div id="qrcode-container" style="margin-top: 20px; text-align: center; display: none;">
    <p>QR Code gerado:</p>
    <div id="qrcode"></div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
       

        // Gerar QR Code quando clicar no botão "Gerar QR Code"
        document.getElementById("generate-qrcode").addEventListener("click", function() {
            const nome = document.getElementById("nome").value;
            const cargo = document.getElementById("cargo").value;
            const matricula = document.getElementById("matricula").value;
            const casa = document.getElementById("casa").value;

            if (!nome || !cargo || !matricula || !casa) {
                alert("Preencha todos os campos para gerar o QR Code.");
                return;
            }

            const base64String = converteBase64(matricula, casa, nome);

            // Criar e exibir o QR Code
            const qrcodeUrl = `https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=${base64String}`;
            const qrcodeContainer = document.getElementById("qrcode");
            qrcodeContainer.innerHTML = `<img src="${qrcodeUrl}" alt="QR Code">`;

            // Mostrar o container do QR Code
            document.getElementById("qrcode-container").style.display = "block";

            // Adicionar QR Code ao formulário
            const qrCodeInput = document.createElement("input");
            qrCodeInput.type = "hidden";
            qrCodeInput.name = "qrcode_url";
            qrCodeInput.value = qrcodeUrl;
            document.getElementById("form").appendChild(qrCodeInput);
        });

        // Função para converter dados em base64
        function converteBase64(matricula, casa, nome) {
            let unidade = 0;
            if (casa.startsWith("FIBRA")) unidade = 3;
            else if (casa.startsWith("SENAI")) unidade = 2;
            else if (casa.startsWith("SESI")) unidade = 1;
            else if (casa.startsWith("IEL")) unidade = 4;
            const concatenado = `${unidade}-${matricula}-${nome}`;
            return btoa(concatenado); // Retorna a string em base64
        }
    });
</script>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }

    .form-container {
        margin-top: 20px;
        max-width: 600px;
        margin: 0 auto;
    }

    .drop-area {
        width: 100%;
        height: 150px;
        border: 2px dashed #4CAF50;
        border-radius: 8px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #4CAF50;
        font-size: 18px;
        cursor: pointer;
        text-align: center;
    }

    .drop-area.dragover {
        background-color: #f0f8f0;
    }

    #qrcode-container {
        margin-top: 20px;
    }

    button {
        padding: 10px 20px;
        font-size: 16px;
        margin-right: 10px;
        cursor: pointer;
    }
</style>
@endsection