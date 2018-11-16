<?php

class controleController extends Controller{

    public function index(){
        $c = new Controle();

        if(isset($_POST['data']) && !empty($_POST['data'])){
            $data = addslashes($_POST['data']);
            $turno = addslashes($_POST['turno']);
            $descricao = addslashes($_POST['descricao']);

            $c->salvarControle($data, $turno, $descricao, $_SESSION['lguser']);
        }

        $this->loadTemplate("controle/index");
    }

    public function list(){
        $c = new Controle();

        $data = $c->listarControles($_SESSION['lguser']);

        if(isset($_POST['search']) && !empty($_POST['search'])){
            $codigo = addslashes($_POST['search']);
            $data = $c->pesquisarControle($codigo);
            $this->loadTemplate("controle/list", $data);
        }

        $this->loadTemplate("controle/list", $data);
    }

    public function edit(){
        $c = new Controle();
        $p = new Producao();

        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = addslashes($_GET['id']);
            $data = $c->listarControlesPorId($id);
            $datavm = $p->listarProducao($id);
            $this->loadTemplate("controle/edit", $data, $datavm);
        }
    }

    public function consult(){
        $c = new Controle();
        $p = new Producao();

        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = addslashes($_GET['id']);
            $data = $c->listarControlesPorId($id);
            $datavm = $p->listarProducao($id);
            $this->loadTemplate("controle/consult", $data, $datavm);
        }
    }

    //APAGA CONTROLE COM AJAX
    public function apagarControle(){
        $c = new Controle();

        if(isset($_POST['id']) && !empty($_POST['id'])){
            $c->deleteControle($_POST['id']);
        }


    }

    //CARREGAR PRODUTOS COMPOSTO DO SWAL
    public function loadComposto(){
        $c = new Composicao();

        if(isset($_POST['sku']) && !empty($_POST['sku'])){
            $data = $c->pesquisarComposicoes($_POST['sku']);
            $data = json_encode($data);
            echo $data;
        }else{
            $data = $c->listarComposicoes();
            $data = json_encode($data);
            echo $data;
        }

    }

    //SALVAR PRODUÇÃO DO SWAL
    public function saveProducao(){
        $p = new Producao();

        if(!empty($_POST['nome']) && !empty($_POST['sku']) && !empty($_POST['qtd']) && !empty($_POST['id'])){
            $produto = addslashes($_POST['nome']);
            $codigo = addslashes($_POST['sku']);
            $quantidade = addslashes($_POST['qtd']);
            $idControle = addslashes($_POST['id']);
            $p->salvarProducao($produto, $codigo, $quantidade, $idControle);
        }
    }

    //DELETAR PRODUÇÃO
    public function deleteProd(){
        $p = new Producao();

        if(isset($_POST['id']) && !empty($_POST['id'])){
            $id = addslashes($_POST['id']);

            $p->apagarProducao($id);
        }
    }


}

?>