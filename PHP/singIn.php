<!DOCTYPE HTML>
<!--
	Hyperspace by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<?php
include_once 'C:\wamp\www\includes\database.php';
session_start();


if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location:  home.php");
    exit;
}


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['Email'];
    $password = $_POST['PassW'];
    // Validate credentials

    $sql = "SELECT ID, Email, Password FROM user WHERE Email = ?";

        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $ID, $Email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if($password == $hashed_password){
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $ID;
                            $_SESSION["username"] = $Email;

                            // Redirect user to welcome page
                            header("location: home.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                $login_err = "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }


    // Close connection
    mysqli_close($conn);
}
?>
<head>
    <title>Sing In</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="../assets/css/main.css" />
    <noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>
</head>
<body class="is-preload">

<!-- Header -->
<header id="header">
    <a href="home.php" class="title">Apollo theaters</a>
    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="singIn.php" class="active">Sing In</a></li>
            <li><a href="singUp.php">Sing Up</a></li>
        </ul>
    </nav>
</header>

<!-- Wrapper -->
<div id="wrapper">

    <!-- Main -->
    <section id="main" class="wrapper">
        <div class="inner">
            <h1 class="major">Sing In</h1>
            <?php
            if (isset($login_err))
            {
                echo $login_err;
            }
            ?>
            <form action="" method = "post">
                <label for="Email">Email:</label>
                <input type=email id="Email" name="Email" required><br>
                <label for="PassW">Password:</label>
                <input type=password id="PassW" name="PassW" required><br>
                <input type="submit" value="Sing In">
            </form>
            <br>
            <h3>Don't have an account?</h3>
            <ul class="actions">
                <li><a href="singUp.php" class="button scrolly">Creat one here</a></li>
            </ul>
        </div>
    </section>
</div>

<!-- Footer -->
<footer id="footer" class="wrapper alt">
    <div class="inner">
        <ul class="menu">
            <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
        </ul>
    </div>
</footer>

<!-- Scripts -->
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/jquery.scrollex.min.js"></script>
<script src="../assets/js/jquery.scrolly.min.js"></script>
<script src="../assets/js/browser.min.js"></script>
<script src="../assets/js/breakpoints.min.js"></script>
<script src="../assets/js/util.js"></script>
<script src="../assets/js/main.js"></script>

</body>
</html>