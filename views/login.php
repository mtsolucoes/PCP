<html>
    <head>
        <meta charset="utf-8" >
        <title>Log In - PCP</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css" >
    </head>
    <body style="background-color:#f1f4f7;">
        <div class="container">
            <div class="col-sm-5 m-auto">
                <div class="col-sm-12 m-auto">
                    <img src="<?php echo BASE_URL; ?>/assets/images/logo3.png">
                </div>
                <div class="col-sm-10 formulario-login row m-auto pt-4 pb-4">
                    <h4 style="padding-left:15px;" class="col-md-12">Log In</h4>
                    <hr/>
                    <form method="POST" id="formLogin">
                        <div class="container row">
                            <div class="col-sm-12 form-horizontal mb-4">
                                <input type="text" name="login" id="login" class="form-control" placeholder="Login..." data-required >
                            </div>
                            <div class="col-sm-12 form-horizontal">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Senha..." data-required>
                            </div>
                            <div class="col-md-6 mt-4">
                                <input type="submit" name="enviar" id="enviar" class="btn brn-primary btn-login" value="Entrar" >
                            </div>
                            <div class="col-md-3 mt-4">
                                <a href="#" class="btn btn-primary btn-login">Cadastre-se</a>
                            </div>
                        </div>
                    </form>
                    <?php
                        if(isset($_POST['login']) && !empty($_POST['login'])){
                            $this->entrando(addslashes($_POST['login']), addslashes(md5($_POST['password'])));
                        }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>