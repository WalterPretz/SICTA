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
        <td>%s</td>
       </tr>";
$htmltrows = "";

$nivel_41 = 0;
$nivel_42 = 0;
$nivel_43 = 0;
$nivel_44 = 0;
$nivel_45 = 0;
$Niveles = "Todos";

foreach ($arr as $a) {
$htmltrows .= sprintf($htmltrow, $a['codigo'], $a['nombre'], $a['nombred'], $a['mail'], $a['telefono'], $a['direccion'], htmlspecialchars($a['jornada']), htmlspecialchars($a['nivel']));

  if ($a['nivel'] == '41') {
    $nivel_41 = $nivel_41 + 1;
  }
  if ($a['nivel'] == '42') {
    $nivel_42 = $nivel_42 + 1;# code...
  }
  if ($a['nivel'] == '43') {
    $nivel_43 = $nivel_43 + 1;# code...
  }
   if ($a['nivel'] == '44') {
    $nivel_44 = $nivel_44 + 1;# code...
  }
   if ($a['nivel'] == '45') {
    $nivel_45 = $nivel_45 + 1;# code...
  }
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
   <h2 style="text-align: center; color: #CC0022">Listado de Establecimientos por Niveles</h2>
   <h2 style="text-align: center; color: #080896">Sector 08-01-03</h2>
  </div>
  </header>
<section class="container-fluid">
  <?php
      $numero  = count($arr);
  ?>
    <h1 style="text-align: left; font-size: 15px">El número total de establecimientos son: <?php echo $numero; ?>
      <br>
      <br>Cantidad de escuelas del Nivel 41: <?php echo $nivel_41; ?>
      <br>Cantidad de escuelas del Nivel 42: <?php echo $nivel_42; ?>
      <br>Cantidad de escuelas del Nivel 43: <?php echo $nivel_43; ?>
      <br>Cantidad de escuelas del Nivel 44: <?php echo $nivel_44; ?>
      <br>Cantidad de escuelas del Nivel 45: <?php echo $nivel_45; ?>
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
            <th>Nivel</th>
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

<p>Totonicapán, <?=date("d/m/Y")?>.</p>
</body>
</html>