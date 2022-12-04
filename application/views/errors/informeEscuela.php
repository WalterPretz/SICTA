<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";

if (count($arr) < 1) {

  $mensaje = 
"<script>alertify.set('notifier');alertify.success('No hay ninguna escuela registrada');</script>";
}

$htmltrow = "<tr>
        <td>%s</td> 
        <td>%s</td>
        <td>%s</td>
        <td>%s</td>  
        <td>%s</td>
        <td>%s</td>
       </tr>\n";
$htmltrows = "";

foreach ($arr as $a) {
  $id_escuela = $a['id_escuela'];
  $htmltrows .= sprintf($htmltrow, 
    $a['codigo'], $a['nombre'], $a['nombred'], $a['mail'], $a['telefono'], $a['direccion']);
}
?><!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('header'); ?>
  <title>Proveedores</title>
</head>
<body>
  <?php $this->load->view('menu'); ?>
<div class="container">
<header class="espacio-arriba"><center>
  <h3 style="color: #03064A">Listado general de establecimientos</h3>
  <h4>Coordinación Técnico Administrativo 08-01-03 </h4>
  <h5>Licda. Gladys Esperanza Pacheco Gutiérrez </h5>
</center>
<br>
</header>
<section>
  <div class="table-responsive-sm">
      <table class="table table-striped table-bordered">
      <thead> 
        <tr id="letra_info">
          <th>CÓDIGO</th>
          <th>NOMBRE DEL ESTABLECIMIENTO</th>
          <th>DIRECTOR</th>
          <th>CORREO ELECTRÓNICO</th>
          <th>TELÉFONO</th>
          <th>DIRECCIÓN</th>
        </tr>
      </thead>
      <tbody>
        <?=$htmltrows?>
      </tbody>
      </table>
    <div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
  </div>
</section>
</div>
<br>
</body>
</html>
</html>