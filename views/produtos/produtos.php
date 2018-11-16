<div class="col-sm-12 text-center">
    <h3>Lista de Produtos</h3>
</div>
<div  class="col-sm-12 p-0">
    <div class="co-sm-12">
        <form method="GET" class="text-center">
            <div class="form-group col-sm-5 d-inline-flex" >
                <input type="text" class="form-control" name="pesquisa" id="pesquisa" placeholder="Código ou Nome do Item..." />
            </div>
            <button type="submit" class="btn btn-pesquisa btn-primary">Pesquisar</button>
            <a href="<?php echo BASE_URL; ?>produtos" class="btn btn-pesquisa btn-primary"><i class="fas fa-redo"></i> Recarregar</a>
        </form>
    </div>
    <div class="col-sm-8 table-product">
        <table class="table table-responsive table-bordered table-hover" id="table">
            <thead>
                <th width="10%">Código</th>
                <th width="40%">Nome</th>
                <th width="10%">Estoque</th>
                <th width="10%">Situação</th>
                <th width="15%"></th>
            </thead>
            <tbody>
                <?php
                    if(isset($viewData) && !empty($viewData)){
                        foreach($viewData as $viewDataSing){
                            foreach($viewDataSing as $viewDataFim){
                                $viewDataFim = (array) $viewDataFim;
                                if($vmData){
                                    if(!empty($vmData['pesquisa']) && (stristr($viewDataFim['codigo'], $vmData['pesquisa']) || stristr($viewDataFim['descricao'], $vmData['pesquisa']))){
                                        echo "<tr>".
                                            "<td>".$viewDataFim['codigo']."</td>".
                                            "<td>".$viewDataFim['descricao']."</td>".
                                            "<td>".$viewDataFim['estoqueAtual']."</td>".
                                            "<td>".$viewDataFim['situacao']."</td>".
                                            "<td><a class='link-swal' href='#' onclick='modal()' >Ver Mais</a>".
                                            "</tr>";
                                    }
                                }else{
                                    echo "<tr>".
                                    "<td>".$viewDataFim['codigo']."</td>".
                                    "<td>".$viewDataFim['descricao']."</td>".
                                    "<td>".$viewDataFim['estoqueAtual']."</td>".
                                    "<td>".$viewDataFim['situacao']."</td>".
                                    "<td><a class='link-swal' href='#' onclick='modal()' >Ver Mais</a>".
                                    "</tr>";
                                }
                                // -- SALVAR DADOS DO BLING NO BANCO --
                                /*if(isset($viewDataFim['codigo']) && !empty($viewDataFim['codigo'])){
                                    $this->saveProduct(addslashes($viewDataFim['codigo']), addslashes($viewDataFim['preco']), addslashes($viewDataFim['descricao']));
                                }*/
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
        title: 'Produto',
        html:
            'Tipo: <br/>',
            //'<a href="//github.com">links</a> ' +
            //'and other HTML tags',
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