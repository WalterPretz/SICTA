<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
?><!DOCTYPE html>
<html lang="es">
<head>
	<?php $this->load->view('header'); ?>

	<title>Autenticación</title>
</head>
<body>
	<?php $this->load->view('menu'); ?>
<div id="container">
		<br><br><br><br>
	<header>
		<center><h3 style="color: #3538A7"><img width="70" src="<?=$base_url?>/resources/img/escudo.jpg"/>SICTA</h3></center>
	</header>
	<br><hr><br>
	<div class="abs-center">
		<div id="container-fluid bg">
			<div class="row">
				<form class="form-container needs-validation" novalidate action="<?=$base_url?>/Usuario/login/" method="POST">
					<div class="form-group">
						<label for="user1 validationUsername" class="icon-people"> Usuario</label>
						<input type="text" class="form-control" placeholder="Username" name="usuario" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
						<div class="invalid-feedback">Por favor llene el campo</div>
					</div>
					<div class="form-group">
						<label for="Pasword" class="icon-login"> Contraseña</label>
						<input type="password" class="form-control" placeholder="Password" name="clave" required>
						<div class="invalid-feedback">Por favor llene el campo</div>
					</div>
					<td colspan="2">
						<center><input type="submit" class="btn btn-info btn-md" role="button" name="login" value="Login"></center>
					</td>
				</form>						
		</div>
		<div class="alert alert" style="color:#FF0000" role="alert" class="alert-link" onclick="$(this).hide(1000)">
        	<strong><?=$mensaje?></strong>
        	
    	</div>
	</div>
</div>

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
</html>
