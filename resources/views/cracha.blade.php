@extends('templates.template')
@section('title', 'welcome')
@section('Conteudo')

<link rel="stylesheet" href="{{ asset('css/cracha.css') }}">

<body>
    <form method="POST" action="{{ route('gerarPdf') }}" id="form-gerar-pdf">
        @csrf
        <input type="hidden" name="nome" value="{{ $nome }}">
        <input type="hidden" name="cargo" value="{{ $cargo }}">
        <input type="hidden" name="matricula" value="{{ $matricula }}">
        <input type="hidden" name="casa" value="{{ $casa }}">
        <input type="hidden" name="qrcode_url" value="{{ $qrcodeUrl }}">
        <input type="hidden" name="image" value="{{ asset($imagePath ?? '') }}"> <!-- Caminho da imagem carregada -->

        <button type="submit" class="btn btn-primary">Gerar PDF</button>
    </form>
    <div class="crachas-container">
        <!-- Crachá 1 -->
        <div class="card-container">
            <div class="card-header">

            </div>
            <div class="card-body" style="position: relative;">
                <img src="img/cracha-frente-barra1.png" alt="Imagem do Cracha" class="centralizar-imagem">

                <div class="drop-area" id="drop-area">
                    <!-- Exibe a imagem enviada, se houver -->
                    @if($imagePath)
                    <img id="preview-image" src="{{ asset($imagePath) }}" alt="Imagem carregada">
                    @else
                    <img id="preview-image" src="img/upload.png" alt="Pré-visualização">
                    @endif
                </div>

                <div class="image-preview" id="image-preview">
                    @if($imagePath)
                    <img id="preview-image" src="{{ asset($imagePath) }}" alt="Imagem carregada">
                    @else
                    <img id="preview-image" src="img/upload.png" alt="Pré-visualização">
                    @endif
                </div>

                <div class="form-container" id="form-container">
                   
                </div>
                <p class="usuario">{{ $nome }}</p>
                <p class="cargo">{{ $cargo }}</p>

                <img class="footer-img" src="img/footer-img1.png" alt="footer">

                <!-- Tag Matricula que ficará sobre a imagem -->
                <p class="matricula">Matrícula <span class="cod-matricula">{{ $matricula }}</span></p>
            </div>

            <!-- cracha2 -->
            <div class="card-header">
                <!-- Aqui você pode adicionar título ou outros elementos se necessário -->
            </div>
            <div class="card-body">
                <img src="img/rodape.png" alt="Imagem do Cracha" class="centralizar-imagem">
                <p class="titulo">Presença</p>
                <div class="drop-area1" id="drop-area">
                    <img id="preview-image" src="{{ $qrcodeUrl }}" alt="QR Code">
                </div>

                <div class="image-preview" id="image-preview">
                    <img id="preview-image" src="{{ $qrcodeUrl }}" alt="QR Code">
                </div>

                <div class="form-container" id="form-container">
                    <form method="POST" action="/upload" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="image_data" id="image_data">
                        <button type="submit" class="btn btn-primary">Enviar Imagem</button>
                    </form>
                </div>

                <img class="footer-img1" src="img/cracha-rodape-costas.png" alt="footer">
            </div>
        </div>
    </div>

</body>

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