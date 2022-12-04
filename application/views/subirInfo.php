<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";

if (count($arr) < 1) {

  $mensaje = 
"<script>alertify.set('notifier');alertify.success('No hay circulares registrados');</script>";
}
$htmltrow = "<tr>
        <td>%s</td> 
        <td>%s</td>
        <td>%s</td>
		<td><center><a class='btn btn-primary icon-arrow-down-circle iconos' href=\"${base_url}/Documentos/DescargarDocumentos/%s\"></a></center>
        </td>
        <td>
          <div class='form-group row'>
            <div class='col-sm-2'>
              <a class='btn btn-danger icon-doc iconos' href=\"${base_url}/Documentos/EliminarAr/%s \"></a>
            </div>
            <div class='col-sm-2'>
            <a class='btn btn-danger icon-trash iconos' href=\"${base_url}/Documentos/Elim/%s \"></a>
            </div>
          </div>
        </td>
       </tr>\n";
$htmltrows = "";

foreach ($arr as $a) {
  $id_circular = $a['id_circular'];
  $htmltrows .= sprintf($htmltrow,  $a['motivo'], $a['descripcion'], $a['nombre'], $a['nombre'], $a['nombre'], $a['id_circular']);
} 
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>ACTIVIDADES</title>
	 <?php $this->load->view('header'); ?>
</head>
<body>
	<header>
		<?php $this->load->view('menu'); ?>
	</header>
	<div class="container espacio-arriba">
		<center><h2>Envío de Circular</h2></center>
<section>
	 <div class="alert alert-danger" role="alert">
	  Al momento de subir un archivo tener en cuenta lo siguiente: El nombre del archivo no debe de tener Tílde y espacio. Si desea colocar un espacio es sugerible utilizar guión bajo: Ej: Documento_prueba
	</div>
</section> 
		<section>
			<form class="needs-validation" novalidate action="<?=$base_url?>/Documentos/" method="POST" enctype="multipart/form-data">
			  <div class="form-group">
			    <label for="exampleFormControlInput1">Título</label>
			    <input type="text" class="form-control" id="exampleFormControlInput1" name="titulo" placeholder="Título / Motivo" required>
			    <div class="invalid-feedback">Por favor escribir un motivo</div>
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlInput1">Descripción</label>
			    <input type="text" class="form-control" id="exampleFormControlInput1" name="descripcion" placeholder="Descripción de la circular" required>
			    <div class="invalid-feedback">Por favor escribir descripción del archivo</div>
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlFile1">Subir archivo</label>
			    <input type="file" class="form-control-file"  name="archivo" required>
			  </div>
			  <center>
			    <td><input type="submit" value="Guardar" name="Guardar"></td>
			  </center>
			</form>
		</section>
<br>
<center>
	<div class="alert alert-success" role="alert">
</div>
</center>
		<center><h2>Información General</h2></center>

<section>
  	<div>
  		<div>
    		<div class="col">
      			<div class="table-responsive">
	      			<table class="table">
				        <thead>
				          <tr>
				            <th scope="col">TÍTULO</th>
				            <th scope="col">DESCRIPCIÓN</th>
				            <th scope="col">NOMBRE DEL DOCUMENTO</th>
				            <th scope="col">DESCARGAR</th>
				            <th scope="col">ELIMINAR</th>
				          </tr>
				        </thead>
				        <tbody>
				            <?=$htmltrows?>
				        </tbody>
	      			</table>
	   			</div>
	    	</div>
	  	</div>
	</div>
</section>
	</div>
	<br>
</body>
<footer><?php $this->load->view('footer') ?></footer>
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