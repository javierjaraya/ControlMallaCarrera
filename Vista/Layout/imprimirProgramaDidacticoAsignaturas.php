<?php
ob_start(); //Iniciar Buffer

include_once '../../Controlador/Contenedor.php';
$control = Contenedor::getInstancia();

$pd_id = htmlspecialchars($_REQUEST['pd_id']);

$programa_didacto = $control->getPrograma_didacticoByID($pd_id);
$programa_extenso = $control->getPrograma_ExtensoByID($programa_didacto->getPe_id());

$asignatura = $control->getAsignaturaById($programa_extenso->getAsig_codigo());

$resultado_aprendizajes = $control->getAllResultado_aprendizajes_By_pe_id($programa_didacto->getPe_id());
?>
<html>
    <head>
        <style type="text/css">
            body{
                //font-family: Calibri;
                font-family:Arial, sans-serif;
                font-size: 10px;
                font-style: normal;
                font-variant: normal;
                font-weight: 400;
                line-height: 11px;                 
            }
            .center{
                text-align: center;
            }

            .right {
                text-align: right;
                padding-right: 10px;
            }

            .left {
                text-align: left;
                padding-left: 10px;
            }
            .arial-10{
                font-size: 12px; font-family: 'Arial'
            }
            .table {
                //width: 733.22px;
                width: 600px;
                border-spacing:0;
                border-collapse:collapse;
                border-color:black;                
            }
            .margin-50{
                margin-left: 50px;
            }
            .fondo{
                background-color: #DFDFDF;
            }
            .table-sin_border{
                width: 600px;
            }
            .td-borde{
                border: black 1px solid;
            }

            .table td {
                font-size:12px;
                font-family: 'Arial';
                border-style: solid;
                border-width:0.5px;
                overflow:hidden;
                word-break:normal;
                border-color:black;
                color: black;
            }
            .alto-xs{
                height: 26.45px;
            }
            .alto-xm{
                height: 55px;
            }
            .alto-xl{
                height: 70px;
            }
            .alto-minimo{
                height: 80px;
            }
            .alto-titulo{
                height: 30px;
            }
            .ancho-xl{
                width: 150px;
            }
            .ancho-xx{
                width: 104px;
            }
            .align-top-vert{
                vertical-align:top;
            }
        </style>
    </head>
    <body>

        <table class="table-sin_border margin-50">
            <tr>
                <td class="center"><img src="../../Files/img/fml-sur-logo-ubb.jpg"></td>
            </tr>
        </table>
        <table class="table-sin_border margin-50">
            <tr>
                <td class="center" style="color: #33689E; font-size: 12px; font-family: 'Century Gothic';"><b>UNIVERSIDAD DEL B&iacute;O&#8211;B&Iacute;O<br>VICERRECTOR&Iacute;A ACAD&Eacute;MICA &#8211; DIRECCION DE DOCENCIA</b></td>
            </tr>
        </table>
        <br>
        <table class="table-sin_border margin-50">
            <tr>
                <td class="center fondo alto-titulo" style="font-size: 13px;">
                    <!--<b>ESQUEMA EXTENSO<br>-->GUIA DID&Aacute;CTICA</b>
                </td>
            </tr>
        </table>
        <br>
        <table class="table-sin_border margin-50 arial-10"><tr><td><b>I. IDENTIFICACI&Oacute;N GENERAL DEL CURSO</b></td></tr></table>
        <br>
        <table class="table  margin-50">
            <tr>
                <td class="alto-xs"><b>Nombre asignatura:</b>&nbsp;<?= utf8_decode($asignatura->getAsig_nombre()) ?></td><td rowspan="3" class="align-top-vert"><b>Periodo de<br>Vigencia:</b><br>&nbsp;<?= substr(utf8_decode($programa_extenso->getPe_fecha_inicio()), 0, 4) ?>&nbsp;&nbsp;-&nbsp;&nbsp;<?= substr(utf8_decode($programa_extenso->getPe_fecha_fin()), 0, 4) ?></td>
            </tr>
            <tr>
                <td class="alto-xs"><b>C&oacute;digo:</b>&nbsp;<?= utf8_decode($asignatura->getAsig_codigo()) ?></td>
            </tr>
            <tr>
                <td class="alto-xs"><b>Tipo de Curso:</b>&nbsp;<?= utf8_decode($programa_extenso->getPe_tipo_curso()) ?></td>
            </tr>
        </table>
        <br>
        <table class="table margin-50">
            <tr><td colspan="2" class="alto-xm ancho-xl align-top-vert"><b>Carrera:</b><br>&nbsp;<?= utf8_decode($programa_extenso->getPe_carrera()) ?></td><td colspan="2" class="alto-xm ancho-xl align-top-vert"><b>Departamento:</b><br>&nbsp;<?= utf8_decode($programa_extenso->getPe_departamento()) ?></td><td colspan="2" class="alto-xm ancho-xl align-top-vert"><b>Facultad</b><br>&nbsp;<?= utf8_decode($programa_extenso->getPe_facultad()) ?></td></tr>
            <tr><td colspan="2" class="alto-xm ancho-xl align-top-vert"><b>N Cr&eacute;ditos SCT:</b>&nbsp;<?= utf8_decode($programa_extenso->getPe_nro_creditos()) ?></td><td colspan="2" class="alto-xm ancho-xl align-top-vert"><b>Total de hotas</b><br>Cronol&oacute;gicas:&nbsp;<?= utf8_decode($programa_extenso->getPe_horas_cronologicas()) ?><br>Pedag&oacute;gicas:&nbsp;<?= utf8_decode($programa_extenso->getPe_horas_pedagogicas()) ?></td><td colspan="2" class="alto-xm ancho-xl align-top-vert"><b>A&ntilde;o / semestre:</b>&nbsp;<?= utf8_decode($programa_extenso->getPe_anio()) ?>&nbsp;/&nbsp;<?= utf8_decode($programa_extenso->getPe_semestre()) ?></td></tr>            
        </table>
        <br>
        <table class="table-sin_border margin-50 arial-10"><tr><td><b>II. DESARROLLO DE LA PROPUESTA DID&Aacute;CTICA</b></td></tr></table>
        <?php
        $i = 1;
        foreach ($resultado_aprendizajes as $value) {
            $desarrollo_pd = $control->getDesarrollo_programa_didacticoBy_ra_id($value->getRa_id());
            ?>
            <br>
            <table class="table margin-50">
                <tr>
                    <td class="alto-xm ancho-xl align-top-vert center">
                        <b>Resultado de<br>Aprendizaje <?= $i ?></b>
                    </td>
                    <td class="alto-xm ancho-xl align-top-vert">
                        <b>Contenidos</b><br>(conceptuales, procedimentales, actitudinales)
                    </td>
                    <td class="alto-xm ancho-xl align-top-vert center">
                        <b>Criterios de Evaluaci&oacute;n</b>
                    </td>
                </tr>
                <tr>
                    <td class="alto-minimo align-top-vert">
                        <?= utf8_decode($value->getRa_resultado_aprendizaje()) ?>
                    </td>
                    <td class="alto-minimo align-top-vert">
                        <?= utf8_decode($value->getRa_contenido_con_pro_act()) ?>
                    </td>
                    <td class="alto-minimo align-top-vert">
                        <?= utf8_decode($value->getRa_criterios_evaluacion()) ?>
                    </td>
                </tr>
                <tr>
                    <td class="align-top-vert center">
                        <b>Metodolog&iacute;as</b>
                    </td>
                    <td colspan="2" class="alto-xm align-top-vert">
                        <?= utf8_decode($value->getRa_metodologia()) ?>
                    </td>
                </tr>
            </table>
            <br>
            <table class="table margin-50">
                <tr class="fondo"><td class="align-top-vert center"><b>Actividad de <br>Aprendizaje</b><br>(del estudiante)</td><td class="align-top-vert center"><b>Mediaci&oacute;n de la<br>Ense&ntilde;anza</b><br>(Gesti&oacute;n del docente)</td><td class="align-top-vert center"><b>Actividad de<br>Evaluaci&oacute;n</b><br>(proceso y producto)</td><td class="align-top-vert center"><b>Recurso Did&aacute;ctico</b></td><td colspan="2" class="align-top-vert center"><b>Tiempo<br>Estimado</b><br>H.P&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;H.A</td></tr>
                <tr>
                    <td class="align-top-vert"><?= utf8_decode($desarrollo_pd->getDpd_actividad_aprendizaje()) ?></td>
                    <td class="align-top-vert"><?= utf8_decode($desarrollo_pd->getDpd_mediacion_ensenianza()) ?></td>
                    <td class="align-top-vert"><?= utf8_decode($desarrollo_pd->getDpd_actividad_evaluacion()) ?></td>
                    <td class="align-top-vert"><?= utf8_decode($desarrollo_pd->getDpd_recurso_didactivo()) ?></td>
                    <td class="align-top-vert"><br>HT:&nbsp;<?= $desarrollo_pd->getDpd_hp_ht() ?><br><br>HP:&nbsp;<?= $desarrollo_pd->getDpd_hp_hp() ?><br><br>HL:&nbsp;<?= $desarrollo_pd->getDpd_hp_hl() ?><br><br>HA:&nbsp;<?= $desarrollo_pd->getDpd_hp_ha() ?></td>
                    <td class="align-top-vert"><br>HT:&nbsp;<?= $desarrollo_pd->getDpd_ha_ht() ?><br><br>HP:&nbsp;<?= $desarrollo_pd->getDpd_ha_hp() ?><br><br>HT:&nbsp;<?= $desarrollo_pd->getDpd_ha_hl() ?><br><br>HP:&nbsp;<?= $desarrollo_pd->getDpd_ha_ha() ?></td>
                </tr>
            </table>
            <br>
            <?php
            $i++;
        }
        ?>
    </body>
</html>
<?php
$html = ob_get_clean();
$html = utf8_encode($html);

define('MPDF_PATH', "../../Files/Complementos/mpdf60/");
include(MPDF_PATH . "mpdf.php");
$mpdf = new mPDF('UTF-8', array(216, 279));
$mpdf->allow_charset_conversion = true;
$mpdf->charset_in = 'UTF-8';
$mpdf->WriteHTML($html);
$mpdf->Output('Guia Didactica Asigntarua ' . $asignatura->getAsig_nombre(), 'I');

exit();
?>
