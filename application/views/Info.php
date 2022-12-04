<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";

if (count($arr) < 1) {
  $mensaje = "<script>alertify.set('notifier');alertify.success('No hay días registrados');</script>";
}

$htmltrow = "<tr>
        <td>%s</td> 
        <td>%s</td>
        <td>%s</td>
		<td><center><a class='btn btn-primary icon-arrow-down-circle iconos' href=\"${base_url}/Documentos/DescargarDocumentos/%s\"></a></center>
        </td>
       </tr>\n";
$htmltrows = "";

foreach ($arr as $j) {
  $id_circular = $j['id_circular'];
  $htmltrows .= sprintf($htmltrow,  $j['motivo'], $j['descripcion'], $j['nombre'], $j['nombre']);
} 
?><!DOCTYPE html>
<html lang="es">
<head>
    <?php $this->load->view('header'); ?>
    <title>ACTIVIDADES</title>
</head>
<body>
<?php $this->load->view('menu'); ?>
<div class="container espacio-arriba">
	<header>
		<center><h3 style="color: #3538A7"><img width="70" src="<?=$base_url?>/resources/img/escudo.jpg"/>SICTA</h3></center>
	</header>
 <center><h2>Información General</h2></center>
 <section class="container">
	 <div class="alert alert-warning" role="alert">
	  En esta sección se muestran las circulares publicadas y la opción de descargar.
	</div>
</section> 
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
<br>


<br><br><br><br><br>
<section>
	<center><img width="80%" src="<?=$base_url?>/resources/img/covid.jpg" alt=""></center>
</section>
<section>
	<center><img width="80%" src="<?=$base_url?>/resources/img/digital.jpg" alt="">
	<h2><a href="https://digital.mineduc.gob.gt/" target="_blank" >Mineduc Digital</a></h2></center>
</section>

</div>

<footer><?php $this->load->view('footer') ?></footer>
</body>
</html>
