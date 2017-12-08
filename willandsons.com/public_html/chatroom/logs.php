<?php
$conn = new mysqli('localhost','root','P@ssw0rd','chatroom');



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result1 = $conn->query("SELECT * FROM logs ORDER by id DESC");
while($extract = $result1->fetch_assoc()){
    echo $extract['username'] . ": " . $extract['msg'] . "<br>";
}
?>
