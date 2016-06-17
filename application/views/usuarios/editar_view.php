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
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Bienvenido <?php echo $username; ?><span class="caret"></span></a>
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
                    <h1 class="text-info">Editar Usuario</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div id="mensaje">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <input type="button" onclick="actualizarinfo();" name="btnactualizar" id="btnactualizar" class="btn btn-success" value="Actualizar Información"/>
            </div>
            <div class="col-lg-6" align="right">
                <a href="<?= site_url('usuarios/index') ?>" class="btn btn-info">
                    <span class="glyphicon glyphicon-backward"></span>  <b>Regresar</b>
                </a>
            </div>
        </div><br/>
        <div class="row">
            <form class="form-horizontal" role="form" id="forme" name="forme">
                <input type="hidden" name="codigo" id="codigo" value="<?php echo $datosusu[0]['codigo']; ?>"/>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="ejemplo_email_3" class="col-lg-3 control-label">Nombres: </label>
                        <div class="col-lg-8">
                            <input type="email" class="form-control" id="nombres" name="nombres" value="<?php echo $datosusu[0]['nombres']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ejemplo_email_3" class="col-lg-3 control-label">Apellidos: </label>
                        <div class="col-lg-8">
                            <input type="email" class="form-control" id="apellidos" name="apellidos" value="<?php echo $datosusu[0]['apellidos']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ejemplo_email_3" class="col-lg-3 control-label">Sexo: </label>
                        <div class="col-lg-8">
                            <select class="form-control" id="cbosexo" name="cbosexo">
                                <option value="">Seleccione</option>
                                <option value="M" <?php if($datosusu[0]['sexo'] == 'M'){ echo 'selected'; } ?>>Masculino</option>
                                <option value="F" <?php if($datosusu[0]['sexo'] == 'F'){ echo 'selected'; } ?>>Femenino</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ejemplo_email_3" class="col-lg-3 control-label">Estado: </label>
                        <div class="col-lg-8">
                            <select class="form-control" id="cboestado" name="cboestado">
                                <option value="">Seleccione</option>
                                <option value="A" <?php if($datosusu[0]['estado'] == 'A'){ echo 'selected'; } ?>>Activo</option>
                                <option value="I" <?php if($datosusu[0]['estado'] == 'I'){ echo 'selected'; } ?>>Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ejemplo_email_3" class="col-lg-3 control-label">Direccion: </label>
                        <div class="col-lg-8">
                            <input type="email" class="form-control" id="direccion" name="direccion" value="<?php echo $datosusu[0]['direccion']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ejemplo_email_3" class="col-lg-3 control-label">Permiso: </label>
                        <div class="col-lg-8">
                            <select class="form-control" id="cbopermiso" name="cboepermiso">
                                <option value="">Seleccione</option>
                                <option value="1" <?php if($datosusu[0]['permiso'] == '1'){ echo 'selected'; } ?>>Acceso Total</option>
                                <option value="2" <?php if($datosusu[0]['permiso'] == '2'){ echo 'selected'; } ?>>Acceso Restringido</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ejemplo_email_3" class="col-lg-3 control-label">Email: </label>
                        <div class="col-lg-8">
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $datosusu[0]['email']; ?>">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="ejemplo_email_3" class="col-lg-3 control-label">Usuario: </label>
                        <div class="col-lg-8">
                            <input type="email" class="form-control" id="usuario" name="usuario" value="<?php echo $datosusu[0]['usuario']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ejemplo_email_3" class="col-lg-3 control-label">Contraseña: </label>
                        <div class="col-lg-8">
                            <input type="password" class="form-control" id="contrasena" name="contrasena" value="<?php echo $datosusu[0]['contrasena']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ejemplo_email_3" class="col-lg-3 control-label">Celular: </label>
                        <div class="col-lg-8">
                            <input type="email" class="form-control" id="celular" name="celular" value="<?php echo $datosusu[0]['celular']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ejemplo_email_3" class="col-lg-3 control-label">Tipo Usuario: </label>
                        <div class="col-lg-8">
                            <select class="form-control" id="cbotipousu" name="cbotipousu">
                                <option value="">Seleccione</option>
                                <option value="A" <?php if($datosusu[0]['tipousu'] == 'A'){ echo 'selected'; } ?>>Adminsitrador</option>
                                <option value="T" <?php if($datosusu[0]['tipousu'] == 'T'){ echo 'selected'; } ?>>Trabajador</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ejemplo_email_3" class="col-lg-3 control-label">DNI: </label>
                        <div class="col-lg-8">
                            <input type="email" maxlength="8" class="form-control" id="dni" name="dni" value="<?php echo $datosusu[0]['dni']; ?>">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<script type="text/javascript">
$(document).ready(function() {
});
function actualizarinfo(){
    url = "<?php echo site_url('usuarios/json/case/update')?>";
    $.ajax({
        url : url,
        type: "POST",
        data: $('#forme').serialize(),
        dataType: "JSON",
        beforeSend:cargando,
        success: function(data){
            if(data.msj === 'Si'){
                $('#mensaje').html('<div class="alert alert-success">Proceso realizado correctamente.</div>');
            }else{
                $("#mensaje").html('<div class="alert alert-danger" colspan="3"><b>!Atención¡</b>Error: '+data.msj+'</div>');
            }
        },
        error: problemas
    });
    return false;
}
function cargando(){
    $("#mensaje").html('<img src="<?=base_url()?>imagenes/cargando2.gif">');
}

function problemas(){
    $("#mensaje").html('<div class="alert alert-danger" colspan="3">Problemas en el servidor.Presione F5 para refrescar la página.</div>');
}
</script>
</body>
</html>