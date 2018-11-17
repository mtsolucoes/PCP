<div class="col-sm-12 text-center">
    <h3>Lista de Pedidos</h3>
</div>
<div  class="col-sm-12 p-0">
    <div class="co-sm-12">
        <form method="GET" class="text-center">
            <div class="form-group col-sm-3 d-inline-flex" >
                <input type="text" class="form-control" name="searchClient" id="searchClient" placeholder="Nome do Cliente..." />
            </div>
            <div class="form-group col-sm-3 d-inline-flex" >
                <input type="text" class="form-control" name="searchProduct" id="searchProduct" placeholder="Nome do Produto..." disabled/>
            </div>
            <button type="submit" class="btn btn-search btn-primary">Pesquisar</button>
            <a href="<?php echo BASE_URL; ?>pedidos/index" class="btn btn-search btn-primary"><i class="fas fa-redo"></i> Recarregar</a>
        </form>
    </div>
    <div class="col-sm-10 table-product">
        <table class="table table-responsive table-bordered table-hover" id="table">
            <thead>
                <th width="20%">Número do Pedido</th>
                <th width="39%">Cliente</th>
                <th width="10%">Data Pedido</th>
                <th width="10%">Data Prevista</th>
                <th width="10%">Data Saída</th>
                <th width="1%">Situação</th>
                <th width="10%">Ações</th>
            </thead>
            <tbody>
                <?php
                    if(isset($viewData) && !empty($viewData)){
                        foreach($viewData as $viewDataSing){
                            foreach($viewDataSing as $viewDataFim){
                                $viewDataFim = (array) $viewDataFim;
                                //VERIFICA SE TEM PESQUISA
                                if($vmData){
                                    //FAZ O FILTRO NA ARRAY
                                    if(stristr($viewDataFim['cliente']->nome, $vmData['cliente'])){
                                        echo "<tr>";
                                            if(isset($viewDataFim['numeroPedidoLoja'])){
                                                echo "<td>{$viewDataFim['numeroPedidoLoja']}</td>";
                                            }else{
                                                echo "<td>Sem Número</td>";
                                            }
                                        echo "<td>{$viewDataFim['cliente']->nome}</td>".
                                            "<td>".date('d/m/Y', strtotime($viewDataFim['data']))."</td>";
                                            if(isset($viewDataFim['dataPrevista'])){
                                                echo "<td>".date('d/m/Y', strtotime($viewDataFim['dataPrevista']))."</td>";
                                            }else{
                                                echo "<td>Sem data</td>";
                                            }
                                        echo "<td><i class='fas fa-circle ".preg_replace('/[ -]+/', '-', strtolower($viewDataFim['situacao']))."'></i></td>".
                                            "<td><a class='link-swal moreOrder' href='#' data-number='{$viewDataFim['numero']}' >Ver Mais</a>".
                                            "</tr>";
                                    }
                                //CASO NAO HAJA FILTRO
                                }else{
                                    echo "<tr>";
                                    if(isset($viewDataFim['numeroPedidoLoja'])){
                                        echo "<td>{$viewDataFim['numeroPedidoLoja']}</td>";
                                    }else{
                                        echo "<td>Sem Número</td>";
                                    }
                                    echo "<td>{$viewDataFim['cliente']->nome}</td>".
                                        "<td>".date('d/m/Y', strtotime($viewDataFim['data']))."</td>";
                                        if(isset($viewDataFim['dataPrevista'])){
                                            echo "<td>".date('d/m/Y', strtotime($viewDataFim['dataPrevista']))."</td>";
                                        }else{
                                            echo "<td>Sem data</td>";
                                        }
                                    echo "<td>Sem data</td>".
                                        "<td><i class='fas fa-circle ".preg_replace('/[ -]+/', '-', strtolower($viewDataFim['situacao']))."' title='{$viewDataFim['situacao']}'></i></td>".
                                        "<td><a class='link-swal moreOrder' href='#' data-number='{$viewDataFim['numero']}'>Ver Mais</a>".
                                        "</tr>";
                                }
                            }
                        }
                    }else{
                        echo "<tr>".
                             "<td colspan='6' class='text-center'>Nenhum produto foi encontrado</td>".
                             "</tr>";
                    }    
                ?>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">

function modal(){

    swal({
        title: 'Pedido',
        html:
            'Tipo: <br/>',
        showCloseButton: true,
        showCancelButton: true,
        showConfirmButton: false,
        focusConfirm: false,
        cancelButtonText:
            'Fechar',
        cancelButtonAriaLabel: 'Thumbs down',
    })

}

</script>