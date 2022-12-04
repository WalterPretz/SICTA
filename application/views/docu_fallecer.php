<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
<head>
	<?php $this->load->view('header'); ?>
	<title>DOCUMENTOS</title>
</head>
<body>
<header><?php $this->load->view('menu'); ?>	</header>
<div class="container">
  <section class="espacio-arriba">
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Documentos para Trámites de Fallecimiento</th>
    </tr>
  </thead>
</table>
</section>
<section>
  <div class="text-center">
    <div class="row">
      <div class="col-6  col-sm-6  col-md-3 col-lg-2 col-xl-2">
        <div class=" card card1">
          <div class="card-body">
            <img class="card-img-top mb-1" style="width: 5rem;" src="<?=$base_url?>/resources/icons/word.png" alt="Card image cap">
            <p class="card-text">Documentos de Entrega por Fallecimiento</p>
            <a href="<?=$base_url?>/resources/documentos/Fallecimiento 2019/DOCUMENTOS DE ENTREGA POR FALLECIMIENTO.doc" class="btn btn-success" download="DOCUMENTOS DE ENTREGA POR FALLECIMIENTO.doc">Descargar</a>
          </div>
        </div>
      </div>
      <div class="col-6 col-sm-6  col-md-3 col-lg-2 col-xl-2">
        <div class=" card card1">
          <div class="card-body">
            <img class="card-img-top mb-1" style="width: 5rem;" src="<?=$base_url?>/resources/icons/word.png" alt="Card image cap">
            <p class="card-text">Entrega por Fallecimiento en la Coordinación</p>
            <a href="<?=$base_url?>/resources/documentos/Fallecimiento 2019/Modelo de Entrega por Fallecimiento en la Coordinación.doc" class="btn btn-success" download="Modelo de Entrega por Fallecimiento en la Coordinación.doc">Descargar</a>
          </div>
        </div>
      </div>
      <div class="col-6  col-sm-6  col-md-3 col-lg-2 col-xl-2">
        <div class=" card card1">
          <div class="card-body">
            <img class="card-img-top mb-1" style="width: 5rem;" src="<?=$base_url?>/resources/icons/word.png" alt="Card image cap">
            <p class="card-text">Modelo de Entrega por Fallecimiento</p>
            <a href="<?=$base_url?>/resources/documentos/Fallecimiento 2019/Modelo de Entrega por Fallecimiento.doc" class="btn btn-success" download="Modelo de Entrega por Fallecimiento.doc">Descargar</a>
          </div>
        </div>
      </div>
      <div class="col-6  col-sm-6  col-md-3 col-lg-2 col-xl-2">
        <div class=" card card1">
          <div class="card-body">
            <img class="card-img-top mb-1" style="width: 5rem;" src="<?=$base_url?>/resources/icons/word.png" alt="Card image cap">
            <p class="card-text">Documento de Proceso de Fallecimiento   </p>
            <a href="<?=$base_url?>/resources/documentos/Fallecimiento 2019/Proceso de Fallecimiento.doc" class="btn btn-success" download="Proceso de Fallecimiento.doc">Descargar</a>
          </div>
        </div>
      </div>
      <div class="col-6  col-sm-6  col-md-3 col-lg-2 col-xl-2">
        <div class=" card card1">
          <div class="card-body">
            <img class="card-img-top mb-1" style="width: 5rem;" src="<?=$base_url?>/resources/icons/word.png" alt="Card image cap">
            <p class="card-title">Solicitud de Cuadros de Movimiento de Personal</p>
            <a href="<?=$base_url?>/resources/documentos/Fallecimiento 2019/Solicitud de Cuadros de Movimiento de Personal.doc" class="btn btn-success" download="Solicitud de Cuadros de Movimiento de Personal.doc">Descargar</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br> <br>
</section>
<section>
  <table class="table">
  <thead class="bg-danger">
    <tr>
      <th scope="col">Suspensión de Salario</th>
    </tr>
  </thead>
</table>
</section>
<section>
  <div class="text-center">
    <div class="row">
      <div class="col-6  col-sm-6  col-md-3 col-lg-2 col-xl-2" >
        <div class=" card card1">
          <div class="card-body">
            <img class="card-img-top mb-1" style="width: 5rem;" src="<?=$base_url?>/resources/icons/word.png" alt="Card image cap">
            <p class="card-text"><strong>Documentos de Suspensión de Salario</strong></p>
            <a href="<?=$base_url?>/resources/documentos/Fallecimiento 2019/Suspension Salario/Documentos Suspension Salario.doc" class="btn btn-primary" download="Documentos Suspension Salario.doc">Descargar</a>
          </div>
        </div>
      </div>
      <div class="col-6  col-sm-6  col-md-3 col-lg-2 col-xl-2">
        <div class=" card card1">
          <div class="card-body">
            <img class="card-img-top mb-1" style="width: 5rem;" src="<?=$base_url?>/resources/icons/excel.png" alt="Card image cap">
            <p class="card-text"><strong>Formulario Suspensión de Pago</strong></p>
            <a href="<?=$base_url?>/resources/documentos/Fallecimiento 2019/Suspension Salario/Formulario Suspension de Pago 2019.xls" class="btn btn-primary" download="Formulario Suspension de Pago 2019.xls">Descargar</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
<br>
<footer><?php $this->load->view('footer') ?></footer>
</body>
</html>
