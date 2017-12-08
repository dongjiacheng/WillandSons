<?php



if( isset( $_POST['login'] ) ) {
    
    // build a function to validate data
    function validateFormData( $formData ) {
        $formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
        return $formData;
    }
    
    // create variables
    // wrap the data with our function
    $formUser = validateFormData( $_POST['username'] );
    $formPass = validateFormData( $_POST['password'] );
    
    // connect to database
    include('connection.php');
    
    // create SQL query
    $query = "SELECT username, email, password FROM users WHERE username='$formUser'";
    
    // store the result
    $result = mysqli_query( $conn, $query );
    
    // verify if result is returned
    if( mysqli_num_rows($result) > 0 ) {
        
        // store basic user data in variables
        while( $row = mysqli_fetch_assoc($result) ) {
            $user       = $row['username'];
            $email      = $row['email'];
            $hashedPass = $row['password'];
        }
        
        // verify hashed password with the typed password
        if( password_verify( $formPass, $hashedPass ) ) {
            
            // correct login details!
            // start the session
            session_start();
            
            // store data in SESSION variables
            $_SESSION['loggedInUser'] = $user;
            $_SESSION['loggedInEmail'] = $email;
            
            header("Location: profile.php");
        
        } else { // hashed password didn't verify
            
            // error message
            $loginError = "<div class='alert alert-danger'>Wrong username / password combination. Try again.</div>";
            
        }
        
    } else { // there are no results in database
        
        $loginError = "<div class='alert alert-danger'>No such user in database. Please try again. <a class='close' data-dismiss='alert'>&times;</a></div>";
        
    }
    
    // close the mysql connection
    mysqli_close($conn);
    
}

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>CS:GO Data Digest</title>
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
							<span class="image avatar48"><img src="../images/csgo_logo.jpg" alt="" /></span>
							<h1 id="title">CS:GO Data Digest</h1>
							<p>by Will &amp; His Sons</p>
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="../home.html" id="top-link" class="skel-layers-ignoreHref"><span class="icon fa-home">Home Page</span></a></li>
								<li><a href="../data.html" id="about-link" class="skel-layers-ignoreHref"><span class="icon fa-search">Data Search</span></a></li>
								<li><a href="../login/login.php" id="contact-link" class="skel-layers-ignoreHref"><span class="icon fa-user">Join / Login</span></a></li>
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

							<header>
								<h2 class="alt"><strong>Login</strong></h2>
								<p>User Login</p>
							</header>
<!--
							<form>
									<input type="text" placeholder="Enter player name..." required>
									<input type="button" id='searchButton' value="Search">
							</form>

-->
								<!---->

	

							            <h1>Login</h1>
            <p class="lead">Use this form to log in to your account</p>
            
            <?php echo $loginError; ?>
            
            <form class="form-inline" action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
                
                <div class="form-group">
                    <label for="login-username" class="sr-only">Username</label>
                    <input type="text" class="form-control" id="login-username" placeholder="username" name="username">
                </div>
                <div class="form-group">
                    <label for="login-password" class="sr-only">Password</label>
                    <input type="password" class="form-control" id="login-password" placeholder="password" name="password">
                </div>
                <button type="submit" class="btn btn-default" name="login">Login!</button>
                 <p><a href="logout.php" class="btn btn-danger btn-sm">Log out</a></p>
                  <p><a href="insert.php" class="btn btn-danger btn-sm">signup</a></p>
            </form>
								
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
