<!DOCTYPE html>
<?php
session_start();
if ($_SESSION['autentificado'] != "SI") {
    header("Location: ../../index.php");
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
                        Electivos
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Electivos</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- CONTENIDO AQUI -->    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div id="alert"></div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="m_id">Mallas Curriculares:</label>
                                                <select class="form-control pull-right" id="m_id" name="m_id" onchange="cargar()">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ./box-body -->
                            </div>
                        </div>
                    </div>

                    <div class="row" id="row-listado-electivos">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Listado Electivos</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Nombre</th>
                                                <th>Semestre</th>
                                                <th>Creditos</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
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

        <!-- modal -->
        <div class="modal fade" id="modalNuevaAsignatura" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="fm-asignatura" method="POST">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Datos Electivo</h4>
                        </div>
                        <div class="modal-body">
                            <div id="modal-alert"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="asig_codigo">Codigo:</label>
                                        <input type="text" class="form-control" id="asig_codigo" name="asig_codigo">
                                    </div>
                                    <div class="form-group">
                                        <label for="asig_nombre">Nombre:</label>
                                        <input type="text" class="form-control" id="asig_nombre" name="asig_nombre">
                                    </div>
                                    <div class="form-group">
                                        <label for="asig_periodo">Semestre:</label>
                                        <input type="number" class="form-control" id="asig_periodo" name="asig_periodo" min="1" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="asig_creditos">Creditos:</label>
                                        <input type="number" class="form-control" id="asig_creditos" min="1" name="asig_creditos" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="ta_id" name="ta_id" value="3">
                            <input type="hidden" id="accion" name="accion">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- modal -->
        <div class="modal fade" id="modalConfirmacionEliminarElectivo" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #3c8dbc; color: #fff;" >
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Confirmación</h4>
                    </div>
                    <div class="modal-body">
                        <h4>¿Esta seguro de eliminar el electivo?, una vez eliminado no se podra recuperrar la información.</h4>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="asig_codigo_remove" id="asig_codigo_remove" value="">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-danger" onclick="confirmaEliminarElectivo()">Eliminar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

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
                                document.getElementById('row-listado-electivos').style.display = 'none';
                                obtenerMallasCurriculares();
                            });

                            function obtenerMallasCurriculares() {
                                $.get("../Servlet/administrarMalla.php", {accion: 'LISTADO'}, function (data) {
                                    var data = eval(data);
                                    var select = document.getElementById("m_id");
                                    var count = 0;
                                    $.each(data, function (k, v) {
                                        var option = document.createElement("option");
                                        option.text = v.m_id;
                                        option.value = v.m_id;
                                        select.add(option);
                                        count++;
                                    });
                                    if (count == 0) {
                                        var option = document.createElement("option");
                                        option.text = "Seleccionar...";
                                        option.value = -1;
                                        select.add(option);
                                        document.getElementById('row-listado-electivos').style.display = 'none';
                                    } else {
                                        cargar();
                                    }
                                });
                            }

                            function cargar() {
                                var m_id = document.getElementById("m_id").value;
                                $.get("../Servlet/administrarAsignatura.php", {accion: 'LISTADO_ELECTIVOS_BY_M_ID', m_id: m_id}, function (data) {
                                    var data = eval(data);
                                    if (data.length > 0) {
                                        document.getElementById('row-listado-electivos').style.display = 'block';
                                        $("#thead").empty();
                                        $("#tbody").empty();
                                        $.each(data, function (k, v) {
                                            var contenido = "<tr>";
                                            contenido += "<td>" + v.asig_codigo + "</td>";
                                            contenido += "<td>" + v.asig_nombre + "</td>";
                                            contenido += "<td>" + v.asig_periodo + "</td>";
                                            contenido += "<td>" + v.asig_creditos + "</td>";
                                            contenido += "<td>";
                                            contenido += "<a class='btn btn-success btn-circle glyphicon glyphicon-search' href='verAsignatura.php?cod=" + v.asig_codigo + "'></a>&nbsp;";
                                            contenido += "</td>";
                                            contenido += "</tr>";
                                            $("#tbody").append(contenido);
                                        });
                                        $("#table").DataTable();
                                    } else {
                                        document.getElementById('row-listado-electivos').style.display = 'none';
                                    }
                                });
                            }

                            function editar(asig_codigo) {
                                document.getElementById("fm-asignatura").reset();
                                document.getElementById("fm-asignatura").reset();
                                document.getElementById("asig_codigo").readOnly = true;
                                $('#accion').val('MODIFICAR_ELECTIVO');

                                $.get("../Servlet/administrarAsignatura.php", {accion: 'BUSCAR_BY_ID', asig_codigo: asig_codigo}, function (data) {
                                    var asig_codigo = $("#asig_codigo").val(data.asig_codigo);
                                    var asig_nombre = $("#asig_nombre").val(data.asig_nombre);
                                    var asig_periodo = $("#asig_periodo").val(data.asig_periodo);
                                    var asig_creditos = $("#asig_creditos").val(data.asig_creditos);
                                    $('#modalNuevaAsignatura').modal('show');
                                }, 'json');
                            }

        </script>
    </body>
</html>
