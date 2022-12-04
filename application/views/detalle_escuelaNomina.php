<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
if (count($arr) < 1) {
  $mensaje = "<script>alertify.set('notifier','position', 'top-right');alertify.error('No hay docentes registrados en el establecimiento');</script>";
}

$htmltrow = "<tr>
        <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> </tr>";
$htmltrows = "";
foreach ($arr as $a) {
  $id_docente = $a['id_docente'];  $htmltrows .= sprintf($htmltrow,
    $a['nombre_d'],$a['apellido_d'], $a['CUI'], $a['email'], $a['direccion'], $a['num1'], $a['fuente_ingreso']);
}

$htmltrow1 = "<tr>
        <td>%s</td> <td>%s</td> </tr>";
$htmltrows1 = "";
foreach ($arr1 as $a) {
  $id_escuela = $a['id_escuela'];  $htmltrows1 .= sprintf($htmltrow1, $a['codigo'],$a['nombre_escuela']);
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
    <h3><a href="#" class="btn btn-primary btn-lg active icon-people iconos" role="button" aria-pressed="true"></a> Nómina de docentes del establecimiento</h3>
  </header>
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
<br>
  <div class="table-responsive espacio text-center">
    <table class="table table-bordered">
      <thead>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>No. de CUI</th>
        <th>Correo Electrónico</th>
        <th>Dirección</th>
        <th>Teléfono</th>
        <th>Renglón Presupuestario</th>
      </thead>
      <tbody>
        <?=$htmltrows?>
      </tbody>
    </table>
    <br>
    <center>
      <a class='btn btn-outline-primary btn-lg ' href="<?=$base_url?>/Establecimientos/listar" type="button" aria-pressed="true">Listo</a>
    </center>
    <div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
  </div><br><br>
</div>
<footer><?php $this->load->view('footer') ?></footer>
</body>
</html>
