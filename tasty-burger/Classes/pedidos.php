<?php
Class Pedido
{

    private $pdo;
    public $msgErro = ""; //está tudo ok, não foi prenchida com erro


    public function cadastrarPedido($idUsuario, $vlPedido, $idCardapio)
    {
        global $pdo;
        $sql = $pdo->prepare("INSERT INTO tb_pedido (id_usuario, vl_total, st_pedido) VALUES (:u, :v, :s)");
        $sql->bindValue(":u",$idUsuario);
        $sql->bindValue(":v",$vlPedido);
        $sql->bindValue(":s",'Pendente');
        $sql->execute();
        $idPedido = $pdo->lastInsertId();
        if(isset($idPedido)){
            $sql = $pdo->prepare("INSERT INTO tb_pedido_item (id_pedido, id_cardapio, qt_item, vl_unitario) VALUES (:p, :c, :q, :v)");
            $sql->bindValue(":p",$idPedido);
            $sql->bindValue(":c",$idCardapio);
            $sql->bindValue(":q",1);
            $sql->bindValue(":v",$vlPedido);
            $sql->execute();
        }
        return true; //tudo ok
    }
}

?>