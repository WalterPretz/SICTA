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
        <td><center><a class='btn btn-primary icon-event iconos ' href=\"${base_url}/Establecimientos/diasEfectivo2/%s\"></a></center>
        </td>
       </tr>\n";
$htmltrows = "";

foreach ($arr as $a) {
  $id_usuario = $a['id_usuario'];
  $htmltrows .= sprintf($htmltrow, $a['usuario'], $a['nombreEscuela'], $a['nombre'], $a['telefono'], $a['id_usuario']);
} 
?><!DOCTYPE html>
<html lang="es">
<head>
  <?php $this->load->view('header'); ?>  
  <title>Establecimientos</title>
</head>
<body>
<?php $this->load->view('menu'); ?>
<div class="container">
<header class="espacio-arriba">
  <h3 style="color: #03064A"><img width="25" src="<?=$base_url?>/resources/img/escuela.ico"/>Listado general de establecimientos / Días Efectivos</h3>
</header>
</div>
<div class="alert alert-warning" role="alert">
  Verificar en los días 29, 30 o 31 de cada mes, para comprobar si se está registrando los dias efectivos en cada establecimiento.
</div>
<section>
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead> 
            <tr id="letra_info">
              <th>CÓDIGO</th>
              <th>NOMBRE DEL ESTABLECIMIENTO</th>
              <th>DIRECTOR</th>
              <th>TELÉFONO</th>
              <th>DIAS EFECTIVO</th>
            </tr>
          </thead>
          <tbody>
            <?=$htmltrows?>
          </tbody>
          <tfoot>
            <tr>
              <th>CÓDIGO</th>
              <th>NOMBRE DEL ESTABLECIMIENTO</th>
              <th>DIRECTOR</th>
              <th>TELÉFONO</th>
              <th>DIAS EFECTIVO</th>
            </tr>
          </tfoot>    
        </table>
        <div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
        </div>
      </div>
    </div>
  </div>
</section>
<br>
<footer><?php $this->load->view('footer') ?></footer>
</html>


