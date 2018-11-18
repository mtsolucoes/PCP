<div class="col-sm-12 text-center">
    <h3>Lista de Produtos Compostos</h3>
</div>
<div  class="col-sm-12 p-0">
    <div class="co-sm-12">
        <form method="POST" class="text-center">
            <div class="form-group col-sm-5 d-inline-flex" >
                <input type="text" class="form-control" autocomplete="off" name="search" id="search" placeholder="Código do produto..." />
            </div>
            <button type="submit" class="btn btn-search btn-primary">Pesquisar</button>
            <div class="d-inline-block">
                <a href="<?php echo BASE_URL ?>composicao/register" class="btn btn-search btn-primary"><i class="fas fa-plus"></i> Adicionar</a>
            </div>
        </form>
    </div>
    <div class="col-sm-8 table-product">
        <table class="table table-bordered table-hover" id="table">
            <thead>
                <th width="60%">Nome</th>
                <th width="20%">Código</th>
                <th width="10%">Alterar</th>
                <th width="10%">Excluir</th>
            </thead>
            <tbody>
                <?php
                    if(isset($viewData) && !empty($viewData)){
                        foreach($viewData as $data){
                            echo "<tr class='js-".$data['id']."'>".
                                 "<td><a class='table-link' href='".BASE_URL."composicao/consult?id={$data['id']}'>{$data['nome']}</a></td>".
                                 "<td>".$data['codigo']."</td>".
                                 "<td><a href='".BASE_URL."composicao/edit?id={$data['id']}'>Alterar</a>".
                                 "<td><a href='#' id='{$data['id']}' class='delCompos'>Excluir</a>".
                                 "</tr>";
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