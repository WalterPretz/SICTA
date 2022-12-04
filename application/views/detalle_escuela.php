<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
if (count($arr) < 1) {
  $mensaje = "<script>alertify.set('notifier','position', 'top-right');alertify.error('No hay datos de la escuela');</script>";
}

$htmltrow = "<tr>
        <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> </tr>";
$htmltrows = "";
foreach ($arr as $a) {
  $id_escuela = $a['id_escuela'];  $htmltrows .= sprintf($htmltrow,
    $a['codigo'],$a['nombre'], $a['nombred'], $a['jornada'], $a['sector'], $a['nivel'], $a['plan'], $a['area']);
}

$htmltrow1 = "<tr>
        <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> </tr>";
$htmltrows1 = "";
foreach ($arr as $a) {
  $id_escuela = $a['id_escuela'];  $htmltrows1 .= sprintf($htmltrow1,
    $a['estado'],$a['modalidad'], $a['mail'], $a['telefono'], $a['coordinacion'], $a['direccion'], $a['departamento'], $a['municipio']);
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
    <h3><img width="70" src="<?=$base_url?>/resources/img/escuela.ico"/> Detalle del Establecimiento</h3>
  </header>
<br>
  <div class="table-responsive espacio text-center">
    <table class="table table-bordered">
      <thead>
        <th>Código</th>
        <th>Institución</th>
        <th>Director</th>
        <th>Jornada</th>
        <th>Sector</th>
        <th>Nivel</th>
        <th>Plan</th>
        <th>Área</th>
      </thead>
      <tbody>
        <?=$htmltrows?>
      </tbody>
    </table>
    <table class="table table-bordered">
      <thead>
        <th>Estado</th>
        <th>Modalidad</th>
        <th>Coreo Electrónico</th>
        <th>No. de Teléfono</th>
        <th>Coordinación</th>
        <th>Dirección</th>
        <th>Departamento</th>
        <th>Municipio</th>
      </thead>
      <tbody>
        <?=$htmltrows1?>
      </tbody>
    </table>
    <br>
    <center>
      <a class='btn btn-primary btn-lg' href="<?=$base_url?>/Establecimientos/listar">Listo</a></center>
    <div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
  </div><br><br>
</div>
<footer><?php $this->load->view('footer') ?></footer>
</body>
</html>
