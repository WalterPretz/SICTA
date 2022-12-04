<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
<head>
	<?php $this->load->view('header'); ?>
	<title>DOCUMENTOS</title>
</head>
<body>

<div class="container espacio-arriba">
	<?php $this->load->view('menu'); ?>
	<header><div class="h4 text-center" style="color: black;"><strong>DOCUMENTOS PARA SOLICITAR PAGOS</strong></div></header>

<section>
<table class="table table-striped">
  <thead class="thead-warning">
    <tr class="bg-warning">
      <th scope="col" class="td2 h6"><strong>No.</strong></th>
      <th scope="col" class="td2 h6"><strong>Tipo</strong></th>
      <th scope="col" class="h6"><strong>Nombre</strong></th>
      <th scope="col" class="h6"><strong>Opción</strong></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row" class="td2">1</th>
      <td class="td2"><img src="<?=$base_url?>/resources/icons/excel.png" alt="Card image cap" class="align-self-center mr-0" style="width: 2rem;"></td>
      <td class="td1"><p>Formulario para solicitar pago.</p></td>
      <td class="td1"><a href="<?=$base_url?>/resources/documentos/PAGOS 2019/FORMULARIO PARA SOLICITAR PAGOS 2018.xlsx" class="btn btn-primary btn-sm" download="FORMULARIO PARA SOLICITAR PAGOS 2018.xlsx">Descargar</a></td>
    </tr>
    <tr>
      <th scope="row" class="td2">2</th>
      <td class="td2"><img src="<?=$base_url?>/resources/icons/word.png" alt="Card image cap" class="align-self-center mr-0" style="width: 2rem;"></td>
      <td class="td1"><p>Requisitos para solicitar pago.</p></td>
      <td class="td1"><a href="<?=$base_url?>/resources/documentos/PAGOS 2019/REQUISITOS PARA SOLICITAR  PAGOS 2019.docx" class="btn btn-primary btn-sm" download="REQUISITOS PARA SOLICITAR  PAGOS 2019.docx">Descargar</a></td>
    </tr>
  </tbody>
</table>
</section>
</div><br><br><br><br>
<footer><?php $this->load->view('footer') ?></footer>
</body>
</html>
