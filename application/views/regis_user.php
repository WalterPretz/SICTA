<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
?><!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<title>Crear Usuario</title>
</head>
<body>
<header>
	<?php $this->load->view('menu'); ?>
</header>
	<div class="caracteristica-icon text-center">
  		<div class="icon-user"></div></div>
  	<h4 class="text-center"> Crear Cuenta de Usuario</h4>
</header>
<section class="container">
	  <a href="<?=$base_url?>/Usuario/listar" class="badge badge-pill badge-success">VER LISTADO DE USUARIOS</a>
</section><br>
	<div id="body">
<section>
	<div class="container">
		<div class="card o-hidden border-0 shadow-lg">
			<div class="row">
				<div class="col-lg-12">
					<div class="p-5">
						<div class="text-center">
							<lavel for="inputState validationCustom01"><strong>Nombres y Apellidos<strong style="color: red; font-size: 20px">*</strong></strong></td>
							<form class="user" id="subir" action="<?=$base_url?>/Usuario" method="POST" class="needs-validation" novalidate>
							<input  id="inputState validationCustom01" type="text" class="form-control form-control-user text-center" placeholder="Nombres y Apellidos" name="nombre" required maxlength="50" minlength="7" size="50" required value="<?=$nombre?>">
							<div class="form-group row">
							<div class="col-sm-6 mb-3 mb-sm-0 text-center">
								<td><strong>Usuario<strong style="color: red; font-size: 20px">*</strong></strong></td>
								<input type="text" class="form-control form-control-user text-center" placeholder="Usuario" name="usuario" required value="<?=$usuario?>"> <div class="valid-feedback">Correcto!</div>
							</div>									
							<div class="col-sm-6 mb-3 mb-sm-0 text-center">
								<td><strong>Rol del Usuario</strong><strong style="color: red; font-size: 20px">*</strong></td>
								<select class="custom-select text-center" name="rol">
								<option value="Director(a)">Director(a)</option>
								<option value="CTA" >Coordinador(a)</option>
								</select>
							</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<td><strong>Ingrese contraseña<strong style="color: red; font-size: 20px">*</strong></strong></td>
									<input type="password" class="form-control form-control-user text-center" placeholder="Contraseña" name="clave" required value="<?=$clave?>">
								</div>
								<div class="col-sm-6">
									<td><strong>Repita contraseña<strong style="color: red; font-size: 20px">*</strong></strong></td>
									<input type="password" class="form-control form-control-user text-center" placeholder="Repita Contraseña" name="clave2" required value="<?=$clave2?>">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-9 mb-3 mb-sm-0">
									<input onclick="mensaje()" class="btn btn-primary btn-user btn-block" role="button" name="guardar" value="¡Registrar Cuenta!">
								</div>
								<div class="col-sm-3">	
									<input type="reset" class="btn btn-danger btn-user btn-block" value="Limpiar">
								</div>	
							</div>
							</form>
							<div class="alert" role="alert" onclick="$(this).hide(10)"><?=$mensaje?></div>
							</div>
						</div>
					</div>
				</div>
			</div>                                                                                                              
		</div>
	</div>
</section>

<br>
	<footer><?php $this->load->view('footer') ?></footer>
</div>
</body>
<script type="text/javascript">
function mensaje(){
alertify.confirm("¿Está seguro de guardar?", function (e) {
		if (e) {
				document.getElementById("subir").submit(alertify.success('Registro exitoso'));
		} else {
			alertify.error('A cancelado el registro')
		}
});
return false;
}
</script>
<script>
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('guardar', function(event) {
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
</html>
