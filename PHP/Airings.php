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
            <li><a href="Theatres.php">Theatres</a></li>
            <li><a href="adMovies.php">Movies</a></li>
            <li><a href="Airings.php" class="active">Airings</a></li>
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
            <h1 class="major">play</h1>
            <?php

            $sql = "SELECT * FROM play";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);

            if ($rowCount > 0) {
                print "<table><thead><tr><th>ID</th><th>Brunch_ID</th><th>Hall_ID</th><th>Movie_ID</th><th>nDate</th><th>nTime</th><th>price</th></tr></thead><tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    print "<tr><th>{$row["ID"]}</th><th>{$row["Brunch_ID"]}</th><th>{$row["Hall_ID"]}</th><th>{$row["Movie_ID"]}</th><th>{$row["nDate"]}</th><th>{$row["nTime"]}</th><th>{$row["price"]}</th></tr>";
                }
                print "</tbody></table>";
            }
            ?>
            <form method="post">
                play ID:<br>
                <input type="text" name="uID">
                play Brunch_ID:<br>
                <input type="text" name="Brunch_ID" required>
                play Hall_ID:<br>
                <input type="text" name="Hall_ID" required>
                play Movie_ID:<br>
                <input type="text" name="Movie_ID" required>
                play nDate:<br>
                <input type="text" name="nDate" required>
                play nTime:<br>
                <input type="text" name="nTime" required>
                play price:<br>
                <input type="text" name="price" required>
                <br>
                <input type="hidden" name="user">
                <input type='submit' value='submit'>
            </form>

            <form method="post">
                Select a user entry to delete:
                <select name="duID">
                    <?php

                    $sql = "SELECT ID FROM play";
                    $result = mysqli_query($conn, $sql);
                    $rowCount = mysqli_num_rows($result);

                    if ($rowCount > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            print "<option value='{$row["ID"]}'>{$row["ID"]}</option>";
                        }
                    }
                    ?>
                    <input type="hidden" name="duser">
                    <br>
                    <input type='submit' value='delete'>
                </select></form>
            <?php
            if (isset($_POST["duser"])){
                if ($_POST["duID"] != 0){
                    $sql = "DELETE FROM play WHERE ID = '{$_POST["duID"]}'";

                    if ($conn->query($sql) === TRUE) {
                        echo "Record deleted successfully";
                    } else {
                        echo "Error deleting record: " . $conn->error;
                    }
                }
            }
            if (isset($_POST["user"])){
                if (isset($_POST["uID"])){
                    if ($_POST["uID"] != ""){
                        $sql = " UPDATE play set Brunch_ID = '{$_POST["Brunch_ID"]}', Hall_ID = '{$_POST["Hall_ID"]}' , role = '{$_POST["role"]}', name = '{$_POST["name"]}', birthday = '{$_POST["birthday"]}', phone = '{$_POST["phone"]}' where ID = '{$_POST["uID"]}'";
                        if(mysqli_query($conn, $sql)){
                        }
                        else{
                            print "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                        }
                    }
                    if ($_POST["uID"] == ""){
                        $sql = "INSERT INTO play (Brunch_ID, Hall_ID, role, name, birthday, phone) VALUES ('{$_POST["Brunch_ID"]}', '{$_POST["Hall_ID"]}', '{$_POST["role"]}', '{$_POST["name"]}', '{$_POST["birthday"]}', '{$_POST["phone"]}')";
                        if(mysqli_query($conn, $sql)){
                        }
                        else{
                            print "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                        }
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
