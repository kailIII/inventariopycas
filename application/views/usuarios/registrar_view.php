<!DOCTYPE html>
<html>
    <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mantenimeinto Usuario</title>
    <?php require_once(APPPATH."views/script-css/script-css.php"); ?>
    </head>
<body>
    <?php require_once(APPPATH."views/menu/menu_view.php"); ?>
    <br/><br/><br/><br/>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div align="center" class="alert alert-info">
                    <h1 class="text-info">Agregar Usuario</h1>
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
                <input type="button" onclick="grabar();" name="btnactualizar" id="btnactualizar" class="btn btn-success" value="Agregar Usuario"/>
            </div>
            <div class="col-lg-6" align="right">
                <a href="<?= site_url('usuarios/index') ?>" class="btn btn-info">
                    <span class="glyphicon glyphicon-backward"></span>  <b>Regresar</b>
                </a>
            </div>
        </div><br/>
        <div class="row">
            <form class="form-horizontal" role="form" id="forme" name="forme">
                <input type="hidden" name="codigo" id="codigo" value="add"/>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="ejemplo_email_3" class="col-lg-3 control-label">Nombres: </label>
                        <div class="col-lg-8">
                            <input type="email" class="form-control" id="nombres" name="nombres" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ejemplo_email_3" class="col-lg-3 control-label">Apellidos: </label>
                        <div class="col-lg-8">
                            <input type="email" class="form-control" id="apellidos" name="apellidos" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ejemplo_email_3" class="col-lg-3 control-label">Sexo: </label>
                        <div class="col-lg-8">
                            <select class="form-control" id="cbosexo" name="cbosexo">
                                <option value="">Seleccione</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ejemplo_email_3" class="col-lg-3 control-label">Estado: </label>
                        <div class="col-lg-8">
                            <select class="form-control" id="cboestado" name="cboestado">
                                <option value="">Seleccione</option>
                                <option value="A">Activo</option>
                                <option value="I">Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ejemplo_email_3" class="col-lg-3 control-label">Direccion: </label>
                        <div class="col-lg-8">
                            <input type="email" class="form-control" id="direccion" name="direccion" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ejemplo_email_3" class="col-lg-3 control-label">Permiso: </label>
                        <div class="col-lg-8">
                            <select class="form-control" id="cbopermiso" name="cboepermiso">
                                <option value="">Seleccione</option>
                                <option value="1">Acceso Total</option>
                                <option value="2">Acceso Restringido</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ejemplo_email_3" class="col-lg-3 control-label">Email: </label>
                        <div class="col-lg-8">
                            <input type="email" class="form-control" id="email" name="email" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="ejemplo_email_3" class="col-lg-3 control-label">Usuario: </label>
                        <div class="col-lg-8">
                            <input type="email" class="form-control" id="usuario" name="usuario" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ejemplo_email_3" class="col-lg-3 control-label">Contraseña: </label>
                        <div class="col-lg-8">
                            <input type="password" class="form-control" id="contrasena" name="contrasena" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ejemplo_email_3" class="col-lg-3 control-label">Celular: </label>
                        <div class="col-lg-8">
                            <input type="email" class="form-control" id="celular" name="celular" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ejemplo_email_3" class="col-lg-3 control-label">Tipo Usuario: </label>
                        <div class="col-lg-8">
                            <select class="form-control" id="cbotipousu" name="cbotipousu">
                                <option value="">Seleccione</option>
                                <option value="A">Adminsitrador</option>
                                <option value="U">Usuario</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ejemplo_email_3" class="col-lg-3 control-label">DNI: </label>
                        <div class="col-lg-8">
                            <input type="email" maxlength="8" class="form-control" id="dni" name="dni" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<script type="text/javascript">
$(document).ready(function() {
});
function grabar(){
    url = "<?php echo site_url('usuarios/json/case/add')?>";
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