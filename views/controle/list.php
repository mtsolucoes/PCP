<div class="col-sm-12 text-center">
    <h3>Lista de Controles</h3>
</div>
<div  class="col-sm-12 p-0">
    <div class="co-sm-12">
        <form method="POST" class="text-center">
            <div class="form-group col-sm-5 d-inline-flex" >
                <input type="date" class="form-control" name="search" id="search" placeholder="Data do controle..." />
            </div>
            <button type="submit" class="btn btn-search btn-primary">Pesquisar</button>
        </form>
    </div>
    <div class="col-sm-8 table-product">
        <table class="table table-responsive table-bordered table-hover" id="table">
            <thead>
                <th width="30%">Data</th>
                <th width="40%">Descrição</th>
                <th width="30%">Turno</th>
                <th width="20%">Editar</th>
                <th width="20%">Apagar</th>
            </thead>
            <tbody>
                <?php
                    if(isset($viewData) && !empty($viewData)){
                        foreach($viewData as $viewDt){
                        echo "<tr class='js-{$viewDt['id']}'>".
                             "<td>{$viewDt["data"]}</td>".
                             "<td><a class='table-link' href='".BASE_URL."controle/consult?id={$viewDt['id']}'>{$viewDt["descricao"]}</a></td>".
                             "<td>{$viewDt["turno"]}</td>".
                             "<td><a href='".BASE_URL."controle/edit?id={$viewDt['id']}'>Alterar</a></td>".
                             "<td><a href='#' id='{$viewDt['id']}' class='delControl'>Excluir</a></td>".
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
