<div class="col-sm-12 text-center">
    <a class="float-left btn btn-primary btn-search d-inline-block" href="<?php echo BASE_URL; ?>composicao/index"><i class="fas fa-arrow-left"></i> Voltar</a>
    <h3 class="d-inline-block">Cadastar Composição de Item</h3>
</div>
<div class="container mt-5">
    <div class="col-sm-12">
        <form method="POST">
            <div class="form-group">
                <label for="nome" class="control-label">Nome:</label>
                <input type="text" class="form-control col-sm-4" id="nome" name="nome" placeholder="Nome do Produto..." />
            </div>
            <div class="form-group">
                <label for="codigo" class="control-label">SKU:</label>
                <input type="text" class="form-control col-sm-4" id="codigo" name="codigo" placeholder="Código SKU..."/>
            </div>
            <div class="form-group">
                <label for="precoProducao" class="control-label">Preço de Produção:</label>
                <input type="text" class="form-control col-sm-4" id="precoProducao" name="precoProducao" placeholder="0.00"  />
            </div>
            <div class="form-group">
                <label for="markup" class="control-label">Markup:</label>
                <input type="text" class="form-control col-sm-4" id="markup" name="markup" placeholder="0.00"  />
            </div>

            <button type="submit" class="btn btn-primary btn-search">Salvar</button>
        </form>
    </div>
</div>