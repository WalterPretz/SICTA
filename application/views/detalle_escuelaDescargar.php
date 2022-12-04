<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
if (count($arr) < 1) {
  $mensaje = "<script>alertify.set('notifier','position', 'top-right');alertify.error('No hay datos de la escuela');</script>";
}

$htmltrow = "<tr>
        <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> </tr>";
$htmltrows = "";
foreach ($arr as $a) {
  $id_escuela = $a['id_escuela'];  $htmltrows .= sprintf($htmltrow,
    $a['codigo'],$a['nombre'], $a['nombred'], $a['jornada'], $a['sector'], $a['nivel'], $a['plan'], $a['area']);
}

$htmltrow1 = "<tr>
        <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> </tr>";
$htmltrows1 = "";
foreach ($arr as $a) {
  $id_escuela = $a['id_escuela'];  $htmltrows1 .= sprintf($htmltrow1,
    $a['estado'],$a['modalidad'], $a['mail'], $a['telefono'], $a['coordinacion'], $a['direccion'], $a['departamento'], $a['municipio']);
}
?>
<!DOCTYPE html>
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
  <header class="espacio-arriba">
    <h3 style="text-align: center; color: #00057A">Detalle del Establecimiento</h3>
    <h4 style="text-align: center; color: #E10000">Coordinación Técnico Administrativo 08-01-03 </h4>
    <h4 style="text-align: center; color: #0008B4">Licda. Gladys Esperanza Pacheco Gutiérrez </h4>
  </header>
<br>
  <div class="table-responsive espacio text-center">
    <table class="table table-bordered" id="t01">
      <thead>
        <tr>
        <th>Código</th>
        <th>Institución</th>
        <th>Director</th>
        <th>Jornada</th>
        <th>Sector</th>
        <th>Nivel</th>
        <th>Plan</th>
        <th>Área</th>
      </tr>
      </thead>
      <tbody>
        <?=$htmltrows?>
      </tbody>
    </table>
    <table class="table table-bordered" id="t01">
      <thead>
        <tr>
        <th>Estado</th>
        <th>Modalidad</th>
        <th>Coreo Electrónico</th>
        <th>No. de Teléfono</th>
        <th>Coordinación</th>
        <th>Dirección</th>
        <th>Departamento</th>
        <th>Municipio</th>
      </tr>
      </thead>
      <tbody>
        <?=$htmltrows1?>
      </tbody>
    </table>
    <br>
    <center>
    <div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
  </div><br><br>
</div>
<p>Totonicapán, <?=date("d/m/Y")?>.</p>
</body>
</html>
