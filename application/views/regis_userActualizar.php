<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
foreach ($arr as $key) {
  $clave = $key['clave'];
  $claveN = $key['claveN'];
  $claveN2 = $key['claveN2'];
  $id_usuario = $key['id_usuario'];
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<title>Actualización Usuario</title>
</head>
<body>
<header>
	<?php $this->load->view('menu'); ?>
</header>
	<div class="caracteristica-icon text-center">
  		<div class="icon-key"></div></div>
  	<h4 class="text-center">Cambio de contraseña</h4>
</header>
	<div id="body">
<section>
	<div class="container">
		<div class="card o-hidden border-0 shadow-lg">
			<div class="row">
				<div class="col-lg-12">
					<div class="p-5">
						<div class="text-center">
							<form class="needs-validation" novalidate action="<?=$base_url?>/Usuario/cambioContrasenia" method="POST">
							<div >
								<level for="validationCustom03"><strong>Ingrese la contreña actual<strong style="color: red; font-size: 20px">*</strong></strong></level>
								<input type="password" class=" form-control form-control-user text-center" placeholder="Contraseña anterior" name="clave" id="clave" value="<?=$clave?>"required>
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<td><strong>Ingrese la nueva contraseña<strong style="color: red; font-size: 20px">*</strong></strong></td>
									<input type="password" class="form-control form-control-user text-center" placeholder="Contraseña nueva" name="claveN" id="claveN" value="<?=$claveN?>"required>
								</div>
								<div class="col-sm-6">
									<td><strong>Repita contraseña<strong style="color: red; font-size: 20px">*</strong></strong></td>
									<input type="password" class="form-control form-control-user text-center" placeholder="Repita Contraseña" name="claveN2" id="claveN2" value="<?=$claveN2?>"required >
								</div>
							</div>
							<div>
								<div>
									<input type="hidden"  name="id_user" value="<?=$id_usuario?>">
									<input type="submit" class="btn btn-danger btn-user btn-block"  role="button" name="actualizar" value="Actualizar Constraseña">
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
alertify.confirm("¿Está seguro de cambiar la contraseña?", function (e) {
		if (e) {
				document.getElementById("subir").submit(alertify.success('Registro exitoso'));
		} else {
			alertify.error('A cancelado el cambio de contraseña')
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
</html>
