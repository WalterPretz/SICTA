<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  $jornada_matutina = 0;
  $jornada_vespertina = 0;
  $jornada_nocturna = 0;

foreach ($arr as $a) {
  if ($a['jornada'] == 'Matutina') { $jornada_matutina = $jornada_matutina + 1; }
  if ($a['jornada'] == 'Vespertina') { $jornada_vespertina = $jornada_vespertina + 1; }
  if ($a['jornada'] == 'Nocturna') { $jornada_nocturna = $jornada_nocturna + 1; }
  }

  $nivel41 = 0;
  $nivel42 = 0;
  $nivel43 = 0;
  $nivel44 = 0;
  $nivel45 = 0;

  foreach ($nivel as $b) {
    if ($b['nivel'] == '41') { $nivel41 = $nivel41 + 1;  }
    if ($b['nivel'] == '42') { $nivel42 = $nivel42 + 1;  }
    if ($b['nivel'] == '43') { $nivel43 = $nivel43 + 1;  }
    if ($b['nivel'] == '44') { $nivel44 = $nivel44 + 1;  }
    if ($b['nivel'] == '45') { $nivel45 = $nivel45 + 1;  }
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <?php $this->load->view('header'); ?>
</head>
<body oncontextmenu="return false" onkeydown="return true">
<header><?php $this->load->view('menu'); ?></header>
<div class="container espacio-arriba">
    <?php $numero  = count($arr);?>
    <?php $numero1  = count($nivel);?>

 <section>
  <div class="form-group row">
      <div class="col-sm-6 mb-6 mb-sm-6">
        <h4>Total de Escuelas por Jornadas: <?php echo $numero; ?></h4> 
        <table class="table table-hover text-center" align="center" cellpadding="4" border="1">
          <tr><th>Jornada Matutina</th><th><?php echo $jornada_matutina; ?> Escuelas</th></tr>
          <tr><th>Jornada Vespertina</th><th><?php echo $jornada_vespertina; ?> Escuelas</th></tr>
          <tr><th>Jornada Nocturna</th><th><?php echo $jornada_nocturna; ?> Escuelas</th></tr>
        </table>
      </div>
      <div class="col-sm-6 mb-6 mb-sm-6">
      <h4>Total de Escuelas por Niveles: <?php echo $numero1; ?></h4> 
        <table class="table table-hover text-center" align="center" cellspacing="4" cellpadding="4" border="1" style="border-collapse:collapse;">
          <tr><th> Nivel 41 </th><th><?php echo $nivel41; ?> Escuelas</tg></tr>
          <tr><th> Nivel 42 </td><th><?php echo $nivel42; ?> Escuelas</tg></tr>
          <tr><th> Nivel 43 </td><th><?php echo $nivel43; ?> Escuelas</tg></tr>
          <tr><th> Nivel 44 </td><th><?php echo $nivel44; ?> Escuelas</tg></tr>
          <tr><th> Nivel 45 </td><th><?php echo $nivel45; ?> Escuelas</tg></tr>
        </table>
      </div>
    </div>
  </section>
<br>
<section class="container">
  <a href="<?=$base_url?>/Informes/descargar" class="btn btn-primary">Descargar Reporte</a>
</section>
</div>
</body>
</html>