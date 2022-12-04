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

?><!DOCTYPE html>
<html lang="es">
<style>
table {
  width:100%;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;
}
#t01 tr:nth-child(even) {
  background-color: #eee;
}
#t01 tr:nth-child(odd) {
 background-color: #fff;
}
#t01 th {
  background-color: #0E1154;
  color: white;
}
</style>
<head>
<?php $this->load->view('header'); ?>
</head>

<body oncontextmenu="return false" onkeydown="return true">
<div class="container">
<header>
  <h1 style="text-align: center; color: #00057A"><img src="/SICTA/resources/img/escudo.png" align="left" width="40" > Reporte General</h1>
  <h4 style="text-align: center; color: #E10000">  Coordinación Técnico Administrativo 08-01-03 </h4>
  <h4 style="text-align: center; color: #0008B4">Licda. Gladys Esperanza Pacheco Gutiérrez </h4>
</header>

    <?php $numero  = count($arr);?>
    <?php $numero1  = count($nivel);?>
    <?php $numero2  = count($presupuesto);?>

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
  <section>
  <div class="form-group row">
      <div class="col-sm-12 mb-6 mb-sm-12">
        <h4>TOTAL DE DOCENTES POR PARTIDA PRESUPUESTARIA: <?php echo $numero2; ?></h4> 
        <table class="table table-hover text-center" align="center" cellpadding="4" border="1">
          <tr><th>Docentes del Reglón 011</th><th><?php echo $docentes011; ?> Maestros</th></tr>
          <tr><th>Docentes del Reglón 021</th><th><?php echo $docentes021; ?> Maestros</th></tr>
          <tr><th>Docentes del Reglón 022</th><th><?php echo $docentes022; ?> Maestros</th></tr>
          <tr><th>Docentes del Reglón 023</th><th><?php echo $docentes023; ?> Maestros</th></tr>
        </table>
      </div>
    </div>
  </section>

</div>
<p>Totonicapán, <?=date("d/m/Y")?>.</p>
</body>
</html>