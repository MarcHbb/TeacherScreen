<?php 
	include("fonctions.inc.php");
	$prof = $_GET['prof'];
	$ical   = new ICal($prof.'.ics');
	$inter = $liste_intervenants[$prof];
?>

<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='css/fullcalendar.css' rel='stylesheet' />
<link href='css/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='js/moment.min.js'></script>
<script src='js/jquery.min.js'></script>
<script src='js/fullcalendar.min.js'></script>

<script>
<?php

$events = $ical->events();
?>
$(document).ready(function() {

		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay,listWeek'
			},
			defaultView:'agendaWeek',
			navLinks: true, // can click day/week names to navigate views
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			slotLabelFormat:'H:mm',
			allDaySlot:false,
			minTime:'07:00:00',
			maxTime:'21:00:00',
			eventStartEditable:false,
			eventDurationEditable:false,
			lang:'fr',



				events: [
                    <?php
                        foreach ($events as $event) {
                            $startyear = substr($event['DTSTART'],0,4);
                            $startmonth = substr($event['DTSTART'],4,2);
                            $startday = substr($event['DTSTART'],6,2);
                            $starthour = substr($event['DTSTART'],9,2);
                            $startmin = substr($event['DTSTART'],11,2);
                            $start = $startyear.'-'.$startmonth.'-'.$startday. 'T'.$starthour.':'.$startmin.':00';

                            $endyear = substr($event['DTEND'],0,4);
                            $endmonth = substr($event['DTEND'],4,2);
                            $endday = substr($event['DTEND'],6,2);
                            $endhour = substr($event['DTEND'],9,2);
                            $endmin = substr($event['DTEND'],11,2);
                            $end = $endyear.'-'.$endmonth.'-'.$endday. 'T'.$endhour.':'.$endmin.':00';


                            echo "{";
														echo "title:\"".$event['TITLE']."\",\n";
														echo "start:\"".$start."\",\n";
                            echo "start:\"".$start."\",\n";
                            echo "end:\"".$end."\"\n";
                            echo "},\n";
													}
						?>
			],
		 timeFormat: 'H:mm'


		});

	});
</script>
<style>
	body {
		margin: 20px 10px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;

	}
	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}
</style>
</head>
<body>
	<h1>Agenda de <?php echo $inter['nom']?></h1>
	<div id='calendar'></div>
</body>
</html>
