<?php
include("event_domain.php");

$event= new event();

if($_GET['Mode'] == '0'){
    #echo("seraching");
    $event->searchEventbyName();
}
else if($_GET['Mode'] == '1'){
    $event->searchEventbyDate();
}
else if($_GET['Mode'] == '2'){
	$event->searchEventbyLocation();
}
else if($_GET['Mode'] == '3'){
	$event->searchEventbyID();
}
else if($_GET['Mode'] == '4'){
	$event->insertEvent();
}
else if($_GET['Mode'] == '5'){
	$event->deleteEventbyID();
}
else if($_GET['Mode'] == '6'){
	$event->updateEvent();
}



?>
             
