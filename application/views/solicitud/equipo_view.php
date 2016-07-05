<!DOCTYPE html>
<html>
    <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Solicitud Equipo</title>
    <?php require_once(APPPATH."views/script-css/script-css.php"); ?>
    </head>
<body>
    <?php require_once(APPPATH."views/menu/menu_view.php"); ?>
    <br/><br/><br/><br/>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading">Solicitud de Equipo</div>
                    <div id="mensaje"></div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" id="formequipo" name="formsolicitud">
                            <input type="hidden" id="codigo" name="codigo" />
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Nombres y Apellidos: </label>
                                        <div class="col-md-6">
                                            <input placeholder="Ingrese Nombres y Apellidos" class="form-control" id="nomcomp" name="nomcomp" type="text">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Cargo: </label>
                                        <div class="input-group clockpicker col-md-4" style="padding-left: 15px;">
                                            <select class="form-control" id="cargo" name="cargo">
                                                <option value="">Seleccione</option>
                                                <option value="G">Gerente</option>
                                                <option value="U">Usuario</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Equipo: </label>
                                        <div class="input-group clockpicker col-md-4" style="padding-left: 15px;">
                                            <select class="form-control" id="equipo" name="equipo">
                                                <option value="">Seleccione</option>
                                                <?php
                                                foreach ($equipos as $valor):
                                                ?>
                                                    <option value="<?php echo $valor['equipo'];?>"><?php echo $valor['presentacion']?></option>
                                                <?php
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Area: </label>
                                        <div class="col-md-6">
                                            <select class="form-control" id="codarea" name="codarea">
                                                <option value="">Seleccione</option>
                                                <?php
                                                foreach ($area as $valor):
                                                ?>
                                                    <option value="<?php echo $valor['codarea'];?>"><?php echo $valor['nombre']?></option>
                                                <?php
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Hora: </label>
                                        <div class="input-group clockpicker col-md-4" style="padding-left: 15px;">
                                            <input type="text" class="form-control" id="hora" name="hora" placeholder="hh-mm">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-time"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Fecha Entrega: </label>
                                        <div class="col-md-4">
                                            <input placeholder="yyyy-mm-dd" class="form-control datepicker" id="fechaentrega" name="fechaentrega" type="text">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Fecha Devolucion: </label>
                                        <div class="col-md-4">
                                            <input placeholder="yyyy-mm-dd" class="form-control datepicker" id="fechadevulucion" name="fechadevulucion" type="text">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div><br/>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-2 text-center">
                                        <button type="button" class="btn btn-success" onclick="save_solicitud('add');">Grabar</button>
                                    </div>
                                    <div class="col-lg-2 text-center">
                                        <button type="button" class="btn btn-danger" onclick="cancelar();">Cancelar</button>
                                    </div>
                                    <div class="col-lg-3"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer">
                        <table id="tablasolicitud" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Nombres y Apellidos</th>
                                    <th>Equipo</th>
                                    <th>Cargo</th>
                                    <th>Cod. Area</th>
                                    <th>Hora</th>
                                    <th>Fecha Entrega</th>
                                    <th>Fecha Devolucion</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
<script type="text/javascript">
var table;
$(document).ready(function() {
    table = $('#tablasolicitud').DataTable({
        "pageLength": 7,
        "processing": true,
        "serverSide": true,
        "order": [], 
        "ajax": {
            "url": "<?php echo site_url('solicitud/ajax/listequipo')?>",
            "type": "POST"
        },
        "columnDefs": [{ 
            "targets": [ -1 ],
            "orderable": false
        }],
        "bLengthChange" : false,
        "language": {
            "sSearch": "Buscar: ",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando paginas _PAGE_ de _PAGES_, total de filas _MAX_.",
            "infoEmpty": "Ning&uacute;n dato disponible en esta tabla",
            "infoFiltered": "(filtrando _MAX_ filas en total)",
            "sProcessing":   "Procesando...",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "&Uacute;ltimo",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            }
        }
    });
    
    $('#tablasolicitud_filter').css('display','none');
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true
    });

    $('.clockpicker').clockpicker();
});

function save_solicitud(parametro){
    var codigo = $('#codigo').val();
    var equipo = $('#equipo').val();
    var codarea = $('#codarea').val();
    if(parametro === 'add'){
        url = "<?php echo site_url('solicitud/ajax/insertequipo')?>";
        $('#codigo').val('add');
    }
    if(equipo === ''){
        alert('Atencion debe ingresar un equipo');
        return false;
    }
    if(codarea === ''){
        alert('Atencion debe ingresar una area.');
        return false;
    }
    $.ajax({
        url : url,
        type: "POST",
        data: $('#formequipo').serialize(),
        dataType: "JSON",
        beforeSend:cargando,
        success: function(data){
            if(data.msj === 'Si'){
                $('#mensaje').html('<div class="alert alert-success">Proceso realizado correctamente.</div>');
            }else{
                $("#mensaje").html('<div class="alert alert-danger" colspan="3"><b>!Atención¡</b>Error: '+data.msj+'</div>');
            }
            reload_table();
            cancelar();
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

function cancelar(){
    $('#codigo').val('');
    $('#nomcomp').val('');
    $('#equipo').val('');
    $('#codarea').val('');
    $('#hora').val('');
    $('#fechaentrega').val('');
    $('#fechadevulucion').val('');
}
function reload_table(){
    table.ajax.reload(null,false);
}
</script>
</body>
</html>