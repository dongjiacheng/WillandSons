<?php

$uname = $_REQUEST['uname'];
$msg = $_REQUEST['msg'];



$conn = new mysqli('localhost','root','P@ssw0rd','chatroom');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "INSERT INTO logs (username, msg) VALUES (?,?)";

$stmt = $conn->prepare($query);
$stmt->bind_param("ss",$uname,$msg);
$stmt->execute();


$result1 = $conn->query("SELECT * FROM logs ORDER by id DESC");
while($extract = $result1->fetch_assoc()){
    echo $extract['username'] . ": " . $extract['msg'] . "<br>";
}
?>
