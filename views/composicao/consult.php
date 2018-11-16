<script type="text/javascript">
    $(document).ready(function(){
        calculaPrecoSugerido();
    })
</script>

<div class="col-sm-12 text-center">
    <a class="float-left btn btn-primary btn-search d-inline-block" href="<?php echo BASE_URL; ?>composicao/index"><i class="fas fa-arrow-left"></i> Voltar</a>
    <a class="float-left btn btn-primary btn-search d-inline-block ml-3" href="<?php echo BASE_URL; ?>composicao/edit?id=<?php echo $viewData['0']['id'] ?>"><i class="fas fa-edit"></i> Alterar</a>
    <h3 class="d-inline-block">Produto Composto</h3>
</div>
<div class="container mt-5">
    <div class="col-sm-12">
    <input id="idComposto" value="<?php echo $viewData['0']['id'] ?>" hidden/>
        <form method="POST">
            <div class="form-row">
                <div class="form-group col-sm-4">
                    <label for="nome" class="control-label">Nome:</label>
                    <input type="text" class="form-control col-sm-12" id="nome" name="nome" value="<?php echo $viewData['0']['nome'] ?>" disabled/>
                </div>
                <div class="form-group col-sm-4">
                    <label for="precoProducao" class="control-label">Preço de Produção:</label>
                    <input type="text" class="form-control col-sm-12" id="precoProducao" name="precoProducao" value="R$ <?php echo $viewData['0']['precoProducao'] ?>" disabled/>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-4">
                    <label for="codigo" class="control-label">SKU:</label>
                    <input type="text" class="form-control col-sm-12" id="codigo" name="codigo" value="<?php echo $viewData['0']['codigo'] ?>" disabled/>
                </div>
                <div class="form-group col-sm-4">
                    <label for="markup" class="control-label">Markup:</label>
                    <input type="text" class="form-control col-sm-12" id="markup" name="markup" value="<?php echo $viewData['0']['markup'] ?>" disabled/>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-4">
                    <label for="dataAtivo" class="control-label">Data de Inclusão:</label>
                    <input type="text" class="form-control col-sm-12" id="dataAtivo" name="dataAtivo" value="<?php echo $viewData['0']['dataAtivo'] ?>" disabled/>
                </div>
                <div class="form-group col-sm-4">
                    <label for="precoSugerido" class="control-label">Preço Sugerido de Venda:</label>
                    <input type="text" class="form-control col-sm-12" id="precoSugerido" name="precoSugerido" value="" disabled/>
                </div>
            </div>
        </form>
    </div>
            <table class="table table-bordered table-striped table-hover col-sm-12">
                <thead>
                    <th width="15%">SKU</th>
                    <th width="60%">Nome</th>
                    <th width="15%">Preço de Custo</th>
                </thead>
                <tbody class="body-product">
                    <?php
                        if(isset($vmData) && !empty($vmData)){
                            foreach($vmData as $data){
                                echo "<tr class='js-{$data['id']}'>".
                                     "<td>{$data['sku']}</td>".
                                     "<td>{$data['nome']}</td>".
                                     "<td class='js-preco-custo' data-preco='{$data['preco']}'>{$data['preco']}</td>".
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
</div>
