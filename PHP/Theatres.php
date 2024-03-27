<!DOCTYPE HTML>
<!--
	Hyperspace by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->


<html>
<?php
include_once 'C:\wamp\www\includes\database.php';
?>
<head>
    <title>Admin</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="../assets/css/main.css" />
    <noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>
</head>
<body class="is-preload">

<!-- Header -->
<header id="header">
    <a href="admin.php" class="title">Administration</a>
    <nav>
        <ul>
            <li><a href="Theatres.php" class="active">Theatres</a></li>
            <li><a href="adMovies.php">Movies</a></li>
            <li><a href="Airings.php">Airings</a></li>
            <li><a href="Accounts.php">Accounts</a></li>
            <li><a href="adTickets.php">Tickets</a></li>

        </ul>
    </nav>
</header>

<!-- Wrapper -->
<div id="wrapper">

    <!-- Main -->
    <section id="main" class="wrapper">
        <div class="inner">
            <h1 class="major">brunch</h1>
            <?php

            $sql = "SELECT * FROM `brunch`";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);

            if ($rowCount > 0) {
                print "<table><thead><tr><th>ID</th><th>NAME</th><th>Address</th><th>Contact</th><th>Halls</th></tr></thead><tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    print "<tr><th>{$row["ID"]}</th><th>{$row["NAME"]}</th><th>{$row["Address"]}</th><th>{$row["Contact"]}</th><th>{$row["Halls"]}</th></tr>";
                }
                print "</tbody></table>";
            }
            ?>
            <form method="post">
                Theatre ID:<br>
                <input type="text" name="tID">
                Theatre NAME:<br>
                <input type="text" name="tName" required>
                Theatre Address:<br>
                <input type="text" name="tAdd" required>
                Theatre Contact:<br>
                <input type="text" name="tCon" required>
                Theatre Halls:<br>
                <input type="text" name="tHalls" required>
                <br>
                <input type="hidden" name="theatre">
                <input type='submit' value='submit'>
            </form>

            <form method="post">
                Select a brunch entry to delete:
            <select name="dtID">
            <?php

            $sql = "SELECT ID FROM brunch";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);

            if ($rowCount > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    print "<option value='{$row["ID"]}'>{$row["ID"]}</option>";
                }
            }
            ?>
                <input type="hidden" name="dtheatre">
                <br>
                <input type='submit' value='delete'>
            </select></form>
            <?php
            if (isset($_POST["dtheatre"])){
                if ($_POST["dtID"] != 0){
                    $sql = "DELETE FROM brunch WHERE ID = '{$_POST["dtID"]}'";

                    if ($conn->query($sql) === TRUE) {
                        echo "Record deleted successfully";
                    } else {
                        echo "Error deleting record: " . $conn->error;
                    }
                }
            }
            if (isset($_POST["theatre"])){
                if (isset($_POST["tID"])){
                    if ($_POST["tID"] != ""){
                        $sql = " UPDATE brunch set NAME = '{$_POST["tName"]}', Address = '{$_POST["tAdd"]}' , Contact = '{$_POST["tCon"]}', Halls = '{$_POST["tHalls"]}' where ID = '{$_POST["tID"]}'";
                        if(mysqli_query($conn, $sql)){
                        }
                        else{
                            print "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                        }
                    }
                    if ($_POST["tID"] == ""){
                        $sql = "INSERT INTO brunch (NAME, Address, Contact, Halls) VALUES ('{$_POST["tName"]}', '{$_POST["tAdd"]}' , '{$_POST["tCon"]}', '{$_POST["tHalls"]}')";
                        if(mysqli_query($conn, $sql)){
                        }
                        else{
                            print "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                        }
                    }
                }
            }
            ?>
            <h1 class="major">hall</h1>
            <?php

            $sql = "SELECT * FROM hall order by Brunch_ID";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);

            if ($rowCount > 0) {
                print "<table><thead><tr><th>ID</th><th>Brunch_ID</th><th>nLines</th><th>nRows</th></tr></thead><tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    print "<tr><th>{$row["ID"]}</th><th>{$row["Brunch_ID"]}</th><th>{$row["nLines"]}</th><th>{$row["nRows"]}</th></tr>";
                }
                print "</tbody></table>";
            }
            ?>

            <form method="post">
                Hall ID:<br>
                <input type="text" name="hID">
                Hall Brunch_ID:<br>
                <input type="text" name="hBrunch_ID">
                Hall nLines:<br>
                <input type="text" name="nLines">
                Hall nRows:<br>
                <input type="text" name="nRows">
                <br>
                <input type="hidden" name="hall">
                <input type='submit' value='submit'>
            </form>

            <?php
            if (isset($_POST["hall"])){
                if (isset($_POST["hID"])){
                    if ($_POST["hID"] != ""){
                        $sql = " UPDATE brunch set Brunch_ID = '{$_POST["hBrunch_ID"]}', nLines = '{$_POST["nLines"]}' , nRows = '{$_POST["nRows"]}' where ID = '{$_POST["hID"]}'";
                        if(mysqli_query($conn, $sql)){
                        }
                        else{
                            print "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                        }
                    }
                    if ($_POST["hID"] == ""){
                        $sql = "INSERT INTO brunch (Brunch_ID, nLines, nRows) VALUES ('{$_POST["hBrunch_ID"]}' , '{$_POST["nLines"]}', '{$_POST["nRows"]}')";
                        if(mysqli_query($conn, $sql)){
                        }
                        else{
                            print "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                        }
                    }
                }
            }
            ?>
            <form method="post">
                Select a hall entry to delete:
            <select name="dhID">
            <?php

            $sql = "SELECT ID FROM `hall`";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);

            if ($rowCount > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    print "<option value='{$row["ID"]}'>{$row["ID"]}</option>";
                }
            }
            ?>
                <input type="hidden" name="dhall">
                <br>
                <input type='submit' value='delete'>
            </select></form>
            <?php
            if (isset($_POST["dhall"])){
                if ($_POST["dhID"] != 0){
                    $sql = "DELETE FROM hall WHERE ID = '{$_POST["dhID"]}'";

                    if ($conn->query($sql) === TRUE) {
                        echo "Record deleted successfully";
                    } else {
                        echo "Error deleting record: " . $conn->error;
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