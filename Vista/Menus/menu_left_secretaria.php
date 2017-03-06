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
                    <li><a href="administrarMallaCurricularSecretaria.php"><i class="fa fa-circle-o"></i>Ver Malla Curricular</a></li>
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
                    <li><a href="administrarElectivosSecretaria.php"><i class="fa fa-circle-o"></i>Electivos</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>