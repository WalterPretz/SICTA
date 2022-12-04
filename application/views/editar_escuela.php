<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
foreach ($arr as $key) {
  $codigo = $key['codigo'];
  $nombre = $key['nombre'];
  $nombred = $key['nombred'];
  $id_director = $key['id_director'];
  $jornada = $key['jornada'];
  $sector = $key['sector'];
  $nivel = $key['nivel'];
  $plan = $key['plan'];
  $area = $key['area'];
  $estado = $key['estado'];
  $modalidad = $key['modalidad'];
  $mail = $key['mail'];
  $telefono = $key['telefono'];
  $cta = $key['cta'];
  $direccion = $key['direccion'];
  $escuela_id_municipio = $key['escuela_id_municipio'];
  $municipio = $key['municipio'];
  $id_escuela = $key['id_escuela'];
}
?><!DOCTYPE html>
<html lang="es">
<head>
  <?php $this->load->view('header'); ?>
  <title>Crear Escuela</title>
</head>
<body>

<header>
  <?php $this->load->view('menu'); ?>
</header>
<div class="text-center espacio-arriba">
  <h3><center><img width="75" src="<?=$base_url?>/resources/img/escuela.ico"/> EDITAR ESTABLECIMIENTO</center></h3>
</div>
</header>
<section>
  <div class="container">
    
    <form class="needs-validation" novalidate action="<?=$base_url?>/Establecimientos/editar" method="POST">
    <div class="form-row">
      <div class="col-md-3 mb-3">
        <label for="inputState" class="badge badge-pill badge-primary">CÓDIGO DEL ESTABLECIMIENTO</label>
        <input  type="num" id="inputState" class="form-control" name="codigo" value="<?=$codigo?>" maxlength="13">
      </div>
      <div class="form-group col-md-6 mb-6">
        <label for="inputState" class="badge badge-pill badge-danger">NOMBRE DEL ESTABLECIMIENTO</label>
        <input  type="text " class="form-control" name="nombre" value="<?=$nombre?>">
      </div>
      <div class="form-group col-md-3 mb-3">
        <label for="inputState" class="badge badge-pill badge-primary">JORNADA</label>
        <select id="inputState" class="form-control" name="jornada" >
          <option selected><?=$jornada?></option>
          <option>Matutina</option>
          <option>Vespertina</option>
          <option>Nocturna</option>
        </select>
      </div>
      <div class="form-group  col-md-4 mb-4">
        <label for="validationCustom01" class="badge badge-pill badge-dark">DIRECTOR ENCARGADO</label>
        <input  type="text" class="form-control" readonly="readonly" name="nombred" value="<?=$nombred?>" maxlength="50">
      </div>
       <div class="col-md-1 mb-1">
        <input  type="hidden" readonly="readonly" class="form-control" name="id_director" value="<?=$id_director?>">
      </div>
      <div class="col-md-3 mb-3">
        <label for="inputState" class="badge badge-pill badge-dark">SECTOR</label>
        <select id="inputState" class="form-control" name="sector">
          <option selected><?=$sector?></option>
          <option>Oficial</option>
          <option>Privado</option>
          <option>Cooperativa</option>
        </select>
      </div>
      <div class="col-md-2 mb-2">
        <label for="inputState" class="badge badge-pill badge-dark">NIVEL</label>
        <select id="inputState" class="form-control" name="nivel">
          <option selected><?=$nivel?></option>
          <option>43</option>
          <option>41</option>
          <option>42</option>
          <option>44</option>
          <option>45</option>
        </select>
      </div>
      <div class="col-md-2 mb-2">
        <label for="inputState" class="badge badge-pill badge-dark">PLAN</label>
        <select id="inputState" class="form-control" name="plan" >
          <option selected><?=$plan?></option>
          <option>Diario</option>
          <option>Fin de Semana</option>
        </select>
      </div>
      <div class="form-group col-md-2 mb-2">
      <label for="inputState" class="badge badge-pill badge-warning">ÁREA</label>
      <select id="inputState" class="form-control" name="area" >
      <option selected><?=$area?></option>
      <option>Rural</option>
      <option>Urbana</option>
      </select>
    </div>
      <div class="col-md-2 mb-2">
      <label for="inputState" class="badge badge-pill badge-warning">ESTADO</label>
      <select id="inputState" class="form-control" name="estado">
      <option selected><?=$estado?></option>
      <option>Abierta</option>
      <option>Cerrado</option>
      </select>
      </div>
      <div class="col-md-2 mb-2">
        <label for="inputState" class="badge badge-pill badge-warning">MODALIDAD</label>
        <select id="inputState" class="form-control" name="modalidad" >
          <option selected><?=$modalidad?></option>
          <option>Bilingue</option>
          <option>Monolingue</option>
        </select>
      </div>
      <div class="col-md-4 mb-4">
        <label for="inputState" class="badge badge-pill badge-warning">CORREO ELECTRÓNICO</label>
        <input type="email" class="form-control" name="mail"  value="<?=$mail?>" minlength="5">
        <div class="invalid-feedback">Por favor llene el campo</div>
      </div>
      <div class="col-md-2 mb-2">
        <label for="inputState" class="badge badge-pill badge-warning">NO. DE TELÉFONO</label>
          <input  type="num" id="inputState" class="form-control integer" name="telefono" value="<?=$telefono?>" required maxlength="8">
          <div class="invalid-feedback">Por favor llene el campo</div>
      </div>
      <div class="form-group col-md-2 mb-2">
        <label for="inputState" class="badge badge-pill badge-info">COORDINACIÓN</label>
          <select id="inputState" class="form-control" name="cta" >
          <option selected><?=$cta?></option>
          <option>08-01-03</option>
          <option>08-01-01</option>
          <option>08-01-02</option>
          <option>08-01-04</option>
          <option>08-01-05</option>
        </select>
      </div>
      <div class="col-md-4 mb-4">
        <label for="inputState" class="badge badge-pill badge-info">DIRECCIÓN</label>
          <input  type="text" id="inputState" class="form-control" name="direccion" value="<?=$direccion?>" maxlength="50">
          <div class="invalid-feedback">Por favor llene el campo</div>
      </div>
      <div class="form-group col-md-1 mb-1">
        <input  type="hidden" readonly="readonly" class="form-control" name="escuela_id_municipio" value="<?=$escuela_id_municipio?>">
      </div>
      <div class="form-group col-md-4 mb-4">
        <label for="inputState" class="badge badge-pill badge-info">MUNICIPIO</label>
        <input readonly="readonly"  type="text" class="form-control" name="municipio" value="<?=$municipio?>" maxlength="50">
      </div>
  </div>
   <center>
      <td colspan="2">
        <input  type="hidden"  name="id_estable" value="<?=$id_escuela?>">
        <input class="btn btn-primary btn-md" type="submit" role="button" name="actualizar" value="actualizar">
      </td>
    </center>
  </form>
    <?php $mensaje ?>
    <div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
  </div>
  </section>
  <br>
    <footer><?php $this->load->view('footer') ?></footer>
  </body>

</script>
<script>
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
<script src="<?=$base_url?>/resources/jqueryNumeric/jquery.numeric.js"></script>

<script>

  $(document).ready(function(){
    validarCualquierNumero()
  });

  function validarCualquierNumero(){
    $(".numeric").numeric();
    $(".integer").numeric(false, function() { alert("Integers only"); this.value = ""; this.focus(); });
    $(".positive").numeric({ negative: false }, function() { alert("No negative values"); this.value = ""; this.focus(); });
    $(".decimal-2-places").numeric({ decimalPlaces: 2 });
    $("#remove").click(
      function(e)
      {
        e.preventDefault();
        $(".numeric,.positive,.decimal-2-places").removeNumeric();
      }
      );
  }
</script>
</html>
