<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
  </script>
  <link
    href="https://fonts.googleapis.com/css2?family=Danfo&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


  <title>Gerar QR Code e Imprimir PDF</title>
  <link rel="stylesheet" type="img/icone-sistema.ico" href="{{ asset('img/icone-sistema.ico') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/template.css') }}">
</head>


<body>

  <header class="header">
    <a href="/welcome"> <img class="logo-container " src="img/logo-branca1.png" alt="logo"></a>
    @if (session('user'))
    <p class="titulo-header">Bem-vindo, {{ session('user')['nome'] }}!</p>
    @endif
    <i class="bi bi-list"></i>
    <form method="POST" action="{{ route('logout') }}" class="logout-form" id="logout-form">
      @csrf
      <div class="logout-container">
        <!-- Adiciona o contêiner para empilhar -->
        <img src="img/icone-perfil1.png" alt="Perfil">
        <button type="submit" onclick="msgLogoff(event)">
          SAIR
        </button>
      </div>
    </form>
    <a href="/welcome" class="back-button ">
      <span class="fas fa-arrow-left">Voltar</span>
    </a>
  </header>

  <div class="page-content">
    @yield('Conteudo')
  </div>
</body>

</html>