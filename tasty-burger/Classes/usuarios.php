<?php
Class Usuario
{

    private $pdo;
    public $msgErro = ""; //está tudo ok, não foi prenchida com erro

    public function conectar($nome, $host, $usuario, $senha)
    {

        global $pdo;

        try {
            $pdo = new PDO("mysql:dbname=" . $nome . ";host=" .$host,$usuario,$senha);
        } catch (PDOException $e) {
            $msgErro = $e->getMessage();
        }
    }

    public function cadastrar($nome, $telefone, $email, $senha)
    {

        global $pdo;

        //verificar se já existe o email cadastrado
        $sql = $pdo->prepare("SELECT id FROM tb_usuario WHERE ds_email = :e");
        $sql->bindValue(":e", $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return false; //o usuário já está cadastrado
        } else {
            //caso não esteja cadastrado, cadastrar!
            $sql = $pdo->prepare("INSERT INTO tb_usuario (nm_usuario, nu_telefone, ds_email, ds_senha) VALUES (:n, :t, :e, :s)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":t",$telefone);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":s",md5($senha));
            $sql->execute();
            return true; //tudo ok
        }
    }

    public function logar($email, $senha)
    {

        global $pdo;

        //Verificar se o email e senha esão cadastrados, caso esteja 

        $sql = $pdo->prepare("SELECT id, substring_index(nm_usuario, ' ', 1) as nm_usuario FROM tb_usuario WHERE ds_email= :e AND ds_senha= :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",md5($senha));
        $sql->execute();

        if ($sql->rowCount() > 0) {
            //entrar no sistema (criar uma sessão para o usuário já cadastrado)
            $dado = $sql->fetch(); //transforma em array os dados dos usuários
            session_start();
            $_SESSION['id_usuario'] = $dado['id'];
            $_SESSION['nome'] = $dado['nm_usuario'];
            return true; // pessoa logada com sucesso
        } else {
            return false; //não foi possível logar
        }
    }
}

?>