<html>
    <head>
        <meta charset="utf-8" >
        <title>PCP</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css" >
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
        <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
        
        <script src="<?php echo BASE_URL ?>assets/js/jquery-3.1.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.25.6/dist/sweetalert2.all.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js" ></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/ajax.js"></script>
        <script type="text/javascript" src="<?php echo BASEU_URL; ?>assets/js/validacoes.js"></script>
        <script src="<?php echo BASE_URL; ?>assets/js/jquery-validate.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
        <script src="<?php echo BASE_URL; ?>assets/js/mascaras.js"></script>
    </head>
    <body>
        <!-- Cabeçalho -->
        <header>
            <div class="row m-0 header-tmp">
                <div class="col-sm-6">
                    <img src="<?php echo BASE_URL; ?>/assets/images/logo3.png" height="50px" class="float-left logo" />
                </div>
                <div class="col-sm-6 pr-5">
                    <a href="<?php echo BASE_URL; ?>login/logOut" class="link-logoff float-right">Sair</a>
                </div>
            </div>
        </header>
        <!-- Menu lateral -->
        <nav>
            <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
                <!-- Perfil do Usuario -->
                <div class="profile-bar mt-3 mb-3">
                    <div class="text-center">
                        <span class="username"><?php echo $_SESSION['nmuser'] ?><span>
                    </div>
                    <div class="text-center profile-status">
                        <span class="indicator label-success"></span>Online
                    </div>
                </div>
                <!-- Menu -->
                <div class="menu">
                    <ul class="nav menu-int mt-2">
                        <li class="option <?php echo($_GET['url'] == 'home')? 'active': '' ?>"><a href="<?php echo BASE_URL; ?>home"><em class="fa fa-calendar">&nbsp;</em>Início</a></li>
                        <li class="option <?php echo($_GET['url'] == 'produtos')? 'active': '' ?>"><a href="<?php echo BASE_URL; ?>produtos"><em class="fa fa-calendar">&nbsp;</em>Produtos</a></li>
                        <li class="option <?php echo($_GET['url'] == 'controle')? 'active': '' ?>"><a href="#subMenu1" class="btn-sub" id="subControle" role="button" aria-hidden="false" aria-controls="subMenu1" data-toggle="collapse" ><em class="fa fa-calendar">&nbsp;</em>Controle<span data-toggle="collapse"class="icon float-right"><em class="fas fa-sort-down"></em></span></a></li>
                            <ul id="subMenu1" class="nav menu-int collapse">
                                <li class="option"><a href="<?php echo BASE_URL; ?>controle"><span class="fa fa-arrow-right">&nbsp;</span>Criar Controle</a></li>
                                <li class="option"><a href="<?php echo BASE_URL; ?>controle/list"><span class="fa fa-arrow-right">&nbsp;</span>Consultar Controles</a></li>
                                <li class="option"><a href="#"><span class="fa fa-arrow-right">&nbsp;</span>Sub Opção 3</a></li>
                            </ul>
                        <li class="option <?php echo($_GET['url'] == '')? 'active': '' ?>"><a href="<?php echo BASE_URL; ?>composicao/index"><em class="fa fa-calendar">&nbsp;</em>Composição</a></li>
                        <li class="option <?php echo($_GET['url'] == 'pedidos/index')? 'active': '' ?>"><a href="<?php echo BASE_URL; ?>pedidos/index"><em class="fa fa-calendar">&nbsp;</em>Pedidos</a></li>                    
                        <li class="option <?php echo($_GET['url'] == 'relatorios')? 'active': '' ?>"><a href="#subMenu2" class="btn-sub" id="subRelatorios" role="button" aria-hidden="false" aria-controls="subMenu2" data-toggle="collapse" ><em class="fa fa-calendar">&nbsp;</em>Relatórios<span data-toggle="collapse" class="icon float-right"><em class="fas fa-sort-down"></em></span></a></li>
                            <ul id="subMenu2" class="nav menu-int collapse">
                                <li class="option"><a href="<?php echo BASE_URL; ?>relatorios/index"><span class="fa fa-arrow-right">&nbsp;</span>Mensal</a></li>
                                <li class="option"><a href="<?php echo BASE_URL; ?>relatorios"><span class="fa fa-arrow-right">&nbsp;</span>Pedidos</a></li>
                                <li class="option"><a href="#"><span class="fa fa-arrow-right">&nbsp;</span>Produtos Compostos</a></li>
                            </ul>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-content col-sm-9 col-lg-10 offset-lg-2 offset-sm-3 p-0">
            <div class="col-sm-12 col-lg-12 p-0">
                <div class="row m-0 p-0">
                    <!-- Breadcrumb -->
                    <?php 
                        $breadcrumb = explode('/', $_GET['url'])
                    
                    ?>
                    <div class="col-sm-12 p-0">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>home"><em class="fa fa-home"></em></a></li>
                            <?php 
                                for($i = 0; $i < count($breadcrumb); $i++){
                                    if($i == (count($breadcrumb) - 1)){
                                        echo "<li class='breadcrumb-item active'>".
                                             mb_convert_case($breadcrumb[$i], MB_CASE_TITLE, 'UTF-8').
                                             "</li>"; 
                                    }else{
                                        echo "<li class='breadcrumb-item link'>".
                                        "<a class='link' href='".BASE_URL."{$breadcrumb[$i]}'>".mb_convert_case($breadcrumb[$i], MB_CASE_TITLE, 'UTF-8')."</a>".
                                        "</li>";
                                    }
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php $this->loadViewInTemplate($viewName, $viewData, $vmData) ?>
        </div>
        <footer class="col-sm-9 col-lg-10 offset-lg-2 offset-sm-3 p-0 mt-5">
        </footer>

    </body>

<html>