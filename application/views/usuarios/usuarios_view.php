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
                    <h1 class="text-info">Administrar Información del Usuario</h1>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-lg-4">
                <div class="thumbnail" align="center">
                    <h2>Crear Usuario</h2>
                    <img src="<?=base_url()?>imagenes/salon.png" width="250" height="250"><br>
                    <a href="<?= site_url('usuarios/registrar') ?>" class="btn btn-info btn-large"><strong>Ingresar</strong></a><br><br>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="thumbnail" align="center">
                    <h2>Editar Usuario</h2>
                    <img src="<?=base_url()?>imagenes/materia.png" width="250" height="250"><br>
                    <a href="<?= site_url('usuarios/editar') ?>" class="btn btn-info btn-large"><strong>Ingresar</strong></a><br><br>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="thumbnail" align="center">
                    <h2>Registrar Usuario</h2>
                    <img src="<?=base_url()?>imagenes/empresa.png" width="250" height="250"><br>
                    <a href="<?= site_url('usuarios/registrar') ?>" class="btn btn-info btn-large"><strong>Ingresar</strong></a><br><br>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
$(document).ready(function() {
    
});
</script>
</body>
</html>