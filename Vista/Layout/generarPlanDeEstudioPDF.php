<?php
ob_start(); //Iniciar Buffer
include_once '../../Controlador/Contenedor.php';

$control = Contenedor::getInstancia();

$m_id = htmlspecialchars($_REQUEST['m_id']);
$malla = $control->getMallaByID($m_id);
$m_cantidadSemestres = $malla->getM_cantidadSemestres();
?>

<html>
    <head>

        <style type="text/css">
            body {
                font-family: "Arial";
                font-size: 15px;
            }
            .titulo-documento { 
                width: 733.22px;
                height: 20px;
                text-align: center;
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

            .table {
                width: 733.22px;
                border-spacing:0;
                border-collapse:collapse;
                border-color:black;
            }
            .td-borde{
                border: black 1px solid;
            }
            .table td {
                font-size:10px;
                //padding:10px 5px;
                border-style:solid;
                border-width:1px;
                overflow:hidden;
                word-break:normal;
                border-color:black;
                color: black;
            }
            .alto-s{
                height: 20px;
            }
            .fondo{
                background-color: #BDBDBD;
            }
        </style>
    </head>
    <body>
        <div class="titulo-documento">
            <label><b>Plan de Estudios Carrera Ingenier&iacute;a Civil en Inform&aacute;tica</b></label>
        </div>
        <br><br>
        <?php for ($i = 1; $i <= $m_cantidadSemestres; $i++) { ?>
            <table class="table">
                <tr class="fondo">
                    <td class="td-borde center td-borde" rowspan="2">Sem</td>
                    <td class="td-borde center td-borde" rowspan="2">Cr&eacute;di-<br>tos<br>SCT</td>
                    <td class="td-borde center" rowspan="2">Asignatura</td>
                    <td class="td-borde center" colspan="4">Horas Presenciales</td>
                    <td class="td-borde center" colspan="4">Horas Aut&oacute;nomas</td>
                    <td class="td-borde center" rowspan="2">Total<br>Horas<br>Peda-<br>g&oacute;gi-<br>cas</td>
                    <td class="td-borde center" rowspan="2">Total<br>Horas<br>Crono-<br>l&oacute;gicas</td>
                    <td class="td-borde center" rowspan="2">Prerre-<br>quisitos</td>
                    <td class="td-borde center" rowspan="2">Corre-<br>quisi-<br>tos</td>
                </tr>
                <tr class="fondo">
                    <td class="td-borde center" >HT</td>
                    <td class="td-borde center" >HP</td>
                    <td class="td-borde center" >HL</td>
                    <td class="td-borde center" >*</td>
                    <td class="td-borde center" >HT</td>
                    <td class="td-borde center" >HP</td>
                    <td class="td-borde center" >HL</td>
                    <td class="td-borde center" >*</td>
                </tr>
                <?php
                $asignaturaAndProgramaBasico = $control->getAsignaturasAndProgramaBasicoByM_id_And_asig_periodo($m_id, $i);
                $count = 0;
                $countCreditos = 0;
                $countHT_presenciales = 0;
                $countHP_presenciales = 0;
                $countHL_presenciales = 0;
                $countHAyu_presenciales = 0;
                $countHT_autonomas = 0;
                $countHP_autonomas = 0;
                $countHL_autonomas = 0;
                $countHAyu_autonomas = 0;
                $countTotalPedagogicas = 0;
                $countTotalCronologicas = 0;

                foreach ($asignaturaAndProgramaBasico as $value) {
                    $programa_basico = $value->getPrograma_basico();
                    $prerrequisitos = $control->getAllPrerrequisitosByAsig_Codigo($value->getAsig_codigo());
                    $textoPrerrequisitos = "";
                    foreach ($prerrequisitos as $pre) {
                        $asig_pre = $control->getAsignaturaByID($pre->getAsig_codigo_prerrequisito());
                        $textoPrerrequisitos = $textoPrerrequisitos . "- " . utf8_decode($asig_pre->getAsig_nombre()) . "<br>";
                    }

                    $correquisitos = $control->getAllCorrequisitosByAsig_Codigo($value->getAsig_codigo());
                    
                    $textoCorrequisitos = "";
                    if ($value->getAsig_correquisitos() != "" && $value->getAsig_correquisitos() != "<br>") {
                            $textoCorrequisitos = utf8_decode($value->getAsig_correquisitos());
                    } else {
                        $textoCorrequisitos =  "No Tiene";
                    }
                    
                    $countCreditos = (int)$countCreditos + (int)$value->getAsig_creditos();
                    if ($programa_basico->getPb_ht_presenciales() != NULL) {
                        $countHT_presenciales = (int)$countHT_presenciales + (int)$programa_basico->getPb_ht_presenciales();
                        $countHP_presenciales = (int)$countHP_presenciales + (int)$programa_basico->getPb_hp_presenciales();
                        $countHL_presenciales = (int)$countHL_presenciales + (int)$programa_basico->getPb_hl_presenciales();
                        $countHAyu_presenciales = (int)$countHAyu_presenciales + (int)0;
                        $countHT_autonomas = (int)$countHT_autonomas + (int)$programa_basico->getPb_ht_autonomas();
                        $countHP_autonomas = (int)$countHP_autonomas + (int)$programa_basico->getPb_hp_autonomas();
                        $countHL_autonomas = (int)$countHL_autonomas + (int)$programa_basico->getPb_hl_autonomas();
                        $countHAyu_autonomas = (int)$countHAyu_autonomas + (int)0;
                        $countTotalPedagogicas = (int)$countTotalPedagogicas + (int)$programa_basico->getPb_horas_pedagogicas();
                        $countTotalCronologicas = (int)$countTotalCronologicas + (int)$programa_basico->getPb_horas_cronologicas();
                    }
                    ?>
                    <tr>
                        <td class="td-borde center" valign="top"><?= $value->getAsig_periodo() ?></td>
                        <td class="td-borde center" valign="top"><?= $value->getAsig_creditos() ?></td>
                        <td class="td-borde left" valign="top"><?= utf8_decode($value->getAsig_nombre()) ?></td>
                        <td class="td-borde center" valign="top"><?= $programa_basico->getPb_ht_presenciales() ?></td>
                        <td class="td-borde center" valign="top"><?= $programa_basico->getPb_hp_presenciales() ?></td>
                        <td class="td-borde center" valign="top"><?= $programa_basico->getPb_hl_presenciales() ?></td>
                        <td class="td-borde center" valign="top"></td>
                        <td class="td-borde center" valign="top"><?= $programa_basico->getPb_ht_autonomas() ?></td>
                        <td class="td-borde center" valign="top"><?= $programa_basico->getPb_hp_autonomas() ?></td>
                        <td class="td-borde center" valign="top"><?= $programa_basico->getPb_hl_autonomas() ?></td>
                        <td class="td-borde center" valign="top"></td>
                        <td class="td-borde center" valign="top"><?= $programa_basico->getPb_horas_pedagogicas() ?></td>
                        <td class="td-borde center" valign="top"><?= $programa_basico->getPb_horas_cronologicas() ?></td>
                        <td class="td-borde left" valign="top"><?= $textoPrerrequisitos ?></td>
                        <td class="td-borde left" valign="top"><?= $textoCorrequisitos ?></td>
                    </tr>

                    <?php
                    $count++;
                }
                if ($count == 0) {
                    ?>
                    <tr class="alto-s">
                        <td class="td-borde center"></td>
                        <td class="td-borde center"></td>
                        <td class="td-borde center"></td>
                        <td class="td-borde center"></td>
                        <td class="td-borde center"></td>
                        <td class="td-borde center"></td>
                        <td class="td-borde center"></td>
                        <td class="td-borde center"></td>
                        <td class="td-borde center"></td>
                        <td class="td-borde center"></td>
                        <td class="td-borde center"></td>
                        <td class="td-borde center"></td>
                        <td class="td-borde center"></td>
                        <td class="td-borde center"></td>
                        <td class="td-borde center"></td>
                    </tr>
                    <tr class="fondo">
                        <td class="td-borde center">Total</td>
                        <td class="td-borde center"></td>
                        <td class="td-borde center"></td>
                        <td class="td-borde center"></td>
                        <td class="td-borde center"></td>
                        <td class="td-borde center"></td>
                        <td class="td-borde center"></td>
                        <td class="td-borde center"></td>
                        <td class="td-borde center"></td>
                        <td class="td-borde center"></td>
                        <td class="td-borde center"></td>
                        <td class="td-borde center"></td>
                        <td class="td-borde center"></td>
                        <td class="td-borde center"></td>
                        <td class="td-borde center"></td>
                    </tr>
                <?php } else { ?>
                    <tr class="fondo">
                        <td class="td-borde center">Total</td>
                        <td class="td-borde center"><?= $countCreditos ?></td>
                        <td class="td-borde center"></td>
                        <td class="td-borde center"><?= $countHT_presenciales ?></td>
                        <td class="td-borde center"><?= $countHP_presenciales ?></td>
                        <td class="td-borde center"><?= $countHL_presenciales ?></td>
                        <td class="td-borde center"><?= $countHAyu_presenciales ?></td>
                        <td class="td-borde center"><?= $countHT_autonomas ?></td>
                        <td class="td-borde center"><?= $countHP_autonomas ?></td>
                        <td class="td-borde center"><?= $countHL_autonomas ?></td>
                        <td class="td-borde center"><?= $countHAyu_autonomas ?></td>
                        <td class="td-borde center"><?= $countTotalPedagogicas ?></td>
                        <td class="td-borde center"><?= $countTotalCronologicas ?></td>
                        <td class="td-borde center"></td>
                        <td class="td-borde center"></td>
                    </tr>
                <?php } ?>
            </table>
            <br><br>
        <?php } ?>
    </body>
</html>


<?php

  $html = ob_get_clean();
  $html = utf8_encode($html);

  define('MPDF_PATH', "../../Files/Complementos/mpdf60/");
  include(MPDF_PATH . "mpdf.php");
  $mpdf = new mPDF('UTF-8', array(216, 276));
  $mpdf->allow_charset_conversion = true;
  $mpdf->charset_in = 'UTF-8';
  $mpdf->WriteHTML($html);
  $mpdf->Output('Inventario Bienes Inmuebles.pdf', 'I');
 
exit();
?>