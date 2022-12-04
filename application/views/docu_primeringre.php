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
<header><div class="h4 text-center" style="color: black;"><strong>DOCUMENTOS PARA PRIMER INGRESO</strong></div></header>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No.</th>
      <th scope="col">TIPO</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">OPCIÓN</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td class="td2"><img src="<?=$base_url?>/resources/icons/word.png" alt="Card image cap" class="align-self-center mr-0" style="width: 2rem;"></td>
      <td class="td1"><p>Carta de Renuncia Renglón 021</p></td>
      <td class="td1"><a href="<?=$base_url?>/resources/documentos/Primer Ingreso 2019/CARTA DE RENUNCIA RENGLON 021.doc" class="btn btn-danger btn-sm" download="CARTA DE RENUNCIA RENGLON 021.doc">Descargar</a></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td class="td2"><img src="<?=$base_url?>/resources/icons/word.png" alt="Card image cap" class="align-self-center mr-0" style="width: 2rem;"></td>
      <td class="td1"><p>Documentos para Primer Ingreso 011</p></td>
      <td class="td1"><a href="<?=$base_url?>/resources/documentos/Primer Ingreso 2019/DOCUMENTOS PARA PRIMER INGRESO 011.doc" class="btn btn-danger btn-sm" download="DOCUMENTOS PARA PRIMER INGRESO 011.doc">Descargar</a></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td class="td2"><img src="<?=$base_url?>/resources/icons/word.png" alt="Card image cap" class="align-self-center mr-0" style="width: 2rem;"></td>
      <td class="td1"><p>Hoja de Desestimiento</p></td>
      <td class="td1"><a href="<?=$base_url?>/resources/documentos/Primer Ingreso 2019/Hoja de Desestimiento.doc" class="btn btn-danger btn-sm" download="Hoja de Desestimiento.doc">Descargar</a></td>
    </tr>
     <tr>
      <th scope="row">4</th>
      <td class="td2"><img src="<?=$base_url?>/resources/icons/word.png" alt="Card image cap" class="align-self-center mr-0" style="width: 2rem;"></td>
      <td class="td1"><p>Hoja de Solvencia</p></td>
      <td class="td1"><a href="<?=$base_url?>/resources/documentos/Primer Ingreso 2019/Hoja de Solvencia.doc" class="btn btn-danger btn-sm" download="Hoja de Solvencia.doc">Descargar</a></td>
    </tr>
    <tr>
      <th scope="row">5</th>
      <td class="td2"><img src="<?=$base_url?>/resources/icons/word.png" alt="Card image cap" class="align-self-center mr-0" style="width: 2rem;"></td>
      <td class="td1"><p>Modelo de Acta de Toma de Poseción</p></td>
      <td class="td1"><a href="<?=$base_url?>/resources/documentos/Primer Ingreso 2019/MODELO DE ACTA DE TOMA.doc" class="btn btn-danger btn-sm" download="MODELO DE ACTA DE TOMA.doc">Descargar</a></td>
    </tr>
    <tr>
      <th scope="row">6</th>
      <td class="td2"><img src="<?=$base_url?>/resources/icons/pdf.png" alt="Card image cap" class="align-self-center mr-0" style="width: 2rem;"></td>
      <td class="td1"><p>Hoja de Desestimiento</p></td>
      <td class="td1"><a href="<?=$base_url?>/resources/documentos/Primer Ingreso 2019/SOLICITUD CARNE IGSS.pdf" class="btn btn-danger btn-sm" download="SOLICITUD CARNE IGSS.pdf">Descargar</a></td>
    </tr>
     <tr>
      <th scope="row">7</th>
      <td class="td2"><img src="<?=$base_url?>/resources/icons/word.png" alt="Card image cap" class="align-self-center mr-0" style="width: 2rem;"></td>
      <td class="td1"><p>Solicitud de Cuadros de Movimiento de Personal</p></td>
      <td class="td1"><a href="<?=$base_url?>/resources/documentos/Primer Ingreso 2019/Solicitud de Elaboración de Cuadros de Movimiento de Personal.doc" class="btn btn-danger btn-sm" download="Solicitud de Elaboración de Cuadros de Movimiento de Personal.doc">Descargar</a></td>
    </tr>
    <tr>
      <th scope="row">8</th>
      <td class="td2"><img src="<?=$base_url?>/resources/icons/word.png" alt="Card image cap" class="align-self-center mr-0" style="width: 2rem;"></td>
      <td class="td1"><p>Solicitud para Apertura Cuenta Bancaria</p></td>
      <td class="td1"><a href="<?=$base_url?>/resources/documentos/Primer Ingreso 2019/SOLICITUD PARA APERTURAR  CUENTA BANCARIA DPI.doc" class="btn btn-danger btn-sm" download="SOLICITUD PARA APERTURAR  CUENTA BANCARIA DPI.doc">Descargar</a></td>
    </tr>
  </tbody>
</table>
</div>
<footer><?php $this->load->view('footer') ?></footer>
</body>    
</html>
