<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Metro Admin</title>
    <link rel="icon" href="<?php echo base_url('assets/imgs/admin.ico') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/metro.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/metro-responsive.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/metro-schemes.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/icons/css/font-awesome.min.css') ?>">
    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/metro.min.js') ?>"></script>
    <style type="text/css">
    	.login-panel{
    		background-color: #efefef;
    		padding: 20px 20px 20px 30px;
    	}
    	div.input-control{
    		width: 100% !important;
    	}
    	h3{
    		text-align: center;
    	}
        .container{
            padding-top: 40px;
        }
        .errors-section>p{
            color: #ce352c;
        }
        .current-step{
            background-color: #0072c6 !important;
            color: white !important;
        }
    </style>
</head>
<body>
<div class="app-bar red">
	<a class="app-bar-element" href="<?php echo base_url() ?>">Metro Admin</a>
    <span class="app-bar-divider"></span>
    <ul class="app-bar-menu place-right">
        <li>
            <a href="" class="dropdown-toggle">Empleados</a>
            <ul class="d-menu place-right" data-role="dropdown">
                <li><a href="<?php echo base_url('empleados/lista') ?>">Lista</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo base_url('empleados/agregar') ?>">Agregar</a></li>
            </ul>
        </li>
        <li>
            <a href="" class="dropdown-toggle">Módulos</a>
            <ul class="d-menu place-right" data-role="dropdown">
                <li><a href="<?php echo base_url('modulos/departamentos') ?>">Departamentos</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo base_url('modulos/grupos') ?>">Grupos</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo base_url('modulos/permisos') ?>">Permisos</a></li>
            </ul>
        </li>
        <!-- <li>
            <a href="" class="dropdown-toggle">Products</a>
            <ul class="d-menu" data-role="dropdown">
                <li><a href="">Windows 10</a></li>
                <li><a href="">Spartan</a></li>
                <li><a href="">Outlook</a></li>
                <li><a href="">Office 2015</a></li>
                <li class="divider"></li>
                <li><a href="" class="dropdown-toggle">Other Products</a>
                    <ul class="d-menu" data-role="dropdown">
                        <li><a href="">Internet Explorer 10</a></li>
                        <li><a href="">Skype</a></li>
                        <li><a href="">Surface</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="">Support</a></li>
        <li><a href="">Help</a></li> -->
    </ul>
</div>