<!DOCTYPE html>
<html>
    <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menu Principal</title>
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">

    <script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
    </head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Control de Inventario</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Control de Inventario</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="<?= site_url('principal/index') ?>">Principal</a></li>
                    <li><a href="#">Inventario General</a></li>
                    <li><a href="#">Solicitud</a></li>
                    <li><a href="<?= site_url('usuarios/index') ?>">Usuarios</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <!--<a class="dropdown-toggle" data-toggle="dropdown" href="#">Bienvenido<span class="glyphicon glyphicon-user"></span></a>-->
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Mantenimiento <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= site_url('area/index') ?>">Area</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <!--<a class="dropdown-toggle" data-toggle="dropdown" href="#">Bienvenido<span class="glyphicon glyphicon-user"></span></a>-->
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Bienvenido <?php echo $username; ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= site_url('usuarios/perfil') ?>"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
                            <li><a href="<?= site_url('login/cerrarsession') ?>"><span class="glyphicon glyphicon-log-in"></span> Cerrar Sesion</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br/><br/><br/><br/>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div align="center" class="alert alert-info">
                    <h1 class="text-info">PCyA CONTROL</h1>
                </div>
                <center><img class="img-responsive" src="http://placehold.it/750x500" alt=""></center>
            </div>
        </div>
    </div>

<script type="text/javascript">
$(document).ready(function() {
    
});
</script>
</body>
</html>