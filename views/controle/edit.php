<div class="container">
    <div class="col-sm-12 p-0 text-center">
        <a class="float-left btn btn-primary btn-search d-inline-block" href="<?php echo BASE_URL; ?>controle/list"><i class="fas fa-arrow-left"></i> Voltar</a>
        <h2>Controle de Produção</h2>
    </div>
</div>
<div class="container">
    <div class="form-row">
        <input id="idControle" value="<?php echo $viewData['id'] ?>" hidden/>
        <div class="form-group col-sm-3">
            <label class="control-label" for="data" >Data</label>
            <input type="text" class="form-control" disabled id="data" name="data" value="<?php echo date("d/m/Y", strtotime($viewData['data'])) ?>" >
        </div>
        <div class="form-group col-sm-3">
            <label class="control-label" for="turno" >Turno</label>
            <input type="text" class="form-control" disabled id="turno" name="turno" value="<?php echo $viewData['turno'] ?>" >
        </div>
        <div class="form-group col-sm-6">
            <label class="control-label" for="descricao" >Descrição</label>
            <textarea type="textarea" class="form-control" disabled id="descricao" name="descricao" rows="7" ><?php echo $viewData['descricao'] ?></textarea>
        </div>
    </div>
</div>
<div class="container">
    <div class="float-right col-sm-12">
        <a href="#" id="addComp" class="float-right btn btn-search btn-primary"><i class="fas fa-plus"></i> Adicionar</a>
    </div>
            <table class="table table-bordered table-striped table-hover col-sm-12">
                <thead>
                    <th width="15%">SKU</th>
                    <th width="60%">Nome</th>
                    <th width="15%">Quantidade</th>
                    <th width="10%">Excluir</th>
                </thead>
                <tbody class="body-product">
                    <?php
                        if(isset($vmData) && !empty($vmData)){
                            foreach($vmData as $data){
                                echo "<tr class='js-{$data['id']}'>".
                                     "<td>{$data['codigo']}</td>".
                                     "<td>{$data['produto']}</td>".
                                     "<td>{$data['quantidade']}</td>".
                                     "<td><a href='#' id='{$data['id']}' class='delProd'>Excluir</a></td>".
                                     "</tr>";
                            }
                        }else{
                            echo "<tr>".
                                 "<td colspan='6' class='text-center text-nores'>Não foi encontrado nenhum produto na composição</td>".
                                 "</tr>";
                        }
                    
                    ?>
                </tbody>
            </table>
</div>
