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
        <td>%s</td>
        <td><a class='btn-sm btn-primary' href=\"${base_url}/Establecimientos/Editar/%s\">Editar</a></td>
       </tr>";
$htmltrows = "";

$nivel_41 = 0;
$nivel_42 = 0;
$nivel_43 = 0;
$nivel_44 = 0;
$nivel_45 = 0;
$Niveles = "Todos";

if (isset($categoria13)) {
$Niveles = $categoria13; //es la var que seleccionaria el usaurio la jornada
}

foreach ($arr as $a) {
$htmltrows .= sprintf($htmltrow, $a['codigo'], $a['nombre'], $a['nombred'], $a['mail'], $a['telefono'], $a['direccion'], htmlspecialchars($a['jornada']), htmlspecialchars($a['nivel']), $a['id_escuela']);

  if ($a['nivel'] == '41') {
    $nivel_41 = $nivel_41 + 1;
  }
  if ($a['nivel'] == '42') {
    $nivel_42 = $nivel_42 + 1;# code...
  }
  if ($a['nivel'] == '43') {
    $nivel_43 = $nivel_43 + 1;# code...
  }
   if ($a['nivel'] == '44') {
    $nivel_44 = $nivel_44 + 1;# code...
  }
   if ($a['nivel'] == '45') {
    $nivel_45 = $nivel_45 + 1;# code...
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
    <h5 style="color: #03064A" class="text-center"><img width="40" src="<?=$base_url?>/resources/img/escuela.ico"/>Establecimientos por Nivel</h5>
  </div>
  </header>
<section class="container-fluid">
  <?php
      $numero  = count($arr);
  ?>
    <h1 style="text-align: left; font-size: 15px">El número total de establecimientos son: <?php echo $numero; ?>
      <br>
      <br>Cantidad de escuelas del Nivel 41: <?php echo $nivel_41; ?>
      <br>Cantidad de escuelas del Nivel 42: <?php echo $nivel_42; ?>
      <br>Cantidad de escuelas del Nivel 43: <?php echo $nivel_43; ?>
      <br>Cantidad de escuelas del Nivel 44: <?php echo $nivel_44; ?>
      <br>Cantidad de escuelas del Nivel 45: <?php echo $nivel_45; ?>
    </h1>
</section>
<section>
  <div class="container">
  <div class="row">
    <div class="col-sm-4">
      <form action="<?=$base_url?>/Establecimientos/nivel"  method="POST">
        <td><strong>Seleccionar Nivel</strong></td>
          <select  class="form-control" name="selectCategoria13">
            <option value="Todos" <?php  if($Niveles=="Todos"){echo "selected";} ?>>Todos los Nivel</option>
            <option value="41" <?php  if($Niveles=="41"){echo "selected";} ?>>Nivel 41</option>
            <option value="42" <?php if($Niveles=="42"){echo "selected";} ?>>Nivel 42</option>
            <option value="43" <?php if($Niveles=="43"){echo "selected";} ?>>Nivel 43</option>
            <option value="44" <?php if($Niveles=="44"){echo "selected";} ?>>Nivel 44</option>
            <option value="45" <?php if($Niveles=="45"){echo "selected";} ?>>Nivel 45</option>
          </select>
    </div>
    <div class="col-sm-2"><br>
      <input type="submit" class="btn btn-primary btn-user" role="button" name="BtnCategoria13" value="Ver"></div>
      </form>
    
    <div class="col-sm-2">
        <a class='btn btn-info btn-md' href="<?=$base_url?>/Informes/descargarNivel?Niveles=<?php echo $Niveles; ?>">Descargar</a>
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
                      <th>Nivel</th>
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
  <a class='btn btn-primary btn-md' href="<?=$base_url?>/Informes/descargarNivel?Niveles=<?php echo $Niveles; ?>">Descargar</a>
</div>
<footer><?php $this->load->view('footer') ?></footer>
<script type="text/javascript">
  function consultaCategoria(){
    document.getElementById("categoria13").submit();
  }
 </script>
</body>
</html>