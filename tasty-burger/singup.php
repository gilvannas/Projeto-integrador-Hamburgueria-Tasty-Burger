<?php
require_once 'Classes/usuarios.php';
$u = new Usuario;
?>

<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inscreva-se</title>
  <link rel="stylesheet" href="Css/singup.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <div class="hero">

    <div class="login_form">

      <h1>Cadastro</h1>

      <form method="POST" class="input_box">

        <input type="text" name="nome" class="field" placeholder="Nome" maxlength="30">
        <input type="text"  name="telefone" class="field" placeholder="Telefone" maxlength="30">
        <input type="email" name="email" class="field" placeholder="Email" maxlength="40">
        <input type="password" name="senha" class="field" placeholder="Senha" maxlength="32">
        <input type="password" name="confSenha" class="field" placeholder="Senha" maxlength="32">
        <input type="checkbox" class="check_box">
        <p>Lembrar senha</p>
        <button type="submit" class="submit_btn">Cadastrar</button>

        <div class="social_icon">
          <i class="fa-brands fa-facebook-f"></i>
          <i class="fa-brands fa-twitter"></i>
          <i class="fa-brands fa-google"></i>
        </div>

        <div class="tag">
          <span>Já se cadastrou?</span>
          <a href="login.php">Entre aqui!</a>
        </div>

      </form>

    </div>

  </div>
  <?php

  //verifcar se clicou no botão de cadastrar
  if (isset($_POST['nome'])) {
    $nome = addslashes($_POST['nome']);
    $telefone = addslashes($_POST['telefone']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $confirmarSenha = addslashes($_POST['confSenha']);

    //verificar se todos os campos estão preenchidos
    if (!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha)) {
      $u->conectar("tasty_burger", "localhost", "root", "");

      if ($u->msgErro == "") //está tudo ok
      {
        if ($senha == $confirmarSenha) {
          if ($u->cadastrar($nome, $telefone, $email, $senha)) {
            ?>
            <div id="msg-sucesso">
            Cadastrado com sucesso! Acesse para entrar!
            </div>
            <?php
          } else {
            ?>
            <div class="msg-erro">
              Email já cadastrado!
            </div>

            <?php
          }
        } else {
          ?>
          <div class="msg-erro">
            Senha e confirmar senha não correspondem!
          </div>
          <?php
        }
      } else {
        ?>
        <div class="msg-erro">
          <?php echo "Erro: " .$u->msgErro; ?>
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