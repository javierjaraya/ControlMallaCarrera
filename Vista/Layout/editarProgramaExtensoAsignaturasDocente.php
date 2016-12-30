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

        <style type="text/css">
            .group-resultado {
                border: 1px solid #d0d0d0;
                padding: 10px;
                position: relative;
                //height: 500px;
                overflow: auto;
            }
            .label-group-resultado{
                height: 60px;
            }
        </style>
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
                                        <h3 class="box-title">III. Resultados de Aprendizajes</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body" id="resultados-de-aprendizaje">
                                        <div id="resultado_0" class="group-resultado">
                                            <div class="col-md-2">
                                                <div class="form-group">   
                                                    <div class="label-group-resultado">
                                                        <label for="ra_resultado_aprendizaje_0">Resultados de Aprendizaje</label>
                                                    </div>
                                                    <textarea id="ra_resultado_aprendizaje_0" name="ra_resultado_aprendizaje_0" rows="14" cols="7" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">   
                                                    <div class="label-group-resultado">
                                                        <label for="ra_metodologia_0">Metodologia</label>
                                                    </div>
                                                    <textarea id="ra_metodologia_0" name="ra_metodologia_0" rows="14" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">   
                                                    <div class="label-group-resultado">
                                                        <label for="ra_criterios_evaluacion_0">Criterios de Evaluación</label>
                                                    </div>
                                                    <textarea id="ra_criterios_evaluacion_0" name="ra_criterios_evaluacion_0" rows="14" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">   
                                                    <div class="label-group-resultado">
                                                        <label for="ra_contenido_con_pro_act_0">Contenidos conceptuales, procedimentales y actitudinales</label>
                                                    </div>
                                                    <textarea id="ra_contenido_con_pro_act_0" name="ra_contenido_con_pro_act_0" rows="14" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">   
                                                    <div class="label-group-resultado">
                                                        <label for="ra_evidencia_aprendizaje_0">Evidencias de Aprendizaje (proceso y producto)</label>
                                                    </div>
                                                    <textarea id="ra_evidencia_aprendizaje_0" name="ra_evidencia_aprendizaje_0" rows="14" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="label-group-resultado">
                                                    <label>Tiempo Estimado</label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ra_ht_presenciales_0">Horas Teoricas Presenciales:</label>
                                                    <input type="number" class="form-control pull-right" id="ra_ht_presenciales_0" name="ra_ht_presenciales_0" min="0">
                                                </div>
                                                <div class="form-group">
                                                    <label for="ra_hp_presenciales_0">Horas Practicas Presenciales:</label>
                                                    <input type="number" class="form-control pull-right" id="ra_hp_presenciales_0" name="ra_hp_presenciales_0" min="0">
                                                </div>
                                                <div class="form-group">
                                                    <label for="ra_ht_autonomas_0">Horas Teoricas Autonomas:</label>
                                                    <input type="number" class="form-control pull-right" id="ra_ht_autonomas_0" name="ra_ht_autonomas_0" min="0">
                                                </div>
                                                <div class="form-group">
                                                    <label for="ra_hp_autonomas_0">Horas Practicas Autonomas:</label>
                                                    <input type="number" class="form-control pull-right" id="ra_hp_autonomas_0" name="ra_hp_autonomas_0" min="0">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./box-body --> 
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" onclick="agregarResultadoAprendizaje()"><i class="glyphicon glyphicon-plus"></i>  Agregar Resultado de Aprendizaje</button>
                                    </div>
                                    <!-- ./box-footer --> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-primary">
                                    <div class="box-header">
                                        <h3 class="box-title">IV. Sistema de Evaluaci&oacute;n</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="col-md-12">
                                            <div class="form-group">                                                
                                                <textarea id="pe_sistema_evaluacion" name="pe_sistema_evaluacion" rows="10" class="form-control"></textarea>
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
                                        <h3 class="box-title">V. Bibliografia</h3>
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
                                        <input type="hidden" id="cantidad-resultados-aprendizaje" name="cantidad-resultados-aprendizaje" value="">
                                        <a href="administrarProgramaExtensoAsignaturasDocente.php?cod=<?= $asignatura->getAsig_codigo() ?>" class="btn btn-default" ><i class="glyphicon glyphicon-arrow-left"></i>  Volver Atras</a>
                                        <button type="button" class="btn btn-info" onclick="crearBorradorProgramaExtenso()"><i class="glyphicon glyphicon-floppy-disk"></i>  Guardar Borrador</button>
                                        <button type="button" class="btn btn-success" onclick="crearProgramaExtensoConfirmar()"><i class="glyphicon glyphicon-ok"></i>  Enviar a Revisión</button>
                                        <a target="_blank" class="btn btn-default" href="imprimirProgramaExtensoAsignaturas.php?pe_id=<?= $pe_id ?>"><i class="glyphicon glyphicon-print"></i>  Imprimir</a>
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
                        <button type="button" class="btn btn-success" onclick="crearProgramaExtenso()"><i class="glyphicon glyphicon-ok"></i>  Enviar Programa a Revisión</button>
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
                            var cantidad_resultados_de_aprendizaje = 0;
                            var resultados_de_aprendisaje = [];
                            var metodologia = [];
                            var criterio_evaluacion = [];
                            var contenido_conceptual = [];
                            var evidencias_aprendizaje = [];

                            var pe_presentacion_edit, pe_descriptor_competencias_edit, pe_aprendizajes_previos_edit;
                            var pe_sistema_evaluacion_edit;
                            var pe_biblio_fundamental_edit, pe_biblio_complementaria_edit, pe_observacion_edit;
                            //<![CDATA[
                            bkLib.onDomLoaded(function () {
                                cargarDatos();
                                cargarResultadosAprendizaje();
                            });
                            //]]>


                            function cargarDatos() {
                                var pe_id = $("#pe_id").val();
                                $.get("../Servlet/administrarPrograma_extenso.php", {accion: "BUSCAR_BY_ID", pe_id: pe_id}, function (data) {
                                    $("#pe_presentacion").html(data.pe_presentacion);
                                    $("#pe_descriptor_competencias").html(data.pe_descriptor_competencias);
                                    $("#pe_aprendizajes_previos").html(data.pe_aprendizajes_previos);
                                    $("#pe_sistema_evaluacion").html(data.pe_sistema_evaluacion);
                                    $("#pe_biblio_fundamental").html(data.pe_biblio_fundamental);
                                    $("#pe_biblio_complementaria").html(data.pe_biblio_complementaria);
                                    $('#pe_observacion').html(data.pe_observacion);

                                    agregarBarraHerramientasEditores();
                                },"json");
                            }

                            function cargarResultadosAprendizaje() {
                                var pe_id = $("#pe_id").val();
                                $.get("../Servlet/administrarResultado_aprendizaje.php", {accion: "LISTADO_BY_PE_ID", pe_id: pe_id}, function (data) {
                                    var i = 0;
                                    $.each(data, function (k, v) {
                                        if(i != 0){
                                            agregarResultadoAprendizajeCargado();
                                        }
                                        $("#cantidad-resultados-aprendizaje").val(i);
                                        cantidad_resultados_de_aprendizaje = i;
                                        //LLenar datos
                                        $("#ra_resultado_aprendizaje_"+i).html(v.ra_contenido_con_pro_act);
                                        $("#ra_metodologia_"+i).html(v.ra_metodologia);
                                        $("#ra_criterios_evaluacion_"+i).html(v.ra_criterios_evaluacion);
                                        $("#ra_contenido_con_pro_act_"+i).html(v.ra_contenido_con_pro_act);
                                        $("#ra_evidencia_aprendizaje_"+i).html(v.ra_evidencia_aprendizaje);
                                        
                                        $("#ra_ht_presenciales_"+i).val(v.ra_ht_presenciales);
                                        $("#ra_hp_presenciales_"+i).val(v.ra_hp_presenciales);
                                        $("#ra_ht_autonomas_"+i).val(v.ra_ht_autonomas);
                                        $("#ra_hp_autonomas_"+i).val(v.ra_hp_autonomas);
                                        
                                        agregarBarraHerramientaEditoresResultadoAPrendizaje(cantidad_resultados_de_aprendizaje);
                                        
                                        i++;
                                    });
                                }, "json");
                            }

                            function crearBorradorProgramaExtenso() {
                                $("#accion").val("AGREGAR_BORRADOR");
                                quitarBarraHerramientasEditores();
                                quitarBarrraHerramientaTodosLosEditoresResultadoAprendizaje();
                                $.post("../Servlet/administrarPrograma_extenso.php", $("#fm-programa").serialize(), function (data) {
                                    agregarBarraHerramientasEditores();
                                    agregarBarraHerramientaTodosLosEditoresResultadoAprendizaje();
                                    if (data.errorMsg) {
                                        notificacion(data.errorMsg, 'danger', 'alert');
                                    } else {
                                        notificacion(data.mensaje, 'success', 'alert');
                                    }
                                    location.href = "#alert";
                                }, "json");
                            }

                            function crearProgramaExtensoConfirmar() {
                                quitarBarraHerramientasEditores();
                                quitarBarrraHerramientaTodosLosEditoresResultadoAprendizaje();
                                if (validar()) {
                                    $('#modalProgramaAsignaturaConfirmar').modal('show');
                                }
                                agregarBarraHerramientasEditores();
                                agregarBarraHerramientaTodosLosEditoresResultadoAprendizaje();
                            }

                            function crearProgramaExtenso() {
                                $("#accion").val("AGREGAR");
                                quitarBarraHerramientasEditores();
                                quitarBarrraHerramientaTodosLosEditoresResultadoAprendizaje();
                                $.post("../Servlet/administrarPrograma_extenso.php", $("#fm-programa").serialize(), function (data) {
                                    agregarBarraHerramientasEditores();
                                    agregarBarraHerramientaTodosLosEditoresResultadoAprendizaje();
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
                                var pe_sistema_evaluacion = $("#pe_sistema_evaluacion").val();
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

                                //VALIDAR RESULTADOS DE APRENDIZAJE AQUI
                                //resultados_de_aprendisaje[cantidad_resultados_de_aprendizaje] = 
                                for (var i = 0; i < resultados_de_aprendisaje.length; i++) {
                                    if ($("#ra_resultado_aprendizaje_" + i).length > 0) {
                                        var ra_resultado_aprendizaje = $("#ra_resultado_aprendizaje_" + i).val();
                                        var ra_metodologia = $("#ra_metodologia_" + i).val();
                                        var ra_criterios_evaluacion = $("#ra_criterios_evaluacion_" + i).val();
                                        var ra_contenido_con_pro_act = $("#ra_contenido_con_pro_act_" + i).val();
                                        var ra_evidencia_aprendizaje = $("#ra_evidencia_aprendizaje_" + i).val();
                                        var ra_ht_presenciales = $("#ra_ht_presenciales_" + i).val();
                                        var ra_hp_presenciales = $("#ra_hp_presenciales_" + i).val();
                                        var ra_ht_autonomas = $("#ra_ht_autonomas_" + i).val();
                                        var ra_hp_autonomas = $("#ra_hp_autonomas_" + i).val();

                                        if (ra_resultado_aprendizaje == "") {
                                            notificacion("Debe llenar todos los resultados de aprendizaje del item III. Resultados de Aprendizajes", 'danger', 'alert');
                                            location.href = "#alert";
                                            return false;
                                        }
                                        if (ra_metodologia == "") {
                                            notificacion("Debe llenar todas las metodologias del item III. Resultados de Aprendizajes", 'danger', 'alert');
                                            location.href = "#alert";
                                            return false;
                                        }
                                        if (ra_criterios_evaluacion == "") {
                                            notificacion("Debe llenar todos los criterios de evaluación del item III. Resultados de Aprendizajes", 'danger', 'alert');
                                            location.href = "#alert";
                                            return false;
                                        }
                                        if (ra_contenido_con_pro_act == "") {
                                            notificacion("Debe llenar todos contenidos conceptuales, procedimentales y actitudinales del item III. Resultados de Aprendizajes", 'danger', 'alert');
                                            location.href = "#alert";
                                            return false;
                                        }
                                        if (ra_evidencia_aprendizaje == "") {
                                            notificacion("Debe llenar todas las evidencias de aprendizaje del item III. Resultados de Aprendizajes", 'danger', 'alert');
                                            location.href = "#alert";
                                            return false;
                                        }
                                        if (ra_ht_presenciales == "") {
                                            notificacion("Debe ingresar todos las horas teoricas presenciales del item III. Resultados de Aprendizajes", 'danger', 'alert');
                                            location.href = "#alert";
                                            return false;
                                        }
                                        if (isNaN(ra_ht_presenciales)) {
                                            notificacion("Todas las horas teoricas presenciales deben ser valores numericos del item III. Resultados de Aprendizajes", 'danger', 'alert');
                                            location.href = "#alert";
                                            return false;
                                        }
                                        if (ra_ht_presenciales < 0) {
                                            notificacion("Todas las horas teoricas presenciales deben ser mayor o igual a cero del item III. Resultados de Aprendizajes", 'danger', 'alert');
                                            location.href = "#alert";
                                            return false;
                                        }
                                        if (ra_hp_presenciales == "") {
                                            notificacion("Debe ingresar todos las horas practicas presenciales del item III. Resultados de Aprendizajes", 'danger', 'alert');
                                            location.href = "#alert";
                                            return false;
                                        }
                                        if (isNaN(ra_hp_presenciales)) {
                                            notificacion("Todas las horas practicas presenciales deben ser valores numericos del item III. Resultados de Aprendizajes", 'danger', 'alert');
                                            location.href = "#alert";
                                            return false;
                                        }
                                        if (ra_hp_presenciales < 0) {
                                            notificacion("Todas las horas practicas presenciales deben ser mayor o igual a cero del item III. Resultados de Aprendizajes", 'danger', 'alert');
                                            location.href = "#alert";
                                            return false;
                                        }
                                        if (ra_ht_autonomas == "") {
                                            notificacion("Debe ingresar todos las horas teoricas autonomas del item III. Resultados de Aprendizajes", 'danger', 'alert');
                                            location.href = "#alert";
                                            return false;
                                        }
                                        if (isNaN(ra_ht_autonomas)) {
                                            notificacion("Todas las horas teoricas autonomas deben ser valores numericos del item III. Resultados de Aprendizajes", 'danger', 'alert');
                                            location.href = "#alert";
                                            return false;
                                        }
                                        if (ra_ht_autonomas < 0) {
                                            notificacion("Todas las horas teoricas autonomas deben ser mayor o igual a cero del item III. Resultados de Aprendizajes", 'danger', 'alert');
                                            location.href = "#alert";
                                            return false;
                                        }
                                        if (ra_hp_autonomas == "") {
                                            notificacion("Debe ingresar todos las horas practicas autonomas del item III. Resultados de Aprendizajes", 'danger', 'alert');
                                            location.href = "#alert";
                                            return false;
                                        }
                                        if (isNaN(ra_hp_autonomas)) {
                                            notificacion("Todas las horas practicas autonomas deben ser valores numericos del item III. Resultados de Aprendizajes", 'danger', 'alert');
                                            location.href = "#alert";
                                            return false;
                                        }
                                        if (ra_hp_autonomas < 0) {
                                            notificacion("Todas las horas practicas autonomas deben ser mayor o igual a cero del item III. Resultados de Aprendizajes", 'danger', 'alert');
                                            location.href = "#alert";
                                            return false;
                                        }
                                    }
                                }


                                if (pe_sistema_evaluacion == "") {
                                    notificacion("Debe llenar el campo Sistema de Evaluación", 'danger', 'alert');
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

                                pe_sistema_evaluacion_edit.removeInstance('pe_sistema_evaluacion');
                                pe_sistema_evaluacion_edit = null;

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
                                if (!pe_sistema_evaluacion_edit) {
                                    pe_sistema_evaluacion_edit = new nicEditor({fullPanel: true}).panelInstance('pe_sistema_evaluacion', {hasPanel: true});
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

                            function agregarBarraHerramientaEditoresResultadoAPrendizaje(id) {
                                var ra_resultado_aprendizaje_edit;
                                var ra_metodologia_edit;
                                var ra_criterios_evaluacion_edit;
                                var ra_contenido_con_pro_act_edit;
                                var ra_evidencia_aprendizaje_edit;

                                if (!ra_resultado_aprendizaje_edit) {
                                    ra_resultado_aprendizaje_edit = new nicEditor({fullPanel: true}).panelInstance('ra_resultado_aprendizaje_' + id, {hasPanel: true});
                                }
                                if (!ra_metodologia_edit) {
                                    ra_metodologia_edit = new nicEditor({fullPanel: true}).panelInstance('ra_metodologia_' + id, {hasPanel: true});
                                }
                                if (!ra_criterios_evaluacion_edit) {
                                    ra_criterios_evaluacion_edit = new nicEditor({fullPanel: true}).panelInstance('ra_criterios_evaluacion_' + id, {hasPanel: true});
                                }
                                if (!ra_contenido_con_pro_act_edit) {
                                    ra_contenido_con_pro_act_edit = new nicEditor({fullPanel: true}).panelInstance('ra_contenido_con_pro_act_' + id, {hasPanel: true});
                                }
                                if (!ra_evidencia_aprendizaje_edit) {
                                    ra_evidencia_aprendizaje_edit = new nicEditor({fullPanel: true}).panelInstance('ra_evidencia_aprendizaje_' + id, {hasPanel: true});
                                }


                                resultados_de_aprendisaje[id] = ra_resultado_aprendizaje_edit;
                                metodologia[id] = ra_metodologia_edit;
                                criterio_evaluacion[id] = ra_criterios_evaluacion_edit;
                                contenido_conceptual[id] = ra_contenido_con_pro_act_edit;
                                evidencias_aprendizaje[id] = ra_evidencia_aprendizaje_edit;
                            }

                            function agregarBarraHerramientaTodosLosEditoresResultadoAprendizaje() {
                                for (var i = 0; i < resultados_de_aprendisaje.length; i++) {
                                    if ($("#ra_resultado_aprendizaje_" + i).length > 0) {
                                        agregarBarraHerramientaEditoresResultadoAPrendizaje(i);
                                    }
                                }
                            }
                            function quitarBarraHerramientaEditoresResultadoAPrendizaje(id) {
                                resultados_de_aprendisaje[id].removeInstance('ra_resultado_aprendizaje_' + id);
                                resultados_de_aprendisaje[id] = null;

                                metodologia[id].removeInstance('ra_metodologia_' + id);
                                metodologia[id] = null;

                                criterio_evaluacion[id].removeInstance('ra_criterios_evaluacion_' + id);
                                criterio_evaluacion[id] = null;

                                contenido_conceptual[id].removeInstance('ra_contenido_con_pro_act_' + id);
                                contenido_conceptual[id] = null;

                                evidencias_aprendizaje[id].removeInstance('ra_evidencia_aprendizaje_' + id);
                                evidencias_aprendizaje[id] = null;
                            }

                            function quitarBarrraHerramientaTodosLosEditoresResultadoAprendizaje() {
                                for (var i = 0; i < resultados_de_aprendisaje.length; i++) {
                                    if ($("#ra_resultado_aprendizaje_" + i).length > 0) {
                                        quitarBarraHerramientaEditoresResultadoAPrendizaje(i);
                                    }
                                }
                            }

                            function agregarResultadoAprendizaje() {
                                cantidad_resultados_de_aprendizaje++;
                                $("#cantidad-resultados-aprendizaje").val(cantidad_resultados_de_aprendizaje);

                                var contenido = "<div id='resultado_" + cantidad_resultados_de_aprendizaje + "' class='group-resultado'>"
                                        + "<div class='col-md-2'>"
                                        + "     <div class='form-group'>   "
                                        + "        <div class='label-group-resultado'>"
                                        + "        <label for='ra_resultado_aprendizaje_" + cantidad_resultados_de_aprendizaje + "'>Resultados de Aprendizaje</label>"
                                        + "         </div>"
                                        + "         <textarea id='ra_resultado_aprendizaje_" + cantidad_resultados_de_aprendizaje + "' name='ra_resultado_aprendizaje_" + cantidad_resultados_de_aprendizaje + "' rows='14' cols='7' class='form-control'></textarea>"
                                        + "    </div>"
                                        + "</div>"
                                        + "<div class='col-md-2'>"
                                        + "    <div class='form-group'>   "
                                        + "        <div class='label-group-resultado'>"
                                        + "        <label for='ra_metodologia_" + cantidad_resultados_de_aprendizaje + "'>Metodologia</label>"
                                        + "         </div>"
                                        + "        <textarea id='ra_metodologia_" + cantidad_resultados_de_aprendizaje + "' name='ra_metodologia_" + cantidad_resultados_de_aprendizaje + "' rows='14' class='form-control'></textarea>"
                                        + "    </div>"
                                        + "</div>"
                                        + "<div class='col-md-2'>"
                                        + "    <div class='form-group'>   "
                                        + "        <div class='label-group-resultado'>"
                                        + "        <label for='ra_criterios_evaluacion_" + cantidad_resultados_de_aprendizaje + "'>Criterios de Evaluación</label>"
                                        + "         </div>"
                                        + "        <textarea id='ra_criterios_evaluacion_" + cantidad_resultados_de_aprendizaje + "' name='ra_criterios_evaluacion_" + cantidad_resultados_de_aprendizaje + "' rows='14' class='form-control'></textarea>"
                                        + "    </div>"
                                        + "</div>"
                                        + "<div class='col-md-2'>"
                                        + "    <div class='form-group'>   "
                                        + "        <div class='label-group-resultado'>"
                                        + "        <label for='ra_contenido_con_pro_act_" + cantidad_resultados_de_aprendizaje + "'>Contenidos conceptuales, procedimentales y actitudinales</label>"
                                        + "         </div>"
                                        + "        <textarea id='ra_contenido_con_pro_act_" + cantidad_resultados_de_aprendizaje + "' name='ra_contenido_con_pro_act_" + cantidad_resultados_de_aprendizaje + "' rows='14' class='form-control'></textarea>"
                                        + "    </div>"
                                        + "</div>"
                                        + "<div class='col-md-2'>"
                                        + "    <div class='form-group'>   "
                                        + "        <div class='label-group-resultado'>"
                                        + "        <label for='ra_evidencia_aprendizaje_" + cantidad_resultados_de_aprendizaje + "'>Evidencias de Aprendizaje (proceso y producto)</label>"
                                        + "         </div>"
                                        + "        <textarea id='ra_evidencia_aprendizaje_" + cantidad_resultados_de_aprendizaje + "' name='ra_evidencia_aprendizaje_" + cantidad_resultados_de_aprendizaje + "' rows='14' class='form-control'></textarea>"
                                        + "    </div>"
                                        + "</div>"
                                        + "<div class='col-md-2'>"
                                        + "        <div class='label-group-resultado'>"
                                        + "    <label>Tiempo Estimado</label>"
                                        + "         </div>"
                                        + "    <div class='form-group'>"
                                        + "        <label for='ra_ht_presenciales_" + cantidad_resultados_de_aprendizaje + "'>Horas Teoricas Presenciales:</label>"
                                        + "        <input type='number' class='form-control pull-right' id='ra_ht_presenciales_" + cantidad_resultados_de_aprendizaje + "' name='ra_ht_presenciales_" + cantidad_resultados_de_aprendizaje + "' min='0'>"
                                        + "    </div>"
                                        + "    <div class='form-group'>"
                                        + "        <label for='ra_hp_presenciales_" + cantidad_resultados_de_aprendizaje + "'>Horas Practicas Presenciales:</label>"
                                        + "        <input type='number' class='form-control pull-right' id='ra_hp_presenciales_" + cantidad_resultados_de_aprendizaje + "' name='ra_hp_presenciales_" + cantidad_resultados_de_aprendizaje + "' min='0'>"
                                        + "    </div>"
                                        + "    <div class='form-group'>"
                                        + "        <label for='ra_ht_autonomas_" + cantidad_resultados_de_aprendizaje + "'>Horas Teoricas Autonomas:</label>"
                                        + "        <input type='number' class='form-control pull-right' id='ra_ht_autonomas_" + cantidad_resultados_de_aprendizaje + "' name='ra_ht_autonomas_" + cantidad_resultados_de_aprendizaje + "' min='0'>"
                                        + "    </div>"
                                        + "    <div class='form-group'>"
                                        + "        <label for='ra_hp_autonomas_" + cantidad_resultados_de_aprendizaje + "'>Horas Practicas Autonomas:</label>"
                                        + "        <input type='number' class='form-control pull-right' id='ra_hp_autonomas_" + cantidad_resultados_de_aprendizaje + "' name='ra_hp_autonomas_" + cantidad_resultados_de_aprendizaje + "' min='0'>"
                                        + "    </div>"
                                        + "<div class='form-group'>"
                                        + "        <div  style='height: 200px;position:relative;'>"
                                        + "            <button class='btn btn-danger pull-right' style='position:absolute;bottom:5px;right:10px;' onclick='borrarResultadoAprendizaje(" + cantidad_resultados_de_aprendizaje + ")'><i class='glyphicon glyphicon - trash'></i> Borrar</button>"
                                        + "        </div>"
                                        + "    </div>"
                                        + "</div>"
                                        + "</div>";
                                $("#resultados-de-aprendizaje").append(contenido);

                                agregarBarraHerramientaEditoresResultadoAPrendizaje(cantidad_resultados_de_aprendizaje);
                            }

                            function agregarResultadoAprendizajeCargado() {
                                cantidad_resultados_de_aprendizaje++;
                                $("#cantidad-resultados-aprendizaje").val(cantidad_resultados_de_aprendizaje);

                                var contenido = "<div id='resultado_" + cantidad_resultados_de_aprendizaje + "' class='group-resultado'>"
                                        + "<div class='col-md-2'>"
                                        + "     <div class='form-group'>   "
                                        + "        <div class='label-group-resultado'>"
                                        + "        <label for='ra_resultado_aprendizaje_" + cantidad_resultados_de_aprendizaje + "'>Resultados de Aprendizaje</label>"
                                        + "         </div>"
                                        + "         <textarea id='ra_resultado_aprendizaje_" + cantidad_resultados_de_aprendizaje + "' name='ra_resultado_aprendizaje_" + cantidad_resultados_de_aprendizaje + "' rows='14' cols='7' class='form-control'></textarea>"
                                        + "    </div>"
                                        + "</div>"
                                        + "<div class='col-md-2'>"
                                        + "    <div class='form-group'>   "
                                        + "        <div class='label-group-resultado'>"
                                        + "        <label for='ra_metodologia_" + cantidad_resultados_de_aprendizaje + "'>Metodologia</label>"
                                        + "         </div>"
                                        + "        <textarea id='ra_metodologia_" + cantidad_resultados_de_aprendizaje + "' name='ra_metodologia_" + cantidad_resultados_de_aprendizaje + "' rows='14' class='form-control'></textarea>"
                                        + "    </div>"
                                        + "</div>"
                                        + "<div class='col-md-2'>"
                                        + "    <div class='form-group'>   "
                                        + "        <div class='label-group-resultado'>"
                                        + "        <label for='ra_criterios_evaluacion_" + cantidad_resultados_de_aprendizaje + "'>Criterios de Evaluación</label>"
                                        + "         </div>"
                                        + "        <textarea id='ra_criterios_evaluacion_" + cantidad_resultados_de_aprendizaje + "' name='ra_criterios_evaluacion_" + cantidad_resultados_de_aprendizaje + "' rows='14' class='form-control'></textarea>"
                                        + "    </div>"
                                        + "</div>"
                                        + "<div class='col-md-2'>"
                                        + "    <div class='form-group'>   "
                                        + "        <div class='label-group-resultado'>"
                                        + "        <label for='ra_contenido_con_pro_act_" + cantidad_resultados_de_aprendizaje + "'>Contenidos conceptuales, procedimentales y actitudinales</label>"
                                        + "         </div>"
                                        + "        <textarea id='ra_contenido_con_pro_act_" + cantidad_resultados_de_aprendizaje + "' name='ra_contenido_con_pro_act_" + cantidad_resultados_de_aprendizaje + "' rows='14' class='form-control'></textarea>"
                                        + "    </div>"
                                        + "</div>"
                                        + "<div class='col-md-2'>"
                                        + "    <div class='form-group'>   "
                                        + "        <div class='label-group-resultado'>"
                                        + "        <label for='ra_evidencia_aprendizaje_" + cantidad_resultados_de_aprendizaje + "'>Evidencias de Aprendizaje (proceso y producto)</label>"
                                        + "         </div>"
                                        + "        <textarea id='ra_evidencia_aprendizaje_" + cantidad_resultados_de_aprendizaje + "' name='ra_evidencia_aprendizaje_" + cantidad_resultados_de_aprendizaje + "' rows='14' class='form-control'></textarea>"
                                        + "    </div>"
                                        + "</div>"
                                        + "<div class='col-md-2'>"
                                        + "        <div class='label-group-resultado'>"
                                        + "    <label>Tiempo Estimado</label>"
                                        + "         </div>"
                                        + "    <div class='form-group'>"
                                        + "        <label for='ra_ht_presenciales_" + cantidad_resultados_de_aprendizaje + "'>Horas Teoricas Presenciales:</label>"
                                        + "        <input type='number' class='form-control pull-right' id='ra_ht_presenciales_" + cantidad_resultados_de_aprendizaje + "' name='ra_ht_presenciales_" + cantidad_resultados_de_aprendizaje + "' min='0'>"
                                        + "    </div>"
                                        + "    <div class='form-group'>"
                                        + "        <label for='ra_hp_presenciales_" + cantidad_resultados_de_aprendizaje + "'>Horas Practicas Presenciales:</label>"
                                        + "        <input type='number' class='form-control pull-right' id='ra_hp_presenciales_" + cantidad_resultados_de_aprendizaje + "' name='ra_hp_presenciales_" + cantidad_resultados_de_aprendizaje + "' min='0'>"
                                        + "    </div>"
                                        + "    <div class='form-group'>"
                                        + "        <label for='ra_ht_autonomas_" + cantidad_resultados_de_aprendizaje + "'>Horas Teoricas Autonomas:</label>"
                                        + "        <input type='number' class='form-control pull-right' id='ra_ht_autonomas_" + cantidad_resultados_de_aprendizaje + "' name='ra_ht_autonomas_" + cantidad_resultados_de_aprendizaje + "' min='0'>"
                                        + "    </div>"
                                        + "    <div class='form-group'>"
                                        + "        <label for='ra_hp_autonomas_" + cantidad_resultados_de_aprendizaje + "'>Horas Practicas Autonomas:</label>"
                                        + "        <input type='number' class='form-control pull-right' id='ra_hp_autonomas_" + cantidad_resultados_de_aprendizaje + "' name='ra_hp_autonomas_" + cantidad_resultados_de_aprendizaje + "' min='0'>"
                                        + "    </div>"
                                        + "<div class='form-group'>"
                                        + "        <div  style='height: 200px;position:relative;'>"
                                        + "            <button class='btn btn-danger pull-right' style='position:absolute;bottom:5px;right:10px;' onclick='borrarResultadoAprendizaje(" + cantidad_resultados_de_aprendizaje + ")'><i class='glyphicon glyphicon - trash'></i> Borrar</button>"
                                        + "        </div>"
                                        + "    </div>"
                                        + "</div>"
                                        + "</div>";
                                $("#resultados-de-aprendizaje").append(contenido);

                                //agregarBarraHerramientaEditoresResultadoAPrendizaje(cantidad_resultados_de_aprendizaje);
                            }
                            
                            function borrarResultadoAprendizaje(id) {
                                quitarBarraHerramientaEditoresResultadoAPrendizaje(id);
                                $("#resultado_" + id).remove();
                            }
        </script>
    </body>
</html>
