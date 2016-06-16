<!DOCTYPE html>
<html>
    <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css-propios/login.css')?>" rel="stylesheet">

    <script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
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
    var msj = '<?php echo $respuesta; ?>';
    $("#mensaje").html(msj);
});
</script>
</body>
</html>