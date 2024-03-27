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
            <li><a href="Airings.php">Airings</a></li>
            <li><a href="Accounts.php">Accounts</a></li>
            <li><a href="adTickets.php" class="active">Tickets</a></li>

        </ul>
    </nav>
</header>

<!-- Wrapper -->
<div id="wrapper">

    <!-- Main -->
    <section id="main" class="wrapper">
        <div class="inner">
            <h1 class="major">tickets</h1>
            <?php

            $sql = "SELECT * FROM ticket";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);

            if ($rowCount > 0) {
                print "<table><thead><tr><th>ID</th><th>user_ID</th><th>play_ID</th><th>State</th><th>rows_num</th><th>line_num</th></tr></thead><tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    print "<tr><th>{$row["ID"]}</th><th>{$row["user_ID"]}</th><th>{$row["Play_ID"]}</th><th>{$row["State"]}</th><th>{$row["rows_num"]}</th><th>{$row["line_num"]}</th></tr>";
                }
                print "</tbody></table>";
            }
            ?>
            <form method="post">
                ticket ID:<br>
                <input type="text" name="tID">
                ticket user_ID:<br>
                <input type="text" name="user_ID" required>
                ticket Play_ID:<br>
                <input type="text" name="Play_ID" required>
                ticket State:<br>
                <input type="text" name="State" required>
                ticket rows_num:<br>
                <input type="text" name="rows_num" required>
                ticket line_num:<br>
                <input type="text" name="line_num" required>
                <br>
                <input type="hidden" name="user">
                <input type='submit' value='submit'>
            </form>

            <form method="post">
                Select a user entry to delete:
                <select name="duID">
                    <?php

                    $sql = "SELECT ID FROM ticket";
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
                    $sql = "DELETE FROM ticket WHERE ID = '{$_POST["duID"]}'";

                    if ($conn->query($sql) === TRUE) {
                        echo "Record deleted successfully";
                    } else {
                        echo "Error deleting record: " . $conn->error;
                    }
                }
            }
            if (isset($_POST["duser"])){
                if (isset($_POST["uID"])){
                    if ($_POST["uID"] != ""){
                        $sql = " UPDATE ticket set user_ID = '{$_POST["user_ID"]}', Play_ID = '{$_POST["Play_ID"]}' , State = '{$_POST["State"]}', rows_num = '{$_POST["rows_num"]}', line_num = '{$_POST["line_num"]}' where ID = '{$_POST["tID"]}'";
                        if(mysqli_query($conn, $sql)){
                        }
                        else{
                            print "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                        }
                    }
                    if ($_POST["uID"] == ""){
                        $sql = "INSERT INTO ticket (user_ID, Play_ID, State, rows_num, line_num) VALUES ('{$_POST["user_ID"]}', '{$_POST["Play_ID"]}', '{$_POST["State"]}', '{$_POST["rows_num"]}', '{$_POST["line_num"]}')";
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
            <li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
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
