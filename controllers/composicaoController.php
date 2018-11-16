<?php

class composicaoController extends Controller{


    public function index(){
        $c = new Composicao();

        if(isset($_POST['search']) && !empty($_POST['search'])){
            $data = $c->pesquisarComposicoes($_POST['search']);

            $this->loadTemplate("composicao/index", $data);
        }

        $data = $c->listarComposicoes();

        $this->loadTemplate("composicao/index", $data);
    }

    //REGISTRO DE PRODUTOS COMPOSTOS
    public function register(){
        $c = new Composicao();

        if(isset($_POST['nome']) && !empty($_POST['codigo'])){
            $nome = addslashes($_POST['nome']);
            $codigo = addslashes($_POST['codigo']);
            $idUsuario = $_SESSION['lguser'];
            $precoProducao = addslashes($_POST['precoProducao']);
            $markup = addslashes($_POST['markup']);
            $date = date('Y/m/d');

            $c->salvarComposicoes($nome, $codigo, $idUsuario, $precoProducao, $markup, $date);
        }

        $this->loadTemplate("composicao/register");
    }

    //CONSULTA UM PRODUTO COMPOSTO
    public function consult(){
        $c = new Composicao();
        $p = new Produtos();
        $f = new Facilities();

        if(isset($_GET['id']) && !empty($_GET['id'])){
            $data = $c->listarComposicaoId($_GET['id']);
            $vmData = $p->listarProdutos($_GET['id']);
            $data['0']['dataAtivo'] = $f->convertDate($data['0']['dataAtivo']);

            $this->loadTemplate("composicao/consult", $data, $vmData);
        }
    }

    //EDITA UM PRODUTO COMPOSTO
    public function edit(){
        $c = new Composicao();
        $p = new Produtos();
        $f = new Facilities();
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $data = $c->listarComposicaoId($_GET['id']);
            $vmData = $p->listarProdutos($_GET['id']);
            $data['0']['dataAtivo'] = $f->convertDate($data['0']['dataAtivo']);

            $this->loadTemplate("composicao/edit", $data, $vmData);
        }
    }

    //APAGA UM PRODUTO COMPOSTO
    public function delete(){
        $c = new Composicao();

        if(isset($_POST['id']) && !empty($_POST['id'])){
            $id = addslashes($_POST['id']);
            $c->deletarComposicoes($id);
        }
    }

    //APAGA PRODUTO DA COMPOSIÇÃO
    public function deleteProd(){
        $p = new Produtos();

        if(isset($_POST['id']) && !empty($_POST['id'])){
            $id = addslashes($_POST['id']);
            $p->deletarProdutos($id);
        }
    }

    //CARREGAR OS PRODUTOS DO BLING
    public function loadProduct(){
        $apikey = $_SESSION['apiuser'];
        $outputType = "json";
        $url = 'https://bling.com.br/Api/v2/produtos/' . $outputType;
        $b = new Bling(); 
        if(isset($_POST['sku']) && !empty($_POST['sku'])){
            $url = 'https://bling.com.br/Api/v2/produto/'.$_POST['sku'].'/json';
            $data = $b->executeGetProduct($url, $apikey);
            if(is_array($data)){
                $data = json_encode($data);
                echo $data;
            }
        }else{
            $data = $b->executeGetProduct($url, $apikey); 
            if(is_array($data)){
                $data = json_encode($data);
                echo $data;
            }
        }
    }

    //SALVA UM PRODUTO PARA COMPOSIÇÃO
    public function saveProduct(){
        $p = new Produtos();

        if(!empty($_POST['sku'])&& !empty($_POST['nome']) && !empty($_POST['precoCusto']) && !empty($_POST['id'])){
            $sku = addslashes($_POST['sku']);
            $nome = addslashes($_POST['nome']);
            $preco = addslashes($_POST['precoCusto']);
            $idComposto = addslashes($_POST['id']);

            $p->adicionarProdutos($sku, $preco, $nome, $idComposto);
        }
    }

    //ATUALIZA PRODUTO COMPOSTO
    public function updateProduct(){
        $c = new Composicao();

        if(!empty($_POST['precoProducao']) && !empty($_POST['markup']) && !empty($_POST['id'])){
            $precoProducao = addslashes($_POST['precoProducao']);
            $markup = addslashes($_POST['markup']);
            $id = addslashes($_POST['id']);
            $c->atualizarComposicao($precoProducao, $markup, $id);
        }
    }

}

?>