<html>
    <head>
        <meta charset="utf-8" >
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css" >
    </head>
    <body style="background-color:#f1f4f7;">
        <div class="container">
            <div class="col-sm-5 m-auto">
                <div class="col-sm-10 formulario-login m-auto pt-4 pb-4">
                    <h4 style="padding-left:15px;">Cadastro</h4>
                    <hr/>
                    <form method="POST">
                        <div class="col-sm-12 form-horizontal mb-4">
                            <label name="nome" id="nome" class="control-label" >Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome..." >
                        </div>
                        <div class="col-sm-12 form-horizontal mb-4">
                            <label name="email" id="email" class="control-label" >E-mail</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="E-mail..." >
                        </div>
                        <div class="col-sm-12 form-horizontal">
                            <label name="senha" id="senha" class="control-label" >Senha</label>
                            <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha...">
                        </div>
                        <div class="col-sm-12 form-horizontal">
                            <label name="permissao" id="permissao" class="control-label" >Permissão</label>
                            <input type="text" name="permissao" id="permissao" class="form-control" placeholder="Permissão">
                        </div>
                        <div class="col-sm-12 form-horinzontal">
                            <label name="apikey" id="apikey" class="control-label">Api Key</label>
                            <input type="text" name="apikey" id="apikey" class="form-control" placeholder="Key..." >
                        </div>
                        <div class="col-md-9 mt-4">
                            <input type="submit" name="enviar" id="enviar" class="btn brn-primary btn-login" value="Enviar" >
                        </div>
                        <?php 
                            if(isset($_POST['nome']) && !empty($_POST['nome'])){
                                $this->cadastrar(addslashes($_POST['nome']), 
                                                 addslashes($_POST['email']), 
                                                 addslashes(md5($_POST['senha'])), 
                                                 addslashes($_POST['permissao']), 
                                                 addslashes($_POST['apikey']));  
                            }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>