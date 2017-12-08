<?php
include("player_domain.php");

$player= new player();

if($_GET['Mode'] == '0'){
    $player->searchPlayer();
}
else if($_GET['Mode'] == '1'){
    $player->insertPlayer();
}
else if($_GET['Mode'] == '2'){
	$player->deletePlayer();
}
else if($_GET['Mode'] == '3'){
    $player->updatePlayer();
}




?>
             
