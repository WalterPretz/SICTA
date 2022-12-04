<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";

if (count($arr) < 1) {
  $mensaje = "<script>alertify.set('notifier','position', 'top-right');alertify.success('No hay ningún panel registrado');</script>";
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
  $htmltrows .= sprintf($htmltrow, 
    htmlspecialchars($a['id_usuario']), htmlspecialchars($a['usuario']), htmlspecialchars($a['nombre']), $a['estado'], $a['rol']);
}
?><!DOCTYPE html>
<html lang="es">
<head>
  <?php $this->load->view('header'); ?>
  <title>Producto</title>
</head>
<body>
<div class="container">
<header>
  <h3 style="color: #03064A"><img width="20" src="/SICTA/resources/img/persona.png"/> Listado general de usuarios del Sistema SICTA</h3>
</header>
<section>
  <div class="table-responsive-sm">
    <table class="table table-striped table-bordered">
    <thead> 
      <tr id="letra_info" class="iconost">
        <th>Id</th>
        <th>Usuario</th>
        <th>Nombre</th>
        <th>Estado</th>
        <th>Rol</th>
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
</body>
</html>

