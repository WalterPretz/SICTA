<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";

foreach ($arr as $key) {
  $usuario = $key['usuario'];
  $nombre = $key['nombre'];
  $rol = $key['rol'];
  $id_usuario = $key['id_usuario'];
}

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
  	<h4 class="text-center"> Editar / Recuperar Cuenta de Usuario</h4>
</header>
<div id="body">
<section>
	<div class="container">
		<div class="card o-hidden border-0 shadow-lg">
			<div class="row">
				<div class="col-lg-12">
					<div class="p-5">
						<div class="text-center">
							<lavel for="inputState"><strong>Nombres y Apellidos<strong style="color: red; font-size: 20px">*</strong></strong></td>
							<form class="user" id="subir" action="<?=$base_url?>/Usuario/editar" method="POST" class="needs-validation" novalidate>
							<input  id="inputState" type="text" class="form-control form-control-user text-center" placeholder="Nombres y Apellidos" name="nombre" required maxlength="50" minlength="7" size="50" required value="<?=$nombre?>">
							<div class="form-group row">
							<div class="col-sm-6 mb-3 mb-sm-0 text-center">
								<td><strong>Usuario<strong style="color: red; font-size: 20px">*</strong></strong></td>
								<input type="text" class="form-control form-control-user text-center" placeholder="Usuario" name="usuario" required value="<?=$usuario?>"> <div class="valid-feedback">Correcto!</div>
							</div>									
							<div class="col-sm-6 mb-3 mb-sm-0 text-center">
								<td><strong>Rol del Usuario<strong style="color: red; font-size: 20px">*</strong></strong></td>
								<input readonly="readonly" type="text" class="form-control form-control-user text-center" placeholder="rol" name="rol" required value="<?=$rol?>"> <div class="valid-feedback">Correcto!</div>
							</div>
							</div>
							<div>
								<div>
									<input  type="hidden"  name="id_user" value="<?=$id_usuario?>">
									<input class="btn btn-warning btn-user btn-block" type="submit" role="button" name="actualizar" value="¡Actualizar Usuario!">
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
