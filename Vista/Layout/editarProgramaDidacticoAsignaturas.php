<!DOCTYPE html>
<?php
session_start();
if ($_SESSION['autentificado'] != "SI") {
    header("Location: ../../index.php");
}
$per_id = $_SESSION["per_id"];
$per_nombre = $_SESSION["per_nombre"];
$usu_nombre = $_SESSION["usu_nombre"];

$pd_id = $_REQUEST["pd_id"];

include_once '../../Controlador/Contenedor.php';
$control = Contenedor::getInstancia();
$programa_didacto = $control->getPrograma_didacticoByID($pd_id);
$programa_extenso = $control->getPrograma_extensoByID($programa_didacto->getPe_id());
$pe_id = $programa_didacto->getPe_id();
$asignatura = $control->getAsignaturaById($programa_extenso->getAsig_Codigo());
$resultado_aprendizajes = $control->getAllResultado_aprendizajes_By_pe_id($programa_didacto->getPe_id());
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
                height: 39px;
            }
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
                        Programa Guia Didáctico
                        <small>Asignaturas</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li>Programa Guia Didáctico</li>
                        <li class="active">Editar Programa Guia Didáctico</li>
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
                                        <h3 class="box-title">I. Identificación General del Curso</h3>
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
                                                    <input type="text" class="form-control pull-right" id="pe_tipo_curso" name="pe_tipo_curso" value="<?= $programa_extenso->getPe_tipo_curso() ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_carrera">Carrera:</label>
                                                    <input type="text" class="form-control pull-right" id="pe_carrera" name="pe_carrera" value="<?= $programa_extenso->getPe_carrera() ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_departamento">Departamento:</label>
                                                    <input type="text" class="form-control pull-right" id="pe_departamento" name="pe_departamento" value="<?= $programa_extenso->getPe_departamento() ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_facultad">Facultad:</label>
                                                    <input type="text" class="form-control pull-right" id="pe_facultad" name="pe_facultad" value="<?= $programa_extenso->getPe_facultad() ?>" readonly >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_nro_creditos">N° Créditos SCT:</label>
                                                    <input type="number" class="form-control pull-right" id="pe_nro_creditos" name="pe_nro_creditos" value="<?= $programa_extenso->getPe_nro_creditos() ?>" readonly >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_horas_cronologicas">Horas Cronológicas:</label>
                                                    <input type="number" class="form-control pull-right" id="pe_horas_cronologicas" name="pe_horas_cronologicas" value="<?= $programa_extenso->getPe_horas_cronologicas() ?>" readonly >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_horas_pedagogicas">Horas Pedagógicas:</label>
                                                    <input type="number" class="form-control pull-right" id="pe_horas_pedagogicas" name="pe_horas_pedagogicas" value="<?= $programa_extenso->getPe_horas_pedagogicas() ?>" readonly >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_anio">Año:</label>
                                                    <input type="number" class="form-control pull-right" id="pe_anio" name="pe_anio" value="<?= $programa_extenso->getPe_anio() ?>" readonly >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_semestre">Semestre:</label>
                                                    <input type="number" class="form-control pull-right" id="pe_semestre" name="pe_semestre" value="<?= $programa_extenso->getPe_semestre() ?>" readonly >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_hrs_presenciales">Horas Presenciales:</label>
                                                    <input type="number" class="form-control pull-right" id="pe_hrs_presenciales" name="pe_hrs_presenciales" value="<?= $programa_extenso->getPe_hrs_presenciales() ?>" readonly >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_ht_presenciales">Horas Teoricas Presenciales:</label>
                                                    <input type="number" class="form-control pull-right" id="pe_ht_presenciales" name="pe_ht_presenciales" value="<?= $programa_extenso->getPe_ht_presenciales() ?>" readonly >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_hp_presenciales">Horas Practicas Presenciales:</label>
                                                    <input type="number" class="form-control pull-right" id="pe_hp_presenciales" name="pe_hp_presenciales" value="<?= $programa_extenso->getPe_hp_presenciales() ?>" readonly >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_hl_presenciales">Horas Laboratorio Presenciales:</label>
                                                    <input type="number" class="form-control pull-right" id="pe_hl_presenciales" name="pe_hl_presenciales" value="<?= $programa_extenso->getPe_hl_presenciales() ?>" readonly >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_hrs_autonomas">Horas Trabajo Autónomo:</label>
                                                    <input type="number" class="form-control pull-right" id="pe_hrs_autonomas" name="pe_hrs_autonomas" value="<?= $programa_extenso->getPe_hrs_autonomas() ?>" readonly >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_ht_autonomas">Horas Teoricas Autónomo:</label>
                                                    <input type="number" class="form-control pull-right" id="pe_ht_autonomas" name="pe_ht_autonomas" value="<?= $programa_extenso->getPe_ht_autonomas() ?>" readonly >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_hp_autonomas">Horas Practicas Autónomo:</label>
                                                    <input type="number" class="form-control pull-right" id="pe_hp_autonomas" name="pe_hp_autonomas" value="<?= $programa_extenso->getPe_hp_autonomas() ?>" readonly >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_hl_autonomas">Horas Laboratorio Autónomo:</label>
                                                    <input type="number" class="form-control pull-right" id="pe_hl_autonomas" name="pe_hl_autonomas" value="<?= $programa_extenso->getPe_hl_autonomas() ?>" readonly >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_fecha_inicio">Fecha Inicio Periodo Valides:</label>
                                                    <input type="date" class="form-control pull-right" id="pe_fecha_inicio" name="pe_fecha_inicio" value="<?= $programa_extenso->getPe_fecha_inicio() ?>" readonly >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="pe_fecha_fin">Fecha Fin Periodo Valides:</label>
                                                    <input type="date" class="form-control pull-right" id="pe_fecha_fin" name="pe_fecha_fin" value="<?= $programa_extenso->getPe_fecha_fin() ?>" readonly >
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
                                        <h3 class="box-title">II. Desarrollo de la Propuesta Didáctica</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body" id="resultados-de-aprendizaje">
                                        <?php
                                        $i = 0;
                                        foreach ($resultado_aprendizajes as $value) {
                                            $desarrollo_pd = $control->getDesarrollo_programa_didacticoBy_ra_id($value->getRa_id());
                                            ?>
                                            <div class="group-resultado">
                                                <div class="col-md-4">
                                                    <div class="form-group">   
                                                        <div class="label-group-resultado">
                                                            <label for="ra_resultado_aprendizaje_0">Resultados de Aprendizaje</label>
                                                        </div>
                                                        <div class="borde-div" style="height: 320px;">
                                                            <?= $value->getRa_resultado_aprendizaje() ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">   
                                                        <div class="label-group-resultado">
                                                            <label for="ra_contenido_con_pro_act_0">Contenidos conceptuales, procedimentales y actitudinales</label>
                                                        </div>
                                                        <div class="borde-div" style="height: 320px;">
                                                            <?= $value->getRa_contenido_con_pro_act() ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">   
                                                        <div class="label-group-resultado">
                                                            <label for="ra_criterios_evaluacion_0">Criterios de Evaluación</label>
                                                        </div>
                                                        <div class="borde-div" style="height: 320px;">
                                                            <?= $value->getRa_criterios_evaluacion() ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">   
                                                        <div class="label-group-resultado">
                                                            <label for="ra_metodologia_0">Metodologia</label>
                                                        </div>
                                                        <div class="borde-div" style="height: 120px;">
                                                            <?= $value->getRa_metodologia() ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- DESARROLLO GUIA DIDACTICA -->
                                                <div class="col-md-3">
                                                    <div class="form-group">   
                                                        <div class="label-group-resultado">
                                                            <label for="dpd_actividad_aprendizaje_<?= $i ?>">Actividad de Aprendizaje (del estudiante)</label>
                                                        </div>
                                                        <textarea id="dpd_actividad_aprendizaje_<?= $i ?>" name="dpd_actividad_aprendizaje_<?= $i ?>" rows="20" class="form-control"><?= $desarrollo_pd->getDpd_actividad_aprendizaje() ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">   
                                                        <div class="label-group-resultado">
                                                            <label for="dpd_mediacion_ensenianza_<?= $i ?>">Mediación de la Enseñanza (Gestión del docente)</label>
                                                        </div>
                                                        <textarea id="dpd_mediacion_ensenianza_<?= $i ?>" name="dpd_mediacion_ensenianza_<?= $i ?>" rows="20" class="form-control"><?= $desarrollo_pd->getDpd_mediacion_ensenianza() ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">   
                                                        <div class="label-group-resultado">
                                                            <label for="dpd_actividad_evaluacion_<?= $i ?>">Actividad de Evaluación (proceso y producto)</label>
                                                        </div>
                                                        <textarea id="dpd_actividad_evaluacion_<?= $i ?>" name="dpd_actividad_evaluacion_<?= $i ?>" rows="19" class="form-control"><?= $desarrollo_pd->getDpd_actividad_evaluacion() ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">   
                                                        <div class="label-group-resultado">
                                                            <label for="dpd_recurso_didactivo_<?= $i ?>">Recurso Didáctico</label>
                                                        </div>
                                                        <textarea id="dpd_recurso_didactivo_<?= $i ?>" name="dpd_recurso_didactivo_<?= $i ?>" rows="19" class="form-control"><?= $desarrollo_pd->getDpd_recurso_didactivo() ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="label-group-resultado">
                                                        <label>Tiempo Estimado</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="dpd_hp_ht_<?= $i ?>">Horas Teoricas Presenciales:</label>
                                                        <input type="number" class="form-control pull-right" id="dpd_hp_ht_<?= $i ?>" name="dpd_hp_ht_<?= $i ?>" min="0" value="<?= $desarrollo_pd->getDpd_hp_ht() ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="dpd_hp_hp_<?= $i ?>">Horas Practicas Presenciales:</label>
                                                        <input type="number" class="form-control pull-right" id="dpd_hp_hp_<?= $i ?>" name="dpd_hp_hp_<?= $i ?>" min="0" value="<?= $desarrollo_pd->getDpd_hp_hp() ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="dpd_hp_hl_<?= $i ?>">Horas Laboratorio Presenciales:</label>
                                                        <input type="number" class="form-control pull-right" id="dpd_hp_hl_<?= $i ?>" name="dpd_hp_hl_<?= $i ?>" min="0" value="<?= $desarrollo_pd->getDpd_hp_hl() ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="dpd_hp_ha_<?= $i ?>">Horas Ayudantia Presenciales:</label>
                                                        <input type="number" class="form-control pull-right" id="dpd_hp_ha_<?= $i ?>" name="dpd_hp_ha_<?= $i ?>" min="0" value="<?= $desarrollo_pd->getDpd_hp_ha() ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="dpd_ha_ht_<?= $i ?>">Horas Teoricas Autonomas:</label>
                                                        <input type="number" class="form-control pull-right" id="dpd_ha_ht_<?= $i ?>" name="dpd_ha_ht_<?= $i ?>" min="0" value="<?= $desarrollo_pd->getDpd_ha_ht() ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="dpd_ha_hp_<?= $i ?>">Horas Practicas Autonomas:</label>
                                                        <input type="number" class="form-control pull-right" id="dpd_ha_hp_<?= $i ?>" name="dpd_ha_hp_<?= $i ?>" min="0" value="<?= $desarrollo_pd->getDpd_ha_hp() ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="dpd_ha_hl_<?= $i ?>">Horas Laboratorio Autonomas:</label>
                                                        <input type="number" class="form-control pull-right" id="dpd_ha_hl_<?= $i ?>" name="dpd_ha_hl_<?= $i ?>" min="0" value="<?= $desarrollo_pd->getDpd_ha_hl() ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="dpd_ha_ha_<?= $i ?>">Horas Ayudantia Autonomas:</label>
                                                        <input type="number" class="form-control pull-right" id="dpd_ha_ha_<?= $i ?>" name="dpd_ha_ha_<?= $i ?>" min="0" value="<?= $desarrollo_pd->getDpd_ha_ha() ?>">
                                                    </div>
                                                    <input type="hidden" id="ra_id_<?= $i ?>" name="ra_id_<?= $i ?>" value="<?= $value->getRa_id() ?>">
                                                </div>
                                                <!-- FIN DESARROLLO GUIA DIDACTICA -->
                                            </div>

                                            <?php
                                            $i++;
                                        }
                                        ?>
                                    </div>
                                    <!-- ./box-body -->

                                    <div class="modal-footer">
                                        <input type="hidden" id="accion" name="accion" value="">
                                        <input type="hidden" id="cantidad-resultados-aprendizaje" name="cantidad-resultados-aprendizaje" value="<?= ($i - 1) ?>">
                                        <input type="hidden" id="pe_id" name="pe_id" value="<?= $pe_id ?>">
                                        <a href="administrarProgramaDidacticoAsignaturasDocente.php?pe_id=<?= $pe_id ?>" class="btn btn-default" ><i class="glyphicon glyphicon-arrow-left"></i>  Volver Atras</a>
                                        <button type="button" class="btn btn-info" onclick="crearBorradorProgramaDidactico()"><i class="glyphicon glyphicon-floppy-disk"></i>  Guardar Borrador</button>
                                        <button type="button" class="btn btn-success" onclick="crearProgramaDidacticoConfirmar()"><i class="glyphicon glyphicon-ok"></i>  Enviar Programa a Revisión</button>
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
                        <h4>Al enviar una version a revision del programa, se eliminaran todos los borradores. ¿Desea enviar el nuevo programa?.</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cacelar</button>
                        <button type="button" class="btn btn-success" onclick="crearProgramaDidactico()"><i class="glyphicon glyphicon-ok"></i>  Enviar Programa a Revisión</button>
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
                            var actividad_aprendizaje = [];
                            var mediación_enseñanza = [];
                            var actividad_evaluacion = [];
                            var recurso_didactico = [];

                            //<![CDATA[
                            bkLib.onDomLoaded(function () {
                                cantidad_resultados_de_aprendizaje = $("#cantidad-resultados-aprendizaje").val();
                                for (var i = 0; i <= cantidad_resultados_de_aprendizaje; i++) {
                                    agregarBarraHerramientaEditoresResultadoAPrendizaje(i);
                                }
                            });
                            //]]>

                            function crearBorradorProgramaDidactico() {
                                $("#accion").val("AGREGAR_BORRADOR");
                                quitarBarrraHerramientaTodosLosEditoresResultadoAprendizaje();
                                $.post("../Servlet/administrarPrograma_didactico.php", $("#fm-programa").serialize(), function (data) {
                                    agregarBarraHerramientaTodosLosEditoresResultadoAprendizaje();
                                    if (data.errorMsg) {
                                        notificacion(data.errorMsg, 'danger', 'alert');
                                    } else {
                                        notificacion(data.mensaje, 'success', 'alert');
                                    }
                                    location.href = "#alert";
                                },"json");
                            }

                            function crearProgramaDidacticoConfirmar() {
                                quitarBarrraHerramientaTodosLosEditoresResultadoAprendizaje();
                                if (validar()) {
                                    $('#modalProgramaAsignaturaConfirmar').modal('show');
                                }
                                agregarBarraHerramientaTodosLosEditoresResultadoAprendizaje();
                            }

                            function crearProgramaDidactico() {
                                $("#accion").val("AGREGAR");
                                quitarBarrraHerramientaTodosLosEditoresResultadoAprendizaje();
                                $.post("../Servlet/administrarPrograma_didactico.php", $("#fm-programa").serialize(), function (data) {
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
                                //VALIDAR RESULTADOS DE APRENDIZAJE AQUI
                                for (var i = 0; i <= cantidad_resultados_de_aprendizaje; i++) {
                                    var dpd_actividad_aprendizaje = $("#dpd_actividad_aprendizaje_" + i).val();
                                    var dpd_mediacion_ensenianza = $("#dpd_mediacion_ensenianza_" + i).val();
                                    var dpd_actividad_evaluacion = $("#dpd_actividad_evaluacion_" + i).val();
                                    var dpd_recurso_didactivo = $("#dpd_recurso_didactivo_" + i).val();

                                    var dpd_hp_ht = $("#dpd_hp_ht_" + i).val();
                                    var dpd_hp_hp = $("#dpd_hp_hp_" + i).val();
                                    var dpd_hp_hl = $("#dpd_hp_hl_" + i).val();
                                    var dpd_hp_ha = $("#dpd_hp_ha_" + i).val();
                                    var dpd_ha_ht = $("#dpd_ha_ht_" + i).val();
                                    var dpd_ha_hp = $("#dpd_ha_hp_" + i).val();
                                    var dpd_ha_hl = $("#dpd_ha_hl_" + i).val();
                                    var dpd_ha_ha = $("#dpd_ha_ha_" + i).val();

                                    if (dpd_actividad_aprendizaje == "") {
                                        notificacion("Debe llenar todas las actividades de aprendizaje del item II. Desarrollo de la Propuesta Didáctica", 'danger', 'alert');
                                        location.href = "#alert";
                                        return false;
                                    }
                                    if (dpd_mediacion_ensenianza == "") {
                                        notificacion("Debe llenar todas las mediaciónes de la enseñanza del item II. Desarrollo de la Propuesta Didáctica", 'danger', 'alert');
                                        location.href = "#alert";
                                        return false;
                                    }
                                    if (dpd_actividad_evaluacion == "") {
                                        notificacion("Debe llenar todas las actividades de evaluación del item II. Desarrollo de la Propuesta Didáctica", 'danger', 'alert');
                                        location.href = "#alert";
                                        return false;
                                    }
                                    if (dpd_recurso_didactivo == "") {
                                        notificacion("Debe llenar todos los recursos didácticos del item II. Desarrollo de la Propuesta Didáctica", 'danger', 'alert');
                                        location.href = "#alert";
                                        return false;
                                    }
                                    if (dpd_hp_ht == "") {
                                        notificacion("Debe ingresar todos las horas teoricas presenciales del item II. Desarrollo de la Propuesta Didáctica", 'danger', 'alert');
                                        location.href = "#alert";
                                        return false;
                                    }
                                    if (isNaN(dpd_hp_ht)) {
                                        notificacion("Todas las horas teoricas presenciales deben ser valores numericos del item II. Desarrollo de la Propuesta Didáctica", 'danger', 'alert');
                                        location.href = "#alert";
                                        return false;
                                    }
                                    if (dpd_hp_ht < 0) {
                                        notificacion("Todas las horas teoricas presenciales deben ser mayor o igual a cero del item II. Desarrollo de la Propuesta Didáctica", 'danger', 'alert');
                                        location.href = "#alert";
                                        return false;
                                    }                                    
                                    if (dpd_hp_hp == "") {
                                        notificacion("Debe ingresar todos las horas practicas presenciales del item II. Desarrollo de la Propuesta Didáctica", 'danger', 'alert');
                                        location.href = "#alert";
                                        return false;
                                    }
                                    if (isNaN(dpd_hp_hp)) {
                                        notificacion("Todas las horas practicas presenciales deben ser valores numericos del item II. Desarrollo de la Propuesta Didáctica", 'danger', 'alert');
                                        location.href = "#alert";
                                        return false;
                                    }
                                    if (dpd_hp_hp < 0) {
                                        notificacion("Todas las horas practicas presenciales deben ser mayor o igual a cero del item II. Desarrollo de la Propuesta Didáctica", 'danger', 'alert');
                                        location.href = "#alert";
                                        return false;
                                    }
                                    if (dpd_hp_hl == "") {
                                        notificacion("Debe ingresar todos las horas de laboratorio presenciales del item II. Desarrollo de la Propuesta Didáctica", 'danger', 'alert');
                                        location.href = "#alert";
                                        return false;
                                    }
                                    if (isNaN(dpd_hp_hl)) {
                                        notificacion("Todas las horas de laboratorio presenciales deben ser valores numericos del item II. Desarrollo de la Propuesta Didáctica", 'danger', 'alert');
                                        location.href = "#alert";
                                        return false;
                                    }
                                    if (dpd_hp_hl < 0) {
                                        notificacion("Todas las horas de laboratorio presenciales deben ser mayor o igual a cero del item II. Desarrollo de la Propuesta Didáctica", 'danger', 'alert');
                                        location.href = "#alert";
                                        return false;
                                    }
                                    if (dpd_hp_ha == "") {
                                        notificacion("Debe ingresar todos las horas de ayudantia presenciales del item II. Desarrollo de la Propuesta Didáctica", 'danger', 'alert');
                                        location.href = "#alert";
                                        return false;
                                    }
                                    if (isNaN(dpd_hp_ha)) {
                                        notificacion("Todas las horas de ayudantia presenciales deben ser valores numericos del item II. Desarrollo de la Propuesta Didáctica", 'danger', 'alert');
                                        location.href = "#alert";
                                        return false;
                                    }
                                    if (dpd_hp_ha < 0) {
                                        notificacion("Todas las horas de ayudantia presenciales deben ser mayor o igual a cero del item II. Desarrollo de la Propuesta Didáctica", 'danger', 'alert');
                                        location.href = "#alert";
                                        return false;
                                    }
                                    if (dpd_ha_ht == "") {
                                        notificacion("Debe ingresar todos las horas teoricas autonomas del item II. Desarrollo de la Propuesta Didáctica", 'danger', 'alert');
                                        location.href = "#alert";
                                        return false;
                                    }
                                    if (isNaN(dpd_ha_ht)) {
                                        notificacion("Todas las horas teoricas autonomas deben ser valores numericos del item II. Desarrollo de la Propuesta Didáctica", 'danger', 'alert');
                                        location.href = "#alert";
                                        return false;
                                    }
                                    if (dpd_ha_ht < 0) {
                                        notificacion("Todas las horas teoricas autonomas deben ser mayor o igual a cero del item II. Desarrollo de la Propuesta Didáctica", 'danger', 'alert');
                                        location.href = "#alert";
                                        return false;
                                    }
                                    if (dpd_ha_hp == "") {
                                        notificacion("Debe ingresar todos las horas practicas autonomas del item II. Desarrollo de la Propuesta Didáctica", 'danger', 'alert');
                                        location.href = "#alert";
                                        return false;
                                    }
                                    if (isNaN(dpd_ha_hp)) {
                                        notificacion("Todas las horas practicas autonomas deben ser valores numericos del item II. Desarrollo de la Propuesta Didáctica", 'danger', 'alert');
                                        location.href = "#alert";
                                        return false;
                                    }
                                    if (dpd_ha_hp < 0) {
                                        notificacion("Todas las horas practicas autonomas deben ser mayor o igual a cero del item II. Desarrollo de la Propuesta Didáctica", 'danger', 'alert');
                                        location.href = "#alert";
                                        return false;
                                    }
                                    if (dpd_ha_hl == "") {
                                        notificacion("Debe ingresar todos las horas de laboratorio autonomas del item II. Desarrollo de la Propuesta Didáctica", 'danger', 'alert');
                                        location.href = "#alert";
                                        return false;
                                    }
                                    if (isNaN(dpd_ha_hl)) {
                                        notificacion("Todas las horas de laboratorio autonomas deben ser valores numericos del item II. Desarrollo de la Propuesta Didáctica", 'danger', 'alert');
                                        location.href = "#alert";
                                        return false;
                                    }
                                    if (dpd_ha_hl < 0) {
                                        notificacion("Todas las horas de laboratorio autonomas deben ser mayor o igual a cero del item II. Desarrollo de la Propuesta Didáctica", 'danger', 'alert');
                                        location.href = "#alert";
                                        return false;
                                    }
                                    if (dpd_ha_ha == "") {
                                        notificacion("Debe ingresar todos las horas de ayudantia autonomas del item II. Desarrollo de la Propuesta Didáctica", 'danger', 'alert');
                                        location.href = "#alert";
                                        return false;
                                    }
                                    if (isNaN(dpd_ha_ha)) {
                                        notificacion("Todas las horas de ayudantia autonomas deben ser valores numericos del item II. Desarrollo de la Propuesta Didáctica", 'danger', 'alert');
                                        location.href = "#alert";
                                        return false;
                                    }
                                    if (dpd_ha_ha < 0) {
                                        notificacion("Todas las horas de ayudantia autonomas deben ser mayor o igual a cero del item II. Desarrollo de la Propuesta Didáctica", 'danger', 'alert');
                                        location.href = "#alert";
                                        return false;
                                    }
                                }
                                return true;
                            }

                            function agregarBarraHerramientaEditoresResultadoAPrendizaje(id) {
                                var dpd_actividad_aprendizaje_edit;
                                var dpd_mediacion_ensenianza_edit;
                                var dpd_actividad_evaluacion_edit;
                                var dpd_recurso_didactivo_edit;

                                if (!dpd_actividad_aprendizaje_edit) {
                                    dpd_actividad_aprendizaje_edit = new nicEditor({fullPanel: true}).panelInstance('dpd_actividad_aprendizaje_' + id, {hasPanel: true});
                                }
                                if (!dpd_mediacion_ensenianza_edit) {
                                    dpd_mediacion_ensenianza_edit = new nicEditor({fullPanel: true}).panelInstance('dpd_mediacion_ensenianza_' + id, {hasPanel: true});
                                }
                                if (!dpd_actividad_evaluacion_edit) {
                                    dpd_actividad_evaluacion_edit = new nicEditor({fullPanel: true}).panelInstance('dpd_actividad_evaluacion_' + id, {hasPanel: true});
                                }
                                if (!dpd_recurso_didactivo_edit) {
                                    dpd_recurso_didactivo_edit = new nicEditor({fullPanel: true}).panelInstance('dpd_recurso_didactivo_' + id, {hasPanel: true});
                                }

                                actividad_aprendizaje[id] = dpd_actividad_aprendizaje_edit;
                                mediación_enseñanza[id] = dpd_mediacion_ensenianza_edit;
                                actividad_evaluacion[id] = dpd_actividad_evaluacion_edit;
                                recurso_didactico[id] = dpd_recurso_didactivo_edit;
                            }

                            function agregarBarraHerramientaTodosLosEditoresResultadoAprendizaje() {
                                for (var i = 0; i <= cantidad_resultados_de_aprendizaje; i++) {
                                    agregarBarraHerramientaEditoresResultadoAPrendizaje(i);
                                }
                            }
                            function quitarBarraHerramientaEditoresResultadoAPrendizaje(id) {
                                actividad_aprendizaje[id].removeInstance('dpd_actividad_aprendizaje_' + id);
                                actividad_aprendizaje[id] = null;

                                mediación_enseñanza[id].removeInstance('dpd_mediacion_ensenianza_' + id);
                                mediación_enseñanza[id] = null;

                                actividad_evaluacion[id].removeInstance('dpd_actividad_evaluacion_' + id);
                                actividad_evaluacion[id] = null;

                                recurso_didactico[id].removeInstance('dpd_recurso_didactivo_' + id);
                                recurso_didactico[id] = null;
                            }

                            function quitarBarrraHerramientaTodosLosEditoresResultadoAprendizaje() {
                                for (var i = 0; i <= cantidad_resultados_de_aprendizaje; i++) {
                                    quitarBarraHerramientaEditoresResultadoAPrendizaje(i);
                                }
                            }
        </script>
    </body>
</html>

