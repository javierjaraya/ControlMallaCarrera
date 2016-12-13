<!DOCTYPE html>
<?php
session_start();
if ($_SESSION['autentificado'] != "SI") {
    header("Location: ../../index.php");
}
$per_id = $_SESSION["per_id"];
$per_nombre = $_SESSION["per_nombre"];
$usu_nombre = $_SESSION["usu_nombre"];

$asig_codigo = $_REQUEST["asig_codigo"];

include_once '../../Controlador/Contenedor.php';
$control = Contenedor::getInstancia();
$asignatura = $control->getAsignaturaById($asig_codigo);
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
                        Programa Basico
                        <small>Asignaturas</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Programa Basico</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <form id="fm-programa">
                        <!-- CONTENIDO AQUI -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-primary">
                                    <div class="box-header">
                                        <h3 class="box-title">I. Identificación</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div id="alert"></div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="m_id">Código Malla:</label>
                                                    <input type="text" class="form-control pull-right" id="m_id" name="m_id" value="<?= $asignatura->getM_id() ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="asig_nombre">Nombre Asignatura:</label>
                                                    <input type="text" class="form-control pull-right" id="asig_nombre" name="asig_nombre" value="<?= $asignatura->getAsig_nombre() ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="asig_codigo">Código Asignatura:</label>
                                                    <input type="text" class="form-control pull-right" id="asig_codigo" name="asig_codigo" value="<?= $asignatura->getAsig_codigo() ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pb_tipo_curso">Tipo de Curso:</label>
                                                    <input type="text" class="form-control pull-right" id="pb_tipo_curso" name="pb_tipo_curso" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pb_carrera">Carrera:</label>
                                                    <input type="text" class="form-control pull-right" id="pb_carrera" name="pb_carrera" value="Ingeniería Civil en Informatica">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pb_departamento">Departamento:</label>
                                                    <input type="text" class="form-control pull-right" id="pb_departamento" name="pb_departamento" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pb_facultad">Facultad:</label>
                                                    <input type="text" class="form-control pull-right" id="pb_facultad" name="pb_facultad" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pb_nro_creditos">N° Créditos SCT:</label>
                                                    <input type="number" class="form-control pull-right" id="pb_nro_creditos" name="pb_nro_creditos" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pb_horas_cronologicas">Horas Cronológicas:</label>
                                                    <input type="number" class="form-control pull-right" id="pb_horas_cronologicas" name="pb_horas_cronologicas" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pb_horas_pedagogicas">Horas Pedagógicas:</label>
                                                    <input type="number" class="form-control pull-right" id="pb_horas_pedagogicas" name="pb_horas_pedagogicas" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pb_anio">Año:</label>
                                                    <input type="number" class="form-control pull-right" id="pb_anio" name="pb_anio" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pb_semestre">Semestre:</label>
                                                    <input type="number" class="form-control pull-right" id="pb_semestre" name="pb_semestre" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pb_hrs_presenciales">Horas Presenciales:</label>
                                                    <input type="number" class="form-control pull-right" id="pb_hrs_presenciales" name="pb_hrs_presenciales" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pb_ht_presenciales">Horas Teoricas Presenciales:</label>
                                                    <input type="number" class="form-control pull-right" id="pb_ht_presenciales" name="pb_ht_presenciales" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pb_hp_presenciales">Horas Practicas Presenciales:</label>
                                                    <input type="number" class="form-control pull-right" id="pb_hp_presenciales" name="pb_hp_presenciales" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pb_hl_presenciales">Horas Laboratorio Presenciales:</label>
                                                    <input type="number" class="form-control pull-right" id="pb_hl_presenciales" name="pb_hl_presenciales" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pb_hrs_autonomas">Horas Trabajo Autónomo:</label>
                                                    <input type="number" class="form-control pull-right" id="pb_hrs_autonomas" name="pb_hrs_autonomas" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pb_ht_autonomas">Horas Teoricas Autónomo:</label>
                                                    <input type="number" class="form-control pull-right" id="pb_ht_autonomas" name="pb_ht_autonomas" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pb_hp_autonomas">Horas Practicas Autónomo:</label>
                                                    <input type="number" class="form-control pull-right" id="pb_hp_autonomas" name="pb_hp_autonomas" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pb_hl_autonomas">Horas Laboratorio Autónomo:</label>
                                                    <input type="number" class="form-control pull-right" id="pb_hl_autonomas" name="pb_hl_autonomas" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./box-body -->                                
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-primary">
                                    <div class="box-header">
                                        <h3 class="box-title">II. Descripción</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="pb_presentacion">ll.1 Presentación: Relación de la Asignatura con las Competencias del Perfil de Egreso</label>
                                                <textarea id="pb_presentacion" name="pb_presentacion" rows="14" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="pb_descriptor_competencias">ll.2 Descriptor de competencias</label>
                                                <textarea id="pb_descriptor_competencias" name="pb_descriptor_competencias" rows="14" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="pb_aprendizajes_previos">ll.3 Aprendizajes Previos</label>
                                                <textarea id="pb_aprendizajes_previos" name="pb_aprendizajes_previos" rows="14" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./box-body --> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-primary">
                                    <div class="box-header">
                                        <h3 class="box-title">III. Bibliografia</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="pb_biblio_fundamental">Fundamental</label>
                                                <textarea id="pb_biblio_fundamental" name="pb_biblio_fundamental" rows="14" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="pb_biblio_complementaria">Complementaria</label>
                                                <textarea id="pb_biblio_complementaria" name="pb_biblio_complementaria" rows="14" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./box-body --> 
                                    <div class="modal-footer">
                                        <input type="hidden" id="accion" name="accion" value="">
                                        <a href="administrarProgramaBasicoAsignaturas.php" class="btn btn-default" ><i class="glyphicon glyphicon-arrow-left"></i>  Volver Atras</a>
                                        <button type="button" class="btn btn-info" onclick="crearBorradorProgramaBasico()"><i class="glyphicon glyphicon-floppy-disk"></i>  Guardar Borrador</button>
                                        <button type="button" class="btn btn-info" onclick="crearProgramaBasicoConfirmar()"><i class="glyphicon glyphicon-floppy-disk"></i>  Guardar</button>
                                    </div>
                                    <!-- ./box-footer --> 
                                </div>
                            </div>
                        </div>
                    </form>
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
        <div class="modal fade" id="modalProgramaAsignaturaConfirmar" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #3c8dbc; color: #fff;" >
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Confirmación</h4>
                    </div>
                    <div class="modal-body">
                        <h4>Al guardar una version finalizada del programa, se eliminaran todos los borradores. ¿Desea guardar el nuevo programa?.</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cacelar</button>
                        <button type="button" class="btn btn-info" onclick="crearProgramaBasico()"><i class="glyphicon glyphicon-floppy-disk"></i>  Guardar Programa</button>
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
        <!-- NIC EDIT editor de texto-->
        <script src="../../Files/js/nicEdit.js" type="text/javascript"></script>
        <!-- Usabilidad -->
        <script src="../../Files/js/usabilidad.js"></script>

        <script type="text/javascript">
                            var pb_presentacion_edit, pb_descriptor_competencias_edit, pb_aprendizajes_previos_edit, pb_biblio_fundamental_edit, pb_biblio_complementaria_edit;
                            //<![CDATA[
                            bkLib.onDomLoaded(function () {
                                agregarBarraHerramientasEditores();
                            });
                            //]]>

                            function crearBorradorProgramaBasico() {
                                $("#accion").val("AGREGAR_BORRADOR");
                                quitarBarraHerramientasEditores();
                                $.post("../Servlet/administrarPrograma_basico.php", $("#fm-programa").serialize(), function (data) {
                                    agregarBarraHerramientasEditores();
                                    if (data.errorMsg) {
                                        notificacion(data.errorMsg, 'danger', 'alert');
                                    } else {
                                        notificacion(data.mensaje, 'success', 'alert');
                                    }
                                    location.href = "#alert";
                                });
                            }

                            function crearProgramaBasicoConfirmar() {
                                if (validar()) {
                                    $('#modalProgramaAsignaturaConfirmar').modal('show');
                                }
                            }

                            function crearProgramaBasico() {
                                $("#accion").val("AGREGAR");
                                quitarBarraHerramientasEditores();
                                $.post("../Servlet/administrarPrograma_basico.php", $("#fm-programa").serialize(), function (data) {
                                    agregarBarraHerramientasEditores();
                                    if (data.errorMsg) {
                                        notificacion(data.errorMsg, 'danger', 'alert');
                                    } else {
                                        notificacion(data.mensaje, 'success', 'alert');
                                    }
                                    $('#modalProgramaAsignaturaConfirmar').modal('toggle');
                                    location.href = "#alert";
                                }, "json");
                            }

                            function validar() {
                                var pb_tipo_curso = $("#pb_tipo_curso").val();
                                var pb_carrera = $("#pb_carrera").val();
                                var pb_departamento = $("#pb_departamento").val();
                                var pb_facultad = $("#pb_facultad").val();
                                var pb_nro_creditos = $("#pb_nro_creditos").val();
                                var pb_horas_cronologicas = $("#pb_horas_cronologicas").val();
                                var pb_horas_pedagogicas = $("#pb_horas_pedagogicas").val();
                                var pb_anio = $("#pb_anio").val();
                                var pb_semestre = $("#pb_semestre").val();
                                var pb_hrs_presenciales = $("#pb_hrs_presenciales").val();
                                var pb_ht_presenciales = $("#pb_ht_presenciales").val();
                                var pb_hp_presenciales = $("#pb_hp_presenciales").val();
                                var pb_hl_presenciales = $("#pb_hl_presenciales").val();
                                var pb_hrs_autonomas = $("#pb_hrs_autonomas").val();
                                var pb_ht_autonomas = $("#pb_ht_autonomas").val();
                                var pb_hp_autonomas = $("#pb_hp_autonomas").val();
                                var pb_hl_autonomas = $("#pb_hl_autonomas").val();

                                var pb_presentacion = $("#pb_presentacion").val();
                                var pb_descriptor_competencias = $("#pb_descriptor_competencias").val();
                                var pb_aprendizajes_previos = $("#pb_aprendizajes_previos").val();
                                var pb_biblio_fundamental = $("#pb_biblio_fundamental").val();
                                var pb_biblio_complementaria = $("#pb_biblio_complementaria").val();

                                if (pb_tipo_curso == "") {
                                    notificacion("Debe ingresar el tipo de curso", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pb_carrera == "") {
                                    notificacion("Debe ingresar la carrera", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pb_departamento == "") {
                                    notificacion("Debe ingresar el departamento", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pb_facultad == "") {
                                    notificacion("Debe ingresar la facultad", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pb_nro_creditos == "") {
                                    notificacion("Debe ingresar el numero de creditos", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (isNaN(pb_nro_creditos)) {
                                    notificacion("El numero de creditos debe ser un valor numerico", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pb_nro_creditos <= 0) {
                                    notificacion("El numero de creditos debe ser mayor que 0", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pb_horas_cronologicas == "") {
                                    notificacion("Debe ingresar las horas cronologicas", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (isNaN(pb_horas_cronologicas)) {
                                    notificacion("Las horas cronologicas debe ser un valor numerico", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pb_horas_cronologicas < 0) {
                                    notificacion("Las horas cronologicas debe ser mayor o igual a cero", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pb_horas_pedagogicas == "") {
                                    notificacion("Debe ingresar las horas pedagogicas", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (isNaN(pb_horas_pedagogicas)) {
                                    notificacion("Las horas pedagogicas debe ser un valor numerico", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pb_horas_pedagogicas < 0) {
                                    notificacion("Las horas pedagogicas debe ser mayor o igual a cero", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pb_anio == "") {
                                    notificacion("Debe ingresar el año", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (isNaN(pb_anio)) {
                                    notificacion("El año debe ser un valor numerico", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pb_anio <= 0) {
                                    notificacion("El año debe ser mayor que 0", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pb_semestre == "") {
                                    notificacion("Debe ingresar el semestre", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (isNaN(pb_semestre)) {
                                    notificacion("El semestre debe ser un valor numerico", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pb_semestre <= 0) {
                                    notificacion("El semestre debe ser mayor que 0", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pb_hrs_presenciales == "") {
                                    notificacion("Debe ingresar las horas presenciales", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (isNaN(pb_hrs_presenciales)) {
                                    notificacion("Las horas presenciales debe ser un valor numerico", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pb_hrs_presenciales < 0) {
                                    notificacion("Las horas presenciales debe ser mayor o igual a cero", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pb_ht_presenciales == "") {
                                    notificacion("Debe ingresar las horas teoricas presenciales", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (isNaN(pb_ht_presenciales)) {
                                    notificacion("Las horas teoricas presenciales debe ser un valor numerico", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pb_ht_presenciales < 0) {
                                    notificacion("Las horas teoricas presenciales debe ser mayor o igual a cero", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pb_hp_presenciales == "") {
                                    notificacion("Debe ingresar las horas practicas presenciales", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (isNaN(pb_hp_presenciales)) {
                                    notificacion("Las horas practicas presenciales debe ser un valor numerico", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pb_hp_presenciales < 0) {
                                    notificacion("Las horas practicas presenciales debe ser mayor o igual a cero", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pb_hl_presenciales == "") {
                                    notificacion("Debe ingresar las horas laboratorio presenciales", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (isNaN(pb_hl_presenciales)) {
                                    notificacion("Las horas laboratorio presenciales debe ser un valor numerico", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pb_hl_presenciales < 0) {
                                    notificacion("Las horas laboratorio presenciales debe ser mayor o igual a cero", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pb_hrs_autonomas == "") {
                                    notificacion("Debe ingresar las horas autonomas", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (isNaN(pb_hrs_autonomas)) {
                                    notificacion("Las horas autonomas debe ser un valor numerico", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pb_hrs_autonomas < 0) {
                                    notificacion("Las horas autonomas debe ser mayor o igual a cero", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pb_ht_autonomas == "") {
                                    notificacion("Debe ingresar las horas teoricas autonomas", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (isNaN(pb_ht_autonomas)) {
                                    notificacion("Las horas teoricas autonomas debe ser un valor numerico", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pb_ht_autonomas < 0) {
                                    notificacion("Las horas teoricas autonomas debe ser mayor o igual a cero", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pb_hp_autonomas == "") {
                                    notificacion("Debe ingresar las horas practicas autonomas", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (isNaN(pb_hp_autonomas)) {
                                    notificacion("Las horas practicas autonomas debe ser un valor numerico", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pb_hp_autonomas < 0) {
                                    notificacion("Las horas practicas autonomas debe ser mayor o igual a cero", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pb_hl_autonomas == "") {
                                    notificacion("Debe ingresar las horas laboratorio autonomas", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (isNaN(pb_hl_autonomas)) {
                                    notificacion("Las horas laboratorio autonomas debe ser un valor numerico", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pb_hl_autonomas < 0) {
                                    notificacion("Las horas laboratorio autonomas debe ser mayor o igual a cero", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }

                                if (pb_presentacion == "") {
                                    notificacion("Debe ingresar la presentación del item II. Descripción", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pb_descriptor_competencias == "") {
                                    notificacion("Debe ingresar el descriptor de competencias del item II. Descripción", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pb_aprendizajes_previos == "") {
                                    notificacion("Debe ingresar los aprendizajes previos del item II. Descripción", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }

                                if (pb_biblio_fundamental == "") {
                                    notificacion("Debe ingresar la bibliografia fundamental", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pb_biblio_complementaria == "") {
                                    notificacion("Debe ingresar la bibliografia complementaria", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                return true;
                            }

                            function quitarBarraHerramientasEditores() {
                                pb_presentacion_edit.removeInstance('pb_presentacion');
                                pb_presentacion_edit = null;

                                pb_descriptor_competencias_edit.removeInstance('pb_descriptor_competencias');
                                pb_descriptor_competencias_edit = null;

                                pb_aprendizajes_previos_edit.removeInstance('pb_aprendizajes_previos');
                                pb_aprendizajes_previos_edit = null;

                                pb_biblio_fundamental_edit.removeInstance('pb_biblio_fundamental');
                                pb_biblio_fundamental_edit = null;

                                pb_biblio_complementaria_edit.removeInstance('pb_biblio_complementaria');
                                pb_biblio_complementaria_edit = null;
                            }

                            function agregarBarraHerramientasEditores() {
                                if (!pb_presentacion_edit) {
                                    pb_presentacion_edit = new nicEditor({fullPanel: true}).panelInstance('pb_presentacion', {hasPanel: true});
                                }
                                if (!pb_descriptor_competencias_edit) {
                                    pb_descriptor_competencias_edit = new nicEditor({fullPanel: true}).panelInstance('pb_descriptor_competencias', {hasPanel: true});
                                }
                                if (!pb_aprendizajes_previos_edit) {
                                    pb_aprendizajes_previos_edit = new nicEditor({fullPanel: true}).panelInstance('pb_aprendizajes_previos', {hasPanel: true});
                                }
                                if (!pb_biblio_fundamental_edit) {
                                    pb_biblio_fundamental_edit = new nicEditor({fullPanel: true}).panelInstance('pb_biblio_fundamental', {hasPanel: true});
                                }
                                if (!pb_biblio_complementaria_edit) {
                                    pb_biblio_complementaria_edit = new nicEditor({fullPanel: true}).panelInstance('pb_biblio_complementaria', {hasPanel: true});
                                }
                            }
        </script>
    </body>
</html>
