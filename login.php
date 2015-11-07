<?php
header('Content-Type: text/html; charset="ISO-8859-9"'); ?>
<!DOCTYPE html>
<html lang="en">


<head>

    <!-- start: Meta -->
    <meta charset="ISO-8859-9" content="text/html">
    <title>Proje Yönetim Sistemi</title>
    <meta name="description" content="Bootstrap Metro Dashboard">
    <meta name="author" content="Dennis Ji">
    <meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <!-- end: Meta -->

    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->

    <!-- start: CSS -->
    <link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/pys.css">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    <link id="base-style" href="css/style.css" rel="stylesheet">
    <link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
    <!-- end: CSS -->


    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link id="ie-style" href="css/ie.css" rel="stylesheet">
    <![endif]-->

    <!--[if IE 9]>
    <link id="ie9style" href="css/ie9.css" rel="stylesheet">
    <![endif]-->

    <!-- start: Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- end: Favicon -->

    <style type="text/css">
        body { background: url(img/bg-login.jpg) !important; }
    </style>


    <script type="text/javascript" src="js/jquery-1.6.4.min.js"></script>

    <script type="text/javascript">
        function giris_yap(){
            $(function(){
                var sifre = $("#password").val();
                var kullanici  = $("#username").val();
                if(sifre == "" || kullanici == ""){
                    $("#loader").addClass("error").html("Giriş Başarısız!");
                }else{
                    $("#loader").html("<img src='img/loader-giris.png' alt='' />");
                    $.ajax({
                        url:"controller/login.php",
                        data:$("#loginForm").serialize(),
                        type:"post",
                        success:function(c){
                            var res = c.split("|||");
                            var class_val = (res[0] == "1" ? "success" : "error");
                            $("#loader").addClass(class_val).html(res[1]);
                        }
                    });
                }//end if
            });//ready
        }
    </script>



</head>

<body>
<div class="container-fluid-full">
    <div class="row-fluid">

        <div class="row-fluid">
            <div class="login-box">

                <h2 id="kullaniciGirisiHead">Kullanıcı Girişi</h2>
                <form class="form-horizontal" name="loginForm" id="loginForm" action="javascript:giris_yap();"  method="post">
                    <fieldset>

                        <div class="input-prepend" title="Username">
                            <span class="add-on"><i class="halflings-icon user"></i></span>
                            <input class="input-large span10" name="username" id="username" type="text" placeholder="kullanıcı adı"/>
                        </div>
                        <div class="clearfix"></div>

                        <div class="input-prepend" title="Password">
                            <span class="add-on"><i class="halflings-icon lock"></i></span>
                            <input class="input-large span10" name="password" id="password" type="password" placeholder="parola"/>
                        </div>
                        <div class="clearfix"></div>

                        <div class="button-login">
                            <input type="submit" class="btn btn-primary" value="Giriş" />
                        </div>
                        <div class="clearfix"></div>
                        <div id="loader" class="loader"></div>
                </form>
                <hr>
                <h3>Parolamı Unuttum?</h3>
                <p>
                    Yönetici ile <a href="mailto:info@siteadi.com">buradan</a> iletişime geçiniz.
                </p>
            </div><!--/span-->
        </div><!--/row-->


    </div><!--/.fluid-container-->

</div><!--/fluid-row-->

<!-- start: JavaScript-->

<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/jquery-migrate-1.0.0.min.js"></script>

<script src="js/jquery-ui-1.10.0.custom.min.js"></script>

<script src="js/jquery.ui.touch-punch.js"></script>

<script src="js/modernizr.js"></script>

<script src="js/bootstrap.min.js"></script>

<script src="js/jquery.cookie.js"></script>

<script src='js/fullcalendar.min.js'></script>

<script src='js/jquery.dataTables.min.js'></script>

<script src="js/excanvas.js"></script>
<script src="js/jquery.flot.js"></script>
<script src="js/jquery.flot.pie.js"></script>
<script src="js/jquery.flot.stack.js"></script>
<script src="js/jquery.flot.resize.min.js"></script>

<script src="js/jquery.chosen.min.js"></script>

<script src="js/jquery.uniform.min.js"></script>

<script src="js/jquery.cleditor.min.js"></script>

<script src="js/jquery.noty.js"></script>

<script src="js/jquery.elfinder.min.js"></script>

<script src="js/jquery.raty.min.js"></script>

<script src="js/jquery.iphone.toggle.js"></script>

<script src="js/jquery.uploadify-3.1.min.js"></script>

<script src="js/jquery.gritter.min.js"></script>

<script src="js/jquery.imagesloaded.js"></script>

<script src="js/jquery.masonry.min.js"></script>

<script src="js/jquery.knob.modified.js"></script>

<script src="js/jquery.sparkline.min.js"></script>

<script src="js/counter.js"></script>

<script src="js/retina.js"></script>

<script src="js/custom.js"></script>
<!-- end: JavaScript-->

</body>
</html>
