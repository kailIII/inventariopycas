<!DOCTYPE html>
<html>
    <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reportes</title>
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
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Mantenimiento <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= site_url('area/index') ?>">Area</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reportes <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= site_url('reportes/index') ?>">Consultar</a></li>
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
            <div class="col-lg-2">
            </div>
            <div class="col-lg-8">
                <form class="form-horizontal" role="form" id="formreporte" name="formreporte" action="generarreportes" target="_blank">
                    <input type="hidden" id="numreporte" name="numreporte" />
                    <table class="table table-bordered table table-hover">
                        <tr class="info">
                            <td colspan="4"><center><strong class="text-info">Reportes</strong></center></td>
                        </tr>
                        <?php
                        foreach ($reportes as $key => $valor):
                        ?>
                        <tr style="cursor: pointer;" id="<?php echo $key; ?>" class="seleccionar" onclick="seleccionar('<?php echo $key; ?>');">
                            <td style="padding-left: 20px;"><strong><?php echo $key.'- '.$valor;?></strong></td>
                        </tr>
                        <?php
                        endforeach;
                        ?>
                        <tr>
                            <td colspan="4">
                                <div class="row-fluid">
                                    <div class="span4" align="center">
                                        <button type="submit" class="btn btn-inverse">
                                            <span class="glyphicon glyphicon-print"></span> Generar Reprote
                                        </button>
                                    </div>
                                </div>
                            </td>
			</tr>
                    </table>   
                </form>
            </div>
            <div class="col-lg-2">
            </div>
        </div>
    </div>

<script type="text/javascript">
$(document).ready(function() {
    
});
function seleccionar(id){
    $('.seleccionar').css('background-color','#FFFFFF');
    $('#'+id).css('background-color','#3a87ad');
    $('#numreporte').val(id);
}
</script>
</body>
</html>