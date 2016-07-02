<?php
if($tipousu == 'A'){
?>
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
                <li><a href="<?= site_url('usuarios/index') ?>">Usuarios</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Solicitud <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= site_url('solicitud/index') ?>">Equipo</a></li>
                        <li><a href="<?= site_url('soporte/index') ?>">Soporte</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="dropdown">
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
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>Bienvenido</b> <?php echo $username; ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= site_url('usuarios/perfil') ?>"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
                        <li><a href="<?= site_url('login/cerrarsession') ?>"><span class="glyphicon glyphicon-log-in"></span> Cerrar Sesion</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php
}else{
?>
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
            </ul>
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Solicitud <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= site_url('solicitud/index') ?>">Equipo</a></li>
                        <li><a href="<?= site_url('soporte/index') ?>">Soporte</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>Bienvenido</b> <?php echo $username; ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= site_url('usuarios/perfil') ?>"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
                        <li><a href="<?= site_url('login/cerrarsession') ?>"><span class="glyphicon glyphicon-log-in"></span> Cerrar Sesion</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php    
}
?>
