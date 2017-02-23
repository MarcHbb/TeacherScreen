<?php
	require 'class.iCalReader.php';
	ini_set('error_reporting',E_ALL); ini_set('display_errors','ON');
	
		$liste_intervenants = array(
			'Professeur1' => array(
				'id' => 'Professeur1',
				'nom' => 'Professeur1',
			),
			'MarcCal' => array(
				'id' => 'MarcCal',
				'nom' => 'M. HABIB',
				'ical_key' => '97cda1cbb8fedd04956b6cc2e4acb5dc',
			),
			'Professeur3' => array(
				'id' => 'Professeur3',
				'nom' => 'Professeur3',
				'ical_key' => 'dfaf14b0668bec296d78b934497d25b8',
			),
			'Professeur4' => array(
				'id' => 'Professeur4',
				'nom' => 'Professeur4'
			),
		);
	
	function etat_occupation_intervenant($intervenant) {
		$retour = 'Non';
		$nom_fichier = $intervenant['id'].'.ics';
		
		if (!file_exists($nom_fichier)) {
			$url_cal = 'https://www.leonard-de-vinci.net/ical_student/'.$intervenant['ical_key'];
			
			$ical = file_get_contents($url_cal);
			$fp = fopen($nom_fichier,"w");
			fwrite($fp,$ical);
			fclose($fp);
			/*
			// SI passage en bdd on parcours l'ICS à la reception et on insert en bdd
			
			$ical   = new ICal($nom_fichier);
			$events = $ical->events();
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
			
				$req  ="insert into ...";
			}
			*/
		} 
		
		
		if (!file_exists($nom_fichier)) {
			$retour = "Erreur pas d'ICS";
		} else {
			$ical   = new ICal($nom_fichier);
			$events = $ical->events();
			
			$date_eng = strtotime(date('Y-m-d H:i'));
			//$date_eng = strtotime('2017-02-22 16:16');
			
			// // SI passage en bdd on ne parcours pas l'ics mais uon requete la BDD
			//$req = "select * from aaaa where '2017-02-22 16:16' between start_int  AND end_int  ;";
			
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
					$retour = 'Oui';
					break;
				}
			}
		}
		return $retour;
	}

?>