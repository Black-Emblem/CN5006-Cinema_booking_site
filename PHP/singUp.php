<?php
include_once 'C:\wamp\www\includes\database.php';
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("Location: home.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_POST["Email"])){
        if ($_POST["Email"] != ""){
            $sql = "SELECT ID FROM user where Email = '{$_POST["Email"]}'";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);
            if ($rowCount > 0){
                $error = "Email already in use";
            }
            else{
                print "test";
                if (isset($_POST["UserN"])){
                    if ($_POST["UserN"] != ""){
                        print "test";
                        if (isset($_POST["PassW"])){
                            if ($_POST["PassW"] != ""){
                                print "test";
                                if (isset($_POST["Phone"])){
                                    if ($_POST["Phone"] != ""){
                                        print "test";
                                        $sql = "INSERT INTO user (Email, Password, role, name , birthday ,phone)VALUES ('{$_POST["Email"]}', '{$_POST["PassW"]}', 'customer', '{$_POST["UserN"]}', '{$_POST["BirthD"]}', '{$_POST["Phone"]}')";
                                        if(mysqli_query($conn, $sql)){

                                            session_start();
                                            // Store data in session variables
                                            $_SESSION["loggedin"] = true;
                                            $sql = "SELECT ID FROM user where Email = '{$_POST["Email"]}'";
                                            $result = mysqli_query($conn, $sql);
                                            $row = mysqli_fetch_assoc($result);
                                            $_SESSION["id"] = $row["ID"];
                                            $_SESSION["username"] = $_POST["Email"];

                                            // Redirect user to welcome page
                                            header("location: home.php");
                                        }
                                        else{
                                            print "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                else{
                    $error = "ERROR";
                }
            }
        }
    }
}
?>
<!DOCTYPE HTML>
<!--
	Hyperspace by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>Sing Up</title>
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
            <li><a href="singUp.php" class="active">Sing Un</a></li>
            <li><a href="singIn.php" >Sing In</a></li>
        </ul>
    </nav>
</header>

<!-- Wrapper -->
<div id="wrapper">

    <!-- Main -->
    <section id="main" class="wrapper">
        <div class="inner">
            <h1 class="major">Sing Up</h1>
            <?php if (isset($error)){
                echo $error;
            }?>
            <form action="" method = "post">
                <label for="UserN">Username:</label>
                <input type=text id="UserN" name="UserN" required><br>
                <label for="Email">Email:</label>
                <input type=email id="Email" name="Email" required><br>
                <label for="PassW">Password:</label>
                <input type=password id="PassW" name="PassW" required><br>
                <label for="BirthD">Birthday:</label>
                <input type=date class="datepicker-here form-control" id="BirthD" name="BirthD" data-date-format="yyyy-mm-dd" data-language='en' placeholder="Birthday" required><br>
                <label for="Phone">Phone Number:</label>
                <input type=tel id="Phone" name="Phone" required><br>
                <input type="submit" value="Sing Up">
            </form>
        </div>

        <div  class="inner">
            <h3>Already have an account?</h3>
            <ul class="actions">
                <li><a href="singIn.php" class="button scrolly">Sing In</a></li>
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