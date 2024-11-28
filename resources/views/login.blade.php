<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema Fibra - Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
  <div class="container">
    <div class="background-shapes">
      <img src="img/Ellipse22.png" alt="Ellipse 22" class="shape1">
      <img src="img/Polygon2.png" alt="Polygon 2" class="shape2">
      <img src="img/Polygon3.png" alt="Polygon 3" class="shape3">
      <img src="img/Rectangle141.png" alt="Rectangle 141" class="shape4">
    </div>

    <div class="login-card">
      <img class="logo" src="img/logo-sistemafibra2024.png" alt="Logo">
      <p class="welcome">Bem vindo</p>
      <form>
        <div class="input-group">
          <label for="username">Usuário</label>
          <input type="text" id="username" placeholder="Raimundo.Mendonça">
          <i class="fas fa-user icon"></i>
        </div>
        <div class="input-group">
          <label for="password">Senha</label>
          <input type="password" id="password" placeholder="senha de acesso">
          <i class="fas fa-eye icon" id="togglePassword"></i>
        </div>
        <button type="submit" class="btn">ENTRAR</button>
      </form>
    </div>
  </div>

  <script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordField = document.getElementById('password');

    togglePassword.addEventListener('click', () => {
      const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordField.setAttribute('type', type);
      togglePassword.classList.toggle('fa-eye-slash');
    });
  </script>
</body>

</html>