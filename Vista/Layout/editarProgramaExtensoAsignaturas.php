<!DOCTYPE html>
<?php
session_start();
if ($_SESSION['autentificado'] != "SI") {
    header("Location: ../../index.php");
}
$per_id = $_SESSION["per_id"];
$per_nombre = $_SESSION["per_nombre"];
$usu_nombre = $_SESSION["usu_nombre"];

$pe_id = $_REQUEST["pe_id"];

include_once '../../Controlador/Contenedor.php';
$control = Contenedor::getInstancia();

$programa_extenso = $control->getPrograma_extensoByID($pe_id);

$asignatura = $control->getAsignaturaById($programa_extenso->getAsig_codigo());
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
                        Programa Extenso
                        <small>Asignaturas</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="administrarProgramaBasicoAsignaturas.php">Programa Extenso</a></li>
                        <li class="active">Editar Programa Extenso</li>
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
                                                    <label for="pe_tipo_curso">Tipo de Curso:</label>
                                                    <input type="text" class="form-control pull-right" id="pe_tipo_curso" name="pe_tipo_curso" value="<?= $programa_extenso->getPe_tipo_curso() ?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_carrera">Carrera:</label>
                                                    <input type="text" class="form-control pull-right" id="pe_carrera" name="pe_carrera" value="<?= $programa_extenso->getPe_carrera() ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_departamento">Departamento:</label>
                                                    <input type="text" class="form-control pull-right" id="pe_departamento" name="pe_departamento" value="<?= $programa_extenso->getPe_departamento() ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_facultad">Facultad:</label>
                                                    <input type="text" class="form-control pull-right" id="pe_facultad" name="pe_facultad" value="<?= $programa_extenso->getPe_facultad() ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_nro_creditos">N° Créditos SCT:</label>
                                                    <input type="number" class="form-control pull-right" id="pe_nro_creditos" name="pe_nro_creditos" value="<?= $programa_extenso->getPe_nro_creditos() ?>" min="0">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_horas_cronologicas">Horas Cronológicas:</label>
                                                    <input type="number" class="form-control pull-right" id="pe_horas_cronologicas" name="pe_horas_cronologicas" value="<?= $programa_extenso->getPe_horas_cronologicas() ?>" min="0">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_horas_pedagogicas">Horas Pedagógicas:</label>
                                                    <input type="number" class="form-control pull-right" id="pe_horas_pedagogicas" name="pe_horas_pedagogicas" value="<?= $programa_extenso->getPe_horas_pedagogicas() ?>" min="0">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_anio">Año:</label>
                                                    <input type="number" class="form-control pull-right" id="pe_anio" name="pe_anio" value="<?= $programa_extenso->getPe_anio() ?>" min="0">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_semestre">Semestre:</label>
                                                    <input type="number" class="form-control pull-right" id="pe_semestre" name="pe_semestre" value="<?= $programa_extenso->getPe_semestre() ?>" min="0">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_hrs_presenciales">Horas Presenciales:</label>
                                                    <input type="number" class="form-control pull-right" id="pe_hrs_presenciales" name="pe_hrs_presenciales" value="<?= $programa_extenso->getPe_hrs_presenciales() ?>" min="0">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_ht_presenciales">Horas Teoricas Presenciales:</label>
                                                    <input type="number" class="form-control pull-right" id="pe_ht_presenciales" name="pe_ht_presenciales" value="<?= $programa_extenso->getPe_ht_presenciales() ?>" min="0">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_hp_presenciales">Horas Practicas Presenciales:</label>
                                                    <input type="number" class="form-control pull-right" id="pe_hp_presenciales" name="pe_hp_presenciales" value="<?= $programa_extenso->getPe_hp_presenciales() ?>" min="0">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_hl_presenciales">Horas Laboratorio Presenciales:</label>
                                                    <input type="number" class="form-control pull-right" id="pe_hl_presenciales" name="pe_hl_presenciales" value="<?= $programa_extenso->getPe_hl_presenciales() ?>" min="0">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_hrs_autonomas">Horas Trabajo Autónomo:</label>
                                                    <input type="number" class="form-control pull-right" id="pe_hrs_autonomas" name="pe_hrs_autonomas" value="<?= $programa_extenso->getPe_hrs_autonomas() ?>" min="0">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_ht_autonomas">Horas Teoricas Autónomo:</label>
                                                    <input type="number" class="form-control pull-right" id="pe_ht_autonomas" name="pe_ht_autonomas" value="<?= $programa_extenso->getPe_ht_autonomas() ?>" min="0">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_hp_autonomas">Horas Practicas Autónomo:</label>
                                                    <input type="number" class="form-control pull-right" id="pe_hp_autonomas" name="pe_hp_autonomas" value="<?= $programa_extenso->getPe_hp_autonomas() ?>" min="0">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_hl_autonomas">Horas Laboratorio Autónomo:</label>
                                                    <input type="number" class="form-control pull-right" id="pe_hl_autonomas" name="pe_hl_autonomas" value="<?= $programa_extenso->getPe_hl_autonomas() ?>" min="0">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_fecha_inicio">Fecha Inicio Periodo Valides:</label>
                                                    <input type="date" class="form-control pull-right" id="pe_fecha_inicio" name="pe_fecha_inicio" value="<?= $programa_extenso->getPe_fecha_inicio() ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_fecha_fin">Fecha Fin Periodo Valides:</label>
                                                    <input type="date" class="form-control pull-right" id="pe_fecha_fin" name="pe_fecha_fin" value="<?= $programa_extenso->getPe_fecha_fin() ?>" >
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
                                                <label for="pe_presentacion">ll.1 Presentación: Relación de la Asignatura con las Competencias del Perfil de Egreso</label>
                                                <textarea id="pe_presentacion" name="pe_presentacion" rows="14" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="pe_descriptor_competencias">ll.2 Descriptor de competencias</label>
                                                <textarea id="pe_descriptor_competencias" name="pe_descriptor_competencias" rows="14" class="form-control" value="<?= $programa_extenso->getPe_descriptor_competencias() ?>"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="pe_aprendizajes_previos">ll.3 Aprendizajes Previos</label>
                                                <textarea id="pe_aprendizajes_previos" name="pe_aprendizajes_previos" rows="14" class="form-control" value="<?= $programa_extenso->getPe_aprendizajes_previos() ?>"></textarea>
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
                                                <label for="pe_biblio_fundamental">Fundamental</label>
                                                <textarea id="pe_biblio_fundamental" name="pe_biblio_fundamental" rows="14" class="form-control" value="<?= $programa_extenso->getPe_biblio_fundamental() ?>"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="pe_biblio_complementaria">Complementaria</label>
                                                <textarea id="pe_biblio_complementaria" name="pe_biblio_complementaria" rows="14" class="form-control" value="<?= $programa_extenso->getPe_biblio_complementaria() ?>"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="pe_observacion">Observación</label>
                                                <textarea id="pe_observacion" name="pe_observacion" rows="14" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./box-body --> 
                                    <div class="modal-footer">
                                        <input type="hidden" id="pe_id" name="pe_id" value="<?= $pe_id ?>">
                                        <input type="hidden" id="accion" name="accion" value="">
                                        <a href="administrarProgramaExtensoAsignaturas.php" class="btn btn-default" ><i class="glyphicon glyphicon-arrow-left"></i>  Volver Atras</a>
                                        <button type="button" class="btn btn-info" onclick="crearBorradorProgramaExtenso()"><i class="glyphicon glyphicon-floppy-disk"></i>  Guardar Borrador</button>
                                        <button type="button" class="btn btn-info" onclick="crearProgramaExtensoConfirmar()"><i class="glyphicon glyphicon-floppy-disk"></i>  Guardar</button>
                                        <a target="_blank" class="btn btn-success" href="imprimirProgramaExtensoAsignaturas.php?pb_id=<?= $pe_id ?>"><i class="glyphicon glyphicon-print"></i>  Imprimir</a>
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
                        <button type="button" class="btn btn-info" onclick="crearProgramaExtenso()"><i class="glyphicon glyphicon-floppy-disk"></i>  Guardar Programa</button>
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
                            var pe_presentacion_edit, pe_descriptor_competencias_edit, pe_aprendizajes_previos_edit, pe_biblio_fundamental_edit, pe_biblio_complementaria_edit, pe_observacion_edit;
                            //<![CDATA[
                            bkLib.onDomLoaded(function () {
                                cargarDatos();
                            });
                            //]]>

                            function cargarDatos() {
                                var pe_id = $("#pe_id").val();
                                $.get("../Servlet/administrarPrograma_extenso.php", {accion: "BUSCAR_BY_ID", pe_id: pe_id}, function (data) {
                                    $("#pe_presentacion").html(data.pe_presentacion);
                                    $("#pe_descriptor_competencias").html(data.pe_descriptor_competencias);
                                    $("#pe_aprendizajes_previos").html(data.pe_aprendizajes_previos);
                                    $("#pe_biblio_fundamental").html(data.pe_biblio_fundamental);
                                    $("#pe_biblio_complementaria").html(data.pe_biblio_complementaria);
                                    $('#pe_observacion').html(data.pe_observacion);
                                    agregarBarraHerramientasEditores();
                                }, "json");
                            }

                            function crearBorradorProgramaExtenso() {
                                $("#accion").val("AGREGAR_BORRADOR");
                                quitarBarraHerramientasEditores();
                                $.post("../Servlet/administrarPrograma_extenso.php", $("#fm-programa").serialize(), function (data) {
                                    console.log(data);
                                    agregarBarraHerramientasEditores();
                                    if (data.errorMsg) {
                                        notificacion(data.errorMsg, 'danger', 'alert');
                                    } else {
                                        notificacion(data.mensaje, 'success', 'alert');
                                    }
                                    location.href = "#alert";
                                }, "json");
                            }

                            function crearProgramaExtensoConfirmar() {
                                if (validar()) {
                                    $('#modalProgramaAsignaturaConfirmar').modal('show');
                                }
                            }

                            function crearProgramaExtenso() {
                                $("#accion").val("AGREGAR");
                                quitarBarraHerramientasEditores();
                                $.post("../Servlet/administrarPrograma_extenso.php", $("#fm-programa").serialize(), function (data) {
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
                                var pe_tipo_curso = $("#pe_tipo_curso").val();
                                var pe_carrera = $("#pe_carrera").val();
                                var pe_departamento = $("#pe_departamento").val();
                                var pe_facultad = $("#pe_facultad").val();
                                var pe_nro_creditos = $("#pe_nro_creditos").val();
                                var pe_horas_cronologicas = $("#pe_horas_cronologicas").val();
                                var pe_horas_pedagogicas = $("#pe_horas_pedagogicas").val();
                                var pe_anio = $("#pe_anio").val();
                                var pe_semestre = $("#pe_semestre").val();
                                var pe_hrs_presenciales = $("#pe_hrs_presenciales").val();
                                var pe_ht_presenciales = $("#pe_ht_presenciales").val();
                                var pe_hp_presenciales = $("#pe_hp_presenciales").val();
                                var pe_hl_presenciales = $("#pe_hl_presenciales").val();
                                var pe_hrs_autonomas = $("#pe_hrs_autonomas").val();
                                var pe_ht_autonomas = $("#pe_ht_autonomas").val();
                                var pe_hp_autonomas = $("#pe_hp_autonomas").val();
                                var pe_hl_autonomas = $("#pe_hl_autonomas").val();
                                var pe_fecha_inicio = $("#pe_fecha_inicio").val();
                                var pe_fecha_fin = $("#pe_fecha_fin").val();

                                var pe_presentacion = $("#pe_presentacion").val();
                                var pe_descriptor_competencias = $("#pe_descriptor_competencias").val();
                                var pe_aprendizajes_previos = $("#pe_aprendizajes_previos").val();
                                var pe_biblio_fundamental = $("#pe_biblio_fundamental").val();
                                var pe_biblio_complementaria = $("#pe_biblio_complementaria").val();
                                var pe_observacion = $("#pe_observacion").val();

                                if (pe_tipo_curso == "") {
                                    notificacion("Debe ingresar el tipo de curso", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pe_carrera == "") {
                                    notificacion("Debe ingresar la carrera", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pe_departamento == "") {
                                    notificacion("Debe ingresar el departamento", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pe_facultad == "") {
                                    notificacion("Debe ingresar la facultad", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pe_nro_creditos == "") {
                                    notificacion("Debe ingresar el numero de creditos", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (isNaN(pe_nro_creditos)) {
                                    notificacion("El numero de creditos debe ser un valor numerico", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pe_nro_creditos <= 0) {
                                    notificacion("El numero de creditos debe ser mayor que 0", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pe_horas_cronologicas == "") {
                                    notificacion("Debe ingresar las horas cronologicas", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (isNaN(pe_horas_cronologicas)) {
                                    notificacion("Las horas cronologicas debe ser un valor numerico", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pe_horas_cronologicas < 0) {
                                    notificacion("Las horas cronologicas debe ser mayor o igual a cero", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pe_horas_pedagogicas == "") {
                                    notificacion("Debe ingresar las horas pedagogicas", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (isNaN(pe_horas_pedagogicas)) {
                                    notificacion("Las horas pedagogicas debe ser un valor numerico", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pe_horas_pedagogicas < 0) {
                                    notificacion("Las horas pedagogicas debe ser mayor o igual a cero", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pe_anio == "") {
                                    notificacion("Debe ingresar el año", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (isNaN(pe_anio)) {
                                    notificacion("El año debe ser un valor numerico", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pe_anio <= 0) {
                                    notificacion("El año debe ser mayor que 0", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pe_semestre == "") {
                                    notificacion("Debe ingresar el semestre", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (isNaN(pe_semestre)) {
                                    notificacion("El semestre debe ser un valor numerico", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pe_semestre <= 0) {
                                    notificacion("El semestre debe ser mayor que 0", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pe_hrs_presenciales == "") {
                                    notificacion("Debe ingresar las horas presenciales", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (isNaN(pe_hrs_presenciales)) {
                                    notificacion("Las horas presenciales debe ser un valor numerico", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pe_hrs_presenciales < 0) {
                                    notificacion("Las horas presenciales debe ser mayor o igual a cero", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pe_ht_presenciales == "") {
                                    notificacion("Debe ingresar las horas teoricas presenciales", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (isNaN(pe_ht_presenciales)) {
                                    notificacion("Las horas teoricas presenciales debe ser un valor numerico", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pe_ht_presenciales < 0) {
                                    notificacion("Las horas teoricas presenciales debe ser mayor o igual a cero", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pe_hp_presenciales == "") {
                                    notificacion("Debe ingresar las horas practicas presenciales", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (isNaN(pe_hp_presenciales)) {
                                    notificacion("Las horas practicas presenciales debe ser un valor numerico", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pe_hp_presenciales < 0) {
                                    notificacion("Las horas practicas presenciales debe ser mayor o igual a cero", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pe_hl_presenciales == "") {
                                    notificacion("Debe ingresar las horas laboratorio presenciales", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (isNaN(pe_hl_presenciales)) {
                                    notificacion("Las horas laboratorio presenciales debe ser un valor numerico", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pe_hl_presenciales < 0) {
                                    notificacion("Las horas laboratorio presenciales debe ser mayor o igual a cero", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pe_hrs_autonomas == "") {
                                    notificacion("Debe ingresar las horas autonomas", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (isNaN(pe_hrs_autonomas)) {
                                    notificacion("Las horas autonomas debe ser un valor numerico", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pe_hrs_autonomas < 0) {
                                    notificacion("Las horas autonomas debe ser mayor o igual a cero", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pe_ht_autonomas == "") {
                                    notificacion("Debe ingresar las horas teoricas autonomas", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (isNaN(pe_ht_autonomas)) {
                                    notificacion("Las horas teoricas autonomas debe ser un valor numerico", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pe_ht_autonomas < 0) {
                                    notificacion("Las horas teoricas autonomas debe ser mayor o igual a cero", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pe_hp_autonomas == "") {
                                    notificacion("Debe ingresar las horas practicas autonomas", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (isNaN(pe_hp_autonomas)) {
                                    notificacion("Las horas practicas autonomas debe ser un valor numerico", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pe_hp_autonomas < 0) {
                                    notificacion("Las horas practicas autonomas debe ser mayor o igual a cero", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pe_hl_autonomas == "") {
                                    notificacion("Debe ingresar las horas laboratorio autonomas", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (isNaN(pe_hl_autonomas)) {
                                    notificacion("Las horas laboratorio autonomas debe ser un valor numerico", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pe_hl_autonomas < 0) {
                                    notificacion("Las horas laboratorio autonomas debe ser mayor o igual a cero", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pe_fecha_inicio == "") {
                                    notificacion("Debe ingresar la fecha de inicio del periodo validez", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pe_fecha_fin == "") {
                                    notificacion("Debe ingresar la fecha de fin del periodo validez", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pe_presentacion == "") {
                                    notificacion("Debe ingresar la presentación del item II. Descripción", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pe_descriptor_competencias == "") {
                                    notificacion("Debe ingresar el descriptor de competencias del item II. Descripción", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pe_aprendizajes_previos == "") {
                                    notificacion("Debe ingresar los aprendizajes previos del item II. Descripción", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }

                                if (pe_biblio_fundamental == "") {
                                    notificacion("Debe ingresar la bibliografia fundamental", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                if (pe_biblio_complementaria == "") {
                                    notificacion("Debe ingresar la bibliografia complementaria", 'danger', 'alert');
                                    location.href = "#alert";
                                    return false;
                                }
                                return true;
                            }

                            function quitarBarraHerramientasEditores() {
                                pe_presentacion_edit.removeInstance('pe_presentacion');
                                pe_presentacion_edit = null;

                                pe_descriptor_competencias_edit.removeInstance('pe_descriptor_competencias');
                                pe_descriptor_competencias_edit = null;

                                pe_aprendizajes_previos_edit.removeInstance('pe_aprendizajes_previos');
                                pe_aprendizajes_previos_edit = null;

                                pe_biblio_fundamental_edit.removeInstance('pe_biblio_fundamental');
                                pe_biblio_fundamental_edit = null;

                                pe_biblio_complementaria_edit.removeInstance('pe_biblio_complementaria');
                                pe_biblio_complementaria_edit = null;

                                pe_observacion_edit.removeInstance('pe_observacion');
                                pe_observacion_edit = null;
                            }

                            function agregarBarraHerramientasEditores() {
                                if (!pe_presentacion_edit) {
                                    pe_presentacion_edit = new nicEditor({fullPanel: true}).panelInstance('pe_presentacion', {hasPanel: true});
                                }
                                if (!pe_descriptor_competencias_edit) {
                                    pe_descriptor_competencias_edit = new nicEditor({fullPanel: true}).panelInstance('pe_descriptor_competencias', {hasPanel: true});
                                }
                                if (!pe_aprendizajes_previos_edit) {
                                    pe_aprendizajes_previos_edit = new nicEditor({fullPanel: true}).panelInstance('pe_aprendizajes_previos', {hasPanel: true});
                                }
                                if (!pe_biblio_fundamental_edit) {
                                    pe_biblio_fundamental_edit = new nicEditor({fullPanel: true}).panelInstance('pe_biblio_fundamental', {hasPanel: true});
                                }
                                if (!pe_biblio_complementaria_edit) {
                                    pe_biblio_complementaria_edit = new nicEditor({fullPanel: true}).panelInstance('pe_biblio_complementaria', {hasPanel: true});
                                }
                                if (!pe_observacion_edit) {
                                    pe_observacion_edit = new nicEditor({fullPanel: true}).panelInstance('pe_observacion', {hasPanel: true});
                                }
                            }
        </script>
    </body>
</html>
