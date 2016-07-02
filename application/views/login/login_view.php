<!DOCTYPE html>
<html>
    <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <?php require_once(APPPATH."views/script-css/script-css.php"); ?>
    </head>
<body>
    <div class="login-body">
    <article class="container-login center-block">
        <section>
            <ul id="top-bar" class="nav nav-tabs nav-justified">
                <li class="active"><a href="#login-access">Pycas</a></li>
                <li><a href="#">Sistema Inventario</a></li>
            </ul>
            <div class="tab-content tabs-login col-lg-12 col-md-12 col-sm-12 cols-xs-12">
                <div id="login-access" class="tab-pane fade active in">
                    <h2><i class="glyphicon glyphicon-log-in"></i> Accesso</h2>						
                    <form method="post" accept-charset="utf-8" autocomplete="off" role="form" class="form-horizontal" action="">
                        <div class="form-group ">
                            <label for="login" class="sr-only">Usuario</label>
                            <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario" tabindex="1" value="" />
                        </div>
                        <div class="form-group ">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="" tabindex="2" />
                        </div>
                        <div id="mensaje"></div>
                        <div class="form-group ">				
                            <button type="submit" tabindex="5" class="btn btn-lg btn-primary">Entra</button>
                        </div>
                    </form>			
                </div>
            </div>
        </section>
    </article>
</div>
<script type="text/javascript">
$(document).ready(function() {
    //declarar variable var nombrevariable = '';
    var msj = '<?php echo $respuesta; ?>';
    console.log(msj);
    $("#mensaje").html(msj);
});
</script>
</body>
</html>