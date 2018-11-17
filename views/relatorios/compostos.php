<div class="col-sm-12 text-center">
    <h3>Lista de Produtos Compostos</h3>
</div>
<div  class="col-sm-12 p-0">
    <div class="col-sm-8 table-product">
        <table class="table table-bordered table-hover" id="table">
            <thead>
                <th width="60%">Nome</th>
                <th width="20%">Código</th>
            </thead>
            <tbody>
                <?php
                    if(isset($viewData) && !empty($viewData)){
                        foreach($viewData as $data){
                            echo "<tr class='js-{$data['id']}'>".
                                 "<td>{$data['nome']}</td>".
                                 "<td>{$data['codigo']}</td>".
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