<div class=jumbotron>
    <form method="POST">
        <div class="form-horizontal">
            <div class="form-group col-sm-4">
                <label for="data" class="control-label">Data Produção:</label>
                <input type="date" class="form-control" name="data" id="data" >
            </div>
            <div class="form-group col-sm-4">
                <label for="turno" class="control-label">Turno</label>
                <select name="turno" id="turno" class="form-control">
                    <option value="Manhã">Manhã</option>
                    <option value="Noite">Noite</option>
                </select>
            </div>
            <div class="form-group col-sm-4">
                <label for="descricao" class="control-label">Descrição:</label>
                <textarea class="form-control" rows="6" cols="50" name="descricao" id="descricao"></textarea>
            </div>
        </div>
        <div class="form-group pl-3">
            <button class="btn btn-prymary btn-login" type="submit" name="enviar" id="enviar">Salvar</button>
        </div>
    </form>
</div>