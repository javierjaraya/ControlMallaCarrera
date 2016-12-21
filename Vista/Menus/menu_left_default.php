<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../../Files/img/user-male.png" class="img-circle" alt="User Image">
                <!--<img src="../../Files/Complementos/template_admin_lite/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
            </div>
            <div class="pull-left info">
                <p><?php echo $usu_nombre;?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Buscar...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">NAVEGACIÓN PRINCIPAL</li>
            <li class="treeview"><!-- active -->
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Malla Curricular</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="crearMallaCurricular.php"><i class="fa fa-circle-o"></i>Crear malla</a></li><!-- class="active" -->
                    <li><a href="administrarMallaCurricularDirectiva.php"><i class="fa fa-circle-o"></i>Ver Malla Curricular</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Asignaturas</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="administrarMisAsignaturas.php"><i class="fa fa-circle-o"></i>Mis Asignaturas</a></li><!-- class="active" -->
                    <li><a href="administrarElectivosDirectiva.php"><i class="fa fa-circle-o"></i>Electivos</a></li>
                    <li><a href="administrarAsignarDocenteAsignatura.php"><i class="fa fa-circle-o"></i>Asignar Docente</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Revisar Programa Asig.</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i>Programa Basico</a></li><!-- class="active" -->
                    <li><a href="#"><i class="fa fa-circle-o"></i>Programa Extenso</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>Programa Didáctico</a></li>
                </ul>
            </li>
            <li><a href="administrarPermisosUsuarios.php"><i class="fa fa-book"></i> <span>Permisos Usuarios</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>