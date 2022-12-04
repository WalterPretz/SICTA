<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
<head>
	<?php $this->load->view('header'); ?>
	<title>EMAIL</title>
</head>
<body>
	<?php $this->load->view('menu'); ?>
	<header>
    <section id="info2">
        <div class="espacio-arriba">
            <div class="info text-center">
              <br>
                <h1 class="h4">CORREO</h1>
                <p class="lead">ENVÍO</p><BR>
              </div>
        </div>
    </section>
    <br>
	</header>
<div class="container">
	 <div  id="body">
    <form  id="subir" action="<?=$base_url?>/Correo/envio/" method="POST">
      <table border="1">
        <div class="form-group">
          <label for="comment">Ingrese Asunto:</label>
            <input type="text" class="form-control" placeholder="Asunto" name="asunto" required maxlength="50" size="50" value="<?=$asunto?>">
          <label for="comment">Ingrese Mensaje:</label>
          <textarea class="form-control" rows="5" id="comment" name="mensaje" value="<?=$mensaje?>"></textarea>
        </div>
        <tr>
          <td colspan="2">
            <input onclick="mensaje()" type="submit" class="btn btn-primary btn-md" role="button" name="enviar" value="Enviar">
          </td>
          <?php echo $confirmacion; ?>
        </tr>
      </table>
    </form>
    <div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
  </div> 
</div>
<footer><?php $this->load->view('footer') ?></footer>
</body>

<script type="text/javascript">
function mensaje(){
  // confirm dialog
alertify.confirm("¿Está seguro de enviar el mensaje?", function (e) {
    if (e) {
        document.getElementById("subir").submit();
    } else {
        // user clicked "cancel"
    }
});
}
</script>

</html>