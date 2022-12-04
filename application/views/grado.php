<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
<head>
	<?php $this->load->view('header'); ?>
	<title>Acerca de esta aplicación</title>
</head>
<body>

<div id="container">
	<?php $this->load->view('menu'); ?>
	<header>
		<br><br><br>
		<h3><img width="40" src="<?=$base_url?>/resources/img/in.png"/> Acerca de...</h3>
	</header>
	<br>
	<div id="body">
		<div class="bs-callout bs-callout-info">
			<div style="float: left;">
				<img src="<?=$base_url?>/resources/img/172.png" width="120" style="margin-right: 20px"/>
			</div>
			<h4 id="callout-progress-csp">Proyecto UMG 2019</h4>
			<p>
				Esta aplicación fue desarrollada como parte del poroceso de formación académica de Ingenieros en Sistemas de Información de la Facultad de Ingeniería en Sistemas, Universidad Mariano Gálvez.

				Con la promocion de la Coordinadora Tecnico Administrativo 08-01-03 Licenciada Gladys Pacheco.
			</p>
			<p>
				Totonicapán, <?=date("Y")?>.
			</p>
			<p>
				Walter Pretz
			</p>
		</div>
	</div>
</div>

</body>
</html>
