<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
if (count($arr) < 1) {
  $mensaje = "<script>alertify.set('notifier');alertify.success('No hay ninguna escuela registrada');</script>";
}

$htmltrow = "<tr>
        <td>%s</td>
        <td>%s</td>  
        <td>%s</td>
        <td>%s</td>
        <td>%s</td>
        <td>%s</td>
        <td>%s</td>
        <td><a class='btn-sm btn-success' href=\"${base_url}/Establecimientos/Editar/%s\">Editar</a></td>
       </tr>";
$htmltrows = "";

$jornada_matutina = 0;
$jornada_vespertina = 0;
$jornada_nocturna = 0;
$Jornadas1 = "Todos";

if (isset($categoria)) {
$Jornadas1 = $categoria; //es la var que seleccionaria el usaurio la jornada
}

foreach ($arr as $a) {
$htmltrows .= sprintf($htmltrow, $a['codigo'], $a['nombre'], $a['nombred'], $a['mail'], $a['telefono'], $a['direccion'], htmlspecialchars($a['jornada']), $a['id_escuela']);

  if ($a['jornada'] == 'Matutina') {
    $jornada_matutina = $jornada_matutina + 1;
  }
  if ($a['jornada'] == 'Vespertina') {
    $jornada_vespertina = $jornada_vespertina + 1;# code...
  }
  if ($a['jornada'] == 'Nocturna') {
    $jornada_nocturna = $jornada_nocturna + 1;# code...
  }
}
?><!DOCTYPE html>
<html lang="es">
<head>
  <?php $this->load->view('header'); ?>
  <title>Establecimientos</title>
</head>
<body>
  <?php $this->load->view('menu'); ?>
  <header class="espacio-arriba">
  <div>
    <h5 style="color: #03064A" class="text-center"><img width="40" src="<?=$base_url?>/resources/img/escuela.ico"/>Establecimientos por Jornada</h5>
  </div>
  </header>
<section class="container-fluid">
  <?php
      $numero  = count($arr);
    ?>
    <h1 style="text-align: left; font-size: 15px">El número total de establecimientos son: <?php echo $numero; ?>
      <br>
      <br>El número de escuelas de la jornada matutina es de: <?php echo $jornada_matutina; ?>
      <br>El número de escuelas de la jornada vespertina es de: <?php echo $jornada_vespertina; ?>
      <br>El número de escuelas de la jornada nocturna es de: <?php echo $jornada_nocturna; ?>
    </h1>
    <br>
</section>
<section>
  <div class="container">
  <div class="row">
    <div class="col-sm-4">
      <form action="<?=$base_url?>/Establecimientos/jornada"  method="POST">
        <td><strong>Seleccionar Jornada</strong></td>
          <select  class="form-control" name="selectCategoria">
            <option value="Todos" <?php  if($Jornadas1=="Todos"){echo "selected";} ?>>Todas las Jornadas</option>
            <option value="Matutina" <?php  if($Jornadas1=="Matutina"){echo "selected";} ?>>Jornada Matutina</option>
            <option value="Vespertina" <?php if($Jornadas1=="Vespertina"){echo "selected";} ?>>Jornada Vespertina</option>
            <option value="Nocturna" <?php if($Jornadas1=="Nocturna"){echo "selected";} ?>>Jornada Nocturna</option>
          </select>
    </div>
    <div class="col-sm-2"><br>
      <input type="submit" class="btn btn-primary btn-user" role="button" name="BtnCategoria" value="Ver">
      </form>
    </div>
   <div class="col-sm-2">
        <a class='btn btn-info btn-md' href="<?=$base_url?>/Informes/descargarJornada?Jornadas1=<?php echo $Jornadas1; ?>">Descargar</a>
    </div>
  </div>
</div>
</section>
        <br>
<section>
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Código del Establecimiento</th>
                      <th>Nombre del Establecimiento</th>
                      <th>Nombre del Director</th>
                      <th>Correo Electrónico</th>
                      <th>No. de Teléfono</th>
                      <th>Dirección</th>
                      <th>Jornada</th>
                      <th>Opciones</th>
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
<div class="container">
  <a class='btn btn-primary btn-md' href="<?=$base_url?>/Informes/descargarJornada?Jornadas1=<?php echo $Jornadas1; ?>">Descargar</a>
</div>
<footer><?php $this->load->view('footer') ?></footer>
<script type="text/javascript">
  function consultaCategoría(){
    document.getElementById("categoria").submit();
  }
 </script>
</body>
</html>