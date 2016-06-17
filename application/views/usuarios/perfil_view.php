<!DOCTYPE html>
<html>
    <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfil</title>
    <?php require_once(APPPATH."views/script-css/script-css.php"); ?>
    </head>
<body>
    <?php require_once(APPPATH."views/menu/menu_view.php"); ?>
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