<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/img/apple-icon.png')?>">
	<link rel="icon" type="image/png" sizes="96x96" href="<?= base_url('assets/img/favicon.png')?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Prise en charge</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="<?= base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?= base_url('assets/css/animate.min.css')?>" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="<?= base_url('assets/css/paper-dashboard.css')?>" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?= base_url('assets/css/demo.css')?>" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="<?= base_url('assets/css/themify-icons.css')?>" rel="stylesheet">

</head>
<body>

<div class="wrapper">
	<div class="sidebar" data-background-color="white" data-active-color="danger">

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Notaire
                </a>
            </div>
            <ul class="nav">
                
			<li class="<?php if($a==1){ echo 'active';}?>">
                    <a href="<?=site_url('Welcome/listeAttestations')?>">
                        <i class="ti-user"></i>
                        <p>Attestations</p>
                    </a>
                </li>
                <li class="<?php if($a==2){ echo 'active';}?>">
                    <a href="<?=site_url('Welcome/accuielNotaire')?>">
                        <i class="ti-user"></i>
                        <p>Rentes en cours</p>
                    </a>
                </li>
                
                
            </ul>
    	</div>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Prise en Charge</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                       
						<li>
                        <a href="#" data-toggle="modal" data-target="#exampleModal">
                            <i class="ti-settings"></i>
								Settings
                                
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">SECAS/ Informations sur Le Notaire</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
      <p style="text-align: center;font-size: 25px;" class="text-uppercase"><?=$this->session->login?></p>
        <table class="table table-striped">
        <tr><td><p>Nom:</p></td><td><p class="text-uppercase"> <?=$this->session->nom?></p></td></tr>
        <tr><td><p>Matricule:</p> </td><td><p class="text-uppercase"><?=$this->session->matricule?></p></td></tr>
        <tr><td><p>Province:</p> </td><td><p class="text-uppercase"><?=$this->session->province?></p></td></tr>
        <tr><td><p>Telephone:</p> </td><td><p class="text-uppercase"><?=$this->session->phone?></p></td></tr></table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a class="btn btn-danger" href="<?= site_url('Welcome/deconnexion')?>">Deconnexion</a>
      </div>
    </div>
  </div>
</div>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
