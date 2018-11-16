<?php

class loginController extends Controller{

    public function index(){

        $this->loadView("login");
    }

    public function entrando($login, $senha){
        $c = new Login();

        $entrou = $c->entrar($login, $senha);
        if($entrou == true){
            $this->loadTemplate("home");
        }

    }

    public function cadastro(){

        $this->loadView("cadastro");
    }

    public function cadastrar($nome, $email, $senha, $permissao, $apikey){
        $c = new Login();
        
        $c->cadastrar($nome, $email, $senha, $permissao, $apikey);
    }

    public function logOut(){
        unset($_SESSION['lguser']);
        header('Location:'.BASE_URL.'login');
        exit;
    }

}

?>