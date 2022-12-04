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
        <td>%s</td>.
        
       </tr>\n";
$htmltrows = "";

foreach ($arr as $a) {
  $id_escuela = $a['id_escuela'];
  $htmltrows .= sprintf($htmltrow, 
    $a['codigo'], $a['nombre'], $a['nombred'], $a['mail'], $a['telefono'], $a['direccion']);
}
?><!DOCTYPE html>
<html lang="es">
<style>
table {
  width:100%;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;
}
#t01 tr:nth-child(even) {
  background-color: #eee;
}
#t01 tr:nth-child(odd) {
 background-color: #fff;
}
#t01 th {
  background-color: #0E1154;
  color: white;
}
</style>
<head>
<?php $this->load->view('header'); ?>
</head>
<body>
<div class="container">
<header>
  <h3 style="text-align: center; color: #00057A">Listado general de establecimientos</h3>
  <h4 style="text-align: center; color: #E10000">Coordinación Técnico Administrativo 08-01-03 </h4>
  <h4 style="text-align: center; color: #0008B4">Licda. Gladys Esperanza Pacheco Gutiérrez </h4>
</header>
<section>
  <div class="table-responsive-sm">
      <table class="table table-striped table-bordered" id="t01">
      <thead> 
        <tr>
          <th>CÓDIGO</th>
          <th>NOMBRE DEL ESTABLECIMIENTO</th>
          <th>-DIRECTOR-</th>
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
<p>Totonicapán, <?=date("d/m/Y")?>.</p>
</body>

</html>