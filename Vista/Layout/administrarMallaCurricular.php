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
        <style type="text/css">
            .table {
                width: 100%;
                max-width: 100%;
                margin-bottom: 20px;

            }
            table {
                border-collapse: collapse;
                border-spacing: 0;
            }
            thead {
                display: table-header-group;
                vertical-align: middle;
                border-color: inherit;
                color: #fff;
                text-align: center;
                background-color: #0489B1;
                font: bold 100% monospace;
            }
            thead>td {
                height: 30px;
            }
            tbody {
                display: table-header-group;
                vertical-align: middle;
                border-color: inherit;
                background-color: #46C7EF;//#81DAF5;
            }
            tbody>td {
                border-width: 2px;
                border-style: solid; 
                border-color: #fff;
                text-align: center;
                word-wrap:break-word;
                width: 60px;
            }

            .recuadro-asig {
                height: 80px;
                background-color: #C1DEF8;
                padding-top: 10px;
                word-wrap: break-word;
            }
            .recuadro-asig a{
                color: black;
            }
        </style>

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
                        Datos Generales
                        <small>Editor</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Malla Curricular</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- CONTENIDO AQUI -->    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <!-- /.box-header -->
                                <form id="fm" method="POST">
                                    <div class="box-body">
                                        <div id="alert"></div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="m_id">Mallas Curriculares:</label>
                                                    <select class="form-control pull-right" id="m_id" name="m_id">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="m_fechaInicio">Fecha Inicio Periordo:</label>
                                                    <input type="date" class="form-control pull-right" id="m_fechaInicio" name="m_fechaInicio">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="m_fechaFin">Fecha Termino Periodo:</label>
                                                    <input type="date" class="form-control pull-right" id="m_fechaFin" name="m_fechaFin">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="m_cantidadSemestres">Cantidad de Semestres:</label>
                                                    <input type="number" class="form-control pull-right" min="1" id="m_cantidadSemestres" name="m_cantidadSemestres">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./box-body -->
                                    <div class="box-footer">                                    
                                        <button type="submit" class="btn btn-info pull-right">Guardar cambios</button>
                                    </div>
                                    <!-- /.box-footer -->
                                    <input type="hidden" name="accion" id="accion" value="ACTUALIZAR">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Malla Curricular</h3>
                                </div>
                                <div class="box-body">
                                    <table class="table">
                                        <thead id="thead">

                                        </thead>
                                        <tbody id="tbody">

                                        </tbody>
                                    </table>
                                </div>
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
        <div class="modal fade" id="modalNuevaAsignatura" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="fm-asignatura" method="POST">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Agregar Asignatura</h4>
                        </div>
                        <div class="modal-body">
                            <div id="modal-alert"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="ta_id">Tipo:</label>
                                        <select class="form-control" id="ta_id" name="ta_id" onchange="cambiaTipoAsignatura(this.value)"></select>
                                    </div>
                                    <div class="form-group">
                                        <label for="asig_codigo">Codigo:</label>
                                        <input type="text" class="form-control" id="asig_codigo" name="asig_codigo">
                                    </div>
                                    <div class="form-group">
                                        <label for="asig_nombre">Nombre:</label>
                                        <input type="text" class="form-control" id="asig_nombre" name="asig_nombre">
                                    </div>
                                    <div class="form-group">
                                        <label for="asig_periodo">Periodo:</label>
                                        <input type="text" class="form-control" id="asig_periodo" name="asig_periodo" value="" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="asig_creditos">Creditos:</label>
                                        <input type="number" class="form-control" id="asig_creditos" min="1" name="asig_creditos" value="">
                                    </div>
                                </div>
                            </div>     
                            <div class="row" id="row_prerrequisitos">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="button" class="btn btn-success" id="add_prerrequisito" name="add_prerrequisito" value="Agregar Prerrequisito" onclick="addPrerrequisito()">
                                    </div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td>Asignatura</td>
                                                <td>Accion</td>
                                            </tr>
                                        </thead>
                                        <tbody id="tabla_prerrequisito">

                                        </tbody>                                                
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="n_prerrequisito" name="n_prerrequisito" value="0">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </div>
                    </form>
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
        <!-- Usabilidad -->
        <script src="../../Files/js/usabilidad.js"></script>
        <script>
                                            $(function () {
                                                obtenerMallasCurriculares();
                                                obtenerTiposAsignaturas();
                                            });

                                            function obtenerMallasCurriculares() {
                                                $.get("../Servlet/administrarMalla.php", {accion: 'LISTADO'}, function (data) {
                                                    var data = eval(data);
                                                    var select = document.getElementById("m_id");
                                                    var count = 0;
                                                    $.each(data, function (k, v) {
                                                        var option = document.createElement("option");
                                                        option.text = v.m_fechaInicio + " al " + v.m_fechaFin + " | n° Semestres = " + v.m_cantidadSemestres;
                                                        option.value = v.m_id;
                                                        select.add(option);
                                                        count++;
                                                    });
                                                    if (count == 0) {
                                                        var option = document.createElement("option");
                                                        option.text = "Seleccionar...";
                                                        option.value = -1;
                                                        select.add(option);
                                                    } else {
                                                        cargar();
                                                    }
                                                });
                                            }

                                            function obtenerTiposAsignaturas() {
                                                $.get("../Servlet/administrarTipo_asignatura.php", {accion: 'LISTADO'}, function (data) {
                                                    var data = eval(data);
                                                    var select = document.getElementById("ta_id");
                                                    var count = 0;
                                                    $.each(data, function (k, v) {
                                                        var option = document.createElement("option");
                                                        option.text = v.ta_nombre;
                                                        option.value = v.ta_id;
                                                        select.add(option);
                                                        count++;
                                                    });
                                                    if (count == 0) {
                                                        var option = document.createElement("option");
                                                        option.text = "Seleccionar...";
                                                        option.value = -1;
                                                        select.add(option);
                                                    }
                                                });
                                            }

                                            function cargar() {
                                                var m_id = document.getElementById("m_id").value;
                                                $.get("../Servlet/administrarMalla.php", {accion: 'BUSCAR_BY_ID', m_id: m_id}, function (data) {
                                                    $('#m_fechaInicio').val(data.malla.m_fechaInicio);
                                                    $('#m_fechaFin').val(data.malla.m_fechaFin);
                                                    $('#m_cantidadSemestres').val(data.malla.m_cantidadSemestres);
                                                    generarTabla(data);
                                                }, "json");
                                            }
                                            /* Guardar Malla/. */
                                            $("#fm").submit(function (e) {
                                                if (validar()) {
                                                    console.log("Guardando  " + $("#fm").serialize());
                                                    $.post("../Servlet/administrarMalla.php", $("#fm").serialize(), function (data) {
                                                        console.log(data);
                                                        if (!data.success) {
                                                            notificacion(data.errorMsg, 'danger', 'alert');
                                                        } else {
                                                            notificacion(data.mensaje, 'success', 'alert');
                                                            $("#thead").empty();
                                                            $("#tbody").empty();
                                                            cargar();
                                                        }
                                                    }, "json");
                                                }
                                                e.preventDefault();
                                            });

                                            function validar() {
                                                var m_fechaInicio = document.getElementById("m_fechaInicio").value;
                                                var m_fechaFin = document.getElementById("m_fechaFin").value;
                                                var m_cantidadSemestres = document.getElementById("m_cantidadSemestres").value;
                                                if (m_fechaInicio == "") {
                                                    notificacion("Debe ingresar una fecha de inicio.", 'danger', 'alert');
                                                    return false;
                                                } else if (m_fechaFin == "") {
                                                    notificacion("Debe ingresar una fecha de termino.", 'danger', 'alert');
                                                    return false;
                                                } else if (m_fechaInicio > m_fechaFin) {
                                                    notificacion("La fecha de incio debe ser mayor a la de termino.", 'danger', 'alert');
                                                    return false;
                                                } else if (m_fechaInicio == m_fechaFin) {
                                                    notificacion("La fecha de termino no puede ser igual a la de inicio.", 'danger', 'alert');
                                                    return false;
                                                } else if (m_cantidadSemestres == "") {
                                                    notificacion("Debe ingresar la cantidad de semestres.", 'danger', 'alert');
                                                    return false;
                                                }
                                                return true;
                                            }
                                            /* ./Fin Guardar Malla */

                                            function generarTabla(data) {
                                                //THEAD
                                                $('#thead').append("<tr>");
                                                var n_anio = 0;
                                                var anio = "";
                                                for (var i = 1; i <= data.malla.m_cantidadSemestres; i++) {
                                                    if (i % 2 != 0) {
                                                        n_anio++;
                                                        anio = "Año " + n_anio;
                                                    }
                                                    $('#thead').append("<td>" + anio + " Per. " + i + "</td>");
                                                }
                                                $('#thead').append("</tr>");
                                                //TBODY
                                                $('#tbody').append("<tr>");
                                                for (var i = 1; i <= data.malla.m_cantidadSemestres; i++) {
                                                    $('#tbody').append("<td><button type='button' class='btn btn-block btn-default btn-sm' onClick='agregarAsignatura(" + i + ")'><i class='fa  fa-plus'></i></button></td>");
                                                }
                                                $('#tbody').append("</tr>");
                                                //FOR POR CANTIDAD MAXIMA ASIGNATURA
                                                //console.log(data);
                                                for (var fila = 0; fila < data.n_max_asignatuas; fila++) {//CANTIDAD DE FILAS
                                                    //FOR POR CANTIDAD DE SEMESTRES
                                                    $('#tbody').append("<tr>");
                                                    for (var col = 1; col <= data.malla.m_cantidadSemestres; col++) {//COLUMNAS                        
                                                        if (typeof data.asignatuas_malla[col][fila] == "undefined" || data.asignatuas_malla[col][fila] == null) {
                                                            $('#tbody').append("<td></td>");
                                                        } else {
                                                            if (data.asignatuas_malla[col][fila].ta_id == 3) {//Electivo
                                                                $('#tbody').append("<td><div class='recuadro-asig'><a href='editarAsignatura.php?cod=" + data.asignatuas_malla[col][fila].ge_codigo + "&ta_a=" + data.asignatuas_malla[col][fila].ta_id + "'>" + data.asignatuas_malla[col][fila].ge_nombre + "<br>(" + data.asignatuas_malla[col][fila].ge_codigo + ")</a></div></td>");
                                                            } else {
                                                                $('#tbody').append("<td><div class='recuadro-asig'><a href='editarAsignatura.php?cod=" + data.asignatuas_malla[col][fila].asig_codigo + "&ta_a=" + data.asignatuas_malla[col][fila].ta_id + "'>" + data.asignatuas_malla[col][fila].asig_nombre + "<br>(" + data.asignatuas_malla[col][fila].asig_codigo + ")</a></div></td>");
                                                            }
                                                        }
                                                    }
                                                    $('#tbody').append("</tr>");
                                                }
                                            }


                                            function agregarAsignatura(asig_periodo) {
                                                document.getElementById("fm-asignatura").reset();
                                                $('#asig_periodo').val(asig_periodo);

                                                document.getElementById("row_prerrequisitos").style.display = 'block';
                                                $('#n_prerrequisito').val(0);
                                                $('#tabla_prerrequisito').html("");

                                                $('#modalNuevaAsignatura').modal('show');
                                            }

                                            /* Guardar asignatura/. */
                                            $("#fm-asignatura").submit(function (e) {
                                                var m_id = $('#m_id').val();
                                                if (validarAsignatura()) {
                                                    $.post("../Servlet/administrarAsignatura.php", $("#fm-asignatura").serialize() + "&accion=AGREGAR&m_id=" + m_id, function (data) {
                                                        if (!data.success) {
                                                            notificacion(data.errorMsg, 'danger', 'modal-alert');
                                                        } else {
                                                            notificacion(data.mensaje, 'success', 'alert');
                                                            $('#modalNuevaAsignatura').modal('toggle');
                                                            $("#fm-asignatura")[0].reset();
                                                            $("#thead").empty();
                                                            $("#tbody").empty();
                                                            cargar();
                                                        }
                                                    }, "json");
                                                }
                                                e.preventDefault();
                                            });

                                            function validarAsignatura() {
                                                var asig_codigo = $("#asig_codigo").val();
                                                var asig_nombre = $("#asig_nombre").val();
                                                var asig_creditos = $("#asig_creditos").val();
                                                var ta_id = $('#ta_id').val();

                                                if (asig_codigo == "") {
                                                    notificacion("Debe ingresar el codigo de la asignatura.", 'danger', 'modal-alert');
                                                    return false;
                                                } else if (isNaN(asig_codigo)) {
                                                    notificacion("El codigo de la asignatura deben ser valores numericos.", 'danger', 'modal-alert');
                                                    return false;
                                                } else if (asig_nombre == "") {
                                                    notificacion("Debe ingresar el nombre de la asignatura.", 'danger', 'modal-alert');
                                                    return false;
                                                } else if (asig_creditos == "") {
                                                    notificacion("Debe ingresar la cantidad de creditos de la asignatura.", 'danger', 'modal-alert');
                                                    return false;
                                                } else if (isNaN(asig_creditos)) {
                                                    notificacion("La cantidad de creditos debe ser un valor numerico.", 'danger', 'modal-alert');
                                                    return false;
                                                } else if (asig_creditos == 0) {
                                                    notificacion("La cantidad de creditos debe ser mayor que cero.", 'danger', 'modal-alert');
                                                    return false;
                                                }
                                                /*SOLO HABILITADO EL AGREGAR ASIGNATURAS NORMALES*/
                                                if (ta_id == 1) {//NORMAL
                                                    //Validar que no se repitan los asig_codigos de los prerrequisitos
                                                    var codigos = [];
                                                    var n_prerrequisito = $("#n_prerrequisito").val();
                                                    for (var i = 0; i <= n_prerrequisito; i++) {
                                                        if ($("#cod_prerrequisito_" + i).val() != "undefined") {
                                                            var cod = $("#cod_prerrequisito_" + i).val();
                                                            var res = codigos.indexOf(cod);
                                                            if (res == -1) {
                                                                codigos[cod] = cod;
                                                            } else {
                                                                notificacion("No se pueden repetir los prerrequisitos.", 'danger', 'modal-alert');
                                                                return false;
                                                            }
                                                        }
                                                    }
                                                } else if (ta_id == 2) {//FORMACION INTEGRAL
                                                    //notificacion("Aun no esta habilitado el agregar formaciones integrales.", 'info', 'modal-alert');                                                    
                                                } else if (ta_id == 3) {//ELECTIVO
                                                    //notificacion("Aun no esta habilitado el agregar electivos.", 'info', 'modal-alert');
                                                }
                                                return true;
                                            }
                                            /* ./Fin Guardar asignatura */

                                            function addPrerrequisito() {
                                                var n_prerrequisito = $("#n_prerrequisito").val();
                                                var asig_periodo = $("#asig_periodo").val();
                                                var m_id = $('#m_id').val();

                                                $.get("../Servlet/administrarAsignatura.php", {accion: 'OBTENER_POSIBLES_PRERREQUISITOS', m_id: m_id, asig_periodo: asig_periodo}, function (data) {
                                                    var data = eval(data);

                                                    var select_html = "<tr id='tr_" + n_prerrequisito + "'><td><select class='form-control pull-right' id='cod_prerrequisito_" + n_prerrequisito + "' name='cod_prerrequisito_" + n_prerrequisito + "'></select></td><td><center><a class='btn btn-danger' onclick='removePrerrequisito(" + n_prerrequisito + ")'><i class='fa fa-trash'></i></a></center></td></tr>"
                                                    $("#tabla_prerrequisito").append(select_html);

                                                    var count = 0;
                                                    var select = document.getElementById("cod_prerrequisito_" + n_prerrequisito);
                                                    n_prerrequisito++;
                                                    $("#n_prerrequisito").val(n_prerrequisito);
                                                    $.each(data, function (k, v) {
                                                        var option = document.createElement("option");
                                                        option.text = v.asig_nombre;
                                                        option.value = v.asig_codigo;
                                                        select.add(option);
                                                        count++;
                                                    });
                                                    if (count == 0) {
                                                        var option = document.createElement("option");
                                                        option.text = "Seleccionar...";
                                                        option.value = -1;
                                                        select.add(option);
                                                    }
                                                });
                                            }

                                            function removePrerrequisito(n_prerrequisito) {
                                                $("#tr_" + n_prerrequisito).remove();
                                            }

                                            function cambiaTipoAsignatura() {
                                                var ta_id = $("#ta_id").val();
                                                if (ta_id == 1) {//Normal
                                                    document.getElementById("row_prerrequisitos").style.display = 'block';
                                                    $('#n_prerrequisito').val(0);
                                                    $('#tabla_prerrequisito').html("");
                                                } else if (ta_id == 2) {//Formación Integral
                                                    document.getElementById("row_prerrequisitos").style.display = 'none';
                                                    $('#n_prerrequisito').val(0);
                                                    $('#tabla_prerrequisito').html("");
                                                } else if (ta_id == 3) {//Electivo
                                                    document.getElementById("row_prerrequisitos").style.display = 'none';
                                                    $('#n_prerrequisito').val(0);
                                                    $('#tabla_prerrequisito').html("");
                                                }
                                            }
        </script>
    </body>
</html>
