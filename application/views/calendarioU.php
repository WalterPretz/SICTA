<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
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
<div class="container espacio-arriba">
<?php $this->load->view('menu'); ?>
  <section id="info2">
      <div class="info text-center"><h5>CALENDARIO COORDINACIÓN TÉCNICO ADMINISTRATIVO 08-01-03 2020</h5></div>
  </section>
    <section>
        <div class="container">
            <div id="calendar"></div>
        </div>

        <!-- ModalInsertar -->
        <div class="modal fade " id="modalEvento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content ">
              <div class="modal-header fondo1">
                <h5 class="modal-title" id="tituloEvento"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body fondo1">
                <input type="hidden" id="txtId"  /><br>
                Fecha:<input type="date" readonly="readonly" id="txtFecha" name="txtFecha" /><br>
                Título: <textarea type="text" readonly="readonly" id="txtTitulo" rows="1" cols="50" ></textarea><br>
                Hora: <input type="time" readonly="readonly" id="txtHora" value="08:00"/><br>
                Descripción: <textarea id="txtDescripcion" readonly="readonly" rows="3" cols="50" ></textarea><br>
                Lugar: <textarea id="txtLugar" rows="1" readonly="readonly" cols="50" ></textarea><br>
                <input type="hidden" id="coltext" value="#FFFFFF" /><br>

              </div>
              <div class="modal-footer fondo1">
                <button type="button" id="btnCerrarModal" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
    </section>
</div>
</body>
<script>
    $(document).ready(function() {
        $.post('<?php echo base_url();?>Calendario/ListarEventos',
         function(data){
        
        var initialLocaleCode = 'es';
        $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listWeek'
          },
            locale: initialLocaleCode,
            weekNumbers: true,
            navLinks: true,
            businessHours: true,
            selectable:true,
            selectHelper:true,
            editable: false,
            eventResize: true,
            eventLimit: true,
            events: $.parseJSON(data),

            dayClick:function(date,jsEvent,view){
                $('#txtFecha').val(date.format());
                $("#modalEvento").modal();

            },

            eventClick:function(event, jsEvent,view){
                $('#tituloEvento').html(event.title);
                $('#txtTitulo').val(event.title);
                $('#txtDescripcion').val(event.descripcion);
                $('#txtLugar').val(event.lugar);
                $('#txtId').val(event.id);
                
                FechaHora = event.start._i.split(" ");
                $('#txtFecha').val(FechaHora[0]);
                $('#txtHora').val(FechaHora[1]);

                $("#modalEvento").modal();
            }


        });
    });
});

</script>


</html>

