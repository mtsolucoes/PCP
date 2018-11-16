<?php

class produtosController extends Controller{

    public function index(){
        $apikey = $_SESSION['apiuser'];
        $outputType = "json";
        $url = 'https://bling.com.br/Api/v2/produtos/' . $outputType;
        $b = new Bling(); 

        $data = $b->executeGetProduct($url, $apikey);

        if(isset($_GET['pesquisa']) && !empty($_GET['pesquisa'])){
            $target = $_GET['pesquisa'];
            $dataSearch = [ "pesquisa" => $target ];
            $this->loadTemplate("produtos/produtos", $data, $dataSearch);
        }else{ 
            $this->loadTemplate("produtos/produtos", $data);
        }     

    }

    // -- ACTION PARA SALVAR TODOS OS PRODUTOS NO BANCO --
    public function saveProduct($sku, $preco, $nome){
        $p = new Produtos();

        $p->salvarProdutos($sku, $preco, $nome);
    }

}

?>