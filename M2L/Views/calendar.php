<?php $title = 'Calendrier'?>
    <div class="row">
        <div class="col-md-3">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h4 class="box-title">Légende</h4>
                </div>
                <div class="box-body">
                    <ul>
                        <li><span class="text-blue"><i class="fa fa-square"></i></span> Formation Disponible</li>
                        <li><span class="text-green"><i class="fa fa-square"></i></span> Formation Validé</li>
                        <li><span class="text-orange"><i class="fa fa-square"></i></span> Formation En attente</li>
                        <li><span class="text-red"><i class="fa fa-square"></i></span> Formation Refusé</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-body no-padding">
                    <!-- THE CALENDAR -->
                    <div id="calendar"></div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /. box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

<!-- jQuery -->
<script src="<?= BASE_URL; ?>/Views/plugins/jQuery/jquery-3.2.0.js"></script>

<script>

    $(document).ready(function() {

        var id_s = <?= $_SESSION['auth']['id_s'] ?>

        $.ajax({
            url: 'Models/calendar.php',
            type: 'POST', // Send post data
            data: 'type=fetchchef&id_s='+id_s,
            async: false,
            success: function(s){
                json_events = s;
            }
        });

        /* initialize the calendar
         -----------------------------------------------------------------*/

        $('#calendar').fullCalendar({
            events: JSON.parse(json_events),

            locale: 'fr',
            utc: true,
            header: {
                left: 'prev,next,today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            slotDuration: '00:30:00',

            eventRender: function(event, element)
            {
                if (event.etat == "Validé")
                {
                    element.css('background-color', 'green');
                    element.css('borderColor', 'green');
                }
                else if (event.etat == "En attente")
                {
                    element.css('background-color', 'orange');
                    element.css('borderColor', 'orange');
                }
                else if (event.etat == "Refusé")
                {
                    element.css('background-color', 'red');
                    element.css('borderColor', 'red');
                }
            }
        });
    });

</script>
