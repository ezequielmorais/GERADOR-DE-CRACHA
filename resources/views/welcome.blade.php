@extends('templates.template')
@section('title', 'welcome')
@section('Conteudo')

<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<style>
        /* Estilos para a área de drag and drop */
        .drop-area {
            width: 50px;
            height: 70px;
            border: 2px dashed #4CAF50;
            border-radius: 8px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #4CAF50;
            font-size: 18px;
            cursor: pointer;
            text-align: center;
            position: relative;
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
        }
    </style>
</head>
<body>


    <!-- Área de arrastar e soltar -->
    <div class="drop-area" id="drop-area" >
        <span id="drop-text"></span>
    </div>

    <!-- Pré-visualização da imagem -->
  
    <!-- Formulário para envio -->
    <div class="form-container" id="form-container" style="display: none;">
        <form id="upload-form"  method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image" id="image-input" style="display: none;">
            <input type="hidden" name="image_data" id="image_data">
            <button type="submit">Enviar Imagem</button>
        </form>
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
                dropText.style.display = "none"; // Esconde o texto
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
<!-- <div class="search-container">
    <input type="text" placeholder="Pesquisar..." class="search-input">
    <button class="search-button">Buscar</button>
</div> -->

@endsection