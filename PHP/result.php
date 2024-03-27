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
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: singIn.php");
}
?>
	<head>
		<title>Apollo theaters</title>
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
					<ul style="min-heightheight: max-content;">
						<li><a href="home.php">Home</a></li>
						<li><a href="tickets.php?">Tickets</a></li>
					</ul>
				</nav>
			</header>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main" class="wrapper">
						<div class="inner">
							<h1 class="major">recreation results</h1>
							<span class="image fit"><img src="images/pic04.jpg" alt="" /></span>
                            <?php
                            $error = 0;
                            if (isset($_POST["playID"])) {
                                $sql = "select nLines, nRows from hall where ID = (select Hall_ID from play where ID = {$_POST["playID"]})";
                                $result = mysqli_query($conn, $sql);
                                $rowCount = mysqli_num_rows($result);
                                $row = mysqli_fetch_assoc($result);
                                $valTemp = "";
                                for ($_i = 1; $_i <= $row["nRows"]; $_i++) {
                                    for ($_j = 1; $_j <= $row["nLines"]; $_j++) {
                                        $valTemp .= "R{$_i}-L{$_j}";
                                        if (isset($_POST[$valTemp])) {
                                            $sql = "select ID from ticket where rows_num = '{$_i}' and line_num = '{$_j}' and state = 'confirmed' and Play_ID = '{$_POST["playID"]}'";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                $error += 1;
                                            }
                                        }
                                        $valTemp = "";
                                    }
                                }
                                if ($error > 0) {
                                    print "<h1>error: your sits are taken.</br>
                                    <a href='tickets.php'>Try again</a></h1>";
                                }
                                else {
                                    $sql = "select nLines, nRows from hall where ID = (select Hall_ID from play where ID = {$_POST["playID"]})";
                                    $result = mysqli_query($conn, $sql);
                                    $rowCount = mysqli_num_rows($result);
                                    $row = mysqli_fetch_assoc($result);
                                    $valTemp = "";
                                    for ($_i = 1; $_i <= $row["nRows"]; $_i++) {
                                        for ($_j = 1; $_j <= $row["nLines"]; $_j++) {
                                            $valTemp .= "R{$_i}-L{$_j}";
                                            if (isset($_POST[$valTemp])) {
                                                $sql = "select ID from ticket where rows_num = '{$_i}' and line_num = '{$_j}' and state = 'confirmed' and Play_ID = '{$_POST["playID"]}'";
                                                $result = $conn->query($sql);
                                                if ($result->num_rows < 1) {
                                                    $sql = "INSERT INTO ticket (user_ID, Play_ID, state, rows_num, line_num)VALUES ('{$_SESSION["id"]}', '{$_POST["playID"]}', 'confirmed', '{$_i}', '{$_j}')";
                                                    if(mysqli_query($conn, $sql)){
                                                    }
                                                    else{
                                                        print "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                                                        $error += 1;
                                                    }
                                                }
                                            }
                                            else{
                                                $valTemp = "";
                                            }
                                        }
                                    }
                                    if ($error > 0) {
                                        print "ERROR";
                                    }
                                    else {
                                        print "<h2>Your tickets are successfully reserved!<br>You can retrieve your tickets from the ticket booths.<h2>";
                                    }
                                }
                            }
                            ?>
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