<div class="col-sm-12 text-center">
    <h3>Lista de Pedidos</h3>
</div>
<div  class="col-sm-12 p-0">
    <div class="col-sm-10 table-product">
        <table class="table table-responsive table-bordered table-hover" id="table">
            <thead>
                <th width="20%">Número do Pedido</th>
                <th width="39%">Cliente</th>
                <th width="10%">Data Pedido</th>
                <th width="10%">Data Prevista</th>
                <th width="1%">Situação</th>
                <th width="10%">Ações</th>
            </thead>
            <tbody>
                <?php
                    if(isset($viewData) && !empty($viewData)){
                        foreach($viewData as $viewDataSing){
                            foreach($viewDataSing as $viewDataFim){
                                $viewDataFim = (array) $viewDataFim;

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
                                echo "<td><i class='fas fa-circle ".preg_replace('/[ -]+/', '-', strtolower($viewDataFim['situacao']))."' title='{$viewDataFim['situacao']}'></i></td>".
                                    "<td><a class='link-swal moreOrderReport' href='#' data-number='{$viewDataFim['numero']}'>Ver Mais</a>".
                                    "</tr>";
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