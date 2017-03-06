<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
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
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning" id="totalNumerico"></span><!-- Cantidad de Notificaciones -->
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header" id="totalDescripcion"></li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu" id="notificacionesDescripcion">

                            </ul>
                        </li>
                        <li class="footer"><a href="notificacionProgramasPorVencerDirectiva.php">Ver Todas</a></li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="../../Files/img/user-male.png" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $usu_nombre; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="../../Files/img/user-male.png" class="img-circle" alt="User Image">

                            <p>
                                <?php echo $usu_nombre . " - " . $per_nombre; ?>
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

<script>
    window.onload = function () {
        buscarNotificaciones();
    }

    function buscarNotificaciones() {
        $.get("../Servlet/administrarMalla.php", {accion: 'OBTENER_PROGRAMAS_POR_VENCER'}, function (data) {
            var data = eval(data);
            var count = 0;
            $("#notificacionesDescripcion").empty();
            $.each(data, function (k, v) {
                var programa;
                var id;
                var asignatura;
                var contenidoNotificacion = "";

                if (v.pb) {
                    programa = "basico"
                    id = v.programa.pb_id;
                    asignatura = v.programa.asig_nombre;
                    contenidoNotificacion = "<li><a href='verProgramaBasicoAsignaturasDirectiva.php?pb_id=" + id + "'><i class='fa fa-warning text-yellow'></i> Programa " + programa + " por caducar el próximo semestre</a></li>";
                } else if (v.pe) {
                    programa = "extenso"
                    id = v.programa.pe_id;
                    asignatura = v.programa.asig_nombre;
                    contenidoNotificacion = "<li><a href='verProgramaExtensoAsignaturasDirectiva.php?pe_id=" + id + "'><i class='fa fa-warning text-yellow'></i> Programa " + programa + " por caducar el próximo semestre</a></li>";
                } else if (v.pd) {
                    programa = "didáctico"
                    id = v.programa.pd_id;
                    asignatura = v.programa.asignatura.asig_nombre;
                    contenidoNotificacion = "<li><a href='verProgramaDidacticoAsignaturasDirectiva.php?pd_id=" + id + "'><i class='fa fa-warning text-yellow'></i> Programa guía " + programa + " por caducar el próximo semestre</a></li>";
                }
                
                $("#notificacionesDescripcion").append(contenidoNotificacion);
                count++;
            });

            if (count > 0) {
                $("#totalNumerico").html(count);
                $("#totalDescripcion").html("Tiene " + count + " Notificaciones");
            }
        });

    }

</script>