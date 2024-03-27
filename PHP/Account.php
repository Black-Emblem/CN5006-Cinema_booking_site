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
            <li><a href="Account.php" class="active">Account</a></li>
            <li><a href="singOut.php">Sing Out</a></li>
        </ul>
    </nav>
</header>

<!-- Wrapper -->
<div id="wrapper">

    <!-- Main -->
    <section id="main" class="wrapper">
        <div class="inner">
            <h1 class="major">Purchase history</h1>
            <?php

            $sql = "SELECT * FROM ticket where user_ID = '{$_SESSION["id"]}'";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);

            if ($rowCount > 0) {
                print "<table><thead><tr><th> Ticket ID</th><th>Movie</th><th>Brunch ID</th><th>Hall ID</th><th>Date</th><th>Time</th><th>Price</th><th>State</th><th>Sit number</th></tr></thead><tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    print "<tr><th>{$row["ID"]}</th>";
                    $sql = "SELECT Movie_ID, Brunch_ID, Hall_ID, nTime, nDate, price FROM play where ID = '{$row["Play_ID"]}'";
                    $res = mysqli_query($conn, $sql);
                    $rw = mysqli_fetch_assoc($res);

                    $sql = "SELECT Name FROM movies where ID = '{$rw["Movie_ID"]}'";
                    $resu = mysqli_query($conn, $sql);
                    $rwa = mysqli_fetch_assoc($resu);

                    $sql = "SELECT NAME FROM brunch where ID = '{$rw["Brunch_ID"]}'";
                    $resw = mysqli_query($conn, $sql);
                    $rws = mysqli_fetch_assoc($resw);

                    print "<th>{$rwa["Name"]}</th><th>{$rws["NAME"]}</th><th>{$rw["Hall_ID"]}</th><th>{$rw["nDate"]}</th><th>{$rw["nTime"]}</th><th>{$rw["price"]}</th><th>{$row["State"]}</th><th>R:{$row["rows_num"]} L:{$row["line_num"]}</th></tr>";
                }
                print "</tbody></table>";
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