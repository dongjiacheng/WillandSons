<?php


define('DB_HOST',"localhost");
define('DB_USER',"root");
define('DB_PASSWORD',"P@ssw0rd");
define('DB_NAME',"WILLANDSONS");


class player{
        private $conn;

        private $Country;

        private $Name;

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

        if(isset($_GET['Country']))
        {
                $this->Country = $_GET['Country'];
        }
        if(isset($_GET['ID']))
        {
                $this->ID = $_GET['ID'];
        }

    }

    function searchPlayer()
    {
        //echo("eventID =" + $this->eventID);
        $query = "SELECT * FROM Player where Name = "."'".$this->Name."'";
    //    echo($query);
    //	echo($this->Name);
	    $result = $this->conn->query($query);
        if($result->num_rows > 0){
#                while ($row = $result->fetch_assoc()) {
        #                echo($row['Name']);
        #                echo($row['ID']);
        #                echo($row['Country']);
        
 #			echo($row['Name']);
  #                      echo(" ");
   #                     echo($row['ID']);
    #                    echo(" ");
     #                   echo($row['Country']);
      #                  echo("\n");
                    
#	echo "<table><tr><th>ID</th><th>Name</th></tr>";
    // output data of each row
    
 #       echo "<tr><td>" . $row["id"]. "</td><td>" . $row["firstname"]. " " . $row["lastname"]. "</td></tr>";
    
    #echo "</table>";



       # }


#	echo "</table>";

 echo "<table><tr><th>Country</th><th>Name</th><th>ID</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Country"]. "</td><td>" . $row["Name"]. "</td><td>" . $row["ID"]. "</td></tr>";
    }
    echo "</table>";




        }
        else{
            echo("0 result");
        }
    }


    function insertPlayer()
    {
        $query = "INSERT INTO Player (Name,Country)VALUES(?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss",$this->Name,
                                $this->Country);

//	echo($this->Name);
//	echo($this->Country);

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


    function deletePlayer(){

        $query = "DELETE FROM Player WHERE Name = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s",$this->Name);
        if(!$stmt->execute()){
            echo "fail to delete the data, please inspect your input!";
            $stmt->close();
            return 0;
        }
    echo "Deletion Success!";
    $stmt->close();
    }

function updatePlayer(){
        
        $query = "UPDATE Player SET Name=" ."'".$this->Name."'".","." Country="."'".$this->Country."'"." WHERE ID = "."'".$this->ID."'";
        
        if($this->conn->query($query) == TRUE){
            echo "Update Success!";
        }
        else{
            echo "Update Fail!";
        }
        
        
    }


}
?>
