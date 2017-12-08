<?php


define('DB_HOST',"localhost");
define('DB_USER',"root");
define('DB_PASSWORD',"P@ssw0rd");
define('DB_NAME',"WILLANDSONS");


class playerStat{
        private $conn;

        private $Map;

        private $MatchID;


        function __construct()
    {
                $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if($this->conn->connect_error){
            die("Connection failed: " . $this ->conn->connect_error);
        }


       if(isset($_GET['Map']))
        {
                $this->Map = mysql_real_escape_string($_GET["Map"]);
        }

        if(isset($_GET['MatchID']))
        {
                $this->MatchID = mysql_real_escape_string($_GET["MatchID"]);
        }
        

    }

    function searchPlayerStat()
    {
        //echo("eventID =" + $this->eventID);
	
	$this->Map ='Nuke';

	$this->MatchID = '2311133';


        if(isset($_GET['Map']))
        {
                $this->Map = mysql_real_escape_string($_GET["Map"]);
        }

        if(isset($_GET['MatchID']))
        {
                $this->MatchID = mysql_real_escape_string($_GET["MatchID"]);
        }


	

	$query = "SELECT PlayerID, Kills, Deaths FROM `playerStats` WHERE Map LIKE "."'%".$this->Map."%'"." AND MatchID LIKE "."'%".$this->MatchID."%'";
        //echo($query);
        //$query = "SELECT PlayerID, Kills, Deaths FROM `playerStats`";
        $result = $this->conn->query($query);
        return $result;
    }



}

$stat = new playerStat();
$result = $stat->searchPlayerStat();

//while($row = $result->fetch_assoc()) {
 //       echo($row);  
 // }

$table = array();
$table['cols'] = array(
    //Labels for the chart, these represent the column titles
    array('id' => '', 'label' => 'PlayerID', 'type' => 'string'),
    array('id' => '', 'label' => 'Kill', 'type' => 'number')
    ); 

$rows = array();
foreach($result as $row){
    $temp = array();
    
    //Values
    $temp[] = array('v' => (string) $row['PlayerID']);
    $temp[] = array('v' => (float) $row['Kills']); 
    $rows[] = array('c' => $temp);
    }


$result->free();
 
$table['rows'] = $rows;
 
$jsonTable = json_encode($table, true);
echo $jsonTable;





?>
