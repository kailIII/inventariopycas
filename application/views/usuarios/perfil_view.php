<!DOCTYPE html>
<html>
    <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mantenimeinto Usuario</title>
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
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <!--<a class="dropdown-toggle" data-toggle="dropdown" href="#">Bienvenido<span class="glyphicon glyphicon-user"></span></a>-->
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Bienvenido <?php echo $username; ?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
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
                    <h1 class="text-info">Información del Perfil</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6"></div>
            <div class="col-lg-6" align="right">
                <a href="<?= site_url('usuarios/index') ?>" class="btn btn-info">
                    <span class="glyphicon glyphicon-backward"></span>  <b>Regresar</b>
                </a>
            </div>
        </div>
        <br/>
        <div class="row">
            <table class="table table-bordered">
              <tr>
                <td>
                    <div class="col-lg-6">
                        <span class="glyphicon glyphicon-ok"></span> <strong> Nombre: </strong><?php echo $datosusu[0]['nombres']; ?><br><br>
                        <span class="glyphicon glyphicon-ok"></span> <strong> Apellidos: </strong><?php echo $datosusu[0]['apellidos']; ?><br><br>
                        <span class="glyphicon glyphicon-ok"></span> <strong> Sexo: </strong><?php echo (($datosusu[0]['sexo'] == 'M')?'Masculino':'Femenino'); ?><br><br>
                        <span class="glyphicon glyphicon-ok"></span> <strong> Estado: </strong><?php echo (($datosusu[0]['estado'] == 'A')?'Activo':'Inactivo'); ?><br><br>
                        <span class="glyphicon glyphicon-ok"></span> <strong> Direccion: </strong><?php echo $datosusu[0]['direccion']; ?><br><br>
                        <span class="glyphicon glyphicon-ok"></span> <strong> Permiso: </strong><?php echo (($datosusu[0]['permiso'] == '1')?'Acceso Total':'Acceso Restringido'); ?><br><br>
                        <span class="glyphicon glyphicon-ok"></span> <strong> Correo: </strong><?php echo $datosusu[0]['email']; ?>
                    </div>
                    <div class="col-lg-6">
                        <span class="glyphicon glyphicon-ok"></span> <strong> Usuario: </strong><?php echo $datosusu[0]['usuario']; ?><br><br>
                        <span class="glyphicon glyphicon-ok"></span> <strong> Contraseña: </strong><?php echo $datosusu[0]['contrasena']; ?><br><br>
                        <span class="glyphicon glyphicon-ok"></span> <strong> Celular: </strong><?php echo $datosusu[0]['celular']; ?><br><br>
                        <span class="glyphicon glyphicon-ok"></span> <strong> Tipo Usuario: </strong><?php echo (($datosusu[0]['tipousu'] == 'A')?'Administrador':'Trabajador'); ?><br><br>
                        <span class="glyphicon glyphicon-ok"></span> <strong> DNI: </strong><?php echo $datosusu[0]['dni']; ?><br><br>
                    </div>
                </td>
              </tr>
            </table>
        </div>
    </div>

<script type="text/javascript">
$(document).ready(function() {
    
});
</script>
</body>
</html>