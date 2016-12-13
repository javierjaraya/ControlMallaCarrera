<!DOCTYPE html>
<?php
session_start();
if ($_SESSION['autentificado'] != "SI") {
    header("Location: ../../index.php");
}
$per_id = $_SESSION["per_id"];
$per_nombre = $_SESSION["per_nombre"];
$usu_nombre = $_SESSION["usu_nombre"];
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
                        Asignar Docentes
                        <small>Asignaturas</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Asignar Docentes</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- CONTENIDO AQUI -->  
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div id="alert"></div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="m_id">Mallas Curriculares:</label>
                                                <select class="form-control pull-right" id="m_id" name="m_id" onchange="cargar()">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ./box-body -->
                            </div>
                        </div>
                    </div>

                    <div class="row" id="row-listado-asignaturas">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Listado Asignaturas</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Nombre</th>
                                                <th>Tipo</th>
                                                <th>Periodo</th>
                                                <th>Creditos</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-body -->
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
        <div class="modal fade" id="modalDocenteAsignatura" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="fm-docente" method="POST">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Datos Asignatura</h4>
                        </div>
                        <div class="modal-body">
                            <div id="modal-alert"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="asig_codigo">Codigo:</label>
                                        <input type="text" class="form-control" id="asig_codigo" name="asig_codigo">
                                    </div>
                                    <div class="form-group">
                                        <label for="asig_nombre">Nombre:</label>
                                        <input type="text" class="form-control" id="asig_nombre" name="asig_nombre">
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="row_docentes">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="button" class="btn btn-default" id="add_docente" name="add_docente" value="Agregar Docente" onclick="addDocente()">
                                    </div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td>Docente</td>
                                                <td>Acción</td>
                                            </tr>
                                        </thead>
                                        <tbody id="tabla_docentes">

                                        </tbody>                                                
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="accion" name="accion">
                            <input type="hidden" id="n_docentes" name="n_docentes" value="0">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- modal -->
        <div class="modal fade" id="modalConfirmacionEliminarDocente" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #3c8dbc; color: #fff;" >
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Confirmación</h4>
                    </div>
                    <div class="modal-body">
                        <h4>¿Esta seguro de eliminar el docente?, una vez eliminado no se podra recuperrar la informacion.</h4>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="n_docentes_conf" name="n_docentes_conf" value="">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-danger" onclick="confirmaEliminarDocenteGuardado()">Eliminar</button>
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
        <!-- Usabilidad -->
        <script src="../../Files/js/usabilidad.js"></script>

        <script>
                            $(function () {
                                document.getElementById('row-listado-asignaturas').style.display = 'none';
                                obtenerMallasCurriculares();
                            });

                            function obtenerMallasCurriculares() {
                                $.get("../Servlet/administrarMalla.php", {accion: 'LISTADO'}, function (data) {
                                    var data = eval(data);
                                    var select = document.getElementById("m_id");
                                    var count = 0;
                                    $.each(data, function (k, v) {
                                        var option = document.createElement("option");
                                        option.text = v.m_id;
                                        option.value = v.m_id;
                                        select.add(option);
                                        count++;
                                    });
                                    if (count == 0) {
                                        var option = document.createElement("option");
                                        option.text = "Seleccionar...";
                                        option.value = -1;
                                        select.add(option);
                                        document.getElementById('row-listado-asignaturas').style.display = 'none';
                                    } else {
                                        cargar();
                                    }
                                });
                            }

                            function cargar() {
                                var m_id = document.getElementById("m_id").value;
                                $.get("../Servlet/administrarAsignatura.php", {accion: 'LISTADO_BY_M_ID', m_id: m_id}, function (data) {
                                    var data = eval(data);
                                    if (data.length > 0) {
                                        document.getElementById('row-listado-asignaturas').style.display = 'block';
                                        $("#thead").empty();
                                        $("#tbody").empty();
                                        $.each(data, function (k, v) {
                                            var contenido = "<tr>";
                                            contenido += "<td>" + v.asig_codigo + "</td>";
                                            contenido += "<td>" + v.asig_nombre + "</td>";
                                            contenido += "<td>" + v.ta_nombre + "</td>";
                                            contenido += "<td>" + v.asig_periodo + "</td>";
                                            contenido += "<td>" + v.asig_creditos + "</td>";
                                            contenido += "<td>";
                                            contenido += "<button type='button' class='btn btn-info btn-circle glyphicon glyphicon-user' onclick='asignarDocente(" + v.asig_codigo + ")'></button>";
                                            contenido += "</td>";
                                            contenido += "</tr>";
                                            $("#tbody").append(contenido);
                                        });
                                        $("#table").DataTable();
                                    }
                                });
                            }

                            function addDocente() {
                                var n_docentes = $("#n_docentes").val();

                                $.get("../Servlet/administrarUsuario.php", {accion: 'LISTADO'}, function (data) {
                                    var data = eval(data);

                                    var select_html = "<tr id='tr_" + n_docentes + "'><td><select class='form-control pull-right' id='usu_rut_" + n_docentes + "' name='usu_rut_" + n_docentes + "'></select></td><td><center><a class='btn btn-danger' onclick='removeDocente(" + n_docentes + ")'><i class='fa fa-trash'></i></a></center></td></tr>"
                                    $("#tabla_docentes").append(select_html);
                                    var count = 0;
                                    var select = document.getElementById("usu_rut_" + n_docentes);
                                    n_docentes++;
                                    $("#n_docentes").val(n_docentes);
                                    $.each(data, function (k, v) {
                                        var option = document.createElement("option");
                                        option.text = v.usu_nombres + " " + v.usu_apellidos;
                                        option.value = v.usu_rut;
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

                            function removeDocente(n_docentes) {
                                $("#tr_" + n_docentes).remove();
                            }

                            /* ELIMINAR PRERREQUISITO GUARDADO*/
                            function removeDocenteGuardado(n_docentes) {
                                $('#n_docentes_conf').val(n_docentes);
                                $('#modalConfirmacionEliminarDocente').modal('show');
                            }

                            function confirmaEliminarDocenteGuardado() {
                                var n_docentes = $('#n_docentes_conf').val();
                                var usu_rut = $('#usu_rut_'+n_docentes).val();
                                var asig_codigo = $('#asig_codigo').val();
                                $.get("../Servlet/administrarDocente.php", {accion: 'BORRAR_BY_ASIG_CODIGO_USU_RUT', asig_codigo: asig_codigo, usu_rut: usu_rut}, function (data) {
                                    $("#tr_" + n_docentes).remove();
                                    $('#modalConfirmacionEliminarDocente').modal('toggle');
                                    if (!data.success) {
                                        notificacion(data.errorMsg, 'danger', 'alert');
                                    } else {
                                        notificacion(data.mensaje, 'success', 'alert');
                                    }
                                }, "json");
                            }
                            /*
                             * Metodo para generar el modal con los datos de la asignatura.
                             * @param {type} param                                             */
                            function asignarDocente(asig_codigo) {
                                document.getElementById("fm-docente").reset();
                                document.getElementById("asig_codigo").readOnly = true;
                                document.getElementById("asig_nombre").readOnly = true;
                                $("#tabla_docentes").html("");
                                $('#accion').val('AGREGAR');

                                $.get("../Servlet/administrarAsignatura.php", {accion: 'BUSCAR_BY_ID', asig_codigo: asig_codigo}, function (data) {
                                    var asig_codigo = $("#asig_codigo").val(data.asig_codigo);
                                    var asig_nombre = $("#asig_nombre").val(data.asig_nombre);
                                    var asig_periodo = $("#asig_periodo").val(data.asig_periodo);
                                    var asig_creditos = $("#asig_creditos").val(data.asig_creditos);
                                    $('#modalDocenteAsignatura').modal('show');
                                }, 'json');

                                $.get("../Servlet/administrarDocente.php", {accion: 'BUSCAR_BY_ASIG_CODIGO', asig_codigo: asig_codigo}, function (data) {
                                    $.each(data, function (k, v) {
                                        mostrarDocenteGuardado(v.usu_rut);
                                    });
                                }, 'json');
                            }

                            function mostrarDocenteGuardado(usu_rut) {
                                var n_docentes = $("#n_docentes").val();

                                var n_aux = n_docentes;
                                n_docentes++;
                                $("#n_docentes").val(n_docentes);
                                $.get("../Servlet/administrarUsuario.php", {accion: 'LISTADO'}, function (data) {
                                    var data = eval(data);

                                    var select_html = "<tr id='tr_" + n_aux + "'><td><select class='form-control pull-right' id='usu_rut_" + n_aux + "' name='usu_rut_" + n_aux + "' disabled='disabled'></select></td><td><center><a class='btn btn-danger' onclick='removeDocenteGuardado(" + n_aux + ")'><i class='fa fa - trash'></i></a></center></td></tr>"
                                    $("#tabla_docentes").append(select_html);

                                    var count = 0;
                                    var select = document.getElementById("usu_rut_" + n_aux);

                                    $.each(data, function (k, v) {
                                        var option = document.createElement("option");
                                        option.text = v.usu_nombres + " " + v.usu_apellidos;
                                        option.value = v.usu_rut;
                                        select.add(option);
                                        count++;
                                    });
                                    if (count == 0) {
                                        var option = document.createElement("option");
                                        option.text = "Seleccionar...";
                                        option.value = -1;
                                        select.add(option);
                                    } else {
                                        select.selectedIndex = usu_rut;
                                        select.value = usu_rut;
                                    }
                                });
                            }

                            /*
                             * Metodo para guardar los cambios en la asignacion de docentes.
                             * @param {type} param                                             */
                            $("#fm-docente").submit(function (e) {
                                if (validar()) {
                                    $.post("../Servlet/administrarDocente.php", $("#fm-docente").serialize(), function (data) {
                                        if (!data.success) {
                                            notificacion(data.errorMsg, 'danger', 'modal-alert');
                                        } else {
                                            notificacion(data.mensaje, 'success', 'alert');
                                            $('#modalDocenteAsignatura').modal('toggle');
                                            $("#fm-docente")[0].reset();
                                            cargar();
                                        }
                                    }, "json");
                                }
                                e.preventDefault();
                            });

                            function validar() {
                                var codigos = [];
                                var n_docentes = $("#n_docentes").val();
                                for (var i = 0; i <= n_docentes; i++) {
                                    if ($("#usu_rut_" + i).val() != "undefined") {
                                        var cod = $("#usu_rut_" + i).val();
                                        var res = codigos.indexOf(cod);
                                        if (res == -1) {
                                            codigos[cod] = cod;
                                        } else {
                                            notificacion("No se pueden repetir los docentes.", 'danger', 'modal-alert');
                                            return false;
                                        }
                                    }
                                }
                                return true;
                            }
                            /* Fin Guardar Asignacion Docente */

        </script>
    </body>
</html>
