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

  <title>template</title>
</head>
<style>
  body {
    margin: 0;
    padding: 0;
  }

  .header {
    background-color: #0E4194;
    height: 80px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: relative;
  }

  .logo-container {
    width: 120px;
    height: auto;
    overflow: hidden;
    margin-left: 150px;

  }

  .logo-container img {
    width: 70px;
    height: auto;

  }

  .logout-container {
    display: flex;
    flex-direction: column;
    align-items: center;

  }

  .logout-container button {
    margin-top: 5px;

  }


  .logout-container img {
    width: 50px;
    height: auto;
    margin-bottom: -11px;
    margin-left: -300px;
    margin-top: 10px;
  }


  .logout-container button {
    background-color: transparent;
    color: white;
    border: none;
    font-weight: bold;
    font-family: "inter", sans-serif;
    padding: 5px 10px;
    font-size: 14px;
    cursor: pointer;
    border-radius: -20px;
    margin-left: -300px;
    /* Move o botão para a esquerda */
  }

  .logout-container button:hover {
    background-color: transparent;

  }
</style>

<body>

  <header class="header">
    <img class="logo-container " src="img/logo-branca1.png" alt="logo">
    <i class="bi bi-list"></i>
    <form method="POST" action="" class="logout-form" id="logout-form">
      @csrf
      <div class="logout-container">
        <!-- Adiciona o contêiner para empilhar -->
        <img src="img/icone-perfil1.png" alt="Perfil">
        <button type="button" onclick="msgLogoff(event)">
          SAIR
        </button>
      </div>
    </form>
  </header>

  <div class="page-content">
    @yield('Conteudo')
  </div>
</body>

</html>