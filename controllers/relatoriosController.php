<?php

class relatoriosController extends Controller{

    public function index(){

        $dataMensal = array(
            "um" => 1,
            "dois" => 2,
            "tres" => 3,
            "quatro" => 12,
            "cinco" => 20,
            "seis" => 6,
            "sete" => 35,
            "oito" => 1,
            "nove" => 2,
            "dez" => 3,
            "onze" => 12,
            "doze" => 20,
            "treze" => 6,
            "quatorze" => 35,
            "quinze" => 1,
            "dezesseis" => 2,
            "dezessete" => 3,
            "dezoito" => 12,
            "dezenove" => 20,
            "vinte" => 6,
            "vinte-um" => 35,
            "vinte-dois" => 1,
            "vinte-tres" => 2,
            "vinte-quatro" => 3,
            "vinte-cinco" => 12,
            "vinte-seis" => 20,
            "vinte-sete" => 60,
            "vinte-oito" => 35,
            "vinte-nove" => 20,
            "trinta" => 6,
            "trinta-um" => 35,
        );

        $this->loadTemplate("relatorios/index", $dataMensal);
    }

    public function listarComposto(){
        $c = new Composicao();

        $data = $c->listarComposicoes();

        $this->loadTemaplate("relatorios/compostos", $data);
    }

}

?>