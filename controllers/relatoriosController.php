<?php

use Dompdf\Dompdf;

class relatoriosController extends Controller{

    //TABELA LINEAR DE DEMANDA MENSAL
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

    //PÁGINA DE LISTAGEM DOS PORODUTOS COMPOSTOS
    public function compostos(){
        $c = new Composicao();

        $data = $c->listarComposicoes();

        $this->loadTemplate("relatorios/compostos", $data);
    }

    //PÁGINA DE LISTAGEM DO PEDIDOS
    public function pedidos(){
        $b = new Bling();
        $apikey = $_SESSION['apiuser'];
        $url = 'https://bling.com.br/Api/v2/pedidos/json';

        $data = $b->executeGetOrder($url, $apikey);

        $this->loadTemplate("relatorios/pedidos", $data);
    }

    public function loadProductNumber(){
        $b = new Bling();

        $numero = $_GET['number'];
        $url = "https://bling.com.br/Api/v2/pedido/{$numero}/json/";
        $apikey = $_SESSION['apiuser'];

        $data = $b->executeGetOrderNumber($url, $apikey);

        $data = json_encode($data);
        echo $data;
    }

    public function generateCsvOrder(){
        $b = new Bling();
        $dompdf = new Dompdf();

        $apikey = $_SESSION['apiuser'];

        if(!empty($_GET['number'])){
            $numero = addslashes($_GET['number']);

            $url = "https://bling.com.br/Api/v2/pedido/{$numero}/json/";

            $data = $b->executeGetOrderNumber($url, $apikey);
            //$data = json_encode($data);

            $datadois = array (
                'email@outlook.com',
                'email2@outlook.com;email3@gmail.com',
                'email4@outlook.com'
            );
            $this->csv($datadois, 'Pedido');

        }


    }


    public function csv($data, $name){
        try{
            $output = sprintf("{$name}_%s.csv", date('d/m/Y'));

            $fp = fopen('php://output', 'w');
            header("Content-type: application/octet-stream");  
            header("Content-disposition: attachment; filename='{$output}'");

            foreach($data as $line){
                $value = explode(';', $line);
                fputcsv($fp, $value);
            }
            fclose($fp);

        }catch(Excepton $e){
            throw new Exception($e);
        }
    }
}

?>