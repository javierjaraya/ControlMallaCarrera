<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Gesion Malla Carrera</title>
        <link rel="shortcut icon" href="Files/img/favicon.ico">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="Files/Complementos/template_admin_lite/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="Files/Complementos/template_admin_lite/dist/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="Files/Complementos/template_admin_lite/plugins/iCheck/square/blue.css">


<!--<script type="text/javascript" src="Files/Complementos/template_admin_lite/plugins/jquery-easyui-1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="Files/Complementos/template_admin_lite/plugins/jquery-easyui-1.4.2/jquery.easyui.min.js"></script>
<script type="text/javascript" src="Files/Complementos/template_admin_lite/plugins/jquery-easyui-1.4.2/plugins/jquery.datagrid.js"></script>-->

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <!--<a href="#"><b>Admin</b>LTE</a>-->
                <a href="#"><img src="Files/img/logo_ici.png"></a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Iniciar Sessión</p>
                <div id="alert"></div>
                <form id="fmlogin" action="Vista/Servlet/login.php" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Rut" id="usu_rut" name="usu_rut">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Contraseña" id="usu_password" name="usu_password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox"> Recordarme
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat" onclick="">Ingresar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.social-auth-links -->

            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <!-- jQuery 2.2.3 -->
        <script src="Files/Complementos/template_admin_lite/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="Files/Complementos/template_admin_lite/bootstrap/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="Files/Complementos/template_admin_lite/plugins/iCheck/icheck.min.js"></script>
        
        <!-- Usabilidad -->
        <script src="Files/js/usabilidad.js"></script>
        <script>
                                $(function () {
                                    $('input').iCheck({
                                        checkboxClass: 'icheckbox_square-blue',
                                        radioClass: 'iradio_square-blue',
                                        increaseArea: '20%' // optional
                                    });
                                });

                                $("#fmlogin").submit(function (e) {
                                    $.ajax({
                                        type: "POST",
                                        url: "Vista/Servlet/login.php",
                                        data: $("#fmlogin").serialize(),
                                        success: function (result){
                                            var result = eval('(' + result + ')');
                                            if (!result.success) {
                                                notificacion(result.mensaje, 'danger','alert')
                                            } else {
                                                location.href = result.pagina;
                                            }
                                        }
                                    });
                                    e.preventDefault();
                                });
        </script>
    </body>
</html>
