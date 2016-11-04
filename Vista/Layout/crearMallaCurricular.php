<!DOCTYPE html>
<?php
session_start();
if ($_SESSION['autentificado'] != "SI") {
    header("Location: ../../../index.php");
}
$per_id = $_SESSION["per_id"];
$per_nombre = $_SESSION["per_nombre"];
$usu_nombre = $_SESSION["usu_nombre"];
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Control Malla Carrera</title>
        <link rel="shortcut icon" href="../../Files/img/favicon.ico">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="../../Files/Complementos/template_admin_lite/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../Files/Complementos/template_admin_lite/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="../../Files/Complementos/template_admin_lite/dist/css/skins/_all-skins.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="../../Files/Complementos/template_admin_lite/plugins/iCheck/flat/blue.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="../../Files/Complementos/template_admin_lite/plugins/morris/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="../../Files/Complementos/template_admin_lite/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="../../Files/Complementos/template_admin_lite/plugins/datepicker/datepicker3.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="../../Files/Complementos/template_admin_lite/plugins/daterangepicker/daterangepicker.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="../../Files/Complementos/template_admin_lite/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <!-- AQUI VA EL MENU SUPERIROR-->
            <?php
            if ($per_id == 1) {
                include '../Menus/menu_header_default.php';
            } else if ($per_id == 2) {
                include '../Menus/menu_header_default.php';
            } else if ($per_id == 3) {
                include '../Menus/menu_header_default.php';
            } else {
                include '../Menus/menu_header_default.php';
            }
            ?>
            <!-- FIN MENU SUPERIOR-->

            <!-- AQUI VA EL MENU LEFT-->
            <?php
            if ($per_id == 1) {
                include '../Menus/menu_left_default.php';
            } else if ($per_id == 2) {
                include '../Menus/menu_left_default.php';
            } else if ($per_id == 3) {
                include '../Menus/menu_left_default.php';
            } else {
                include '../Menus/menu_left_default.php';
            }
            ?>
            <!-- FIN MENU LEFT-->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Crear Malla
                        <small>Malla Curricular</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Crear Malla Curricular</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- CONTENIDO AQUI -->    
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Datos Malla Curricular</h3>
                                </div>
                                <!-- form start -->
                                <form id="fm" class="form-horizontal">
                                    <div class="box-body">
                                        <div id="alert"></div>
                                        <!-- Date -->
                                        <div class="form-group">
                                            <label for="m_fechaInicio" class="col-sm-4 control-label">Fecha Inicio Periordo:</label>
                                            <div class="input-group col-sm-7">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="date" class="form-control pull-right" id="m_fechaInicio" name="m_fechaInicio">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                        <!-- Date  -->
                                        <div class="form-group">
                                            <label for="m_fechaFin" class="col-sm-4 control-label">Fecha Termino Periodo:</label>
                                            <div class="input-group col-sm-7">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="date" class="form-control pull-right" id="m_fechaFin" name="m_fechaFin">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                        <div class="form-group">
                                            <label for="m_cantidadSemestres" class="col-sm-4 control-label">Cantidad de Semestres:</label>
                                            <div class="input-group col-sm-7">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar-plus-o"></i>
                                                </div>
                                                <input type="number" class="form-control pull-right" min="1" id="m_cantidadSemestres" name="m_cantidadSemestres">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">                                    
                                        <button type="submit" class="btn btn-info pull-right">Guardar</button>
                                    </div>
                                    <!-- /.box-footer -->
                                    <input type="hidden" name="accion" id="accion" value="AGREGAR">
                                </form>
                            </div>
                            <!-- /.box -->
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <span class="action-buttons">
                        <a href="https://twitter.com/ubbchile" target="_blank"><i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i></a>
                        <a href="https://www.facebook.com/ubiobiochile" target="_blank"><i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i></a>
                        <a href="https://www.flickr.com/photos/ubiobio" target="_blank"><i class="ace-icon fa fa-flickr bigger-150"></i></a>
                        <a href="http://cl.linkedin.com/in/ubiobio" target="_blank"><i class="ace-icon fa fa-linkedin-square blue bigger-150"></i></a>
                        <a href="https://www.youtube.com/user/udelbiobio" target="_blank"><i class="ace-icon fa fa-youtube red bigger-150"></i></a>
                    </span>
                </div>
                <strong>Universidad del Bío-Bío Todos los derechos reservados © 2014-2016</strong>

            </footer>
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        <!-- jQuery 2.2.3 -->
        <script src="../../Files/Complementos/template_admin_lite/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="../../Files/Complementos/template_admin_lite/bootstrap/js/bootstrap.min.js"></script>
        <!-- DataTables -->
        <script src="../../Files/Complementos/template_admin_lite/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../../Files/Complementos/template_admin_lite/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <!-- Slimscroll -->
        <script src="../../Files/Complementos/template_admin_lite/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="../../Files/Complementos/template_admin_lite/plugins/fastclick/fastclick.js"></script>

        <!-- AdminLTE App -->
        <script src="../../Files/Complementos/template_admin_lite/dist/js/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../../Files/Complementos/template_admin_lite/dist/js/demo.js"></script>
        <!-- Usabilidad -->
        <script src="../../Files/js/usabilidad.js"></script>
        <script>
            $("#fm").submit(function (e) {
                if (validar()) {
                    $.post("../Servlet/administrarMalla.php", $("#fm").serialize(), function (data) {
                        if (!data.success) {
                            notificacion(data.errorMsg, 'danger');
                        } else {
                            notificacion(data.mensaje, 'success');
                            location.href = 'administrarMallaCurricular.php';
                        }
                    }, "json");
                }
                e.preventDefault();
            });
            
            function validar() {                
                var m_fechaInicio = document.getElementById("m_fechaInicio").value;
                var m_fechaFin = document.getElementById("m_fechaFin").value;
                var m_cantidadSemestres = document.getElementById("m_cantidadSemestres").value;
                if(m_fechaInicio == ""){
                    notificacion("Debe ingresar una fecha de inicio.", 'danger');
                    return false;
                } else if(m_fechaFin == ""){
                    notificacion("Debe ingresar una fecha de termino.", 'danger');
                    return false;
                } else if(m_fechaInicio > m_fechaFin){
                    notificacion("La fecha de incio debe ser mayor a la de termino.", 'danger');
                    return false;
                }  else if(m_fechaInicio == m_fechaFin){
                    notificacion("La fecha de termino no puede ser igual a la de inicio.", 'danger');
                    return false;
                } else if(m_cantidadSemestres == ""){
                    notificacion("Debe ingresar la cantidad de semestres.", 'danger');
                    return false;
                }
                return true;
            }
        </script>
    </body>
</html>
