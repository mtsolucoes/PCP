<?php

class pedidosController extends Controller{
    public function __construct(){
        $f = new Facilities();
    }
    public function index(){
        $b = new Bling();
        $apikey = $_SESSION['apiuser'];
        $url = 'https://bling.com.br/Api/v2/pedidos/json';

        $data = $b->executeGetOrder($url, $apikey);

        if(isset($_GET['searchClient']) && !empty($_GET['searchClient'])){
            $target = $_GET['searchClient'];
            $dataSearch = [ "cliente" => $target ];
            $this->loadTemplate("pedidos/index", $data, $dataSearch);
        }elseif(isset($_GET['searchProduct']) && !empty($_GET['searchProduct'])){
            $target = $_GET['searchProduct'];
            $dataSearch = [ "produto" => $target ];
            $this->loadTemplate("pedidos/index", $data, $dataSearch);
        }else{
            $this->loadTemplate("pedidos/index", $data);
        }

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

    //CRIAÇÃO DE PRODUÇÃO AUTOMATICA
    public function createProduction(){
        $c = new Controle();
        $p = new Producao();

        if(!empty($_POST['data']) && !empty($_POST['turno']) && !empty($_POST['descricao'])){
            $data = addslashes($_POST['data']);
            $turno = addslashes($_POST['turno']);
            $descricao = addslashes($_POST['descricao']);
            $idUsuario = $_SESSION['lguser'];
    
            $c->salvarControle($data, $turno, $descricao, $idUsuario);  
        }
    }

    //PEGAR CONTROLE PARA SALVAR PRODUÇÃO AUTOMATICA
    public function getControle(){
        $c = new Controle();

        $idControle = $c->lastInsert($_SESSION['lguser']);
        $idControle = json_encode($idControle);

        echo $idControle;
    }

    public function saveProduction(){
        $p = new Producao();

        if(!empty($_POST['codigo']) && !empty($_POST['quantidade']) && !empty($_POST['produto']) && !empty($_POST['controle'])){
            $codigo = addslashes($_POST['codigo']);
            $quantidade = addslashes($_POST['quantidade']);
            $produto = addslashes($_POST['produto']);
            $idControle = addslashes($_POST['controle']);

            $p->salvarProducao($produto, $codigo, $quantidade, $idControle);
        }
    }

    //FUNCTION PARA LIMPAR STRING DE CARACTERES ESPECIAIS
    // public function limparString($string){
    //     $from = "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ";
    //     $to = "aaaaeeiooouucAAAAEEIOOOUUC";
    //     $keys = array();
    //     $values = array();
    //     preg_match_all('/./u', $from, $keys);
    //     preg_match_all('/./u', $to, $values);
    //     $mapping = array_combine($keys[0], $values[0]);
    //     $result = strtr($string, $mapping);
    //     strtolower($result);
    //     return $result;
    // }

}

?>