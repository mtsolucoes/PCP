<?php

class Core{

    public function run(){

        $url = '/';
        if(isset($_GET['url'])){
            $url .= $_GET['url'];
        }
        $params = array();
        if(!empty($url) && $url != '/'){
            $url = explode('/', $url);//transforma a variavel $url em uma array;
            array_shift($url);//elimina os campos vazios da array

            $currentController = $url[0]."Controller";
            array_shift($url);//elemina o controller da array $url

            //validar se há valor na action, caso não haja seta a action padrão
            if(isset($url[0]) && !empty($url[0])){
                $currentAction = $url[0];
                array_shift($url);
            }else{
                $currentAction = 'index';
            }

            if(count($url) > 0){
                $params = $url;
            }

        }else{
            $currentController = "homeController";
            $currentAction = "index";
        }

        $c = new $currentController();//mandar o controller para o auto loader para ele instanciar o controller
        call_user_func_array(array($c, $currentAction), $params);//metodo para chamar a Action e os params(caso haja) para o controler executar controller
    }

}

?>