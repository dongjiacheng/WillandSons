
<?php

#define('DB_HOST',"localhost");
#define('DB_USER',"xiaowei2");
#define('DB_PASSWORD',"");
#define('DB_NAME',"c9");

define('DB_HOST',"localhost");
define('DB_USER',"root");
define('DB_PASSWORD',"P@ssw0rd");
define('DB_NAME',"WILLANDSONS");

class event{
        private $conn;

        private $Name;

        private $Location;

        private $Date;

        private $ID;


        function __construct()
    {
                $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if($this->conn->connect_error){
            die("Connection failed: " . $this ->conn->connect_error);
        }


       if(isset($_GET['Name']))
        {
                $this->Name = $_GET['Name'];
        }

        if(isset($_GET['Location']))
        {
                $this->Location = $_GET['Location'];
        }
        if(isset($_GET['ID']))
        {
                $this->ID = $_GET['ID'];
        }
        if(isset($_GET['Date']))
        {
                $this->Date = $_GET['Date'];
        }

    }

    function searchEventbyName()
    {
        //echo("eventID =" + $this->eventID);
        $query = "SELECT * FROM MatchEvent where Name = "."'".$this->Name."'";
        //echo($query);
        $result = $this->conn->query($query);
        if($result->num_rows > 0){
          #      while ($row = $result->fetch_assoc()) {
           #             echo($row['Name']);
	#	echo(' ');
         #               echo($row['eventID']);
        #	echo(' ');        
	 #       echo($row['location']);
                
	#	echo(' ');
	#	        echo($row['Date']);
                       
	#		echo(' ');
	# echo($row['MatchID']);
	#		echo('\n');
         #       }

	 echo "<table><tr><th>Name</th><th>eventID</th><th>location</th><th>Date</th><th>MatchID</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Name"]. "</td><td>" . $row["eventID"]. "</td><td>" . $row["location"]. "</td><td>" . $row["Date"]. "</td><td>" . $row["MatchID"]. "</td></tr>";
    }
    echo "</table>";

        }
        else{
            echo("0 result");
        }
    }

    function searchEventbyDate()
    {
        //echo("eventID =" + $this->eventID);
        $query = "SELECT * FROM MatchEvent where Date = "."'".$this->Date."'";
        //echo($query);
        $result = $this->conn->query($query);
        if($result->num_rows > 0){
    
 #           while ($row = $result->fetch_assoc()) {
#                        echo($row['Name']);
  #                      echo($row['eventID']);
   #                     echo($row['location']);
    #                    echo($row['Date']);
     #                   echo($row['MatchID']);
      #          }

        echo "<table><tr><th>Name</th><th>eventID</th><th>location</th><th>Date</th><th>MatchID</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Name"]. "</td><td>" . $row["eventID"]. "</td><td>" . $row["location"]. "</td><td>" . $row["Date"]. "</td><td>" . $row["MatchID"]. "</td></tr>";
    }
    echo "</table>";




	 }
        else{
            echo("0 result");
        }
    }

     function searchEventbyLocation()
    {
        //echo("eventID =" + $this->eventID);
        $query = "SELECT * FROM MatchEvent where Location = "."'".$this->Location."'";
        //echo($query);
        $result = $this->conn->query($query);
        if($result->num_rows > 0){
      #          while ($row = $result->fetch_assoc()) {
                       # echo($row['Name']);
                       # echo($row['eventID']);
                       # echo($row['location']);
                       # echo($row['Date']);
                       # echo($row['MatchID']);

#		                        echo($row['Name']);
 #               echo(' ');
  #                      echo($row['eventID']);
   #             echo(' ');       
    #            echo($row['location']);
     #                   
      #          echo(' ');
       #                 echo($row['Date']);
        #                
         #               echo(' ');
       #  echo($row['MatchID']);
        #                echo('\n');
         #       }



	 echo "<table><tr><th>Name</th><th>eventID</th><th>location</th><th>Date</th><th>MatchID</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Name"]. "</td><td>" . $row["eventID"]. "</td><td>" . $row["location"]. "</td><td>" . $row["Date"]. "</td><td>" . $row["MatchID"]. "</td></tr>";
    }
    echo "</table>";

        }
        else{
            echo("0 result");
        }
    }


    function searchEventbyID()
    {
        //echo("eventID =" + $this->eventID);
        $query = "SELECT * FROM MatchEvent where ID = "."'".$this->ID."'";
        //echo($query);
        $result = $this->conn->query($query);
        if($result->num_rows > 0){
              #  while ($row = $result->fetch_assoc()) {
               #         echo($row['Name']);
                #        echo($row['eventID']);
                 #       echo($row['location']);
                  #      echo($row['Date']);
                   #     echo($row['MatchID']);
              #  }

	 echo "<table><tr><th>Name</th><th>eventID</th><th>location</th><th>Date</th><th>MatchID</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Name"]. "</td><td>" . $row["eventID"]. "</td><td>" . $row["location"]. "</td><td>" . $row["Date"]. "</td><td>" . $row["MatchID"]. "</td></tr>";
    }
    echo "</table>";


        }
        else{
            echo("0 result");
        }
    }


    function insertEvent()
    {
        $query = "INSERT INTO eventID (Name,Location,Date)VALUES(?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sss",$this->Name,
                                $this->Location,
                                $this->Date);

         if(!$stmt->execute()){
            echo "fail to store the data, please inspect your input!";
            $stmt->close();
            return 0;
        }
        //echo "Success!";
     $stmt->close();
    // echo "the id is ".strval($this->conn->insert_id);
     
     return $this->conn->insert_id;

    }


    function deleteEventbyID(){

        $query = "DELETE FROM eventID WHERE ID = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i",$this->ID);
        if(!$stmt->execute()){
            echo "fail to delete the data, please inspect your input!";
            $stmt->close();
            return 0;
        }
    echo "Deletion Success!";
    $stmt->close();
    }



    function updateEvent(){
        
        $query = "UPDATE eventID SET Name=" ."'".$this->Name."'".","." Date="."'".$this->Date.","." Location="."'".$this->Location."'"." WHERE ID = "."'".$this->ID."'";
        
        if($this->conn->query($query) == TRUE){
            echo "Update Success!";
        }
        else{
            echo "Update Fail!";
        }
        
        
    }






}
?>

