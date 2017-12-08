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

	echo('form');
       if(isset($_GET['Map']))
        {
		echo('set');
                $this->Map = $_GET['Map'];
        	echo('Map');
	}

        if(isset($_GET['MatchID']))
        {
                $this->MatchID = $_GET['MatchID'];
        }
        

    }

    function searchPlayerStat()
    {
        //echo("eventID =" + $this->eventID);
        $query = "SELECT PlayerID, Kills, Deaths FROM `playerStats` WHERE Map LIKE "."'%".$this->Map."%'"." AND MatchID LIKE "."'%".$this->MatchID."%'";
        echo($query);
//        $query = "SELECT PlayerID, Kills, Deaths FROM `playerStats` WHERE MatchID LIKE '%2311133%' and Map LIKE '%Nuke%'";



        $result = $this->conn->query($query);



	if($result->num_rows > 0){
	echo('bigger 0');
	}

	else{
	echo('smaller');
}

        return $result;
    }



}

$stat = new playerStat();
$stat->searchPlayerStat();

?>

