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
        <td><a class='btn-sm btn-primary' href=\"${base_url}/Docentes/editarDocente/%s\">Editar</a></td>
        <td><center><a class='btn btn-danger icon-trash iconos' href=\"${base_url}/Docentes/baja/%s\"></a></center></td>
       </tr>";
$htmltrows = "";

$Docentes11 = 0;
$Docentes21 = 0;
$Docentes22 = 0;
$Docentes23 = 0;
$Establecimientos = "Todos";

if (isset($escuela)) {
$Establecimientos = $escuela; //es la var que seleccionaria el usaurio la jornada
}

foreach ($arr as $a) {
$htmltrows .= sprintf($htmltrow, $a['nombre_d'],$a['apellido_d'], $a['CUI'], $a['email'], $a['num1'], $a['direccion'], $a['fuente_ingreso'], $a['nombreE'], $a['id_docente'], $a['id_docente']);

  if ($a['fuente_ingreso'] == 'Presupuesto en el Mineduc 011') {  $Docentes11 = $Docentes11 + 1;   }
  if ($a['fuente_ingreso'] == 'Contrato Mineduc 021') {    $Docentes21 = $Docentes21 + 1;  }
  if ($a['fuente_ingreso'] == 'Contrato Mineduc 022') {    $Docentes22 = $Docentes22 + 1;  }
  if ($a['fuente_ingreso'] == 'Contrato Mineduc 023') {    $Docentes23 = $Docentes23 + 1;  }
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
    <h5 style="color: #03064A" class="text-center"><img width="30" src="<?=$base_url?>/resources/img/persona.png"/>Docentes por Tipo de Presupuesto en el Ministerio de Educación</h5>
  </div>

  </header>
<section class="container-fluid">
  <?php
      $numero  = count($arr);
    ?>
    <div>
    <div class="row text-center">
      <div class="col">
      <h6 class="ttl2">Total de Docentes:</h6><h4><?php echo $numero; ?> </h4>
      </div>
      <div class="col">
        <h6 class="ttl2">El número de docentes de 011:</h6> <h4><?php echo $Docentes11; ?>
      </div>
      <div class="col">
        <h6 class="ttl2">El número de docentes de 021:</h6> <h4><?php echo $Docentes21; ?></h4>
      </div>
      <div class="col">
        <h6 class="ttl2">El número de docentes de 022:</h6> <h4><?php echo $Docentes22; ?></h4>
      </div>
            <div class="col">
        <h6 class="ttl2">El número de docentes de 023:</h6> <h4><?php echo $Docentes23; ?></h4>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="container">
  <div class="row">
    <div class="col-sm-4">
      <form action="<?=$base_url?>/Docentes/docentes_establecimiento"  method="POST">
        <td><strong>Seleccionar Docentes</strong></td>
          <select  class="form-control" name="selectEscuela">
            <option value="Todos" <?php  if($Establecimientos=="Todos"){echo "selected";} ?>>Todos los docentes</option>
            <option value="Presupuesto en el Mineduc 011" <?php  if($Establecimientos=="Presupuesto en el Mineduc 011"){echo "selected";} ?>>Maestros 011</option>
             <option value="Contrato Mineduc 021" <?php  if($Establecimientos=="Contrato Mineduc 021"){echo "selected";} ?>>Maestros 021</option>
              <option value="Contrato Mineduc 022" <?php  if($Establecimientos=="Contrato Mineduc 022"){echo "selected";} ?>>Maestros 022</option>

          </select>
    </div>
    <div class="col-sm-2"><br>
      <input type="submit" class="btn btn-primary btn-user" role="button" name="BtnEscuela" value="Ver">
      </form>
    </div>
<section class="container">
  <a href="<?=$base_url?>/Informes/descargarDocente?Establecimientos=<?php echo $Establecimientos; ?>" class="badge badge-pill badge-danger">Descargar</a>
</section>
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
                      <th>Nombre del Docente</th>
                      <th>Apellidos del Docente</th>
                      <th>CUI</th>
                      <th>Correo Electrónico</th>
                      <th>No. de Teléfono</th>
                      <th>Dirección</th>
                      <th>Renglón Presupuestario</th>
                      <th>Dónde Labora</th>
                      <th>Opciones</th>
                      <th>Acción</th>
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
<section class="container">
  <a href="<?=$base_url?>/Docentes" class="badge badge-pill badge-primary">Registrar un nuevo Docente</a>
</section>
<footer><?php $this->load->view('footer') ?></footer>
<script type="text/javascript">
  function consultaCategoría(){
    document.getElementById("categoria").submit();
  }
 </script>


</body>
</html>