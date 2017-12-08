<?php

include('connection.php');

if( isset( $_POST["add"] ) ) {
        
    // build a function that validates data
    function validateFormData( $formData ) {
        $formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
        return $formData;
    }

    // set all variables to empty by default
    $username = $email = $password = "";
    
    // check to see if inputs are empty
    // create variables with form data
    // wrap the data with our function
    
    if( !$_POST["username"] ) {
        $nameError = "Please enter a username <br>";
    } else {
        $username = validateFormData( $_POST["username"] );
    }

    if( !$_POST["email"] ) {
        $emailError = "Please enter your email <br>";
    } else {
        $email = validateFormData( $_POST["email"] );
    }

    if( !$_POST["password"] ) {
        $passwordError = "Please enter a password <br>";
    } else {
        $password = validateFormData( $_POST["password"] );
	$password = password_hash( $password, PASSWORD_DEFAULT );    

}
    
    // check to see if each variable has data
    if( $username && $email && $password ) {
        $query = "INSERT INTO users (id, username, password, email, signup_date, biography)
        VALUES (NULL, '$username', '$password', '$email', CURRENT_TIMESTAMP, NULL)";

        if( mysqli_query( $conn, $query ) ) {
            echo "<div class='alert alert-success'>New record in database!</div>";
        } else {
            echo "Error: ". $query . "<br>" . mysqli_error($conn);
        }
    }
    
}

/*
MYSQL INSERT QUERY

INSERT INTO users (id, username, password, email, signup_date, biography)
VALUES (NULL, 'jacksonsmith', 'abc123', 'jack@son.com', CURRENT_TIMESTAMP, 'Hello! I'm Jackson. This is my bio.');

*/

mysqli_close($conn);

?>

<!DOCTYPE html>

<html>

    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MySQL Insert</title>

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
            <h1>Usersignup</h1>

            <p class="text-danger">* Required fields</p>
            
            <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
                <small class="text-danger">* <?php echo $nameError; ?></small>
                <input type="text" placeholder="Username" name="username"><br><br>
                
                <small class="text-danger">* <?php echo $emailError; ?></small>
                <input type="text" placeholder="Email" name="email"><br><br>
                
                <small class="text-danger">* <?php echo $passwordError; ?></small>
                <input type="password" placeholder="Password" name="password"><br><br>
                
                <input type="submit" name="add" value="Add Entry">
   			
	         </form>

		<a href="../home.html" class="btn btn-default">Homepage</a>
	
        </div>
        
        <!-- jQuery -->
        <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
        
        <!-- Bootstrap JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>
