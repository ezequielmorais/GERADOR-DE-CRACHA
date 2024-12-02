@extends('templates.template')

@section('title', 'Gerar QR Code e PDF')

@section('Conteudo')
<h2>Gerar QR Code e Imprimir PDF</h2>

<div class="form-container">
    <form id="form" action="{{ route('gerar.pdf') }}" method="POST">
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

        <!-- Área de arrastar e soltar -->
        <div class="drop-area" id="drop-area">
            <span id="drop-text">Arraste e solte a imagem aqui ou clique para fazer upload</span>
        </div>
        <img id="preview-image" alt="Pré-visualização da Imagem" style="display: none; margin-top: 10px;">

        <!-- Input de arquivo escondido -->
        <input type="file" id="file-input" accept="image/*" style="display: none;">

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
        const dropArea = document.getElementById("drop-area");
        const dropText = document.getElementById("drop-text");
        const fileInput = document.getElementById("file-input");
        const previewImage = document.createElement("img");
        previewImage.id = "preview-image";
        previewImage.style.display = "none";
        previewImage.style.marginTop = "10px";

        const imageDataInput = document.createElement("input");
        imageDataInput.type = "hidden";
        imageDataInput.name = "image_base64";

        // Adicionar campo oculto ao formulário
        document.getElementById("form").appendChild(imageDataInput);

        // Evento de clique para abrir o seletor de arquivos
        dropArea.addEventListener("click", () => {
            fileInput.click();
        });

        // Evento para processar a seleção de arquivo via clique
        fileInput.addEventListener("change", () => {
            const file = fileInput.files[0];
            if (file && file.type.startsWith("image/")) {
                showImagePreview(file);
            } else {
                alert("Por favor, selecione uma imagem válida.");
            }
        });

        // Eventos de drag-and-drop
        dropArea.addEventListener("dragover", (e) => {
            e.preventDefault();
            dropArea.classList.add("dragover");
        });

        dropArea.addEventListener("dragleave", () => {
            dropArea.classList.remove("dragover");
        });

        dropArea.addEventListener("drop", (e) => {
            e.preventDefault();
            dropArea.classList.remove("dragover");

            const file = e.dataTransfer.files[0];
            if (file && file.type.startsWith("image/")) {
                showImagePreview(file);
            } else {
                alert("Por favor, arraste uma imagem válida.");
            }
        });

        // Função para mostrar a pré-visualização da imagem
        function showImagePreview(file) {
            const reader = new FileReader();
            reader.onload = () => {
                // Atualiza pré-visualização
                previewImage.src = reader.result;
                previewImage.style.display = "block";
                dropArea.innerHTML = '';
                dropArea.appendChild(previewImage);

                // Adiciona a imagem em base64 no campo hidden
                imageDataInput.value = reader.result;
            };
            reader.readAsDataURL(file);
        }

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