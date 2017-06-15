<?php $title = 'Calendrier'?>
    <div class="row">
        <div class="col-md-3">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h4 class="box-title">Légende</h4>
                </div>
                <div class="box-body" id="trash">
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

        var zone = "05:30";  //Change this to your timezone
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


        var currentMousePos = {
            x: -1,
            y: -1
        };
        jQuery(document).on("mousemove", function (event) {
            currentMousePos.x = event.pageX;
            currentMousePos.y = event.pageY;
        });

        /* initialize the calendar
         -----------------------------------------------------------------*/

        $('#calendar').fullCalendar({
            events: JSON.parse(json_events),
            //events: [{"id":"14","title":"New Event","start":"2015-01-24T16:00:00+04:00","allDay":false}],
            utc: true,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable: true,
            droppable: true,
            slotDuration: '00:30:00',
            eventReceive: function(event){
                var title = event.title;
                var start = event.start.format("YYYY-MM-DD[T]HH:mm:SS");
                $.ajax({
                    url: 'Models/calendar.php',
                    data: 'type=new&title='+title+'&startdate='+start+'&zone='+zone,
                    type: 'POST',
                    dataType: 'json',
                    success: function(response){
                        event.id = response.eventid;
                        $('#calendar').fullCalendar('updateEvent',event);
                    },
                    error: function(e){
                        console.log(e.responseText);

                    }
                });
                $('#calendar').fullCalendar('updateEvent',event);
                console.log(event);
            },
            eventDrop: function(event, delta, revertFunc) {
                var title = event.title;
                var start = event.start.format();
                var end = (event.end == null) ? start : event.end.format();
                $.ajax({
                    url: 'Models/calendar.php',
                    data: 'type=resetdate&title='+title+'&start='+start+'&end='+end+'&eventid='+event.id,
                    type: 'POST',
                    dataType: 'json',
                    success: function(response){
                        if(response.status != 'success')
                            revertFunc();
                    },
                    error: function(e){
                        revertFunc();
                        alert('Error processing your request: '+e.responseText);
                    }
                });
            },
            eventClick: function(event, jsEvent, view) {
                console.log(event.id);
                var title = prompt('Event Title:', event.title, { buttons: { Ok: true, Cancel: false} });
                if (title){
                    event.title = title;
                    console.log('type=changetitle&title='+title+'&eventid='+event.id);
                    $.ajax({
                        url: 'Models/calendar.php',
                        data: 'type=changetitle&title='+title+'&eventid='+event.id,
                        type: 'POST',
                        dataType: 'json',
                        success: function(response){
                            if(response.status == 'success')
                                $('#calendar').fullCalendar('updateEvent',event);
                        },
                        error: function(e){
                            alert('Error processing your request: '+e.responseText);
                        }
                    });
                }
            },
            eventResize: function(event, delta, revertFunc) {
                console.log(event);
                var title = event.title;
                var end = event.end.format();
                var start = event.start.format();
                $.ajax({
                    url: 'Models/calendar.php',
                    data: 'type=resetdate&title='+title+'&start='+start+'&end='+end+'&eventid='+event.id,
                    type: 'POST',
                    dataType: 'json',
                    success: function(response){
                        if(response.status != 'success')
                            revertFunc();
                    },
                    error: function(e){
                        revertFunc();
                        alert('Error processing your request: '+e.responseText);
                    }
                });
            },
            eventDragStop: function (event, jsEvent, ui, view) {
                if (isElemOverDiv()) {
                    var con = confirm('Are you sure to delete this event permanently?');
                    if(con == true) {
                        $.ajax({
                            url: 'Models/calendar.php',
                            data: 'type=remove&eventid='+event.id,
                            type: 'POST',
                            dataType: 'json',
                            success: function(response){
                                console.log(response);
                                if(response.status == 'success'){
                                    $('#calendar').fullCalendar('removeEvents');
                                    getFreshEvents();
                                }
                            },
                            error: function(e){
                                alert('Error processing your request: '+e.responseText);
                            }
                        });
                    }
                }
            },
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

        function getFreshEvents(){
            $.ajax({
                url: 'Models/calendar.php',
                type: 'POST', // Send post data
                data: 'type=fetch',
                async: false,
                success: function(s){
                    freshevents = s;
                }
            });
            $('#calendar').fullCalendar('addEventSource', JSON.parse(freshevents));
        }


        function isElemOverDiv() {
            var trashEl = jQuery('#trash');

            var ofs = trashEl.offset();

            var x1 = ofs.left;
            var x2 = ofs.left + trashEl.outerWidth(true);
            var y1 = ofs.top;
            var y2 = ofs.top + trashEl.outerHeight(true);

            if (currentMousePos.x >= x1 && currentMousePos.x <= x2 &&
                currentMousePos.y >= y1 && currentMousePos.y <= y2) {
                return true;
            }
            return false;
        }

    });

</script>
