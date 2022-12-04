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
        <td><a class='btn-sm btn-success' href=\"${base_url}/Docentes/editarDocente/%s\">Editar</a></td>
       </tr>\n";
$htmltrows = "";

foreach ($arr as $a) {
  $id_docente = $a['id_docente'];
  $htmltrows .= sprintf($htmltrow, 
    $a['nombre_d'], $a['apellido_d'], $a['email'], $a['num1'], $a['direccion'], $a['id_docente'],  $a['id_docente']);
}
?><!DOCTYPE html>
<html lang="es">
<head>
  <?php $this->load->view('header'); ?>
  <title>Docentes</title>
</head>
<body>
  <?php $this->load->view('menu'); ?>
<div class="container">
<header class="espacio-arriba">
  <h3 style="color: #03064A"><img width="25" src="<?=$base_url?>/resources/img/persona.png"/>Listado de Docentes del Establecimiento</h3>
</header>
<section>
  <a href="<?=$base_url?>/Informes/DesNominaEscuela" class="btn btn-primary">Descargar Listado</a>
</section>
<br>
</div>
<section>
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NOMBRE</th>
                      <th>APELLIDO</th>
                      <th>CORREO ELECTRÓNICO</th>
                      <th>TELÉFONO</th>
                      <th>DIRECCIÓN</th>
                      <th>EDITAR</th>
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
          </div>
        </div>
</section>
<section class="container">
  <a href="<?=$base_url?>/Docentes" class="btn btn-info">Registrar un nuevo Docente</a>
</section>
<br>
<footer><?php $this->load->view('footer') ?></footer>
</body>
</html>
</html>

