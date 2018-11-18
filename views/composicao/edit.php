<script type="text/javascript">
    $(document).ready(function(){
        calculaPrecoSugerido();
    })
</script>
<div class="col-sm-12 text-center">
    <a class="float-left btn btn-primary btn-search d-inline-block" href="<?php echo BASE_URL; ?>composicao/index"><i class="fas fa-arrow-left"></i> Voltar</a>
    <h3 class="d-inline-block">Alterar Produto</h3>
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
                <input type="text" class="form-control col-sm-12" id="precoProducao" name="precoProducao" id="precoProducao" value="<?php echo $viewData['0']['precoProducao'] ?>"/>
            </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-4">
                    <label for="codigo" class="control-label">SKU:</label>
                    <input type="text" class="form-control col-sm-12" id="codigo" name="codigo" value="<?php echo $viewData['0']['codigo'] ?>" disabled/>
                </div>
                <div class="form-group col-sm-4">
                    <label for="markup" class="control-label">Markup:</label>  <i class="fas fa-info-circle info-markup-icon"></i>
                    <div class="info-markup">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolore, cum neque sed numquam illo voluptates ad aspernatur velit ab placeat maiores asperiores</div>
                    <input type="text" class="form-control col-sm-12" id="markup" name="markup" value="<?php echo $viewData['0']['markup'] ?>"/>
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
            <div class="form-row">
                <div class="form-group col-sm-2">
                    <a href="#" id="<?php echo $viewData['0']['id'] ?>" class="btn btn-search btn-primary alterarComposto">Salvar</a>
                </div>
            </div>
        </form>
    </div>
    <div class="float-right col-sm-12">
    <a href="#" id="addProd" class="float-right btn btn-search btn-primary"><i class="fas fa-plus"></i> Adicionar</a>
    </div>
            <table class="table table-bordered table-striped table-hover col-sm-12">
                <thead>
                    <th width="15%">SKU</th>
                    <th width="60%">Nome</th>
                    <th width="15%">Preço de Custo</th>
                    <th width="10%">Excluir</th>
                </thead>
                <tbody class="body-product">
                    <?php
                        if(isset($vmData) && !empty($vmData)){
                            foreach($vmData as $data){
                                echo "<tr class='js-{$data['id']}'>".
                                     "<td>{$data['sku']}</td>".
                                     "<td>{$data['nome']}</td>".
                                     "<td class='js-preco-custo' data-preco='{$data['preco']}'>{$data['preco']}</td>".
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
</div>