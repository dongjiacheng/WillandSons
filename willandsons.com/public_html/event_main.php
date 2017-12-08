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
					<section id="top" class="one dark cover">
						<div class="container">

<!--
							<form>
									<input type="text" placeholder="Enter player name..." required>
									<input type="button" id='searchButton' value="Search">
							</form>

-->
								<!---->

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



	<footer>
	<!--	<a href="player_search.html" target="_blank" class="button scrolly">Player Search</a>
-->


	<li><a href="player_search.html" id="about-link" class="skel-layers-ignoreHref"><span class="icon fa-search">Player Search</span></a></li>
	<li><a href="event_search.html" id="about-link" class="skel-layers-ignoreHref"><span class="icon fa-search">Event Search</span></a></li>
	</footer>



								
								<!---->

						</div>
					</section>

			</div>

		<!-- Footer -->
			<div id="footer">

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
