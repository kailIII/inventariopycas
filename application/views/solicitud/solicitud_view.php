<!DOCTYPE html>
<html>
    <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menu Principal</title>
    <?php require_once(APPPATH."views/script-css/script-css.php"); ?>
    </head>
<body>
    <?php require_once(APPPATH."views/menu/menu_view.php"); ?>
    <br/><br/><br/><br/>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading">Datos del Solicitante</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" id="formsolicitud" name="formsolicitud">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Fecha: </label>
                                        <div class="col-md-4">
                                            <input name="dob" placeholder="yyyy-mm-dd" class="form-control datepicker" id="fecha" name="fecha" type="text">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Nombres y Apellidos: </label>
                                        <div class="col-md-6">
                                            <input name="dob" placeholder="Ingrese Nombres y Apellidos" class="form-control" id="nomcomp" name="nomcomp" type="text">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Cargo: </label>
                                        <div class="input-group clockpicker col-md-4" style="padding-left: 15px;">
                                            <select class="form-control" id="cbocargo" name="cbocargo">
                                                <option value="">Seleccione</option>
                                                <option value="G">Gerente</option>
                                                <option value="U">Usuario</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Requerimiento: </label>
                                        <div class="col-md-8">
                                            <textarea class="form-control" rows="3" cols="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Hora: </label>
                                        <div class="input-group clockpicker col-md-4" style="padding-left: 15px;">
                                            <input type="text" class="form-control" id="hora" name="hora" placeholder="hh-mm">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-time"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Area: </label>
                                        <div class="col-md-6">
                                            <select class="form-control" id="cboarea" name="cboarea">
                                                <option value="">Seleccione</option>
                                                <?php
                                                foreach ($area as $valor):
                                                ?>
                                                    <option value="<?php echo $valor['codigo'];?>"><?php echo $valor['nombre']?></option>
                                                <?php
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div><br/>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-2 text-center">
                                        <button type="button" class="btn btn-success">Grabar</button>
                                    </div>
                                    <div class="col-lg-2 text-center">
                                        <button type="button" class="btn btn-warning">Modificar</button>
                                    </div>
                                    <div class="col-lg-2 text-center">
                                        <button type="button" class="btn btn-danger">Cancelar</button>
                                    </div>
                                    <div class="col-lg-3"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer">
                        <table class="table">
                            ...
                        </table>
                    </div>
                </div>
            </div>
        </div>
<script type="text/javascript">
$(document).ready(function() {
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true
    });
    $('.clockpicker').clockpicker();
});
</script>
</body>
</html>