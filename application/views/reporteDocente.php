<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
if (count($arr) < 1) {
  $mensaje = "<script>alertify.set('notifier');alertify.success('No hay docentes registrados');</script>";
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
       </tr>";
$htmltrows = "";

$Docentes11 = 0;
$Docentes21 = 0;
$Docentes22 = 0;
$Docentes23 = 0;
$Establecimientos = "Todos";

foreach ($arr as $a) {
$htmltrows .= sprintf($htmltrow, $a['nombre_d'],$a['apellido_d'], $a['CUI'], $a['email'], $a['num1'], $a['direccion'], $a['fuente_ingreso'], $a['nombreE'], $a['id_docente'], $a['id_docente']);

  if ($a['fuente_ingreso'] == 'Presupuesto en el Mineduc 011') {  $Docentes11 = $Docentes11 + 1;   }
  if ($a['fuente_ingreso'] == 'Contrato Mineduc 021') {    $Docentes21 = $Docentes21 + 1;  }
  if ($a['fuente_ingreso'] == 'Contrato Mineduc 022') {    $Docentes22 = $Docentes22 + 1;  }
  if ($a['fuente_ingreso'] == 'Contrato Mineduc 023') {    $Docentes23 = $Docentes23 + 1;  }
}

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
  <title>Establecimientos</title>
</head>
<body>
  
  <h3 style="color: #03064A" align="center"><img width="20" src="/SICTA/resources/img/persona.png"/> Listado de Docentes 08-01-03</h3>
  </header>
<?php $numero  = count($arr);?>
<section>
<div class="container">
  <div class="table-responsive">
    <table class="table table-bordered" width="100%" cellspacing="0" id="t01">
              <thead>
                <tr>
                  <th>Total de Docentes</th>
                  <th>Número de docentes de 011</th>
                  <th>Número de docentes de 021</th>
                  <th>Número de docentes de 022</th>
                  <th>Número de docentes de 023</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                <td><?php echo $numero; ?></td>
                <td><?php echo $Docentes11; ?></td>
                <td><?php echo $Docentes21; ?></td>
                <td><?php echo $Docentes22; ?></td>
                <td><?php echo $Docentes23; ?></td>
              </tr>
              </tbody>
            </table>
            <div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section>
<div class="container">
  <div class="table-responsive">
    <table class="table table-bordered" width="100%" cellspacing="0" id="t01">
              <thead>
                <tr>
                  <th>Nombre del Docente</th>
                  <th>Apellidos del Docente</th>
                  <th>CUI</th>
                  <th>Correo Electrónico</th>
                  <th>No. de Teléfono</th>
                  <th>Dirección</th>
                  <th>Renglón Presupuestario</th>
                  <th>Dónde_Labora</th>
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
  </div>
</section>
<p>Totonicapán, <?=date("d/m/Y")?>.</p>
</body>
</html>