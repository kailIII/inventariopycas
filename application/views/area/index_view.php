<!DOCTYPE html>
<html>
    <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mantenimeinto Area</title>
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">

    <script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
    <script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
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
            <div class="col-lg-12">
                <div align="center" class="alert alert-info">
                    <h1 class="text-info">Mantenimiento Area</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div id="mensaje"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <button class="btn btn-success" onclick="add_area()"><i class="glyphicon glyphicon-plus"></i> Agregar Area</button>
            </div>
            <div class="col-lg-8">
                <table id="tablearea" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th style="width:125px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-2"></div>
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
            "url": "<?php echo site_url('area/ajax/list')?>",
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
    $('.modal-title').text('Agregar Area');
}

function delete_area(id){
    if(confirm('¿Esta seguro que desea eliminar sera un proceso irreversible.?')){
        $.ajax({
            url : "<?php echo site_url('area/ajax/delete')?>",
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
        url : "<?php echo site_url('area/ajax/edit')?>",
        type: "POST",
        dataType: "JSON",
        data: {id:id},
        beforeSend:cargando,
        success: function(data){
            $('[name="codigo"]').val(data.codigo);
            $('[name="nombres"]').val(data.nombre);
            $('#modal_form').modal('show');
            $('.modal-title').text('Editar Area');
            $('#mensaje').html('');
        },
        error: problemas
    });
}

function save_area(){
    var codigo = $('#codigo').val();
    if(codigo === 'add'){
        url = "<?php echo site_url('area/ajax/insert')?>";
    }else{
        url = "<?php echo site_url('area/ajax/update')?>";
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
                            <label class="control-label col-md-3">First Name</label>
                            <div class="col-md-9">
                                <input name="nombres" id="nombres" placeholder="Nombres" class="form-control" type="text">
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