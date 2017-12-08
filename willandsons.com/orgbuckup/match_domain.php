<?php


define('DB_HOST',"localhost");
define('DB_USER',"root");
define('DB_PASSWORD',"P@ssw0rd");
define('DB_NAME',"WILLANDSONS");


class match{
	private $conn;

	private $eventID;

	private $matchesID;


	function __construct()
    {
		$this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if($this->conn->connect_error){
            die("Connection failed: " . $this ->conn->connect_error);
        }


       if(isset($_GET['eventID']))
        {
        	$this->eventID = $_GET['eventID'];
        }

        if(isset($_GET['matchesID']))
        {
        	$this->CouponName = $_GET['matchesID'];
        }

    }

    function searchMatch()
    {
	//echo("eventID =" + $this->eventID);
    	$query = "SELECT matchesID FROM MATCHES where eventID = " .$this->eventID;
	//echo($query);
    	$result = $this->conn->query($query);
    	if($result->num_rows > 0){
    		while ($row = $result->fetch_assoc()) {
        		echo($row['matchesID']);
        	}

    	}
    	else{
    	    echo("0 result");
    	}
    }
}
?>
