<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
if (count($arr) < 1) {
  $mensaje = "<script>alertify.set('notifier');alertify.success('No hay ninguna escuela registrada');</script>";
}

$htmltrow = "<tr>
        <td>%s</td>
        <td>%s</td>  
        <td>%s</td>
        <td>%s</td>
        <td>%s</td>
        <td>%s</td>
        <td>%s</td>
       </tr>";
$htmltrows = "";

$jornada_matutina = 0;
$jornada_vespertina = 0;
$jornada_nocturna = 0;
$Jornadas1 = "Todos";

foreach ($arr as $a) {
$htmltrows .= sprintf($htmltrow, $a['codigo'], $a['nombre'], $a['nombred'], $a['mail'], $a['telefono'], $a['direccion'], htmlspecialchars($a['jornada']));

  if ($a['jornada'] == 'Matutina') {  $jornada_matutina = $jornada_matutina + 1; }
  if ($a['jornada'] == 'Vespertina') { $jornada_vespertina = $jornada_vespertina + 1; }
  if ($a['jornada'] == 'Nocturna') { $jornada_nocturna = $jornada_nocturna + 1; }
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
  <title>Establecimientos</title>
</head>
<body>
  <header>
  <div>
   <h2 style="text-align: center; color: #CC0022">Listado de Establecimientos por Jornadas</h2>
   <h2 style="text-align: center; color: #080896">Sector 08-01-03</h2>
  </div>
  </header>
<section class="container-fluid">
 <?php
      $numero  = count($arr);
    ?>
    <h1 style="text-align: left; font-size: 15px">El número total de establecimientos son: <?php echo $numero; ?>
      <br>
      <br>El número de escuelas de la jornada matutina es de: <?php echo $jornada_matutina; ?>
      <br>El número de escuelas de la jornada vespertina es de: <?php echo $jornada_vespertina; ?>
      <br>El número de escuelas de la jornada nocturna es de: <?php echo $jornada_nocturna; ?>
    </h1>
    <br>
</section>
<br>
<section>
  <div class="container-fluid">
    <div class="table-responsive">
      <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Código del Establecimiento</th>
            <th>Nombre del Establecimiento</th>
            <th>Nombre del Director</th>
            <th>Correo Electrónico</th>
            <th>No. de Teléfono</th>
            <th>Dirección</th>
            <th>Jornada</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?=$htmltrows?>
          </tr>
        </tbody>
      </table>
      <div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
    </div>
  </div>
</section>
<br>
<p>Totonicapán, <?=date("d/m/Y")?>.</p>
</body>
</html>