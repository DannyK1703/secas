<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/img/apple-icon.png')?>">
	<link rel="icon" type="image/png" sizes="96x96" href="<?= base_url('assets/img/favicon.png')?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>rente</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="<?= base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?= base_url('assets/css/animate.min.css')?>" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="<?= base_url('assets/css/paper-dashboard.css')?>" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?= base_url('assets/css/demo.css" rel="stylesheet')?>" />

    <!--  Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="<?= base_url('assets/css/themify-icons.css')?>" rel="stylesheet">

</head>
<body>

<div class="wrapper">
	

        <div class="content">
            <div class="container-fluid" >
                <div class="row">
                    
                    <div class="col-lg-6 col-md-4" style="margin-left:300px">
                        <div class="card" style="text-align:center;">
                            <div class="header">
                                <h4 class="title">SECAS<br/><br/>Authentification</h4>
                            </div>
                            <div class="content">
                                <form method="post" action="<?php echo site_url('Welcome/connexion'); ?>" >
                                    

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Login</label>
                                                <input type="text" class="form-control border-input" placeholder="Login" name="login">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control border-input" placeholder="Mot de passe" name="pwd" >
                                            </div>
                                        </div>
                                    </div>

                                    
                                   

                                    <div class="text-center">
                                        <input type="submit" class="btn btn-info btn-fill btn-wd" value="Valider"/>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>


        
    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="<?= base_url('assets/js/jquery.min.js')?>" type="text/javascript"></script>
	<script src="<?= base_url('assets/js/bootstrap.min.js')?>" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="<?= base_url('assets/js/bootstrap-checkbox-radio.js')?>"></script>

	<!--  Charts Plugin -->
	<script src="<?= base_url('assets/js/chartist.min.js')?>"></script>

    <!--  Notifications Plugin    -->
    <script src="<?= base_url('assets/js/bootstrap-notify.js')?>"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="<?= base_url('assets/js/paper-dashboard.js')?>"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="<?= base_url('assets/js/demo.js')?>"></script>

</html>
