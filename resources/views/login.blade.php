<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema Fibra - Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #ffffff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {

      width: 100%;
      height: 100%;
      position: relative;
      overflow: hidden;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .background-shapes {
      position: absolute;
      width: 100%;
      height: 100%;
      overflow: hidden;
      z-index: -1;
    }

    .background-shapes img {
      position: absolute;
      opacity: 0.8;
    }

    .background-shapes .shape1 {
      top: 0;
      left: 0;
      width: 400px;
      height: auto;
      width: 300px;
      /* Ajuste para manter proporções */
    }

    .background-shapes .shape2 {
      bottom: 15%;
      left: 10%;
      width: 380px;
    }


    .background-shapes .shape3 {
      bottom: 30%;
      left: 70%;
      transform: translateX(-50%);
      width: 450px;
      /* Aumenta o tamanho */
    }


    .background-shapes .shape4 {
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 100%;
      height: 100px;
      position: absolute;
    }


    .login-card {
      background: white;
      border-radius: 10px;
      padding: 30px 50px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
      text-align: center;
      width: 350px;
      z-index: 1;
      position: relative;
      /* Adiciona posicionamento relativo */
      left: -300px;
      /* Move o card 50px para a esquerda */
    }

    .login-card {
      top: -50px;
      /* Adicione esta propriedade */
      left: -300px;
      position: relative;
    }

    .logo {
      margin: 0;
      width: 150px;
      height: auto;
      margin-bottom: 10px;
    }

    .welcome {
      margin: 10px 0 20px;
      font-size: 16px;
      color: #666;
      font-family: 'Poetsen One', sans-serif;
    }

    .input-group {
      position: relative;
      margin-bottom: 15px;
      text-align: left;
    }

    label {
      font-size: 14px;
      color: #333;
    }

    input {
      width: 100%;
      padding: 10px;
      padding-right: 40px;
      margin-top: 5px;
      border: none;
      border-bottom: 2px solid #ccc;
      font-size: 14px;
      transition: border-color 0.3s;
    }

    input:focus {
      outline: none;
      border-bottom: 2px solid #0066cc;
    }

    .icon {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      color: #999;
      cursor: pointer;
    }

    .icon:hover {
      color: #0066cc;
    }

    .btn {
      width: 100%;
      padding: 10px;
      background-color: #003366;
      color: white;
      font-size: 16px;
      font-weight: bold;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background 0.3s;
      margin-top: 50px;
    }

    .btn:hover {
      background-color: #0055aa;
    }
  </style>
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
      <img class="logo" src="img/logo.png" alt="Logo">
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