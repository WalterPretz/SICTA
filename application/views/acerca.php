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


</div>
 <section class="showcase">
    <div class="container-fluid p-0">   
      <div class="row no-gutters">
        <div class="col-lg-6 text-white showcase-img" style="background-image: url('<?=$base_url?>/resources/img/cod.jpg');"></div>
        <div class="col-lg-6 my-auto showcase-text">
        <img src="<?=$base_url?>/resources/img/172.png" width="120" style="margin-right: 150px"/>
          <h2>Proyecto UMG 2019</h2>
          <p class="lead mb-0">Esta aplicación fue desarrollada como parte del poroceso de formación académica de Ingenieros en Sistemas de Información de la Facultad de Ingeniería en Sistemas, Universidad Mariano Gálvez. Con la promocion de la Coordinadora Tecnico Administrativo 08-01-03 Licenciada Gladys Pacheco.</p><br>
          <p>Totonicapán, <?=date("Y")?>.</p>
			<p>Prof. Walter Pretz</p>
        </div>
      </div>
    </div>
  </section>
  <footer><?php $this->load->view('footer') ?></footer>
</body>
</html>
