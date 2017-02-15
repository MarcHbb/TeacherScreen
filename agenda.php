<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='css/fullcalendar.css' rel='stylesheet' />
<link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='js/moment.min.js'></script>
<script src='js/jquery.min.js'></script>
<script src='js/fullcalendar.min.js'></script>
<script>

<?php 
require 'class.iCalReader.php';

$ical   = new ICal('MyCal.ics');
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
				    $a = '2017-02-14T10:00:00';
				    $b = '2017-02-14T13:00:00';

				}
			?>
				events: [
				{
					title: 'La',
					start: '<?php echo $a; ?>',
					end: '<?php echo $b; ?>'
				}
			]
				
			

		});
		
	});



</script>
<style>

	body {
		margin: 40px 10px;
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

	<div id='calendar'></div>

</body>
</html>
