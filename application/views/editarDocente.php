<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";

foreach ($arr as $key) {
	$nombre_d = $key['nombre_d'];
	$apellido_d = $key['apellido_d'];
	$CUI = $key['CUI'];
	$fecha_nacimiento = $key['fecha_nacimiento'];
	$email = $key['email'];
	$direccion = $key['direccion'];
	$num1 = $key['num1'];
	$num2 = $key['num2'];
	$nombreE = $key['nombreE'];
	$docente_id_escuela = $key['docente_id_escuela'];
	$fecha_inicio = $key['fecha_inicio'];
	$puesto =$key['puesto'];
	$fuente_ingreso = $key['fuente_ingreso'];
	$id_docente = $key['id_docente'];
}

?><!DOCTYPE html>
<html lang="es">
<head>
	<?php $this->load->view('header'); ?>
	<title>Actualizar / Modificar datos del Docente</title>
</head>
<body>
	<?php $this->load->view('menu'); ?>
<header><div class="label label-danger label-md" onclick="$(this).hide(1000)" style="color:#C50000"><?=$mensaje?></div></header>
<section class="espacio-arriba container">
	<section class="content-form">
		<h2 class="sub-title icon-note iconos"> Editar datos del Docente</h2><br>
		<form method="POST" action="<?=$base_url?>/Docentes/editarDocente">
			<table class="table-striped">
				<tr >
					<td ><strong class="ajust">Nombres<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input id="names" type="text" class="form-control" placeholder="Nombre" name="nombre_d" required maxlength="50" minlength="3" type="strtoupper"size="50" value="<?=$nombre_d?>">
					</td>
				</tr>
				<tr>
					<td><strong class="ajust">Apellidos<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input id="names" type="text" class="form-control" placeholder="Apellidos" name="apellido_d" required maxlength="50" minlength="3" size="50" value="<?=$apellido_d?>">
					</td>
				</tr>
				<tr>
					<td><strong class="ajust">Fecha de Nacimiento<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input id="fecha" onblur="validarFecha()" type="date" class="form-control" name="fecha_nacimiento" required value="<?=$fecha_nacimiento?>">
					</td>
				</tr>
				<tr>
					<td><strong class="ajust">Número de CUI<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="text" min="1000000000000" min="4999999999999" maxlength="13" class="form-control integer" name="CUI"  required value="<?=$CUI?>">
					</td>
				</tr>
				<tr>
					<td><strong class="ajust">Correo Electrónico</strong></td>
					<td>
						<input type="email" class="form-control" placeholder="E-mail" name="email"  value="<?=$email?>">
					</td>
				</tr>				
				<tr>
					<td><strong class="ajust">Dirección<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input id="names" type="text" class="form-control"  name="direccion" required maxlength="50" minlength="5" size="50" value="<?=$direccion?>">
					</td>
				</tr>
			</table>
				<div class="form-group row justify-content-md-center text-center">
					<div class="col-xs-auto col-sm-auto col-md-auto">
						<td><strong>Teléfono / Celular</strong></td>
						<input type="text" class="form-control form-control-user text-center integer" placeholder="00000000" name="num1" required maxlength="8" value="<?=$num1?>">
					</div>
					<div class="col-xs-auto col-sm-auto col-md-auto">
						<td><strong>Segundo Teléfono / Celular</strong></td>
						<input type="text" class="form-control form-control-user text-center integer" name="num2" required maxlength="8" placeholder="00000000" value="<?=$num2?>">
					</div>
				</div>
				<div class="form-group row justify-content-md-center text-center">
				<div class="col-xs-auto col-sm-auto col-md-auto">
					<td><strong>Seleccionar Departamento</strong></td>
			  		<select class="custom-select" name="departamento" id="departamento">
							<option value="0">Seleccionar</option>
					</select>
			  	</div>
			  	<div class="col-xs-auto col-sm-auto col-md-auto">
			  		<td><strong>Seleccionar Municipio</strong></td>
			  		<select class="custom-select" name="municipio" id="municipio">
							<option value="0">Seleccionar</option>
					</select>
	  			</div>
	  			</div>
			<table>
				<br>
				<tr>
				<div class="text-center"><strong class="ajust">Relación con el Ministerio de Educación</strong></div><br>
					<input type="hidden" name="docente_id_escuela" value="<?=$docente_id_escuela?>">
					<td><strong class="ajust">Estrablecimiento Actual<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<select class="custom-select"  name="docente_id_escuela">
				        <?php
				          foreach ($arr1 as $row) {
				        ?>
				          <option  value="<?php echo $row['id_escuela']?>">
				            <?php echo $row['nombre'] ?></option>
				        <?php
				        }?>
				      </select>
					</td>
				</tr>
				</tr>
					<td><strong class="ajust">Fecha de Inicio en el Ministerio<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input id="fecha" onblur="validarFecha()" type="date" class="form-control" name="fecha_inicio" required value="<?=$fecha_inicio?>">
					</td>
				</tr>
				<tr>
					<td><strong class="ajust">Puesto que ocupa<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<select  id="inputState" class="form-control" name="puesto">
						<option selected><?=$puesto?></option>
						  <option value="Docente">Docente</option>
						  <option value="Director">Director</option>
						  <option value="Sub-Director">Sub-Director</option>
						  <option value="Personal Operativo">Personal Operativo</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><strong class="ajust">Fuente de Ingreso<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<select class="custom-select" name="fuente_ingreso" id="inputState">
							<option selected><?=$fuente_ingreso?></option>
							<option value="Presupuesto en el Mineduc 011">Presupuesto en el Mineduc 011</option>
							<option value="Contrato Mineduc 021">Contrato Mineduc 021</option>
							<option value="Contrato Mineduc 022">Contrato Mineduc 022</option>
							<option value="Contrato Mineduc 023">Contrato Mineduc 023</option>
							<option value="Pagado por la Municipalidad">Pagado por la Municipalidad</option>
							<option value="Ad Honorem">Ad Honorem</option>
						</select>
					</td>
				</tr>
			</table>
			<br>
			<td colspan="2">
				<center>
				<input  type="hidden"  name="id_maestro" value="<?=$id_docente?>">
				<input class="btn btn-primary btn-md"  type="submit" role="button" name="actualizar" value="actualizar">
			</center>
			<br>
			</td>
		</form>
	</section>
</section>

	<footer><?php $this->load->view('footer') ?></footer>
</div>

</body>


<script type="text/javascript">
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
	
//funcion Ajax para buscar en base de datos
$(function(){
	$.post('<?=$base_url?>/Establecimientos/departamento').done(function(respuesta){
		$('#departamento').html(respuesta);
	});

	//lista de departamentos
	$('#departamento').change(function(){
		var el_depa = $(this).val();

		$.post('<?=$base_url?>/Establecimientos/municipio',{departamento: el_depa}).done(function(respuesta){
			$('#municipio').html(respuesta);
		});
	});
})

function validarFecha()
{
	var hoy = new Date();
	var resta = hoy.setFullYear(hoy.getFullYear()-10);
	var suma = hoy.setFullYear(hoy.getFullYear()-90);
	let fecha_form_usuario = document.getElementById('fecha').value;
	let fecha_form = new Date(fecha_form_usuario);

// Comparamos solo las fechas => no las horas!!
hoy.setHours(0,0,0,0);  // Lo iniciamos a 00:00 horas

if (fecha_form <= suma) {
  alert('Fecha no valida, debe ingresar una fecha mayor a 1920');
	  document.getElementById("fecha").value = "";
	return 0;
}
if (fecha_form >= resta) {
  alert('Fecha no valida, debe ingresar una fecha de por lo menos 10 años atras');
	  document.getElementById("fecha").value = "";
}

else {

}
}
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
