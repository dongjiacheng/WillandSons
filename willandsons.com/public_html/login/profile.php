<?php
    session_start();
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>CS:GO Data</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />

	</head>
	<body>

		<!-- HEADER -->
			<div id="header">

				<div class="top">

					<!-- LOGO -->
						<div id="logo">
							<span class="image avatar48"><img src="images/csgo_logo.jpg" alt="" /></span>
							<h1 id="title">CS:GO Data</h1>
							<p>by Will &amp; His Sons</p>
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="../home.html" id="top-link" class="skel-layers-ignoreHref"><span class="icon fa-home">Home Page</span></a></li>
								<li><a href="../data.html" id="about-link" class="skel-layers-ignoreHref"><span class="icon fa-search">Data Search</span></a></li>
								<li><a href="../login.html" id="contact-link" class="skel-layers-ignoreHref"><span class="icon fa-user">Login</span></a></li>
							</ul>
						</nav>

				</div>

				<div class="bottom">

					<!-- Social Icons -->
						<ul class="icons">
							<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
						</ul>

				</div>

			</div>


        <!-- Main -->
            <div id="main">

                <!-- Intro -->
                    <section id="top" class="one dark cover">
                        <div class="container">

                           <title>Profile Page</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body>
        <div class="container">
            <h1>Profile Page</h1>
            <p class="lead">Welcome <?php echo $_SESSION['loggedInUser']; ?>!</p>
            
            <p>Your email address is: <?php echo $_SESSION['loggedInEmail']; ?></p>
            
            <p><a href="logout.php" class="btn btn-danger btn-sm">Log out</a></p>
        </div>
        
       
    </body>
                                
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
            <script src="../assets/js/jquery.min.js"></script>
            <script src="../assets/js/jquery.scrolly.min.js"></script>
            <script src="../assets/js/jquery.scrollzer.min.js"></script>
            <script src="../assets/js/skel.min.js"></script>
            <script src="../assets/js/util.js"></script>
            <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
            <script src="../assets/js/main.js"></script>
               <!-- jQuery -->
        <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
        
        <!-- Bootstrap JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>
