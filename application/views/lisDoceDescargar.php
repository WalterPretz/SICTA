<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
if (count($arr) < 1) {
  $mensaje = "<script>alertify.set('notifier','position', 'top-right');alertify.error('No hay datos de la escuela');</script>";
}

$htmltrow = "<tr>
        <td>%s</td> <td>%s</td> <td >%s</td> <td>%s</td> <td>%s</td> </tr>";
$htmltrows = "";
foreach ($arr as $a) {
  $id_docente = $a['id_docente'];  $htmltrows .= sprintf($htmltrow,
    $a['nombres'], $a['fecha_nacimiento'], $a['CUI'], $a['nit'], $a['seguro']);
}

$htmltrow2 = "<tr>
        <td>%s</td> <td>%s</td> </tr>";

$htmltrows2 = "";
foreach ($arr as $a) {
  $id_docente = $a['id_docente'];  $htmltrows2 .= sprintf($htmltrow2,
    $a['partida'], $a['email']);
}

$htmltrow1 = "<tr>
        <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> </tr>";
$htmltrows1 = "";
foreach ($arr as $a) {
  $id_docente = $a['id_docente'];  $htmltrows1 .= sprintf($htmltrow1,
    $a['direccion'], $a['fecha_inicio'], $a['num1'], $a['num2'], $a['puesto']);
}

$htmltrow3 = "<tr>
        <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> </tr>";
$htmltrows3 = "";
foreach ($arr as $a) {
  $id_docente = $a['id_docente'];  $htmltrows3 .= sprintf($htmltrow3,
    $a['fuente_ingreso'], $a['nombreE'], $a['municipio'], $a['departamento']);
}
?>
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
  <title>Docentes</title>
</head>
<body>
<div class="container">
<header class="espacio-arriba">
    <h3 style="text-align: center; color: #00057A">Información General del Docente</h3>
    <h4 style="text-align: center; color: #E10000">Coordinación Técnico Administrativo 08-01-03 </h4>
  </header>
</div>
<br>
  <div class="table-responsive espacio text-center">
    <table class="table table-bordered" id="t01">
      <thead>
        <tr>
        <th>Nombres y Apellidos</th>
        <th>Fecha de Nacimiento</th>
        <th>CUI</th>
        <th>NIT</th>
        <th>No. de IGSS</th>
      </tr>
      </thead>
      <tbody>
        <?=$htmltrows?>
      </tbody>
    </table>
    <table class="table table-bordered" id="t01">
      <thead>
        <tr>
        <th>Número de Partida Presupuestaria</th>
        <th>Correo</th>
      </tr>
      </thead>
      <tbody>
        <?=$htmltrows2?>
      </tbody>
    </table>
    <table class="table table-bordered" id="t01">
      <thead>
        <tr>
        <th>Dirección</th>
        <th>Fecha de Inicio en el Mineduc</th>
        <th>Telefono</th>
        <th>Telefono</th>
        <th>Puesto</th>
      </tr>
      </thead>
      <tbody>
        <?=$htmltrows1?>
      </tbody>
    </table>
    <table class="table table-bordered" id="t01">
      <thead>
        <tr>
        <th>Renglón Presupuestario</th>
        <th>Dónde Labora</th>
        <th>Municipio</th>
        <th>Departamento</th>
      </tr>
      </thead>
      <tbody>
        <?=$htmltrows3?>
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

