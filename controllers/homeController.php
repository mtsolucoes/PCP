<?php

class homeController extends Controller{

    public function index(){//Action
        $u = new Usuario();
        $b = new Bling();      
        $apikey = $_SESSION['apiuser'];
        $url = "https://bling.com.br/Api/v2/pedidos/json/";

        $data = $b->executeGetOrderOnOpen($url, $apikey);  

        $datavm = array(
            "demanda" => 0,
            "um" => 1,
            "dois" => 2,
            "tres" => 3,
            "quatro" => 12,
            "cinco" => 20,
            "seis" => 6,
            "sete" => 35
        );

        foreach($data as $d){
            $d = (array) $d->pedido->itens;
            foreach($d as $vm){
                $vm = (array) $vm->item;
                $datavm['demanda'] += $vm['quantidade'];
            }
        }

        $this->loadTemplate("home", $data, $datavm);
    }

}

?>