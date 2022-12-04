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
        <td>%s</td>
        <td>%s</td>
        <td><a class='btn btn-success icon-note iconos ' href=\"${base_url}/Establecimientos/editar/%s\"></a>
        </td>
        <td>
          <div class='form-group row'>
            <div class='col-sm-2'>
              <a class='btn btn-warning icon-docs iconos text-center' href=\"${base_url}/Establecimientos/detalle/%s\"></a>
            </div>
            <div class='col-sm-2'>
              <a class='btn btn-info icon-arrow-down-circle iconos' href=\"${base_url}/Establecimientos/DescargarEscuela/%s\"></a>
            </div>
          </div>
        </td>
         <td>
          <div class='form-group row'>
            <div class='col-sm-2'>
              <a class='btn btn-dark icon-people iconos text-center' href=\"${base_url}/Establecimientos/NominaDetalle/%s\"></a>
            </div>
            <div class='col-sm-2'>
              <a class='btn btn-secondary icon-arrow-down-circle iconos text-center' href=\"${base_url}/Establecimientos/DescargarEscuelaNomina/%s\"></a>
            </div>
          </div>
        </td>
        <td><center><a class='btn btn-danger icon-trash iconos' href=\"${base_url}/Establecimientos/baja/%s\"></a></center></td>
       </tr>\n";
$htmltrows = "";

foreach ($arr as $a) {
  $id_escuela = $a['id_escuela'];
  $htmltrows .= sprintf($htmltrow, $a['codigo'], $a['nombre'], $a['nombred'], $a['mail'], $a['telefono'], $a['direccion'], $a['id_escuela'], $a['id_escuela'], $a['id_escuela'], $a['id_escuela'], $a['id_escuela'], $a['id_escuela']);
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
  <h3 style="color: #03064A"><img width="50" src="<?=$base_url?>/resources/img/escuela.ico"/>Listado general de establecimientos</h3>
</header>
</div>
<div class="alert alert-primary container" role="alert">
  En esta sección se listan todos los establecimientos adjuntados a la coordinación, además cuenta con opciones de ver a detalle información del establecimiento al igual descargar y visualizar la nómina de docentes.
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
              <th>CORREO ELECTRÓNICO</th>
              <th>TELÉFONO</th>
              <th>DIRECCIÓN</th>
              <th>EDIT INFO</th>
              <th>DETALLE ESCUELA</th>
              <th>NÓMINA DOCENTES</th>
              <th>BAJA</th>
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
              <th>CORREO ELECTRÓNICO</th>
              <th>TELÉFONO</th>
              <th>DIRECCIÓN</th>
              <th>EDIT INFO</th>
              <th>DETALLE ESCUELA</th>
              <th>NÓMINA DOCENTES</th>
              <th>BAJA</th>
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
  <a href="<?=$base_url?>/Establecimientos" class="btn btn-success">Registrar un nuevo Establecimiento</a>
  <a href="<?=$base_url?>/Informes" class="btn btn-primary"> Descargar</a>
</section>
<br>
<footer><?php $this->load->view('footer') ?></footer>
</html>


