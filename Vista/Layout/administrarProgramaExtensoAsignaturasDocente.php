<!DOCTYPE html>
<?php
session_start();
if ($_SESSION['autentificado'] != "SI") {
    header("Location: ../../index.php");
}
$per_id = $_SESSION["per_id"];
$per_nombre = $_SESSION["per_nombre"];
$usu_nombre = $_SESSION["usu_nombre"];

$asig_codigo = htmlspecialchars($_REQUEST['cod']);

include_once '../../Controlador/Contenedor.php';
$control = Contenedor::getInstancia();
$asignatura = $control->getAsignaturaByID($asig_codigo);
$tipo_asignatura = $control->getTipo_asignaturaByID($asignatura->getTa_id());
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
        <!-- bootstrap Select-->
        <link rel="stylesheet" href="../../Files/Complementos/template_admin_lite/plugins/bootstrap-select-1.12.1/dist/css/bootstrap-select.css">

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
                        Programa Extenso
                        <small>Asignaturas</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Programa Extenso</li>
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
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="m_id">Mallas Curricular:</label>
                                                <input type="text" class="form-control" id="m_id" name="m_id" value="<?= $asignatura->getM_id()?>"onchange="obtenerAsignaturas()" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="asig_codigo">Asignatura:</label>
                                                <input type="hidden" id="asig_codigo" name="asig_codigo" value="<?= $asignatura->getAsig_codigo()?>">
                                                <input type="text" class="form-control" id="asig_codigo" name="asig_codigo" value="<?= $asignatura->getAsig_nombre()?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ./box-body -->
                                <div class="box-footer">                                    
                                    <button class="btn btn-info pull-right" onclick="crearProgramaExtenso()"><i class="glyphicon glyphicon-plus"></i> Crear Nuevo Programa</button>&nbsp;&nbsp;
                                </div>
                                <!-- /.box-footer -->
                            </div>
                        </div>
                    </div>
                    <div class="row" id="historico-programas">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Historico: Programas Extenso</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Fecha Modificación</th>
                                                <th>Cód. Malla</th>
                                                <th>Semestre</th>
                                                <th>Asignatura</th>
                                                <th>Carrera</th>
                                                <th>Facultad</th>
                                                <th>Autor</th>
                                                <th>Estado</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
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
        <div class="modal fade" id="modalSinProgramaAsignatura" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #3c8dbc; color: #fff;" >
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Información</h4>
                    </div>
                    <div class="modal-body">
                        <h4>La asignatura no tiene un programa extenso creado, ¿Desea crear un nuevo programa?.</h4>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="asig_codigo_remove" id="asig_codigo_remove" value="">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-info" onclick="crearProgramaExtenso()">Crear</button>
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
        <!-- bootstrap Select-->
        <script src="../../Files/Complementos/template_admin_lite/plugins/bootstrap-select-1.12.1/dist/js/bootstrap-select.js"></script>
        <!-- Usabilidad -->
        <script src="../../Files/js/usabilidad.js"></script>

        <script>
                            $(function () {
                                document.getElementById("historico-programas").style.display = 'none';
                                buscarProgramasExtenso();
                            });

                            function buscarProgramasExtenso() {
                                var asig_codigo = document.getElementById("asig_codigo").value;
                                $.get("../Servlet/administrarPrograma_extenso.php", {accion: 'BUSCAR_BY_ASIG_CODIGO', asig_codigo: asig_codigo}, function (data) {
                                    if (data.length > 0) {
                                        //AQui Cargar la tabla con los programa de la asignatura el historico
                                        $("#tbody").empty();
                                        $.each(data, function (k, v) {
                                            var contenido = "";
                                            if (v.pe_borrador == 0) {
                                                contenido = "<tr class='success'>";
                                            } else if (v.pe_borrador == 1) {
                                                contenido = "<tr>";
                                            } else if (v.pe_borrador == 2) {
                                                contenido = "<tr class='warning'>";
                                            } else if (v.pe_borrador == 3) {
                                                contenido = "<tr class='danger'>";
                                            }
                                            contenido += "<td>" + v.pe_id + "</td>";
                                            contenido += "<td>" + v.pe_fecha_modificacion + "</td>";
                                            contenido += "<td>" + v.m_id + "</td>";
                                            if (v.pe_semestre == null) {
                                                contenido += "<td></td>";
                                            } else {
                                                contenido += "<td>" + v.pe_semestre + "</td>";
                                            }
                                            contenido += "<td>" + v.asig_nombre + "</td>";
                                            contenido += "<td>" + v.pe_carrera + "</td>";
                                            contenido += "<td>" + v.pe_facultad + "</td>";
                                            contenido += "<td>" + v.usu_nombres + " " + v.usu_apellidos + "</td>";
                                            
                                            if (v.pe_borrador == 0) {
                                                contenido += "<td>Aprobada</td>";
                                            } else if (v.pe_borrador == 1) {
                                                contenido += "<td>Borrador</td>";
                                            } else if (v.pe_borrador == 2) {
                                                contenido += "<td>Pendiente de Revizar</td>";
                                            } else if (v.pe_borrador == 3) {
                                                contenido += "<td>Rechazada</td>";
                                            }
                                            contenido += "<td>";
                                            console.log(v.pe_borrador);
                                            if (v.pe_borrador == 0) {
                                                contenido += "<button type='button' class='btn btn-success btn-circle glyphicon glyphicon-search'  onclick='ver(" + v.pe_id + ")'></button>";
                                            } else if (v.pe_borrador == 1) {
                                                contenido += "<button type='button' class='btn btn-warning btn-circle glyphicon glyphicon-pencil'  onclick='editar(" + v.pe_id + ")'></button>";
                                            } else if (v.pe_borrador == 2) {
                                                contenido += "<button type='button' class='btn btn-success btn-circle glyphicon glyphicon-search'  onclick='ver(" + v.pe_id + ")'></button>";
                                            } else if (v.pe_borrador == 3) {
                                                contenido += "<button type='button' class='btn btn-success btn-circle glyphicon glyphicon-search'  onclick='ver(" + v.pe_id + ")'></button>";
                                            }
                                            contenido += "</td>";
                                            contenido += "</tr>";
                                            $("#tbody").append(contenido);
                                        });
                                        $("#table").DataTable();
                                        document.getElementById("historico-programas").style.display = 'block';
                                    } else {
                                        document.getElementById("historico-programas").style.display = 'none';
                                        $('#modalSinProgramaAsignatura').modal('show');
                                    }
                                }, "json");
                            }

                            function crearProgramaExtenso() {
                                var asig_codigo = document.getElementById("asig_codigo").value;
                                window.location = "crearProgramaExtensoAsignaturasDocente.php?asig_codigo=" + asig_codigo;
                            }


                            function editar(pe_id) {
                                window.location = "editarProgramaExtensoAsignaturasDocente.php?pe_id=" + pe_id;
                            }

                            function ver(pe_id) {
                                window.location = "verProgramaExtensoAsignaturasDocente.php?pe_id=" + pe_id;
                            }
        </script>
    </body>
</html>
