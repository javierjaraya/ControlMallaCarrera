<?php
ob_start(); //Iniciar Buffer

include_once '../../Controlador/Contenedor.php';
$control = Contenedor::getInstancia();

$pb_id = htmlspecialchars($_REQUEST['pb_id']);
$programa_basico = $control->getPrograma_basicoByID($pb_id);

$asignatura = $control->getAsignaturaById($programa_basico->getAsig_codigo());

$perrequisitos = $control->getAllPerrequisitosByAsig_Codigo($programa_basico->getAsig_codigo());
$correquisitos = $control->getAllCorrequisitosByAsig_Codigo($programa_basico->getAsig_codigo());
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
                background-color: #BDBDBD;
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
                height: 40px;
            }
            .ancho-xl{
                width: 150px;
            }
            .ancho-xx{
                width: 104px;
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
                    <b>ESQUEMA B&Aacute;SICO<br>PROGRAMA DE ASIGNATURA</b>
                </td>
            </tr>
        </table>
        <br>
        <table class="table-sin_border margin-50 arial-10"><tr><td><b>I. IDENTIFICACI&Oacute;N</b></td></tr></table>
        <br>
        <table class="table  margin-50">
            <tr>
                <td class="alto-xs"><b>Nombre asignatura:</b>&nbsp;<?= utf8_decode($asignatura->getAsig_nombre()) ?></td>
            </tr>
            <tr>
                <td class="alto-xs"><b>C&oacute;digo:</b>&nbsp;<?= utf8_decode($asignatura->getAsig_codigo()) ?></td>
            </tr>
            <tr>
                <td class="alto-xs"><b>Tipo de Curso:</b>&nbsp;<?= utf8_decode($programa_basico->getPb_tipo_curso()) ?></td>
            </tr>
        </table>
        <br>
        <table class="table margin-50">
            <tr><td colspan="2" class="alto-xm ancho-xl"><b>Carrera:</b><br>&nbsp;<?= utf8_decode($programa_basico->getPb_carrera()) ?></td><td colspan="2" class="alto-xm ancho-xl"><b>Departamento:</b><br>&nbsp;<?= utf8_decode($programa_basico->getPb_departamento()) ?></td><td colspan="2" class="alto-xm ancho-xl"><b>Facultad</b><br>&nbsp;<?= utf8_decode($programa_basico->getPb_facultad()) ?></td></tr>
            <tr><td colspan="2" class="alto-xm ancho-xl"><b>N Cr&eacute;ditos SCT:</b>&nbsp;<?= utf8_decode($programa_basico->getPb_nro_creditos()) ?></td><td colspan="2" class="alto-xm ancho-xl"><b>Total de hotas</b><br>Cronol&oacute;gicas:&nbsp;<?= utf8_decode($programa_basico->getPb_horas_cronologicas()) ?><br>Pedag&oacute;gicas:&nbsp;<?= utf8_decode($programa_basico->getPb_horas_pedagogicas()) ?></td><td colspan="2" class="alto-xm ancho-xl"><b>A&ntilde;o / semestre:</b>&nbsp;<?= utf8_decode($programa_basico->getPb_anio()) ?>&nbsp;/&nbsp;<?= utf8_decode($programa_basico->getPb_semestre()) ?></td></tr>
            <tr><td colspan="3" class="alto-xl ancho-xx"><b>Horas presenciales:</b>&nbsp;<?= utf8_decode($programa_basico->getPb_hrs_presenciales()) ?>&nbsp;Pedag&oacute;gicas<br><b>HT:</b>&nbsp;<?= utf8_decode($programa_basico->getPb_ht_presenciales()) ?><br><b>HP:</b>&nbsp;<?= utf8_decode($programa_basico->getPb_hp_presenciales()) ?><br><b>HL:</b>&nbsp;<?= utf8_decode($programa_basico->getPb_hl_presenciales()) ?></td><td colspan="3" class="alto-xl ancho-xx"><b>Horas trabajo aut&oacute;nomas:</b>&nbsp;<?= utf8_decode($programa_basico->getPb_hrs_autonomas()) ?>&nbsp;Pedag&oacute;gicas<br><b>HT:</b>&nbsp;<?= utf8_decode($programa_basico->getPb_ht_autonomas()) ?><br><b>HP:</b>&nbsp;<?= utf8_decode($programa_basico->getPb_hp_autonomas()) ?><br><b>HL:</b>&nbsp;<?= utf8_decode($programa_basico->getPb_hl_autonomas()) ?></td></tr>
            <tr>
                <td colspan="3" class="alto-xl"><b>Prerrequisitos:</b><br>
                    <?php
                    foreach ($perrequisitos as $value) {
                        echo "<br>";
                        echo "Asignatura: ".utf8_decode($value->getAsig_nombre());
                        echo "<br>";
                        echo "C&oacute;digo: ".utf8_decode($value->getAsig_codigo());
                        echo "<br><br>";
                    }
                    ?>
                </td>
                <td colspan="3"><b>Correquisitos:</b><br>
                    <?php
                    foreach ($correquisitos as $value) {
                        echo "<br>";
                        echo "Asignatura: ".utf8_decode($value->getAsig_nombre());
                        echo "<br>";
                        echo "C&oacute;digo: ".utf8_decode($value->getAsig_codigo());
                        echo "<br><br>";
                    }
                    ?>
                </td>
            </tr>
        </table>
        <br>
        <table class="table-sin_border margin-50 arial-10"><tr><td><b>II. DESCRIPCI&Oacute;N</b></td></tr></table>
        <br>
        <table class="table-sin_border margin-50 arial-10"><tr><td><b>II.1 Presentaci&oacute;n; Relaci&oacute;n de la Asigntatura con las Competencias del Perfil de Egreso</b></td></tr></table>
        <br>
        <table class="table margin-50">
            <tr>
                <td class="alto-minimo">
                    <?= utf8_decode($programa_basico->getPb_presentacion()) ?>
                </td>
            </tr>
        </table>
        <br><br>
        <table class="table-sin_border margin-50 arial-10"><tr><td><b>II.2 Descriptor de las competencias</b></td></tr></table>
        <br>
        <table class="table margin-50">
            <tr>
                <td class="alto-minimo">
                    <?= utf8_decode($programa_basico->getPb_descriptor_competencias()) ?>
                </td>
            </tr>
        </table>
        <br><br>
        <table class="table-sin_border margin-50 arial-10"><tr><td><b>II.3 Aprendizajes Previos</b></td></tr></table>
        <br>
        <table class="table margin-50">
            <tr>
                <td class="alto-minimo">
                    <?= utf8_decode($programa_basico->getPb_aprendizajes_previos()) ?>
                </td>
            </tr>
        </table>
        <br><br>
        <table class="table-sin_border margin-50 arial-10"><tr><td><b>III. BIBLIOGRAF&Iacute;A</b></td></tr></table>
        <br>
        <table class="table margin-50">
            <tr>
                <td class="alto-minimo">
                    <b>Fundamental</b><br>
                    <?= utf8_decode($programa_basico->getPb_biblio_fundamental()) ?>
                </td>
            </tr>
            <tr>
                <td class="alto-minimo">
                    <b>Complementaria</b><br>
                    <?= utf8_decode($programa_basico->getPb_biblio_complementaria()) ?>
                </td>
            </tr>
        </table>
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
$mpdf->Output('Programa Basigo Asigntarua '.$asignatura->getAsig_nombre(), 'I');

exit();
?>
