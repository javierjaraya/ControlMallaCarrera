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
                        Programas Asignaturas
                        <small>Aprobados</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="administrarMallaCurricularDirectiva.php">Malla Curricular</a></li>
                        <li class="active">Programas Asignaturas Aprobados</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- CONTENIDO AQUI -->    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <!-- /.box-header -->
                                <form id="fm" action="" method="POST">
                                    <div class="box-body">
                                        <div id="alert"></div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="m_id">Malla Curricular:</label>
                                                    <select class="form-control pull-right selectpicker" data-live-search="true" id="m_id" name="m_id">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="m_fechaInicio">Fecha Inicio:</label>
                                                    <input type="date" class="form-control pull-right" id="m_fechaInicio" name="m_fechaInicio">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="m_fechaFin">Fecha Termino:</label>
                                                    <input type="date" class="form-control pull-right" id="m_fechaFin" name="m_fechaFin">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./box-body -->
                                    <div class="box-footer">                                    
                                        <a onclick="buscarProgramas()" class="btn btn-success pull-right"><i class="glyphicon glyphicon-search"></i>  Buscar Programas</a>
                                        <a href="administrarMallaCurricularDirectiva.php" class="btn btn-default pull-right" style="margin-right: 10px;"><i class="glyphicon glyphicon-arrow-left"></i> Volver Atras</a>
                                    </div>
                                    <!-- /.box-footer -->
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="historico-programas">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Aprobados: Programas Basicos, Extensos y Didacticos</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Programa</th>
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
                        <h4>No se encontraros programas de asignaturas Aprobados en el rango de fechas ingresado.</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- jQuery 2.2.3 -->
        <script src="../../Files/Complementos/template_admin_lite/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="../../Files/Complementos/template_admin_lite/dist/js/jquery-ui.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="../../Files/Complementos/template_admin_lite/bootstrap/js/bootstrap.min.js"></script>
        <!-- Morris.js charts -->
        <!--<script src="../../Files/Complementos/template_admin_lite/dist/js/raphael-min.js"></script>
        <script src="../../Files/Complementos/template_admin_lite/plugins/morris/morris.min.js"></script>-->
        <!-- Sparkline -->
        <script src="../../Files/Complementos/template_admin_lite/plugins/sparkline/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="../../Files/Complementos/template_admin_lite/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="../../Files/Complementos/template_admin_lite/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="../../Files/Complementos/template_admin_lite/plugins/knob/jquery.knob.js"></script>
        <!-- daterangepicker -->
        <script src="../../Files/Complementos/template_admin_lite/dist/js/moment.min.js"></script>
        <script src="../../Files/Complementos/template_admin_lite/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- datepicker -->
        <script src="../../Files/Complementos/template_admin_lite/plugins/datepicker/bootstrap-datepicker.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="../../Files/Complementos/template_admin_lite/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- Slimscroll -->
        <script src="../../Files/Complementos/template_admin_lite/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="../../Files/Complementos/template_admin_lite/plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="../../Files/Complementos/template_admin_lite/dist/js/app.min.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <!--<script src="../../Files/Complementos/template_admin_lite/dist/js/pages/dashboard.js"></script>-->
        <!-- AdminLTE for demo purposes -->
        <script src="../../Files/Complementos/template_admin_lite/dist/js/demo.js"></script>
        <!-- bootstrap Select-->
        <script src="../../Files/Complementos/template_admin_lite/plugins/bootstrap-select-1.12.1/dist/js/bootstrap-select.js"></script>
        <!-- Usabilidad -->
        <script src="../../Files/js/usabilidad.js"></script>

        <script>
                                            $(function () {
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
                                                    }
                                                    $('#m_id').selectpicker('refresh');
                                                });
                                            }

                                            function buscarProgramas() {
                                                if (validar()) {
                                                    var m_id = document.getElementById("m_id").value;
                                                    var m_fechaInicio = document.getElementById("m_fechaInicio").value;
                                                    var m_fechaFin = document.getElementById("m_fechaFin").value;
                                                    $("#tbody").empty();
                                                    $.get("../Servlet/administrarMalla.php", {accion: 'OBTENER_PROGRAMAS_APROBADOS_PERIODO', m_id: m_id, m_fechaInicio: m_fechaInicio, m_fechaFin: m_fechaFin}, function (data) {
                                                        var data = eval(data);
                                                        var count = 0;
                                                        $.each(data, function (k, v) {
                                                            var programa;
                                                            var id;
                                                            var fechaModificacion;
                                                            var codigoMalla;
                                                            var semestre;
                                                            var asignatura;
                                                            var carrera;
                                                            var facultad;
                                                            var autor;
                                                            var estado;
                                                            if (v.pb) {
                                                                programa = "Basico"
                                                                id = v.programa.pb_id;
                                                                fechaModificacion = v.programa.pb_fecha_modificacion;
                                                                codigoMalla = v.programa.m_id;
                                                                semestre = v.programa.pb_semestre;
                                                                asignatura = v.programa.asig_nombre;
                                                                carrera = v.programa.pb_carrera;
                                                                facultad = v.programa.pb_facultad;
                                                                autor = v.programa.usu_nombres;
                                                                estado = "Aprobado";
                                                            } else if (v.pe) {
                                                                programa = "Extenso"
                                                                id = v.programa.pe_id;
                                                                fechaModificacion = v.programa.pe_fecha_modificacion;
                                                                codigoMalla = v.programa.m_id;
                                                                semestre = v.programa.pe_semestre;
                                                                asignatura = v.programa.asig_nombre;
                                                                carrera = v.programa.pe_carrera;
                                                                facultad = v.programa.pe_facultad;
                                                                autor = v.programa.usu_nombres + " " + v.programa.usu_apellidos;
                                                                estado = "Aprobado";
                                                            } else if (v.pd) {
                                                                programa = "Didactico"
                                                                id = v.programa.pd_id;
                                                                fechaModificacion = v.programa.pd_fecha_modificacion;
                                                                codigoMalla = v.programa.asignatura.m_id;
                                                                semestre = v.programa.programa_extenso.pe_semestre;
                                                                asignatura = v.programa.asignatura.asig_nombre;
                                                                carrera = v.programa.programa_extenso.pe_carrera;
                                                                facultad = v.programa.programa_extenso.pe_facultad;
                                                                autor = v.programa.autor;
                                                                estado = "Aprobado";
                                                            }

                                                            var contenido = "<tr>";
                                                            contenido += "<td>" + programa + "</td>";
                                                            contenido += "<td>" + fechaModificacion + "</td>";
                                                            contenido += "<td>" + codigoMalla + "</td>";
                                                            contenido += "<td>" + semestre + "</td>";
                                                            contenido += "<td>" + asignatura + "</td>";
                                                            contenido += "<td>" + carrera + "</td>";
                                                            contenido += "<td>" + facultad + "</td>";
                                                            contenido += "<td>" + autor + "</td>";
                                                            contenido += "<td>" + estado + "</td>";
                                                            contenido += "<td>";
                                                            if (v.pb) {
                                                                contenido += "<button type='button' class='btn btn-success btn-circle glyphicon glyphicon-search'  onclick='verProgramaBasico(" + id + ")'></button>";
                                                            } else if (v.pe) {
                                                                contenido += "<button type='button' class='btn btn-success btn-circle glyphicon glyphicon-search'  onclick='verProgramaExtenso(" + id + ")'></button>";
                                                            } else if (v.pd) {
                                                                contenido += "<button type='button' class='btn btn-success btn-circle glyphicon glyphicon-search'  onclick='verProgramaDidactico(" + id + ")'></button>";
                                                            }
                                                            contenido += "</td>";
                                                            contenido += "</tr>";
                                                            $("#tbody").append(contenido);
                                                            
                                                            count++;
                                                        });
                                                        if (count == 0) {
                                                            $('#modalSinProgramaAsignatura').modal('show');
                                                        }
                                                    });
                                                }

                                            }

                                            function validar() {
                                                var m_id = document.getElementById("m_id").value;
                                                var m_fechaInicio = document.getElementById("m_fechaInicio").value;
                                                var m_fechaFin = document.getElementById("m_fechaFin").value;

                                                if (m_id == "") {
                                                    notificacion("Debe seleccionar una malla.", 'danger', 'alert');
                                                    return false;
                                                } else if (m_fechaInicio == "") {
                                                    notificacion("Debe ingresar una fecha de inicio.", 'danger', 'alert');
                                                    return false;
                                                } else if (m_fechaFin == "") {
                                                    notificacion("Debe ingresar una fecha de termino.", 'danger', 'alert');
                                                    return false;
                                                } else if (m_fechaInicio > m_fechaFin) {
                                                    notificacion("La fecha de incio debe ser menor a la de termino.", 'danger', 'alert');
                                                    return false;
                                                } else if (m_fechaInicio == m_fechaFin) {
                                                    notificacion("La fecha de termino no puede ser igual a la de inicio.", 'danger', 'alert');
                                                    return false;
                                                }
                                                return true;
                                            }
                                            
                                            function verProgramaBasico (id) {
                                                window.location = "verProgramaBasicoAsignaturasDirectiva.php?pb_id=" + id;
                                            }
                                            function verProgramaExtenso (id) {
                                                window.location = "verProgramaExtensoAsignaturasDirectiva.php?pe_id=" + id;
                                            }
                                            function verProgramaDidactico (id) {
                                                window.location = "verProgramaDidacticoAsignaturasDirectiva.php?pd_id=" + id;
                                            }

        </script>
    </body>
</html>
