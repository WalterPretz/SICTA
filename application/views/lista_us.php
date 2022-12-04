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
        <td><center><a class='btn btn-primary' href=\"${base_url}/Usuario/editar/%s\">Editar</a></center></td>
        <td><center><a class='btn btn-danger icon-arrow-down-circle iconos' href=\"${base_url}/Usuario/baja/%s\"></a></center></td>
       </tr>\n";
$htmltrows = "";

foreach ($arr as $a) {
  $htmltrows .= sprintf($htmltrow, 
    htmlspecialchars($a['id_usuario']), htmlspecialchars($a['usuario']), htmlspecialchars($a['nombre']), $a['estado'], $a['rol'], $a['id_usuario'], $a['id_usuario']);
}
?><!DOCTYPE html>
<html lang="es">
<head>
  <?php $this->load->view('header'); ?>
  <title>Producto</title>
</head>
<body>
  <?php $this->load->view('menu'); ?>
<div class="container">
<header class="espacio-arriba">
  <h3 style="color: #03064A"><img width="30" src="<?=$base_url?>/resources/img/persona.png"/>Listado general de usuarios del Sistema</h3>
</header>
<section>
  <a href="<?=$base_url?>/Usuario" class="badge badge-pill badge-info">Registrar un Usuario</a>
  <a href="<?=$base_url?>/Informes/usuarioPDF" class="badge badge-pill badge-danger">Descargar Listado</a>
</section>
<section>
  <div class="table-responsive-sm">
    <table class="table table-striped table-bordered">
    <thead> 
      <tr id="letra_info" class="iconost">
        <th>Id</th>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Estado</th>
        <th>Rol</th>
        <th class="icon-note iconosh"></th>
        <th>Dar Baja</th>
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
<section class="container">
  <a href="<?=$base_url?>/Usuario" class="badge badge-pill badge-primary">Registrar un Usuario</a>
</section>
<br>
<footer><?php $this->load->view('footer') ?></footer>
</body>
</html>

