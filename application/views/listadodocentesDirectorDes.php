<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";

if (count($arr) < 1) {

  $mensaje = 
"<script>alertify.set('notifier');alertify.success('No hay ningun docente registrado en su establecimiento');</script>";
}

$htmltrow = "<tr>
        <td>%s</td> 
        <td>%s</td>
        <td>%s</td>
        <td>%s</td>
        <td>%s</td>
       </tr>\n";
$htmltrows = "";

foreach ($arr as $a) {
  $id_docente = $a['id_docente'];
  $htmltrows .= sprintf($htmltrow, 
    $a['nombre_d'], $a['apellido_d'], $a['email'], $a['num1'], $a['direccion']);
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
<header>
  <h2 style="text-align: center;">Sector 08-01-03</h2>
  <h3 style="color: #03064A"><img width="21" src="/SICTA/resources/img/persona.png"/> Nómina de Docentes del Establecimiento</h3>
  <h2 style="text-align: center; color: #FD0000"><?php echo $this->session->USUARIO ?></h4> </h2>
   <h4><?php echo $this->session->ROL ?>: <?php echo $this->session->NOMBRE ?></h4>
</header>
<section>
  <div class="table-responsive espacio text-center">
    <table class="table table-bordered" id="t01">
      <thead>
        <tr>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Correo Electrónico</th>
        <th>Teléfono</th>
        <th>Dirección</th>
      </tr>
      </thead>
      <tbody>
        <?=$htmltrows?>
      </tbody>
    </table>
  </div>
</div>
<p>Totonicapán, <?=date("d/ m/ Y")?>.</p>
</section>
</body>
</html>

