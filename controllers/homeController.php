<?php

class homeController extends Controller{

    public function index(){//Action
        $u = new Usuario();
        $b = new Bling();      
        $apikey = $_SESSION['apiuser'];
        $url = "https://bling.com.br/Api/v2/pedidos/json/";

        $data = $b->executeGetOrderOnOpen($url, $apikey);  

        $datavm = array(
            "pedidos" => 0,
            "um" => 1,
            "dois" => 2,
            "tres" => 3,
            "quatro" => 12,
            "cinco" => 20,
            "seis" => 6,
            "sete" => 35
        );

        if($data){
            foreach($data as $d){
                $d = (array) $d;
                foreach($d as $vm){
                    $datavm['pedidos'] += 1;
                }
            }
        }

        $this->loadTemplate("home", $data, $datavm);
    }

}

?>