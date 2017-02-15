<?php
/**
 * This example demonstrates how the Ics-Parser should be used.
 *
 * PHP Version 5
 *
 * @category Example
 * @package  Ics-parser
 * @author   Martin Thoma <info@martin-thoma.de>
 * @license  http://www.opensource.org/licenses/mit-license.php  MIT License
 * @version  SVN: <svn_id>
 * @link     http://code.google.com/p/ics-parser/
 * @example  $ical = new ical('MyCal.ics');
 *           print_r( $ical->get_event_array() );
 */
require 'class.iCalReader.php';

$ical   = new ICal('MyCal.ics');
$events = $ical->events();

$date_eng = strtotime(date('2017-02-06 16:00'));



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

    //echo  strftime("%Y %m %d %H",);
    //echo "<br />";
    //echo "SUMMARY: ".$event['SUMMARY']."<br/>";
    /*echo "DTSTART: ".$start."<br/>";
    echo "DTEND: ".$end."<br/>";
    echo "DESCRIPTION: ".$event['DESCRIPTION']."<br/>";
    echo "<hr/>";
    */

}

echo $occupe;


?>
