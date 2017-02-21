<?php

require 'class.iCalReader.php';

$ical   = new ICal('MarcCal.ics');
$events = $ical->events();

$date_eng = date('Y-m-d H:i');


$occupe = "non";
foreach ($events as $event) {

    $startyear = substr($event['DTSTART'],0,4);
    $startmonth = substr($event['DTSTART'],4,2);
    $startday = substr($event['DTSTART'],6,2);
    $starthour = substr($event['DTSTART'],9,2);
    $startmin = substr($event['DTSTART'],11,2);

    $start = $startday.'-'.$startmonth.'-'.$startyear. ' '.$starthour.':'.$startmin;

    $endyear = substr($event['DTEND'],0,4);
    $endmonth = substr($event['DTEND'],4,2);
    $endday = substr($event['DTEND'],6,2);
    $endhour = substr($event['DTEND'],9,2);
    $endmin = substr($event['DTEND'],11,2);

    $end = $endday.'-'.$endmonth.'-'.$endyear. ' '.$endhour.':'.$endmin;

    $start_int = strtotime($startyear.'-'.$startmonth.'-'.$startday. ' '.$starthour.':'.$startmin);

    $end_int = strtotime($endyear.'-'.$endmonth.'-'.$endday. ' '.$endhour.':'.$startmin);




    if ($date_eng>=$start_int && $date_eng<=$end_int) {
        $occupe = "oui";
    }


}

echo $occupe;
?>