<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
?><!DOCTYPE html>
<html lang="es">
<head>
	<?php $this->load->view('header'); ?>

	<title>BIENVENIDO</title>
</head>
<body>
	<?php $this->load->view('menu'); ?>
<div id="container">
		<br><br><br><br><br>
	<header>
		<center><h3 style="color: #3538A7"><img width="70" src="<?=$base_url?>/resources/img/escudo.jpg"/>SICTA</h3></center>
	</header>
<br><br><br><br>
<br><br>
    <center><h2>Bienvenido al Sistema Informático de Coordinación Técnico Administrativo</h2>
	<h1>08 - 01 - 03</h1>
    <br>
    <script>alertify.custom = alertify.extend("custom");alertify.custom("Bienvenido al Sistema");</script>
  <script>alertify.set('notifier');alertify.success('<?php echo $this->session->NOMBRE ?>');</script>
  <h3 style="color: #0DDF12"><?php echo $this->session->NOMBRE ?></h3></center>
  <br>
  <br><br>
<section class="container">
  <div class="alert alert-warning" role="alert">
  Recuerde Registrar días efectivos.
</div>
<div class="alert alert-danger" role="alert">
  Recuerde revisar el calendario, para ver si hay actividades para la semana.
</div>
</section>  
<br><br><br><br>

</div>
<footer><?php $this->load->view('footer') ?></footer> 
</body>
</html>
