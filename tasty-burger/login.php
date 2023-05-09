<?php
require_once "Classes/usuarios.php";
$u = new Usuario;
?>

<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Tasty Burger</title>
  <link rel="stylesheet" href="Css/login.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

  <div class="hero">

    <div class="login_form">

      <h1>Login</h1>

      <form method="POST" class="input_box">

        <input type="email" name="email" class="field" placeholder="Email">
        <input type="password" name="senha" class="field" maxlength="10" placeholder="Senha">
        <input type="checkbox" class="check_box">
        <p>Lembra senha</p>
        <button type="submit" class="submit_btn">Entrar</button>

        <div class="social_icon">
          <i class="fa-brands fa-facebook-f"></i>
          <i class="fa-brands fa-twitter"></i>
          <i class="fa-brands fa-google"></i>
        </div>

        <div class="tag">
          <span>Ainda não está inscrito?</span>
          <a href="singup.php">Cadastre-se</a>
        </div>

      </form>

    </div>

  </div>

  <?php

  if (isset($_POST['email'])) {
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    //verificar se todos os campos estão preenchidos
    if (!empty($email) && !empty($senha)){
      $u->conectar("tasty_burger", "localhost", "root", "");
      if ($u->msgErro == "") {
        if ($u->logar($email, $senha)) {
          header("location: index.php");
        } else {
          ?>
          <div class="msg-erro">
            Email e/ou senha estão incorretos!
          </div>
          <?php
        }
      } else {
        ?>
        <div class="msg-erro">
      <?php  echo "Erro: " .$u->msgErro; ?>
      </div>
      <?php
      }
    } else {
      ?>
      <div class="msg-erro">
        Preencha todos os campos!
      </div>
      <?php
    }
  }
  ?>

</body>

</html>