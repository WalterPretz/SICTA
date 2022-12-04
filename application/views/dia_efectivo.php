<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$mensaje = isset($mensaje) ? $mensaje : "";

if (count($arr1) < 1) {
  $mensaje = "<script>alertify.set('notifier');alertify.success('No hay días registrados');</script>";
}

$htmltrow = "<tr>
        <td>%s</td> 
        <td>%s</td>
        <td>%s</td>
        <td>%s</td>
        <td><center><a class='btn btn-danger' href=\"${base_url}/Calendario/elimMotivoDia/%s\">Eliminar</a></center></td>  
       </tr>\n";
$htmltrows = "";

foreach ($arr1 as $j) {
  $id_dia = $j['id_dia'];
  $htmltrows .= sprintf($htmltrow, 
    $j['motivo'], $j['descripcionMotivo'], $j['descripcion'], $j['dias'], $j['id_dia']);
} 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php $this->load->view('header'); ?>
    <title>CALENDARIO</title>
    <link rel="stylesheet" href="<?=$base_url?>/resources/calendario/fullcalendar.min.css" />
    <link href='<?=$base_url?>/resources/calendario/fullcalendar.print.min.css' rel='stylesheet' media='print'/>
    <script src="<?=$base_url?>/resources/calendario/lib/moment.min.js"></script>
    <script src="<?=$base_url?>/resources/calendario/fullcalendar.min.js"></script>
    <script src='<?=$base_url?>/resources/calendario/locale-all.js'></script> 
</head>
<body>
<div class="container-fluid espacio-arriba">
<?php $this->load->view('menu'); ?>
  <section id="info2">
      <div class="info text-center"><h5>DÍAS EFECTIVO</h5></div>
  </section>
<section>
  <div>
  <div class="row">
    <div class="col">
      <div id="calendar"></div>
    </div>
    <div class="col">
      <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Tipo de Registro</th>
            <th scope="col">MOTIVO</th>
            <th scope="col">DESCRIPCIÓN</th>
            <th scope="col" >FECHA</th>
            <th scope="col" >ACCIÓN</th>
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
    <section>
        <div class="container">
        </div>

        <!-- ModalInsertar -->
        <div class="modal fade " id="modalEvento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content ">
              <div class="modal-body fondo1">
                <form class="needs-validation" action="<?=$base_url?>/Calendario/CrearDia" method="POST" required>
                <div class="form-group col">
                  <center>
                  <input type="date" readonly="readonly" id="dias" name="dias" value="<?=$dias?>" />
                  </center>
                </div>
                <div class="form-group col">
                  <label for="validationCustom01" for="inputState" class="badge badge-pill badge-info">Tipo</label>
                    <select class="custom-select form-control" id="motivo" name="motivo" required  id="validationCustom04" required></select>
                </div>
                <div class="form-group col">
                  <label for="validationCustom01" for="inputState" class="badge badge-pill badge-info">Motivo</label>
                    <select class="custom-select" name="tipomotivo" id="tipomotivo" id="validationCustom04" required></select>
                </div>
                <div class="form-group col">
                  <label class="badge badge-pill badge-info">Descripción</label>
                  <textarea class="form-control" id="descripcion" name="descripcion" value="<?=$descripcion?>" placeholder="Escribir descripción" required></textarea>
                </div>
              </div>
              <div class="modal-footer fondo1">
                <div>
                  <button type="submit" class="btn btn-primary btn-block" name="guardar" value="Guardar" id="submit">Guardar</button>
                </div>
                <div>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              </div>
              <label id="resultado">
            </form>
            </div>
          </div>
        </div>
    </section>
</div>
</body>
<footer><?php $this->load->view('footer') ?></footer>
<script>
    $(document).ready(function() {
        $.post('<?php echo base_url();?>Calendario/DiasEfectivos',
         function(data){
        
        var initialLocaleCode = 'es';
        $('#calendar').fullCalendar({

            locale: initialLocaleCode,
            navLinks: false,
            businessHours: true,
            selectable:true,
            selectHelper:true,
            editable: false,
            events: $.parseJSON(data),

            dayClick:function(date,jsEvent,view){
                $('#dias').val(date.format());
                $("#modalEvento").modal();
            }
        });
    });
});

</script>

<script type="text/javascript">
$(function(){
  $.post('<?=$base_url?>/Calendario/motivo').done(function(respuesta){
    $('#motivo').html(respuesta);
  });

  $('#motivo').change(function(){
    var motiv = $(this).val();
    $.post('<?=$base_url?>/Calendario/tipoMotivo',{motivo: motiv}).done(function(respuesta){
      $('#tipomotivo').html(respuesta);
    });
  });
})
</script>


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

