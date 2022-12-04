<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";

if (count($array) < 1) {
$mensaje = 
"<script>alertify.set('notifier');alertify.success('No hay ninguna escuela registrada');</script>";
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
        <td><a class='btn-sm btn-success' href=\"${base_url}/Docentes/editarDocente/%s\">Editar</a></td>
        <td><a class='btn-sm btn-info' href=\"${base_url}/Informes/DescargarDocentesId/%s\">Descargar</a></td>
        <td><center><a class='btn btn-danger icon-trash iconos' href=\"${base_url}/Docentes/baja/%s\"></a></center></td>
       </tr>\n";
$htmltrows = "";

foreach ($array as $a) {
  $id_docente = $a['id_docente'];
  $htmltrows .= sprintf($htmltrow, 
    $a['nombre_d'], $a['apellido_d'], $a['CUI'], $a['nit'], $a['seguro'], $a['email'], $a['num1'], $a['direccion'], $a['id_docente'],  $a['id_docente'],  $a['id_docente']);
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
  <h3 style="color: #03064A"><img width="25" src="<?=$base_url?>/resources/img/persona.png"/>Listado de Docentes del Sector</h3>
</header>
</div>
<section>
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NOMBRES</th>
                      <th>APELLIDOS</th>
                      <th>CUI</th>
                      <th>NIT</th>
                      <th>No. IGSS</th>
                      <th>CORREO ELECTRÓNICO</th>
                      <th>TELÉFONO</th>
                      <th>DIRECCIÓN</th>
                      <th>EDITAR</th>
                      <th>DESCARGAR</th>
                      <th>ELIMINAR</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?=$htmltrows?>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>NOMBRES</th>
                      <th>APELLIDOS</th>
                      <th>CUI</th>
                      <th>NIT</th>
                      <th>No. IGSS</th>
                      <th>CORREO ELECTRÓNICO</th>
                      <th>TELÉFONO</th>
                      <th>DIRECCIÓN</th>
                      <th>EDITAR</th>
                      <th>DESCARGAR</th>
                      <th>ELIMINAR</th>
                    </tr>
                  </tfoot>   
                </table>
                <div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
              </div>
            </div>
          </div>
        </div>
</section>
<section class="container">
  <a href="<?=$base_url?>/Docentes" class="badge badge-pill badge-primary">Registrar un nuevo Docente</a>
</section>
<br>
<footer><?php $this->load->view('footer') ?></footer>
</body>
</html>
</html>

