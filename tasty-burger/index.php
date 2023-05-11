<?php
//verifica se o usuário está autenticado
    session_start();
    if(!isset($_SESSION["id_usuario"])){
        header("location: login.php");
        exit;
    }
    require_once "Classes/usuarios.php";
    $u = new Usuario;
    require_once "Classes/pedidos.php";
    $p = new Pedido;

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
  <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hamburgueria Tasty Burger</title>
    <link rel="stylesheet" href="View/css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    <section id="Home">
      <nav>
        <div class="logo">
          <img src="View/imagem/logo_tasty.png" />
        </div>

        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="#sobre">Sobre Nós</a></li>
          <li><a href="#cardapio">Cardápio</a></li>
          <li><a href="#galeria">Galeria</a></li>
          <li><a href="#avaliacoes">Avaliações</a></li>
          <!-- <li><a href="#pedido">Pedido</a></li> -->
          <li><a href="meus_pedidos.php">Meus Pedidos</a></li>
        </ul>

        <div class="login">
          Olá <?php echo $_SESSION["nome"]?>, seja bem vindo(a)!
          <a class="btn btn-primary btn-lg" href="sair.php" role="button">Sair</a>
        </div>
      </nav>

      <div class="main">
        <div class="main_text">
          <h1>
            Hamburgueria Tasty Burger <br />
            <span> Hambúrgueres </span><br />na sua porta!
          </h1>
        </div>

        <div class="main_image">
          <img src="View/imagem/img_main.png" />
        </div>
      </div>

      <p>
        &nbsp; &nbsp; &nbsp;Bem-vindo à nossa hamburgueria Tasty Burger!
        <br /><br />
        &nbsp; &nbsp; &nbsp;Nós somos apaixonados por hambúrgueres e acreditamos
        que um bom hambúrguer pode mudar o seu dia. É por isso que usamos apenas
        ingredientes frescos e selecionados para criar hambúrgueres suculentos e
        saborosos que vão deixar você com água na boca. Nossa equipe de chefs
        talentosos e experientes trabalha duro todos os dias para criar os
        melhores hambúrgueres para você. <br />
        &nbsp; &nbsp; &nbsp;Cada hambúrguer é preparado com cuidado e carinho,
        garantindo que cada mordida seja uma experiência incrível.<br />
        &nbsp; &nbsp; &nbsp;Além disso, oferecemos uma variedade de
        acompanhamentos deliciosos, como batatas fritas crocantes e onion rings
        saborosas, para tornar a sua refeição ainda mais satisfatória. E o
        melhor de tudo, entregamos direto na sua casa! Basta fazer o seu pedido
        online e nós cuidamos do resto.<br />
        &nbsp; &nbsp; &nbsp; Nós nos orgulhamos de fornecer um serviço de
        entrega rápido e confiável, para que você possa desfrutar dos nossos
        hambúrgueres frescos e quentes no conforto da sua casa. Então, se você
        está procurando por um hambúrguer delicioso e conveniente, você veio ao
        lugar certo.<br />
        &nbsp; &nbsp; &nbsp;Faça o seu pedido agora e experimente o melhor da
        nossa hamburgueria delivery!
      </p>

      <div class="main_btn">
        <a href="#">FAÇA SEU PEDIDO</a>
      </div>
    </section>

    <!--Sobre nós-->

    <div class="about" id="About">
      <div id="sobre">
        <div class="about_main">
          <div class="image">
            <img src="View/imagem/buger.jpg" />
          </div>

          <div class="about_text">
            <h1><span>Sobre</span>nós</h1>

            <p>
              &nbsp; &nbsp; &nbsp;Feitos com matérias primas de primeira
              qualidade, os sanduíches Tasty Burger tiram os hambúrgueres
              artesanais do lugar de gastronomia de luxo e os colocam à
              disposição de todos os consumidores que buscam um excelente
              custo-benefício.<br />
              &nbsp; &nbsp; &nbsp; Ou seja, buscamos quebrar a noção coletiva
              equivocada de que a altíssima qualidade é sinônimo de preços
              altos. Através de processos de produção inovativos, ingredientes
              de primeira e carne 100% angus, chegamos a um cardápio de
              hambúrgueres artesanais que criam uma solução de consumo alimentar
              que atende até mesmo às camadas menos favorecidas da sociedade.<br />
              &nbsp; &nbsp; &nbsp; Atualmente temos uma loja física em São
              Paulo, um Instagram próprio onde partilhamos as fotos dos nossos
              produtos e um Website de vendas onde é possível adquirir os
              hambúrgueres de forma prática, rápida e intuitiva.<br />
              &nbsp; &nbsp; &nbsp; Somos um negócio que traz soluções em
              hambúrguer artesanal com propósito social. Queremos não só
              contribuir com a expansão do consumo de hambúrgueres de qualidade
              para públicos de todos os bolsos, como também queremos gerar
              impacto na comunidade de trabalhadores que compõem nosso
              ecossistema e região.
            </p>
          </div>
        </div>

        <a href="#" class="about_btn">FAÇA SEU PEDIDO</a>
      </div>
    </div>
    <!--Cardápio-->

    <div class="menu" id="Menu">
      <h1 id="cardapio">Nosso <span>Cardápio</span></h1>

      <div class="menu_box">
        <?php 
        include "conexao.php";
        $sql = "SELECT id, nm_item, ds_item, vl_item, ds_imagem FROM tb_cardapio";
        $dadosCardapio = mysqli_query($conn, $sql);
        
        while($linha = mysqli_fetch_assoc($dadosCardapio)){
          echo '<div class="menu_card">';
          echo '  <div class="menu_image">';
          echo '    <img src="'.$linha['ds_imagem'].'" />';
          echo '  </div>';
          echo '  <div class="menu_info">';
          echo '    <h2>'.$linha['nm_item'].'</h2>';
          echo '    <p>'.$linha['ds_item'].'</p>';
          echo '    <h3>R$'.$linha['vl_item'].'</h3>';
          echo '    <div class="menu_icon">';
          echo '      <i class="fa-solid fa-star"></i>';
          echo '      <i class="fa-solid fa-star"></i>';
          echo '      <i class="fa-solid fa-star"></i>';
          echo '      <i class="fa-solid fa-star"></i>';
          echo '      <i class="fa-solid fa-star-half-stroke"></i>';
          echo '    </div>';
          echo '<form id="cardapio_'.$linha['id'].'"  method="POST" class="input_box">';

          echo '<input type="hidden" name="id_cardapio" class="field" value="'.$linha['id'].'">';
          echo '<input type="hidden" name="vl_item" class="field" value="'.$linha['vl_item'].'">';
          echo '<button type="submit" class="menu_btn">Pedir Agora</button>';
  
          echo '</form>';
          echo '  </div>';
          echo '</div>';
        }
        ?>
      </div>
    </div>

    <!--Galeria de produtos-->

    <div class="gallary" id="Gallary">
      <h1 id="galeria">Nossa linha de <span>Produtos</span></h1>

      <div class="gallary_image_box">
        <div class="gallary_image">
          <img src="View/imagem/21.jpg" />

          <h3>Os clássicos</h3>
          <p>
            O clássico: pão de hambúrguer, carne 100% bovina, queijo cheddar
            derretido, alface, tomate, cebola roxa e molho especial.
          </p>
          <a href="#" class="gallary_btn">PEÇA AGORA</a>
        </div>

        <div class="gallary_image">
          <img src="View/imagem/27.jpg" />

          <h3>Os veganos</h3>
          <p>
            Hambúrguer de falafel, queijo feta, hummus, alface, tomate e molho
            tzatziki em um pão de hambúrguer de trigo integral.
          </p>
          <a href="#" class="gallary_btn">PEÇA AGORA</a>
        </div>

        <div class="gallary_image">
          <img src="View/imagem/buger.jpg" />

          <h3>Os lanches de frango</h3>
          <p>
            Hambúrguer de frango empanado, queijo pepper jack, pimentão
            jalapeño, alface, tomate e molho de chipotle em um pão de brioche.
          </p>
          <a href="#" class="gallary_btn">PEÇA AGORA</a>
        </div>

        <div class="gallary_image">
          <img src="View/imagem/fries.png" />

          <h3>Acompanhamentos</h3>
          <p>Os mais diversos tipos de acompanhamentos para sua refeição.</p>
          <a href="#" class="gallary_btn">PEÇA AGORA</a>
        </div>

        <div class="gallary_image">
          <img src="View/imagem/37.png" />

          <h3>Os milkshakes mais pedidos</h3>
          <p>
            Experimente nossos milkshakes gourmet, com combinações de sabores
            únicas e irresistíveis que vão conquistar seu paladar
          </p>
          <a href="#" class="gallary_btn">PEÇA AGORA</a>
        </div>

        <div class="gallary_image">
          <img src="View/imagem/36.png" />

          <h3>Sobremesas</h3>
          <p>
            Nossa seleção de sobremesas é o toque final perfeito para uma
            refeição deliciosa
          </p>
          <a href="#" class="gallary_btn">PEÇA AGORA</a>
        </div>
      </div>
    </div>

    <!--Avaliações-->

    <div class="review" id="Review">
      <h1 id="avaliacoes">Avaliações de nossos <span>Clientes</span></h1>

      <div class="review_box">
        <div class="review_card">
          <div class="review_profile">
            <img src="View/imagem/foto1.png" />
          </div>

          <div class="review_text">
            <h2 class="name">Rafael Almeida</h2>

            <div class="review_icon">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star-half-stroke"></i>
            </div>

            <div class="review_social">
              <i class="fa-brands fa-facebook-f"></i>
              <i class="fa-brands fa-instagram"></i>
            </div>

            <p>
              "Fiquei muito satisfeito com o meu pedido na hamburgueria Tasty
              Burger. A entrega foi rápida e o hambúrguer estava delicioso.
              Recomendo!"
            </p>
          </div>
        </div>

        <div class="review_card">
          <div class="review_profile">
            <img src="View/imagem/foto2.png" />
          </div>

          <div class="review_text">
            <h2 class="name">Paulo André</h2>

            <div class="review_icon">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star-half-stroke"></i>
            </div>

            <div class="review_social">
              <i class="fa-brands fa-facebook-f"></i>
              <i class="fa-brands fa-instagram"></i>
            </div>

            <p>
              "Fiquei muito feliz com o meu pedido na hamburgueria Tasty Burger.
              A entrega foi rápida e o hambúrguer estava delicioso. Recomendo!"
            </p>
          </div>
        </div>

        <div class="review_card">
          <div class="review_profile">
            <img src="View/imagem/foto3.png" />
          </div>

          <div class="review_text">
            <h2 class="name">Camila Rezende</h2>

            <div class="review_icon">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star-half-stroke"></i>
            </div>

            <div class="review_social">
              <i class="fa-brands fa-facebook-f"></i>
              <i class="fa-brands fa-instagram"></i>
            </div>

            <p>
              "Fiquei muito contente com o meu pedido na hamburgueria Tasty
              Burger. A entrega foi rápida e o hambúrguer estava delicioso.
              Recomendo!"
            </p>
          </div>
        </div>

        <div class="review_card">
          <div class="review_profile">
            <img src="View/imagem/foto4.png" />
          </div>

          <div class="review_text">
            <h2 class="name">Ricardo Freitas</h2>

            <div class="review_icon">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star-half-stroke"></i>
            </div>

            <div class="review_social">
              <i class="fa-brands fa-facebook-f"></i>
              <i class="fa-brands fa-instagram"></i>
            </div>

            <p>
              "Adorei o hambúrguer que pedi nesta hamburgueria Tasty Burger! A
              carne estava suculenta e o pão bem macio. O molho de maionese cda
              casa deu um toque especial. Além disso, a entrega foi rápida e o
              hambúrguer chegou quentinho. Com certeza vou pedir novamente!"
            </p>
          </div>
        </div>
      </div>
    </div>

    <!--Pedido-->

    <div class="order" id="Order">
      <h1 id="pedido">Faça seu <span>Pedido</span></h1>

      <div class="order_main">
        <div class="order_image">
          <img src="View/imagem/pedido.jpg" />
        </div>

        <form action="#">
          <div class="input">
            <p>Nome</p>
            <input type="text" placeholder="Seu nome" name="nome_usuario" value="<?php echo $_SESSION["nome"] ?>"/>
          </div>

          <div class="input">
            <p>Email</p>
            <input type="email" placeholder="Seu email" />
          </div>

          <div class="input">
            <p>Telefone</p>
            <input placeholder="Seu telefone" />
          </div>

          <div class="input">
            <p>Quantidade</p>
            <input type="number" placeholder="Quantidade de pedidos" />
          </div>

          <div class="input">
            <p>Seu Pedido</p>
            <input placeholder="Nome da comida" />
          </div>

          <div class="input">
            <p>Endereço</p>
            <input placeholder="Seu endereço" />
          </div>

          <a href="#" class="order_btn">PEÇA AGORA</a>
        </form>
      </div>
    </div>

    <!--Equipe da hamburgueria-->

    <div class="team">
      <h1>Nossa <span>Equipe</span></h1>

      <div class="team_box">
        <div class="profile">
          <img src="View/imagem/foto5.png" />

          <div class="info">
            <h2 class="name">Carlos Daniel</h2>
            <p class="bio">
              Responsável por preparar os hambúrgueres e demais alimentos. Segue
              as receitas e padrões da hamburgueria.
            </p>

            <div class="team_icon">
              <i class="fa-brands fa-facebook-f"></i>
              <i class="fa-brands fa-twitter"></i>
              <i class="fa-brands fa-instagram"></i>
            </div>
          </div>
        </div>

        <div class="profile">
          <img src="View/imagem/foto6.png" />

          <div class="info">
            <h2 class="name">Ana Maria</h2>
            <p class="bio">
              Auxilia o cozinheiro de hamburgueria em diversas tarefas, como
              preparo e montagem de pratos, limpeza da cozinha e etc.
            </p>

            <div class="team_icon">
              <i class="fa-brands fa-facebook-f"></i>
              <i class="fa-brands fa-twitter"></i>
              <i class="fa-brands fa-instagram"></i>
            </div>
          </div>
        </div>

        <div class="profile">
          <img src="View/imagem/foto7.png" />

          <div class="info">
            <h2 class="name">Patrícia Vieira</h2>
            <p class="bio">
              Responsável por gerenciar as operações da hamburgueria, incluindo
              a gestão de pessoal, finanças e atendimento ao cliente.
            </p>

            <div class="team_icon">
              <i class="fa-brands fa-facebook-f"></i>
              <i class="fa-brands fa-twitter"></i>
              <i class="fa-brands fa-instagram"></i>
            </div>
          </div>
        </div>

        <div class="profile">
          <img src="View/imagem/foto8.png" />

          <div class="info">
            <h2 class="name">Thiago Barbosa</h2>
            <p class="bio">
              Responsável por fazer as entregas dos pedidos feitos pelo telefone
              ou aplicativo de delivery.
            </p>

            <div class="team_icon">
              <i class="fa-brands fa-facebook-f"></i>
              <i class="fa-brands fa-twitter"></i>
              <i class="fa-brands fa-instagram"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Rodapé-->

    <footer>
      <div class="footer_main">
        <div class="footer_tag">
          <h2>Localização</h2>
          <p>Rua Coimbra, 00, Vila das Flores</p>
          <p>São Paulo</p>
        </div>

        <div class="footer_tag">
          <h2>Acesso rápido</h2>
          <p><a href="index.php">Home</a></p>
          <p><a href="#sobre">Sobre</a></p>
          <p><a href="#cardapio">Cardápio</a></p>
          <p><a href="#galeria">Galeria</a></p>
          <p><a href="#avaliacoes">Avaliações</a></p>
          <p><a href="meus_pedidos.php">Meus Pedidos</a></p>
        </div>

        <div class="footer_tag">
          <h2>Contato</h2>
          <p>11 90000-0000</p>
          <p>tastyburger@burger.com.br</p>
        </div>

        <div class="footer_tag">
          <h2>Funcionamento</h2>
          <p>Segunda-feira: Fechado</p>
          <p>Terça-feira a Quinta-feira: 11h às 22h</p>
          <p>Sexta-feira e Sábado: 11h às 23h</p>
          <p>Domingo: 12h às 21h</p>
        </div>

        <div class="footer_tag">
          <h2>Nos siga</h2>
          <i class="fa-brands fa-facebook-f"></i>
          <i class="fa-brands fa-instagram"></i>
        </div>
      </div>

      <p class="end">
        Desenvolvido pelo Grupo 08 da disciplina:
        <span
          > Análise de soluções integradas para organizações. 2023</span
        >
      </p>
    </footer>
    <?php

    if (isset($_POST['id_cardapio'])) {
      $u->conectar("tasty_burger", "localhost", "root", "");
      $idUsuario = addslashes($_SESSION["id_usuario"]);
      $vlPedido = addslashes($_POST['vl_item']);
      $idCardapio = addslashes($_POST['id_cardapio']);
      $p->cadastrarPedido($idUsuario, $vlPedido, $idCardapio);
      header("location: meus_pedidos.php");
    }
    ?>
  </body>
</html>
