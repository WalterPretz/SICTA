<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
if (count($arr) < 1) {
  $mensaje = "<script>alertify.set('notifier','position', 'top-right');alertify.error('No hay días registrados en el calendario');</script>";
}

$htmltrow = "<tr>
        <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td>
        </tr>";
$htmltrows = "";
foreach ($arr as $b) {
  $id_dia = $b['id_dia'];  $htmltrows .= sprintf($htmltrow,
    $b['motivo'],$b['descripcionMotivo'], $b['descripcion'], $b['dias']);
}

$htmltrow1 = "<tr>
        <td>%s</td> <td>%s</td> </tr>";
$htmltrows1 = "";
foreach ($arr1 as $a) {
  $id_usuario = $a['id_usuario'];  $htmltrows1 .= sprintf($htmltrow1, $a['usuario'], $a['nombreEscuela']);
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php $this->load->view('header'); ?>
  <title>Detalle Escuela</title>
</head>
<body>
<?php $this->load->view('menu'); ?>
<div class="container">  
  <header class="espacio-arriba">
    <h3><a href="#" class="btn btn-primary btn-lg active icon-people iconos" role="button" aria-pressed="true"></a> Días efectivo del establecimiento del mes Actual</h3>
  </header>
  <div class="alert alert-warning" role="alert">
  Verificar en los días 29, 30 o 31 de cada mes, para comprobar si se está registrando los dias efectivos en cada establecimiento.
</div>
  <section>
  <table class="table table-bordered">
      <thead>
        <th>Código</th>
        <th>Nombre del Establecimiento</th>
      </thead>
      <tbody>
        <?=$htmltrows1?>
      </tbody>
    </table>
</section>
  <div class="table-responsive espacio text-center">
    <table class="table table-bordered">
      <thead>
        <th>Tipo de Registro</th>
        <th>Motivo</th>
        <th>Descripción</th>
        <th>Fecha</th>
      </thead>
      <tbody>
        <?=$htmltrows?>
      </tbody>
    </table>
    <br>
    <center>
      <a class='btn btn-outline-primary btn-lg ' href="<?=$base_url?>/Establecimientos/diasEfectivo" type="button" aria-pressed="true">Listo</a>
    </center>
    <div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
  </div><br><br>
</div>
<footer><?php $this->load->view('footer') ?></footer>
</body>
</html>
