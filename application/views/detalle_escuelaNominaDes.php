<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
if (count($arr) < 1) {
  $mensaje = "<script>alertify.set('notifier','position', 'top-right');alertify.error('No hay docentes registrados en el establecimiento');</script>";
}

$htmltrow = "<tr>
        <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> </tr>";
$htmltrows = "";
foreach ($arr as $a) {
  $id_docente = $a['id_docente'];  $htmltrows .= sprintf($htmltrow,
    $a['nombre_d'],$a['apellido_d'], $a['CUI'], $a['email'], $a['direccion'], $a['num1'], $a['fuente_ingreso']);
}

$htmltrow1 = "<tr>
        <td>%s</td> <td>%s</td> </tr>";
$htmltrows1 = "";
foreach ($arr1 as $a) {
  $id_escuela = $a['id_escuela'];  $htmltrows1 .= sprintf($htmltrow1, $a['codigo'],$a['nombre_escuela']);
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
.t01 tr:nth-child(even) {
  background-color: #eee;
}
.t01 tr:nth-child(odd) {
 background-color: #fff;
}
.t01 th {
  background-color: #0E1154;
  color: white;
}
</style>
<head>
  <?php $this->load->view('header'); ?>
</head>
<body>
<header>
    <h3 style="text-align: center; color: #00057A">Nómina del Establecimiento</h3>
    <h4 style="text-align: center; color: #E10000">Coordinación Técnico Administrativo 08-01-03 </h4>
</header>
<section>
  <div class="table-responsive espacio text-center">
  <table class="table table-bordered" id="t01">
      <thead>
      <tr>
        <th>Código</th>
        <th>Nombre del Establecimiento</th>
      </tr>
      </thead>
      <tbody>
        <?=$htmltrows1?>
      </tbody>
    </table>
  </div>
</section>
  <div class="table-responsive espacio text-center">
    <table class="table table-bordered" id="t01">
      <thead>
      <tr>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>No. de CUI</th>
        <th>Correo Electrónico</th>
        <th>Dirección</th>
        <th>Teléfono</th>
        <th>Renglón Presupuestario</th>
      </tr>
      </thead>
      <tbody>
        <?=$htmltrows?>
      </tbody>
    </table>
  </div>
</div>
<p>Totonicapán, <?=date("d/m/Y")?>.</p>
</body>
</html>
