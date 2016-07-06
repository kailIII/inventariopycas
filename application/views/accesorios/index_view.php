<!DOCTYPE html>
<html>
    <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mantenimeinto Accesorios</title>
    <?php require_once(APPPATH."views/script-css/script-css.php"); ?>
    </head>
<body>
    <?php require_once(APPPATH."views/menu/menu_view.php"); ?>
    <br/><br/><br/><br/>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div align="center" class="alert alert-info">
                    <h1 class="text-info">Mantenimiento Accesorios</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div id="mensaje"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-1">
            </div>
            <div class="col-lg-10">
                <table id="tablearea" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">Codigo</th>
                            <th class="text-center">Nombre</th>
                            <th style="width:205px;" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>

    
<script type="text/javascript">
var save_method;
var table;
$(document).ready(function() {
    table = $('#tablearea').DataTable({
        "pageLength": 7,
        "processing": true,
        "serverSide": true,
        "order": [], 
        "ajax": {
            "url": "<?php echo site_url('accesorios/ajax/list')?>",
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
});

function add_area(){
    $('#codigo').val('add');
    $('#form')[0].reset();
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();
    $('#modal_form').modal('show');
    $('.modal-title').text('Agregar Accesorio');
}

function delete_area(id){
    if(confirm('¿Esta seguro que desea eliminar sera un proceso irreversible.?')){
        $.ajax({
            url : "<?php echo site_url('accesorios/ajax/delete')?>",
            type: "POST",
            dataType: "JSON",
            data: {id:id},
            beforeSend:cargando,
            success: function(data){
                if(data.msj === 'Si'){
                    $('#mensaje').html('<div class="alert alert-success">Proceso realizado correctamente.</div>');
                }else{
                    $("#mensaje").html('<div class="alert alert-danger" colspan="3"><b>!Atención¡</b>Error: '+data.msj+'</div>');
                }
                reload_table();
            },
            error: problemas
        });

    }
}
function cargando(){
    $("#mensaje").html('<img src="<?=base_url()?>imagenes/cargando2.gif">');
}

function problemas(){
    $("#mensaje").html('<div class="alert alert-danger" colspan="3">Problemas en el servidor.Presione F5 para refrescar la página.</div>');
}

function reload_table(){
    table.ajax.reload(null,false); //reload datatable ajax 
}

function edit_area(id){
    save_method = 'update';
    $('#form')[0].reset();
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();
    $.ajax({
        url : "<?php echo site_url('accesorios/ajax/edit')?>",
        type: "POST",
        dataType: "JSON",
        data: {id:id},
        beforeSend:cargando,
        success: function(data){
            $('[name="codigo"]').val(data.codaccesorio);
            $('[name="nomacesorio"]').val(data.nomacesorio);
            $('#modal_form').modal('show');
            $('.modal-title').text('Editar Accesorio');
            $('#mensaje').html('');
        },
        error: problemas
    });
}

function save_area(){
    var codigo = $('#codigo').val();
    if(codigo === 'add'){
        url = "<?php echo site_url('accesorios/ajax/insert')?>";
    }else{
        url = "<?php echo site_url('accesorios/ajax/update')?>";
    }
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        beforeSend:cargando,
        success: function(data){
            if(data.msj === 'Si'){
                $('#mensaje').html('<div class="alert alert-success">Proceso realizado correctamente.</div>');
            }else{
                $("#mensaje").html('<div class="alert alert-danger" colspan="3"><b>!Atención¡</b>Error: '+data.msj+'</div>');
            }
            reload_table();
        },
        error: problemas
    });
}
</script>
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="codigo" id="codigo"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nombre: </label>
                            <div class="col-md-9">
                                <input name="nomacesorio" id="nomacesorio" placeholder="Nombres" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save_area()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>