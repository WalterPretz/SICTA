<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
?><!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<title>Crear Alumno</title>
</head>
<body>
	<?php $this->load->view('menu'); ?>
	<br>
	<header>
		<center class="espacio-arriba"><h2><img width="50" src="<?=$base_url?>/resources\img/cre.png"> Inscribir Alumno</h2></center>
		<div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
	</header>

	<SECTION class="container" >
	<div  id="body">
		<form  class="needs-validation" novalidate id="subir" action="<?=$base_url?>/Alumnos" method="POST"><center>
			<table class="form-container" border="0">
				<tr>
					<td for="validationCustom01"><strong>CÓDIGO DEL ALUMNO<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input id="validationCustom01" type="txt" minlength="1" required maxlength="7" class="form-control" placeholder="A123ABC" name="codigo"  required value="<?=$codigo?>">
						<div class="valid-feedback">¡Correcto!</div><div class="invalid-feedback">Agregar Código</div>
					</td>
				</tr>
				<tr>
					<td for="validationCustom02"><strong>NOMBRES<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input id="names validationCustom02" type="text" class="form-control" placeholder="Nombres" name="nombre_alum" required maxlength="50" minlength="3" size="50" value="<?=$nombre_alum?>">
						<div class="valid-feedback">¡Correcto!</div><div class="invalid-feedback">Agregar Nombre</div>
					</td>
				</tr>
				<tr>
					<td><strong>APELLIDOS<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input id="names" type="text" class="form-control" placeholder="Apellidos" name="apellido_alum" required maxlength="50" minlength="3" size="50" value="<?=$apellido_alum?>">
						<div class="valid-feedback">¡Correcto!</div><div class="invalid-feedback">Agregar Apellido</div>
					</td>
				</tr>
				<tr>
					<td><strong>CUI DEL ALUMNO<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="text" minlength="12" required maxlength="13" class="form-control integer" placeholder="No. de CUI" name="cui"  required value="<?=$cui?>">
						<div class="valid-feedback">¡Correcto!</div><div class="invalid-feedback">Agregar Número de CUI</div>
					</td>
				</tr>
				<tr>
					<td><strong>DIRECCIÓN<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input id="names" type="text" class="form-control"  name="direccion" required maxlength="50" minlength="5" size="50" value="<?=$direccion?>">
						<div class="valid-feedback">¡Correcto!</div><div class="invalid-feedback">Ingresar Dirección del alumno</div>
					</td>
				</tr>
				<tr>
					<td><strong>FECHA DE NACIMIENTO<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input id="fecha" onblur="validarFecha()" type="date" class="form-control" name="fecha_nacimiento" required value="<?=$fecha_nacimiento?>">
						<div class="valid-feedback">¡Correcto!</div><div class="invalid-feedback">Ingresar Fecha de Nacimiento</div>
					</td>
				</tr>
				<tr>
					<td><strong>DEPARTAMENTO</strong></td>
					<td>
						<select class="custom-select" name="departamento" id="departamento">
						</select>
					</td>
				</tr>
				<tr>
					<td><strong>MUNICIPIO</strong></td>
					<td>
						<select class="custom-select" name="municipio" id="municipio">
						</select>
					</td> 
				</tr>
				<tr>
					<td><strong>NOMBRE DE LA MADRE<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input id="names" type="text" class="form-control" placeholder="Nombre de la Madre" name="nomadre" required maxlength="50" minlength="3" size="50" value="<?=$nomadre?>">
						<div class="valid-feedback">¡Correcto!</div><div class="invalid-feedback">Escribir el nombre de la madre del alumno</div>
					</td>
				</tr>
					<tr>
					<td><strong>APELLIDOS DE LA MADRE<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input id="names" type="text" class="form-control" placeholder="Apellidos de la Madre" name="apmadre" required maxlength="50" minlength="3" size="50" value="<?=$apmadre?>">
						<div class="valid-feedback">¡Correcto!</div><div class="invalid-feedback">Agregar Apellido</div>
					</td>
				</tr>
				<tr>
					<td><strong>CUI DE LA MADRE</strong></td>
					<td>
						<input type="text" min="1000000000000" required maxlength="13" class="form-control integer" name="cuimadre"  required value="<?=$cuimadre?>">
					</td>
					<div class="valid-feedback">¡Correcto!</div><div class="invalid-feedback">Agregar Número de CUI del DPI</div>
				</tr>
				<tr>
					<td><strong>NOMBRE DEL PADRE</strong></td>
					<td>
						<input type="text" class="form-control" minlength="1"  required maxlength="50" placeholder="Nombre del Padre" name="nopadre" size="50" value="<?=$nopadre?>">
					</td>
				</tr>
					<tr>
					<td><strong>APELLIDOS DEL PADRE</strong></td>
					<td>
						<input type="text" class="form-control" minlength="1" required maxlength="50" placeholder="Apellido del Padre" name="appadre" size="50" value="<?=$appadre?>">
					</td>
				</tr>
				<tr>
					<td><strong>CUI DEL PADRE</strong></td>
					<td>
						<input type="text" required maxlength="13" minlength="1" class="form-control integer" name="cuipadre"  required value="<?=$cuipadre?>">
					</td>
				</tr>
				<td><strong>TÉLEFONO</strong></td>
					<td>
						<input type="text" min="10000000" required maxlength="8" class="form-control integer" placeholder="00000000" name="telefono"  value="<?=$telefono?>">
						<div class="valid-feedback">¡Correcto!</div><div class="invalid-feedback">Agregar algún número de contacto</div>
					</td>
				</tr>
				
					<td colspan="2"><br>
						<center>
							<?=$boton?>
						</center><br>
					</td>
				</tr>

			</table>
			</center>
		</form>
	</div>
</SECTION>
<br>
	<footer><?php $this->load->view('footer') ?></footer>
</body>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
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


<script type="text/javascript">
function mensaje(){
	// confirm dialog
alertify.confirm("¿Está seguro de guardar?", function (e) {
    if (e) {
        document.getElementById("subir").submit();
    } else {
    }
});
}
//funcion Ajax depto
$(function(){
	$.post('<?=$base_url?>/Establecimientos/departamento').done(function(respuesta){
		$('#departamento').html(respuesta);
	});

	//lis mun
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
	var resta = hoy.setFullYear(hoy.getFullYear()-2);
	var suma = hoy.setFullYear(hoy.getFullYear()-90);
	let fecha_form_usuario = document.getElementById('fecha').value;
	let fecha_form = new Date(fecha_form_usuario);

// Comparamos solo las fechas => no las horas!!
hoy.setHours(0,0,0,0);  // Lo iniciamos a 00:00 horas

if (fecha_form <= suma) {
  alert('Fecha no valida, debe ingresar una fecha mayor a 1985');
	  document.getElementById("fecha").value = "";
	return 0;
}
if (fecha_form >= resta) {
  alert('Fecha no valida, debe ingresar una fecha de por lo menos 4 años atras');
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
