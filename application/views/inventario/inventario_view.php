<!DOCTYPE html>
<html>
    <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventario</title>
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
                    <div id="mensaje"></div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" id="formsolicitud" name="formsolicitud">
                            <input type="hidden" id="codigo" name="codigo" />
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Fecha: </label>
                                        <div class="col-md-4">
                                            <input placeholder="yyyy-mm-dd" class="form-control datepicker" id="fecha" name="fecha" type="text">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
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
                                            <select class="form-control" id="cbocargo" name="cbocargo">
                                                <option value="">Seleccione</option>
                                                <option value="G">Gerente</option>
                                                <option value="U">Usuario</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Accesorios: </label>
                                        <div class="col-md-8">
                                            <select class="form-control" id="accesorios" name="accesorios">
                                                <option value="">Seleccione</option>
                                                <?php
                                                foreach ($accesorios as $valor):
                                                ?>
                                                <option value="<?php echo $valor['codaccesorio']; ?>"><?php echo $valor['nomacesorio']; ?></option>
                                                <?php
                                                endforeach;
                                                ?>
                                            </select>
                                            <!--<textarea id="requerimiento" name="requerimiento" class="form-control" rows="3" cols="3"></textarea>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Hora Inicio: </label>
                                        <div class="input-group clockpicker col-md-4" style="padding-left: 15px;">
                                            <input type="text" class="form-control" id="horaini" name="horaini" placeholder="hh-mm">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-time"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Hora Fin: </label>
                                        <div class="input-group clockpicker col-md-4" style="padding-left: 15px;">
                                            <input type="text" class="form-control" id="horafin" name="horafin" placeholder="hh-mm">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-time"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Sala: </label>
                                        <div class="input-group col-md-4" style="padding-left: 15px;">
                                            <select class="form-control" id="cbosala" name="cbosala">
                                                <option value="">Seleccione</option>
                                                <?php
                                                foreach ($obtenersalaocupado as $valor):
                                                ?>
                                                    <option value="<?php echo $valor['codsala'];?>"><?php echo $valor['nomsala']?></option>
                                                <?php
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Area: </label>
                                        <div class="input-group col-md-4" style="padding-left: 15px;">
                                            <select class="form-control" id="cboarea" name="cboarea">
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
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-2 text-center">
                                        <button type="button" class="btn btn-success" onclick="save_solicitud('add');">Grabar</button>
                                    </div>
                                    <?php
                                    if($permiso == '1'){
                                    ?>
                                    <div class="col-lg-2 text-center">
                                        <button type="button" class="btn btn-warning" onclick="save_solicitud('update');">Modificar</button>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    <div class="col-lg-2 text-center">
                                        <button type="button" class="btn btn-danger" onclick="cancelar();">Cancelar</button>
                                    </div>
                                    <div class="col-lg-3"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer">
                        <table id="tablainventario" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Equipo</th>
                                    <th>Inventario</th>
                                    <th>Usuario</th>
                                    <th>Area</th>
                                    <th>Estado</th>
                                    <th>Observaciones</th>
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
    table = $('#tablainventario').DataTable({
        "pageLength": 7,
        "processing": true,
        "serverSide": true,
        "order": [], 
        "ajax": {
            "url": "<?php echo site_url('inventario/ajax/listinventario')?>",
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
<?php 
if($permiso == '1'){
?>
    $('#tablasolicitud tbody').on('click', 'tr', function () {
        var data = table.row( this ).data();
        url = "<?php echo site_url('solicitud/ajax/edit')?>";
        $.ajax({
            url : url,
            type: "POST",
            data: {codigo:data[0]},
            dataType: "JSON",
            beforeSend:cargando,
            success: function(data){
                $('#codigo').val(data.codigo);
                $('#fecha').val(data.fecha);
                $('#hora').val(data.hora);
                $('#cboarea').val(data.codarea);
                $('#nomcomp').val(data.nombres);
                $('#cbocargo').val(data.cargo);
                $('#requerimiento').val(data.requerimiento);
                $("#mensaje").html('');
            },
            error: problemas
        });
        return false;
    } );
<?php
}
?>

function save_solicitud(parametro){
    var codigo = $('#codigo').val();
    if(parametro === 'add'){
        url = "<?php echo site_url('solicitud/ajax/insert')?>";
        $('#codigo').val('add');
    }else{
        url = "<?php echo site_url('solicitud/ajax/update')?>";
        if(codigo === ''){
            alert('Atención - Debe seleccionar una fila.');
            return false;
        }
    }
    $.ajax({
        url : url,
        type: "POST",
        data: $('#formsolicitud').serialize(),
        dataType: "JSON",
        beforeSend:cargando,
        success: function(data){
            if(data.msj === 'Si'){
                $('#mensaje').html('<div class="alert alert-success">Proceso realizado correctamente.</div>');
            }else{
                $("#mensaje").html('<div class="alert alert-danger" colspan="3"><b>!Atención¡</b>Error: '+data.msj+'</div>');
            }
            reload_table();
            location.reload();
        },
        error: problemas
    });
}
function cargando(){
    $("#mensaje").html('<img src="<?=base_url()?>imagenes/cargando2.gif">');
}

function problemas(){
    $("#mensaje").html('<div class="alert alert-danger" colspan="3">Problemas en el servidor.Presione F5 para refrescar la página.</div>');
}

function cancelar(){
    $('#codigo').val('');
    $('#fecha').val('');
    $('#hora').val('');
    $('#cboarea').val('');
    $('#nomcomp').val('');
    $('#cbocargo').val('');
    $('#requerimiento').val('');
}
function reload_table(){
    table.ajax.reload(null,false);
}
</script>
</body>
</html>