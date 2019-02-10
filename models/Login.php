<?php 

class Login extends Model{

    //FAZER CADASTRO DE NOVO USUÁRIO
    public function cadastrar($nome, $email, $senha, $permissao, $apikey){

        $sql = $this->db->prepare("SELECT * FROM usuarios WHERE email = :email");
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() == 0){

            $sql = $this->db->prepare("INSERT INTO usuarios SET email = :email, senha = :senha, nome = :nome, permissao = :permissao, apikey = :apikey");
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", $senha);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":permissao", $permissao);
            $sql->bindValue(":apikey", $apikey);
            $sql->execute();

            header("Location:".BASE_URL."login");
            return true;
        }else{
            return false;
        }

    }

    //EFETUAR O LOGIN E ATRIBUIR OS VALORES NECESSÁRIOS A ARRAY $_SESSION[]
    public function entrar($login, $senha){
        $sql = $this->db->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
        $sql->bindValue(":email", $login);
        $sql->bindValue(":senha", $senha);
        $sql->execute();
        if($sql->rowCount() == 1){
            $l = $sql->fetch();
            $_SESSION['lguser'] = $l['id'];
            $_SESSION['apiuser'] = $l['apikey'];
            $_SESSION['nmuser'] = $l['nome'];
            $_SESSION['last-access'] = time();
            header("Location:".BASE_URL."home");
            return true;
        }else{ 
            echo "<script>alert('Usuario ou senha incorretos!');</script>";
            return false;
        }
    }

    //VALIDAR SE O LOGIN DO USUARIO AINDA ESTÁ ATIVO(10 min)
    public function verificarLogin(){
        if(!isset($_SESSION['lguser']) || isset($_SESSION['lguser']) && empty($_SESSION['lguser'])){

            header("Location:".BASE_URL."login");

        }else if(time() - $_SESSION['last-access'] > 3600 ){

            unset($_SESSION['lguser']);

        }else{

            $_SESSION['last-access'] = time();
            
        }
        

    }

}

?>