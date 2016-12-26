<!DOCTYPE html>
<?php
session_start();
if ($_SESSION['autentificado'] != "SI") {
    header("Location: ../../index.php");
}
$per_id = $_SESSION["per_id"];
$per_nombre = $_SESSION["per_nombre"];
$usu_nombre = $_SESSION["usu_nombre"];
$usu_rut_editar = $_REQUEST['usu_rut'];
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
                include '../Menus/menu_header_docente.php';
            } else if ($per_id == 2) {
                include '../Menus/menu_header_directiva.php';
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
                include '../Menus/menu_left_docente.php';
            } else if ($per_id == 2) {
                include '../Menus/menu_left_directiva.php';
            } else if ($per_id == 3) {
                include '../Menus/menu_left_secretaria.php';
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
                        Permisos de Usuarios
                        <!--<small>Control panel</small>-->
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="administrarPermisosUsuarios.php">Permisos Usuarios</a></li>
                        <li class="active">Modificar Permiso</li>
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
                                    <h3 class="box-title">Modificar Permiso</h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                <form id="fm" class="form-horizontal">
                                    <div class="box-body">
                                        <div id="alert"></div>
                                        <div class="form-group">
                                            <label for="usu_rut" class="col-sm-2 control-label">Rut</label>
                                            <div class="col-sm-10">
                                                <input type="usu_rut" class="form-control" id="usu_rut" name="usu_rut" value="<?php echo $usu_rut_editar; ?>" placeholder="Rut" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="usu_nombres" class="col-sm-2 control-label">Nombres</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="usu_nombres" name="usu_nombres" placeholder="Nombres" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="usu_apellidos" class="col-sm-2 control-label">Apellidos</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="usu_apellidos" name="usu_apellidos" placeholder="Apellidos" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="per_id" class="col-sm-2 control-label">Permiso</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="per_id" name="per_id">
                                                    <option value="-1">Seleccionar...</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <button type="button" class="btn btn-default" onclick="window.location = 'administrarPermisosUsuarios.php';">Volver atras</button>
                                        <button type="submit" class="btn btn-info pull-right">Guardar Cambios</button>
                                    </div>
                                    <!-- /.box-footer -->
                                    <input type="hidden" name="accion" id="accion" value="AGREGAR">
                                </form>
                            </div>
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
                                            $(function () {
                                                obtenerPermisos();
                                            });

                                            function obtenerPermisos() {
                                                $.get("../Servlet/administrarPerfil.php", {accion: 'LISTADO'}, function (data) {
                                                    var data = eval(data);
                                                    var select = document.getElementById("per_id");
                                                    $.each(data, function (k, v) {
                                                        var option = document.createElement("option");
                                                        option.text = v.per_nombre;
                                                        option.value = v.per_id;
                                                        select.add(option);
                                                    });
                                                    cargar();
                                                });
                                            }
                                            function cargar() {
                                                var usu_rut = document.getElementById("usu_rut").value;
                                                $.get("../Servlet/administrarUsuario.php", {accion: 'BUSCAR_BY_ID', usu_rut: usu_rut}, function (data) {
                                                    $('#usu_nombres').val(data.usu_nombres);
                                                    $('#usu_apellidos').val(data.usu_apellidos);
                                                    if (data.per_id != '')
                                                        $('#per_id').val(data.per_id);
                                                }, "json");
                                            }

                                            $("#fm").submit(function (e) {
                                                var permiso = document.getElementById("per_id").value;
                                                if (permiso != -1) {
                                                    $.post("../Servlet/administrarPermiso_usuario.php", $("#fm").serialize(), function (data) {                                                        
                                                        if (!data.success) {
                                                            notificacion(data.errorMsg, 'danger','alert');
                                                        } else {
                                                            notificacion(data.mensaje, 'success','alert');
                                                            //location.href = 'administrarPermisosUsuarios.php';
                                                        }
                                                    }, "json");
                                                }else{
                                                    notificacion('Debe seleccionar un permiso', 'info','alert')
                                                }
                                                e.preventDefault();
                                            });
        </script>
    </body>
</html>
