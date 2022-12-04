<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
<head>
<?php $this->load->view('header'); ?>
    <title>CALENDARIO</title>
    <link href='<?=$base_url?>/resources/calendario/fullcalendar.min.css' rel='stylesheet' />
    <link href='<?=$base_url?>/resources/calendario/fullcalendar.print.min.css' rel='stylesheet' media='print' />
    <script src='<?=$base_url?>/resources/calendario/lib/moment.min.js'></script>
    <script src='<?=$base_url?>/resources/calendario/fullcalendar.min.js'></script>
    <script src='<?=$base_url?>/resources/calendario/popper.min.js'></script>
    <script src='<?=$base_url?>/resources/calendario/es.js'></script>
    
</head>
<body>
<?php $this->load->view('menu'); ?> 
<div class="container espacio-arriba">
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
                <input type="hidden" id="txtId"/><br>
                Fecha:<input type="date"  id="txtFecha" name="txtFecha" /><br>
                <div class="form-group col">
                    <label for="validationCustom01" for="inputState" class="badge badge-pill badge-info">Título</label>
                    <input type="text" class="form-control" id="txtTitulo" id="validationCustom04" required>
                </div>
                <div class="form-group col">
                    <label for="inputState" class="badge badge-pill badge-info">Hora</label>
                    <input type="time" id="txtHora" value="08:00"/>
                </div>
                <div class="form-group col">
                    <label for="inputState" class="badge badge-pill badge-info">Descripción</label>
                    <textarea class="form-control" id="txtDescripcion" rows="2" id="validationCustom04" required></textarea>
                </div>
                <div class="form-group col">
                    <label for="inputState" class="badge badge-pill badge-info">Lugar</label>
                    <textarea class="form-control" id="txtLugar" required></textarea>
                </div>
                <div class="form-group col">
                    <label for="inputState" class="badge badge-pill badge-info">Color</label>
                    <input type="color" id="txtColor"/><br>
                     <input type="hidden" id="coltext" value="#FFFFFF" /><br>
                </div>
              </div>
              <div class="modal-footer fondo1">
                <button type="button" id="btnCrear" class="btn btn-primary">Crear Evento</button>
                <button type="button" id="btnActualizar" class="btn btn-success">Actualizar</button>
                <button type="button" id="btnCerrarModal" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
    </section>
</div>


<script>
    $(document).ready(function() {
        $.post('<?php echo base_url();?>Calendario/ListarEventos',
         function(data){
        $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listWeek'
        },
            weekNumbers: true,
            navLinks: true,
            businessHours: true,
            selectable:true,
            selectHelper:true,
            editable: true,
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
                $('#txtColor').val(event.color);
                
                FechaHora = event.start._i.split(" ");
                $('#txtFecha').val(FechaHora[0]);
                $('#txtHora').val(FechaHora[1]);

                $("#modalEvento").modal();
            },

            eventDrop: function(event, delta, revertFunc){
                var id = event.id;
                var fi = event.start.format();
                var ff = event.end.format();

                if (!confirm("¿Está seguro de actualizar el evento?")) {
                    revertFunc();
                }else{
                    $.post("<?php echo base_url();?>Calendario/ActualizarEvento",
                    {
                        id:id,
                        fecini:fi,
                        fecfin:ff
                    },
                    function(data){
                        if (data == 1) {
                            alertify.success('Se actualizó correctamente el Evento');
                        }else{
                            alert('ERROR.');
                        }
                    });
                }
            },

            eventRender: function(event, element) {
                var el = element.html();
                element.html("<div style='width:90%;float:left;'>" + el + "</div>" + 
                            "<div style='color:red;text-align:right;' class='eliminarE'>" +
                                "<i class='fa fa-trash'></i>" +
                            "</div>");

                element.find('.eliminarE').click(function(){
                    if (!confirm("¿Está seguro de eliminar el evento?")) {
                        return false;
                    }else{
                        var id = event.id;
                        $.post("<?php echo base_url();?>Calendario/eliminarEvento",
                        {
                            id:id
                        },
                        function(data){
                            alert(data);
                            if (data == 1) {
                                $('#calendar').fullCalendar( 'removeEvents', event.id);
                                alertify.success('Se elimino correctamente el Evento');
                            }else{
                                alert('ERROR.');
                            }
                        });  
                    }
                });
            },

            eventResize: function(event, delta, revertFunc) {
                var id = event.id;
                var fi = event.start.format();
                var ff = event.end.format();

                if (!confirm("Esta seguro de cambiar la fecha?")) {
                    revertFunc();
                }else{
                    $.post("<?php echo base_url();?>Calendario/ActualizarEvento",
                    {
                        id:id,
                        fecini:fi,
                        fecfin:ff
                    },
                    function(data){
                        if (data == 1) {
                            alertify.success('Se cambio correctamente');
                        }else{
                            alert('ERROR.');
                        }
                    });
                }
            }

           
        });
    });
});

</script>
<script type="text/javascript">
    $('#btnActualizar').click(function(){
        var tit = $('#txtTitulo').val();
        var des = $('#txtDescripcion').val();
        var lugar = $('#txtLugar').val();
        var col = $('#txtColor').val();
        var coltext = $('#coltext').val();
        var start = $('#txtFecha').val()+" "+$('#txtHora').val();
        var end = $('#txtFecha').val()+" "+$('#txtHora').val();
        var id = $('#txtId').val();

        $.post("<?php echo base_url();?>Calendario/ActualizarEventoCom",
        {
            tit: tit,
            des: des,
            lugar: lugar,
            col: col,
            coltext: coltext,
            start: start,
            end: end,
            id: id
        },
        function(data){
            if (data == 1) {
                $('#btnCerrarModal').click();
            }
        })
    })
</script>
<script type="text/javascript">
    $('#btnCrear').click(function(){
        var titulo = $('#txtTitulo').val();
        var descripcion = $('#txtDescripcion').val();
        var lugar = $('#txtLugar').val();
        var color = $('#txtColor').val();
        var coltext = $('#coltext').val();
        var start = $('#txtFecha').val()+" "+$('#txtHora').val();
        var end = $('#txtFecha1').val()+" "+$('#txtHora').val();
        var id = $('#txtId').val();

        $.post("<?php echo base_url();?>Calendario/Crear",
        {
            titulo: titulo,
            descripcion: descripcion,
            lugar: lugar,
            color: color,
            coltext: coltext,
            start: start,
            end: end,
            id: id
        },
        function(data){
            if (data == 1) {
                $('#btnCerrarModal').click();
            }
        })
    })
</script>
</body>
</html>

