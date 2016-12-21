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

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <style type="text/css">
            .blue {
                color: #478fca!important;
            }
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
                        Asignatura
                        <small>Editor</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="administrarMallaCurricular.php"> Malla Curricular</a></li>
                        <li class="active">Asignatura</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- CONTENIDO AQUI -->
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Datos Asignatura</h3>
                                </div>
                                <!-- form start -->
                                <form id="fm-asignatura" class="form-horizontal" method="POST">
                                    <div class="box-body">
                                        <div id="alert"></div>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div col-md-12>
                                                    <div class="col-xs-12 col-lg-6">
                                                        <div class="form-group">
                                                            <label class="col-sm-3 col-xs-12 blue">Codigo</label>
                                                            <input type="hidden" id="asig_codigo" name="asig_codigo" value="<?= $asig_codigo ?>">
                                                            <label class="col-sm-6 col-xs-12"><?= $asig_codigo ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-6">
                                                        <div class="form-group">
                                                            <label class="col-sm-3 col-xs-12 blue" for="asig_nombre">Nombre</label>
                                                            <label class="col-sm-6 col-xs-12"><?= $asignatura->getAsig_nombre() ?></label>                                                     
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-6">
                                                        <div class="form-group">
                                                            <label class="col-sm-3 col-xs-12 blue">Tipo Asignatura</label>
                                                            <label class="col-sm-6 col-xs-12"><?= $tipo_asignatura->getTa_nombre() ?></label>
                                                            <input type="hidden" id="ta_id" name="ta_id" value="<?= $asignatura->getTa_id() ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-6">
                                                        <div class="form-group">
                                                            <label class="col-sm-3 col-xs-12 blue">Semestre</label>
                                                            <input type="hidden" id="asig_periodo" name="asig_periodo" value="">
                                                            <label class="col-sm-9 col-xs-12" id='text_asig_periodo'></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-6">
                                                        <div class="form-group">
                                                            <label class="col-sm-3 col-xs-12 blue">Malla</label>
                                                            <input type="hidden" id="m_id" name="m_id" value="">
                                                            <label class="col-sm-9 col-xs-12" id='text_m_id'></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-6">
                                                        <div class="form-group">
                                                            <label class="col-sm-3 col-xs-12 blue" for="asig_creditos">Creditos</label>   
                                                            <label class="col-sm-6 col-xs-12"><?= $asignatura->getAsig_creditos() ?></label>  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row" id="row_prerrequisitos">
                                                <div class="col-md-3">

                                                </div>
                                                <div class="col-md-6">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <td>Prerrequisitos</td>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tabla_prerrequisito">

                                                        </tbody>                                                
                                                    </table>
                                                </div>
                                                <div class="col-md-3">

                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer" style="text-align: right;" id="botonera">  
                                        <input type="hidden" id="n_prerrequisito" name="n_prerrequisito" value="">
                                        <a class="btn btn-default" onclick="verProgramaBasico()">Programa Basico</a>
                                        <a class="btn btn-default" onclick="verProgramaExtenso()">Programa Extenso</a>
                                        <!--<a class="btn btn-default" onclick="verProgramaDidactico()">Programa Didactico</a>-->
                                    </div>
                                    <!-- /.box-footer -->
                                </form>
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
        <div class="modal fade" id="modalConfirmacionEliminarAsignatura" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #3c8dbc; color: #fff;" >
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Confirmación</h4>
                    </div>
                    <div class="modal-body">
                        <h4>¿Esta seguro de eliminar la asignatura?, una vez eliminada no se podra recuperrar la información.</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-danger" onclick="confirmaEliminarAsignatura()">Eliminar</button>
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
        <!-- Usabilidad -->
        <script src="../../Files/js/usabilidad.js"></script>

        <script>
                            $(function () {
                                obtenerDatosAsignatura();
                            });

                            function obtenerDatosAsignatura() {
                                var asig_codigo = $('#asig_codigo').val();
                                var ta_id = $('#ta_id').val();
                                if (ta_id == 3) {
                                    $.get("../Servlet/administrarGrupo_electivo.php", {accion: 'BUSCAR_BY_ID', ge_codigo: asig_codigo}, function (data) {
                                        $('#asig_nombre').val(data.ge_nombre);
                                        $('#asig_creditos').val(data.ge_creditos);
                                        $('#text_asig_periodo').html(data.ge_periodo);
                                        $('#asig_periodo').val(data.ge_periodo);
                                        $('#text_m_id').html(data.m_id);
                                        $('#m_id').val(data.m_id);
                                        habilitarCampos();
                                    }, "json");
                                } else {
                                    $.get("../Servlet/administrarAsignatura.php", {accion: 'BUSCAR_BY_ID', asig_codigo: asig_codigo}, function (data) {
                                        $('#asig_nombre').val(data.asig_nombre);
                                        $('#asig_creditos').val(data.asig_creditos);
                                        $('#text_asig_periodo').html(data.asig_periodo);
                                        $('#asig_periodo').val(data.asig_periodo);
                                        $('#text_m_id').html(data.m_id);
                                        $('#m_id').val(data.m_id);
                                        habilitarCampos();
                                    }, "json");
                                }


                            }

                            function habilitarCampos() {
                                var ta_id = $('#ta_id').val();
                                if (ta_id == 1) {//Normal
                                    document.getElementById("row_prerrequisitos").style.display = 'block';
                                    $('#n_prerrequisito').val(0);
                                    $('#tabla_prerrequisito').html("");
                                    obtenerPrerrequisitos();
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

                            function obtenerPrerrequisitos() {
                                var asig_codigo = $('#asig_codigo').val();
                                $.get("../Servlet/administrarPrerrequisito.php", {accion: 'OBTENER_PRERREQUISITOS', asig_codigo: asig_codigo}, function (data) {
                                    $.each(data, function (k, v) {
                                        mostrarPrerrequisitoGuardado(v.asig_codigo_prerrequisito);
                                    });
                                }, "json");
                            }

                            function mostrarPrerrequisitoGuardado(asig_codigo_prerrequisito) {
                                var n_prerrequisito = $("#n_prerrequisito").val();
                                var asig_periodo = $("#asig_periodo").val();
                                var m_id = $('#m_id').val();

                                var n_aux = n_prerrequisito;
                                n_prerrequisito++;
                                $("#n_prerrequisito").val(n_prerrequisito);
                                $.get("../Servlet/administrarAsignatura.php", {accion: 'OBTENER_POSIBLES_PRERREQUISITOS', m_id: m_id, asig_periodo: asig_periodo}, function (data) {
                                    var data = eval(data);

                                    var select_html = "<tr id='tr_" + n_aux + "'><td><select class='form-control pull-right' id='cod_prerrequisito_" + n_aux + "' name='cod_prerrequisito_" + n_aux + "'  disabled='disabled'></select></td></tr>"
                                    $("#tabla_prerrequisito").append(select_html);

                                    var count = 0;
                                    var select = document.getElementById("cod_prerrequisito_" + n_aux);

                                    $.each(data, function (k, v) {
                                        var option = document.createElement("option");
                                        option.text = v.asig_nombre;
                                        option.value = v.asig_codigo;
                                        select.add(option);
                                        count++;
                                    });
                                    if (count == 0) {
                                        var option = document.createElement("option");
                                        option.text = "No tiene Prerrequisitos";
                                        option.value = -1;
                                        select.add(option);
                                    } else {
                                        select.selectedIndex = asig_codigo_prerrequisito;
                                        select.value = asig_codigo_prerrequisito;
                                    }
                                });
                            }

                            function verProgramaBasico() {
                                var asig_codigo = $('#asig_codigo').val();
                                $.get("../Servlet/administrarPrograma_basico.php", {accion: 'BUSCAR_VERSION_FINAL_BY_ASIG_CODIGO', asig_codigo: asig_codigo}, function (data) {
                                    if (data.errorMsg) {
                                        notificacion(data.errorMsg, 'info', 'alert');
                                    } else {
                                        console.log(data);
                                        window.location = "verProgramaBasicoAsignaturasSecretaria.php?pb_id=" + data.pb_id;
                                    }
                                }, "json");
                            }

                            function verProgramaExtenso() {
                                /*var asig_codigo = $('#asig_codigo').val();
                                 $.get("../Servlet/administrarPrograma_extenso.php", {accion: 'BUSCAR_VERSION_FINAL_BY_ASIG_CODIGO', asig_codigo: asig_codigo}, function (data) {
                                 if (data.errorMsg) {
                                 notificacion(data.errorMsg, 'info', 'alert');
                                 } else {
                                 window.location = "verProgramaExtensoAsignaturasSecretaria.php?pe_id=" + data.pe_id;
                                 }
                                 }, "json");*/
                                var asig_codigo = $('#asig_codigo').val();
                                window.location = "administrarProgramaExtensoAsignaturasDocente.php?cod="+asig_codigo;
                            }

                            function verProgramaDidactico() {

                            }

        </script>
    </body>
</html>
