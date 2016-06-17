<!DOCTYPE html>
<html>
    <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reportes</title>
    <?php require_once(APPPATH."views/script-css/script-css.php"); ?>
    </head>
<body>
    <?php require_once(APPPATH."views/menu/menu_view.php"); ?>
    <br/><br/><br/><br/>
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-8">
                <form class="form-horizontal" role="form" id="formreporte" name="formreporte" action="generarreportes" target="_blank" onsubmit="return validar();">
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
function validar(){
    var numreporte = $('#numreporte').val();
    if(numreporte === ''){
        alert("Atencion-Debe seleccionar un reporte.");
        return false;
    }
}
function seleccionar(id){
    $('.seleccionar').css('background-color','#FFFFFF');
    $('#'+id).css('background-color','#3a87ad');
    $('#numreporte').val(id);
}
</script>
</body>
</html>