<!DOCTYPE html>
<?php
session_start();
if ($_SESSION['autentificado'] != "SI") {
    header("Location: ../../../index.php");
}
$per_id = $_SESSION["per_id"];
$per_nombre = $_SESSION["per_nombre"];
$usu_nombre = $_SESSION["usu_nombre"];

$asig_codigo = htmlspecialchars($_REQUEST['cod']);
$ta_id = htmlspecialchars($_REQUEST['ta_a']);

include_once '../../Controlador/Contenedor.php';
$control = Contenedor::getInstancia();
$tipo_asignatura = $control->getTipo_asignaturaByID($ta_id);
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
                        Asignatura
                        <small>Editor</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
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
                                <form id="fm" class="form-horizontal">
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
                                                            <input type="text" class="col-sm-6 col-xs-12" id="asig_nombre" name="asig_nombre" value="">                                                        
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-6">
                                                        <div class="form-group">
                                                            <label class="col-sm-3 col-xs-12 blue">Tipo Asignatura</label>
                                                            <label class="col-sm-6 col-xs-12"><?= $tipo_asignatura->getTa_nombre() ?></label>
                                                            <input type="hidden" id="ta_id" name="ta_id" value="<?= $ta_id ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-6">
                                                        <div class="form-group">
                                                            <label class="col-sm-3 col-xs-12 blue">Periodo</label>
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
                                                            <input type="number" class="col-sm-6 col-xs-12" min="1" id="asig_creditos" name="asig_creditos" value="">                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row" id="row_prerrequisitos">
                                                <div class="col-md-3">

                                                </div>
                                                <div class="col-md-6">
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
                                                <div class="col-md-3">

                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer" style="text-align: right;">    
                                        <button class="btn btn-danger">Eliminar</button>
                                        <button type="submit" class="btn btn-info">Guardar</button>
                                    </div>
                                    <!-- /.box-footer -->
                                    <input type="hidden" id="n_prerrequisito" name="n_prerrequisito" value="0">
                                    <input type="hidden" name="accion" id="accion" value="AGREGAR">
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
        <div class="modal fade" id="modalConfirmacionEliminarPrerrequisito" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Confirmacion</h4>
                        </div>
                        <div class="modal-body">
                            <h4>¿Esta seguro de eliminar el prerrequisito?, una vez eliminado no se podra recuperrar la informacion.</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-danger">Eliminar</button>
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
                                                                    var data = eval(data);
                                                                    $.each(data, function (k, v) {
                                                                        mostrarPrerrequisitoGuardado(v.asig_codigo_prerrequisito);
                                                                    });
                                                                });
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

                                                                    var select_html = "<tr id='tr_" + n_aux + "'><td><select class='form-control pull-right' id='cod_prerrequisito_" + n_aux + "' name='cod_prerrequisito_" + n_aux + "'  disabled='disabled'></select></td><td><center><a class='btn btn-danger' onclick='removePrerrequisitoGuardado(" + n_aux + "," + asig_periodo + "," + asig_codigo_prerrequisito + ")'><i class='fa fa-trash'></i></a></center></td></tr>"
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
                                                                        option.text = "Seleccionar...";
                                                                        option.value = -1;
                                                                        select.add(option);
                                                                    } else {
                                                                        select.selectedIndex = asig_codigo_prerrequisito;
                                                                        select.value = asig_codigo_prerrequisito;
                                                                    }
                                                                });
                                                            }

                                                            function addPrerrequisito() {
                                                                var n_prerrequisito = $("#n_prerrequisito").val();
                                                                var asig_periodo = $("#asig_periodo").val();
                                                                var m_id = $('#m_id').val();

                                                                var n_aux = n_prerrequisito;
                                                                n_prerrequisito++;
                                                                $("#n_prerrequisito").val(n_prerrequisito);
                                                                $.get("../Servlet/administrarAsignatura.php", {accion: 'OBTENER_POSIBLES_PRERREQUISITOS', m_id: m_id, asig_periodo: asig_periodo}, function (data) {
                                                                    var data = eval(data);

                                                                    var select_html = "<tr id='tr_" + n_aux + "'><td><select class='form-control pull-right' id='cod_prerrequisito_" + n_aux + "' name='cod_prerrequisito_" + n_aux + "'></select></td><td><center><a class='btn btn-danger' onclick='removePrerrequisito(" + n_aux + ")'><i class='fa fa-trash'></i></a></center></td></tr>"
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
                                                                        option.text = "Seleccionar...";
                                                                        option.value = -1;
                                                                        select.add(option);
                                                                    }
                                                                });
                                                            }

                                                            function removePrerrequisito(n_prerrequisito) {
                                                                $("#tr_" + n_prerrequisito).remove();
                                                            }

                                                            function removePrerrequisitoGuardado(n_aux, asig_periodo, asig_codigo_prerrequisito) {
                                                                $('#modalConfirmacionEliminarPrerrequisito').modal('show');
                                                            }

        </script>
    </body>
</html>
