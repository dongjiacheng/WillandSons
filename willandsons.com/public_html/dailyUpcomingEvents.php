<?php

define('DB_HOST',"localhost");
define('DB_USER',"root");
define('DB_PASSWORD',"P@ssw0rd");
define('DB_NAME',"WILLANDSONS");


class upcomingEvents{
        private $conn;

        function __construct(){
            $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            if($this->conn->connect_error){
                die("Connection failed: " . $this ->conn->connect_error);
            }
        }

        function displayEvents(){
            $query = "SELECT * FROM dailyUpcomingEvents";
            $result = $this->conn->query($query);
            if($result->num_rows > 0){
                echo "<h3 style='margin-left:315px;'>Upcoming Events</h3>";
		
		echo "<table style='margin-left:315px'>";
                $versus = "vs."; 
		while($row = $result->fetch_assoc()) {
                 
		   echo "<tr><td width='3%'>".$row["startTime"]."</td><td width='5%'>" .$row["teamOne"] ."</td><td width='3%'>" .$versus ."</td><td width='10%'>" . $row["teamTwo"]. "</td><td width='24%'>" . $row["eventName"]. "</td></tr>";
               
		 }
                echo "</table>";
            }
            else{
                echo"<h2>No Upcoming Events.</h2>";
            }
        }
}

$event = new upcomingEvents();
$event->displayEvents();

?>


<!DOCTYPE HTML>

<html>
	<head>
		<title>CS:GO Data Digest</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />

	</head>
	<body>

		<!-- HEADER -->
			<div id="header">

				<div class="top">

					<!-- LOGO -->
						<div id="logo">
							<span class="image avatar48"><img src="images/csgo_logo.jpg" alt="" /></span>
							<h1 id="title">CS:GO Data Digest</h1>
							<p>by Will &amp; His Sons</p>
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="home.html" id="top-link" class="skel-layers-ignoreHref"><span class="icon fa-home">Home Page</span></a></li>
								<li><a href="data.html" id="about-link" class="skel-layers-ignoreHref"><span class="icon fa-search">Data Search</span></a></li>
								<li><a href="login/login.php" id="contact-link" class="skel-layers-ignoreHref"><span class="icon fa-user">Join / Login</span></a></li>
							</ul>
						</nav>

				</div>

				<div class="bottom">

					<!-- Social Icons -->
						<ul class="icons">
							<li><a href="https://www.facebook.com/CounterStrike" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="https://twitter.com/csgo_dev" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="https://www.twitch.tv/directory/game/csgo" class="icon fa-twitch"><span class="label">Twitch</span></a></li>
						</ul>

				</div>

			</div>

		<!-- Main -->
			<div id="main">

				<!-- Intro -->
				

			</div>

		<!-- Footer -->
			<div id="footer">
					 <p><a href="chatroom/chatroom.php" class="btn btn-danger btn-sm">ChatRoom</a></p>		
		
				<!-- Copyright -->
					<ul class="copyright">
						<li>&copy; Will &amp; His Sons, Inc.</li>
					</ul>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollzer.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
