@extends('templates.template')
@section('title', 'welcome')
@section('Conteudo')

<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<style>
    .drop-area {
        width: 60px;
        height: 90px;
        border: 2px solid black;
        border-radius: 0px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #1c56a8;
        font-size: 18px;
        cursor: pointer;
        text-align: center;
        position: relative;
        margin-top: 20px;
    }

    .drop-area,
    .image-preview {
        margin-top: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 120px;

        max-width: 400px;
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
        margin-top: 20px;
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
        width: 350px;
        height: 120px;
    }

    .card-container {
        width: 400px;
        margin: 20px auto;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        background-color: transparent;
    }

    .card-header {
        padding: 0px;
        background-color: transparent;
        color: white;
        font-size: 18px;
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
        border-radius: 8px;
    }

    .usuario {
        color: #1c56a8;
        font-weight: 500;
        font-family: 'inter', Courier, monospace;
        padding: 5px;
        margin-bottom: 0px;

    }

    .cargo {
        font-family: 'inter', Courier, monospace;
        margin-top: 0px;
        /* Reduz o espaço acima do cargo */
    }
</style>
</head>

<body>

    <div class="card-container">
        <div class="card-header">
            <!-- Aqui você pode adicionar título ou outros elementos se necessário -->
        </div>
        <div class="card-body">
            <!-- Imagem dentro do Card -->
            <img src="img/cracha-frente-barra1.png" alt="Imagem do Cracha" class="centralizar-imagem">
            <div class="drop-area" id="drop-area">
                <img id="preview-image" src="img/upload.png" alt="Pré-visualização">
            </div>

            <div class="image-preview" id="image-preview">
                <img id="preview-image" src="img/upload.png" alt="Pré-visualização">
                <img id="preview-image" src="" alt="Pré-visualização">
            </div>

            <div class="form-container" id="form-container">
                <form method="POST" action="/upload" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="image_data" id="image_data">
                    <button type="submit" class="btn btn-primary">Enviar Imagem</button>
                </form>
            </div>
            <p class="usuario">Raimundo Mendonça</p>
            <p class="cargo">Estágiario</p>



        </div>
    </div>

    <script>
        const dropArea = document.getElementById("drop-area");
        const dropText = document.getElementById("drop-text");
        const previewImage = document.getElementById("preview-image");
        const imagePreview = document.getElementById("image-preview");
        const formContainer = document.getElementById("form-container");
        const imageDataInput = document.getElementById("image_data");

        // Impede o comportamento padrão de dragover para permitir o drop
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

        // Permitir seleção de arquivo ao clicar na área de arrastar
        dropArea.addEventListener("click", () => {
            const fileInput = document.createElement("input");
            fileInput.type = "file";
            fileInput.accept = "image/*";
            fileInput.onchange = (e) => {
                const file = e.target.files[0];
                if (file && file.type.startsWith("image/")) {
                    showImagePreview(file);
                } else {
                    alert("Por favor, selecione uma imagem válida.");
                }
            };
            fileInput.click();
        });

        // Função para mostrar a pré-visualização da imagem
        function showImagePreview(file) {
            const reader = new FileReader();
            reader.onload = () => {
                // Substitui o texto da área de arrasto pela imagem
                dropText.style.display = "none";
                const imgElement = document.createElement("img");
                imgElement.src = reader.result;
                dropArea.innerHTML = ''; // Limpa o conteúdo da área
                dropArea.appendChild(imgElement); // Adiciona a imagem à área

                // Exibe a pré-visualização abaixo da área
                previewImage.src = reader.result;
                imagePreview.style.display = "block";

                // Envia a imagem no FormData
                imageDataInput.value = reader.result; // Armazena o Data URL da imagem no campo hidden

                // Exibe o formulário
                formContainer.style.display = "block";
            };
            reader.readAsDataURL(file);
        }
    </script>

    @endsection