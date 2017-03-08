<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="../../Files/img/logo_ici_simple.png" width="80%"></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="../../Files/img/logo_ici.png" width="80%"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="../../Files/img/user-male.png" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $usu_nombre;?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="../../Files/img/user-male.png" class="img-circle" alt="User Image">

                            <p>
                                <?php echo $usu_nombre." - ".$per_nombre;?>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="../Servlet/loginOFF.php" class="btn btn-default btn-flat">Cerrar Sesion</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>