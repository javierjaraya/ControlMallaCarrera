<!DOCTYPE html>
<?php
session_start();
if ($_SESSION['autentificado'] != "SI") {
    header("Location: ../../index.php");
}
$per_id = $_SESSION["per_id"];
$per_nombre = $_SESSION["per_nombre"];
$usu_nombre = $_SESSION["usu_nombre"];

$pb_id = $_REQUEST["pb_id"];

include_once '../../Controlador/Contenedor.php';
$control = Contenedor::getInstancia();

$programa_extenso = $control->getPrograma_basicoByID($pb_id);

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

        <style type="text/css">
            .borde-div{
                border: 1px solid #d0d0d0;
                padding: 10px;
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
                        Programa Basico
                        <small>Asignaturas</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="administrarProgramaBasicoAsignaturas.php">Programa Basico</a></li>
                        <li class="active">Editar Programa Basico</li>
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
                                                    <input type="text" class="form-control pull-right" id="pb_tipo_curso" name="pb_tipo_curso" value="<?= $programa_extenso->getPb_tipo_curso() ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pb_carrera">Carrera:</label>
                                                    <input type="text" class="form-control pull-right" id="pb_carrera" name="pb_carrera" value="<?= $programa_extenso->getPb_carrera() ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pb_departamento">Departamento:</label>
                                                    <input type="text" class="form-control pull-right" id="pb_departamento" name="pb_departamento" value="<?= $programa_extenso->getPb_departamento() ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pb_facultad">Facultad:</label>
                                                    <input type="text" class="form-control pull-right" id="pb_facultad" name="pb_facultad" value="<?= $programa_extenso->getPb_facultad() ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pb_nro_creditos">N° Créditos SCT:</label>
                                                    <input type="number" class="form-control pull-right" id="pb_nro_creditos" name="pb_nro_creditos" value="<?= $programa_extenso->getPb_nro_creditos() ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pb_horas_cronologicas">Horas Cronológicas:</label>
                                                    <input type="number" class="form-control pull-right" id="pb_horas_cronologicas" name="pb_horas_cronologicas" value="<?= $programa_extenso->getPb_horas_cronologicas() ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pb_horas_pedagogicas">Horas Pedagógicas:</label>
                                                    <input type="number" class="form-control pull-right" id="pb_horas_pedagogicas" name="pb_horas_pedagogicas" value="<?= $programa_extenso->getPb_horas_pedagogicas() ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pb_anio">Año:</label>
                                                    <input type="number" class="form-control pull-right" id="pb_anio" name="pb_anio" value="<?= $programa_extenso->getPb_anio() ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pb_semestre">Semestre:</label>
                                                    <input type="number" class="form-control pull-right" id="pb_semestre" name="pb_semestre" value="<?= $programa_extenso->getPb_semestre() ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pb_hrs_presenciales">Horas Presenciales:</label>
                                                    <input type="number" class="form-control pull-right" id="pb_hrs_presenciales" name="pb_hrs_presenciales" value="<?= $programa_extenso->getPb_hrs_presenciales() ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pb_ht_presenciales">Horas Teoricas Presenciales:</label>
                                                    <input type="number" class="form-control pull-right" id="pb_ht_presenciales" name="pb_ht_presenciales" value="<?= $programa_extenso->getPb_ht_presenciales() ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pb_hp_presenciales">Horas Practicas Presenciales:</label>
                                                    <input type="number" class="form-control pull-right" id="pb_hp_presenciales" name="pb_hp_presenciales" value="<?= $programa_extenso->getPb_hp_presenciales() ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pb_hl_presenciales">Horas Laboratorio Presenciales:</label>
                                                    <input type="number" class="form-control pull-right" id="pb_hl_presenciales" name="pb_hl_presenciales" value="<?= $programa_extenso->getPb_hl_presenciales() ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pb_hrs_autonomas">Horas Trabajo Autónomo:</label>
                                                    <input type="number" class="form-control pull-right" id="pb_hrs_autonomas" name="pb_hrs_autonomas" value="<?= $programa_extenso->getPb_hrs_autonomas() ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pb_ht_autonomas">Horas Teoricas Autónomo:</label>
                                                    <input type="number" class="form-control pull-right" id="pb_ht_autonomas" name="pb_ht_autonomas" value="<?= $programa_extenso->getPb_ht_autonomas() ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pb_hp_autonomas">Horas Practicas Autónomo:</label>
                                                    <input type="number" class="form-control pull-right" id="pb_hp_autonomas" name="pb_hp_autonomas" value="<?= $programa_extenso->getPb_hp_autonomas() ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pb_hl_autonomas">Horas Laboratorio Autónomo:</label>
                                                    <input type="number" class="form-control pull-right" id="pb_hl_autonomas" name="pb_hl_autonomas" value="<?= $programa_extenso->getPb_hl_autonomas() ?>" readonly>
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
                                                <div class="borde-div" style="height: 320px;">
                                                    <?= $programa_extenso->getPb_presentacion() ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="pb_descriptor_competencias">ll.2 Descriptor de competencias</label>
                                                <div class="borde-div" style="height: 320px;">
                                                    <?= $programa_extenso->getPb_descriptor_competencias() ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="pb_aprendizajes_previos">ll.3 Aprendizajes Previos</label>
                                                <div class="borde-div" style="height: 320px;">
                                                    <?= $programa_extenso->getPb_aprendizajes_previos() ?>
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
                                        <h3 class="box-title">III. Bibliografia</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="pb_biblio_fundamental">Fundamental</label>
                                                <div class="borde-div" style="height: 320px;">
                                                    <?= $programa_extenso->getPb_biblio_fundamental() ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="pb_biblio_complementaria">Complementaria</label>
                                                <div class="borde-div" style="height: 320px;">
                                                    <?= $programa_extenso->getPb_biblio_complementaria() ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./box-body --> 
                                    <div class="modal-footer">
                                        <input type="hidden" id="pb_id" name="pb_id" value="<?= $pb_id ?>">
                                        <input type="hidden" id="accion" name="accion" value="">
                                        <a href="verAsignatura.php?cod=<?= $asignatura->getAsig_codigo() ?>" class="btn btn-default" ><i class="glyphicon glyphicon-arrow-left"></i>  Volver Atras</a>                                        
                                        <a target="_blank" class="btn btn-success" href="imprimirProgramaBasicoAsignaturas.php?pb_id=<?= $pb_id ?>"><i class="glyphicon glyphicon-print"></i>  Imprimir</a>
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
                                cargarDatos();
                            });
                            //]]>

                            function cargarDatos() {
                                var pb_id = $("#pb_id").val();
                                $.get("../Servlet/administrarPrograma_basico.php", {accion: "BUSCAR_BY_ID", pb_id: pb_id}, function (data) {
                                    //console.log(data.pb_presentacion);
                                    $("#pb_presentacion").html(data.pb_presentacion);
                                    $("#pb_descriptor_competencias").html(data.pb_descriptor_competencias);
                                    $("#pb_aprendizajes_previos").html(data.pb_aprendizajes_previos);
                                    $("#pb_biblio_fundamental").html(data.pb_biblio_fundamental);
                                    $("#pb_biblio_complementaria").html(data.pb_biblio_complementaria);
                                    //agregarBarraHerramientasEditores();
                                }, "json");
                            }

                            function crearBorradorProgramaBasico() {
                                $("#accion").val("AGREGAR_BORRADOR");
                                quitarBarraHerramientasEditores();
                                var valor_pb_presentacion = document.getElementById("pb_presentacion").value;
                                console.log(valor_pb_presentacion);
                                $.post("../Servlet/administrarPrograma_basico.php", $("#fm-programa").serialize(), function (data) {
                                    console.log(data);
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
                                $('#modalProgramaAsignaturaConfirmar').modal('show');
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

                            function editar() {
                                var pb_id = $("#pb_id").val();
                                window.location = "editarProgramaBasicoAsignaturas.php?pb_id=" + pb_id;
                            }

                            function imprimir() {
                                var pb_id = $("#pb_id").val();
                                window.location = "imprimirProgramaBasicoAsignaturas.php?pb_id=" + pb_id;
                            }
        </script>
    </body>
</html>
