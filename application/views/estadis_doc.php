<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  $docentes011 = 0;
  $docentes021 = 0;
  $docentes022 = 0;
  $docentes023 = 0;


foreach ($presupuesto as $a) {
  if ($a['fuente_ingreso'] == 'Presupuesto en el Mineduc 011') { $docentes011 = $docentes011 + 1; }
  if ($a['fuente_ingreso'] == 'Contrato Mineduc 021') { $docentes021 = $docentes021 + 1; }
  if ($a['fuente_ingreso'] == 'Contrato Mineduc 022') { $docentes022 = $docentes022 + 1; }
  if ($a['fuente_ingreso'] == 'Contrato Mineduc 023') { $docentes023 = $docentes023 + 1; }
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
    <?php $numero  = count($presupuesto);?>

 <section>
  <div class="form-group row">
      <div class="col-sm-12 mb-6 mb-sm-12">
        <h4>TOTAL DE DOCENTES POR PARTIDA PRESUPUESTARIA: <?php echo $numero; ?></h4> 
        <table class="table table-hover text-center" align="center" cellpadding="4" border="1">
          <tr><th>Docentes del Reglón 011</th><th><?php echo $docentes011; ?> Maestros</th></tr>
          <tr><th>Docentes del Reglón 021</th><th><?php echo $docentes021; ?> Maestros</th></tr>
          <tr><th>Docentes del Reglón 022</th><th><?php echo $docentes022; ?> Maestros</th></tr>
          <tr><th>Docentes del Reglón 023</th><th><?php echo $docentes023; ?> Maestros</th></tr>
        </table>
      </div>
    </div>
  </section>
  <section class="container">
  <a href="<?=$base_url?>/Informes/descargar" class="btn btn-primary">Descargar Reporte</a>
</section>
<br>
</div>
</body>
</html>