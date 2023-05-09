<?php
session_start();
if(!isset($_SESSION["id_usuario"])){
    header("location: login.php");
    exit;
}
require_once 'Classes/usuarios.php';
$u = new Usuario;
?>

<html lang="pt-br">

    <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Meus Pedidos</title>
    <link rel="stylesheet" href="Css/singup.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
        <div class="hero">

            <div class="meus_pedidos">
            <?php  ?>
            <h1>Meus Pedidos</h1>
            <?php 
                include "conexao.php";
                $sql = "SELECT p.id, c.nm_item, pi.qt_item, p.vl_total, p.ds_endereco_entrega, p.st_pedido, p.dt_cadastro from tb_pedido p 
                            join tb_pedido_item pi on p.id = pi.id_pedido
                            join tb_cardapio c on pi.id_cardapio = c.id
                        where p.id_usuario = ".$_SESSION["id_usuario"];
                $dadosCardapio = mysqli_query($conn, $sql);
                
                while($linha = mysqli_fetch_assoc($dadosCardapio)){
                echo '<div>';
                echo '  <div>';
                echo '    <h2> Pedido: '.$linha['id'].'</h2>';
                echo '    <p><strong>Item:</strong> '.$linha['nm_item'].' <strong>Qtde:</strong> '.$linha['qt_item'].' <strong>Valor:</strong> R$ '.$linha['vl_total'].' <strong>Status:</strong> '.$linha['st_pedido'].' <strong>Data Pedido:</strong> '.date('d/m/Y', strtotime($linha['dt_cadastro'])).'</p>';
                echo '  </div>';
                echo '</div>';
                echo '<br />';
                }
                
            ?>
<div class="tag">
          <a href="index.php">Voltar</a>
        </div>

            </div>

        </div>
    </body>

</html>