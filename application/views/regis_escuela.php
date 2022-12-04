<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
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
	<h3><center><img width="75" src="<?=$base_url?>/resources/img/escuela.ico"/> CREAR ESTABLECIMIENTO</center></h3>
</div>
</header>
<section>
	<div class="container">
	  <form class="needs-validation" novalidate action="<?=$base_url?>/Establecimientos" method="POST">
	  <div class="form-row">
	    <div class="col-md-3 mb-3">
	      <label for="inputState" class="badge badge-pill badge-primary">CÓDIGO DEL ESTABLECIMIENTO</label>
	      <input  type="num" id="inputState" class="form-control" name="codigo" value="<?=$codigo?>" required placeholder="08-01-0000-00" maxlength="13">
	      <div class="invalid-feedback">Por favor llene el campo</div>
	    </div>
	    <div class="form-group col-md-6 mb-6">
	      <label for="inputState" class="badge badge-pill badge-danger">NOMBRE DEL ESTABLECIMIENTO</label>
	      <input  type="text" id="inputState" class="form-control" name="nombre" value="<?=$nombre?>" required placeholder="Nombre del establecimiento" maxlength="50">
	      <div class="invalid-feedback">Por favor llene el campo</div>
	    </div>
	     <div class="form-group col-md-3 mb-3">
	      <label for="inputState" class="badge badge-pill badge-primary">JORNADA</label>
	     	<select id="inputState" class="form-control" name="jornada" value="<?=$jornada?>">
	        <option>Matutina</option>
	        <option>Vespertina</option>
	        <option>Nocturna</option>
	      </select>
	    </div>
	    <div class="form-group  col-md-6 mb-6">
			      <label for="validationCustom02" class="badge badge-pill badge-success">ELIJA EL DIRECTOR ENCARGADO</label>
				  <select class="custom-select"  name="id_director" id="validationCustom02" required>
				        <?php
				          foreach ($arr as $row) {

				        ?>
				        <option  value="<?php echo $row['id_usuario']?>">

				            <?php echo $row['nombre'] ?></option>
				        <?php
				        }?>
				      </select>
			    </div>
	     <div class="col-md-2 mb-2">
	      <label for="inputState" class="badge badge-pill badge-dark">SECTOR</label>
	      <select id="inputState" class="form-control" name="sector" value="<?=$sector?>">
	        <option>Oficial</option>
	        <option>Privado</option>
	        <option>Cooperativa</option>
	      </select>
	    </div>
	    <div class="col-md-2 mb-2">
	      <label for="inputState" class="badge badge-pill badge-dark">NIVEL</label>
	      <select id="inputState" class="form-control" name="nivel" value="<?=$nivel?>">
	        <option>43</option>
	        <option>41</option>
	        <option>42</option>
	        <option>44</option>
	        <option>45</option>
	      </select>
	    </div>
	    <div class="col-md-2 mb-2">
	      <label for="inputState" class="badge badge-pill badge-dark">PLAN</label>
	      <select id="inputState" class="form-control" name="plan" value="<?=$plan?>">
	        <option>Diario</option>
	        <option>Fin de Semana</option>
	      </select>
	  	</div>
	  	<div class="form-group col-md-2 mb-2">
			<label for="inputState" class="badge badge-pill badge-warning">ÁREA</label>
			<select id="inputState" class="form-control" name="area" value="<?=$area?>">
			<option>Rural</option>
			<option>Urbana</option>
			</select>
		</div>
	    <div class="col-md-2 mb-2">
			<label for="inputState" class="badge badge-pill badge-warning">ESTADO</label>
			<select id="inputState" class="form-control" name="estado" value="<?=$estado?>">
			<option>Abierta</option>
			<option>Cerrado</option>
			</select>
	    </div>
	    <div class="col-md-2 mb-2">
	      <label for="inputState" class="badge badge-pill badge-warning">MODALIDAD</label>
	      <select id="inputState" class="form-control" name="modalidad" value="<?=$modalidad?>">
	        <option>Bilingue</option>
	        <option>Monolingue</option>
	      </select>
	  	</div>
	  	<div class="col-md-4 mb-4">
	      <label class="badge badge-pill badge-warning">CORREO ELECTRÓNICO</label>
	      <input type="email" class="form-control"  name="mail"  value="<?=$mail?>">
	      <div class="invalid-feedback">Por favor llene el campo</div>
	  	</div>
	  	<div class="col-md-2 mb-2">
	  		<label for="inputState" class="badge badge-pill badge-warning">NO. DE TELÉFONO</label>
	      	<input  type="num" id="inputState" class="form-control integer" name="telefono" value="<?=$telefono?>" required placeholder="77660000" maxlength="8">
	      	<div class="invalid-feedback">Por favor llene el campo</div>
	  	</div>
	  	<div class="form-group col-md-2 mb-2">
	  		<label for="inputState" class="badge badge-pill badge-info">COORDINACIÓN</label>
	      	<select id="inputState" class="form-control" name="cta" value="<?=$cta?>">
	        <option>08-01-03</option>
	        <option>08-01-01</option>
	        <option>08-01-02</option>
	        <option>08-01-04</option>
	        <option>08-01-05</option>
	      </select>
	  	</div>
	  	<div class="col-md-4 mb-4">
	  		<label for="inputState" class="badge badge-pill badge-info">DIRECCIÓN</label>
	      	<input  type="text" id="inputState" class="form-control" name="direccion" value="<?=$direccion?>" required placeholder="Paraje El Ejemplo, Cantón El Ejemplo" maxlength="50">
	      	<div class="invalid-feedback">Por favor llene el campo</div>
	  	</div>
	  	<div class="form-group col-md-3 mb-3">
	  		<label for="validationCustom05" class="badge badge-pill badge-info">DEPARTAMENTO</label>
	      	<select class="custom-select" name="departamento" id="departamento" id="validationCustom05" required></select>
	  	</div>
	  	<div class="form-group col-md-3 mb-3">
	  		<label for="inputState" class="badge badge-pill badge-info">MUNICIPIO</label>
	      	<select class="custom-select inputState" name="municipio" id="municipio"></select>
	      	<div class="invalid-feedback">Por favor llene el campo</div>
	  	</div>
	</div>
	 <center>
	    <td colspan="2">
	      <center>
	        <div onclick="mensaje()"><?=$boton?></div>
	      </center>
	    </td>
	  </center>
	</form>
	<div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
	</div>
	</section>
	<section class="container">
	  <a href="<?=$base_url?>/Establecimientos/listar" class="badge badge-pill badge-success">VER LISTADO</a>
	</section>
	<br>
	  <footer><?php $this->load->view('footer') ?></footer>
	</body>

<script type="text/javascript">
$(function(){
	$.post('<?=$base_url?>/Establecimientos/departamento').done(function(respuesta){
		$('#departamento').html(respuesta);
	});

	$('#departamento').change(function(){
		var depto = $(this).val();
		$.post('<?=$base_url?>/Establecimientos/municipio',{departamento: depto}).done(function(respuesta){
			$('#municipio').html(respuesta);
		});
	});
})
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
