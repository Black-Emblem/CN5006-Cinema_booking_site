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
            <li><a href="adMovies.php" class="active">Movies</a></li>
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
            <h1 class="major">movies</h1>
            <?php

            $sql = "SELECT * FROM movies";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);

            if ($rowCount > 0) {
                print "<table><thead><tr><th>ID</th><th>State</th><th>Name</th><th>Description</th><th>Duration</th><th>Type</th><th>age_rist</th></tr></thead><tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    print "<tr><th>{$row["ID"]}</th><th>{$row["State"]}</th><th>{$row["Name"]}</th><th>{$row["Description"]}</th><th>{$row["Duration"]}</th><th>{$row["Type"]}</th><th>{$row["age_rist"]}</th></tr>";
                }
                print "</tbody></table>";
            }
            ?>
            <form method="post">
                Movie ID:<br>
                <input type="text" name="mID">
                Movie State:<br>
                <input type="text" name="State" required>
                Movie Name:<br>
                <input type="text" name="Name" required>
                Movie Description:<br>
                <input type="text" name="Description" required>
                Movie Duration:<br>
                <input type="text" name="Duration" required>
                Movie Type:<br>
                <input type="text" name="Type" required>
                Movie age_rist:<br>
                <input type="text" name="age_rist" required>
                <br>
                <input type="hidden" name="movie">
                <input type='submit' value='submit'>
            </form>

            <form method="post">
                Select a movie entry to delete:
                <select name="dmID">
                    <?php

                    $sql = "SELECT ID FROM movies";
                    $result = mysqli_query($conn, $sql);
                    $rowCount = mysqli_num_rows($result);

                    if ($rowCount > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            print "<option value='{$row["ID"]}'>{$row["ID"]}</option>";
                        }
                    }
                    ?>
                    <input type="hidden" name="dmovie">
                    <br>
                    <input type='submit' value='delete'>
                </select></form>
            <?php
            if (isset($_POST["dmovie"])){
                if ($_POST["dmID"] != 0){
                    $sql = "DELETE FROM movies WHERE ID = '{$_POST["dmID"]}'";

                    if ($conn->query($sql) === TRUE) {
                        echo "Record deleted successfully";
                    } else {
                        echo "Error deleting record: " . $conn->error;
                    }
                }
            }
            if (isset($_POST["movie"])){
                if (isset($_POST["mID"])){
                    if ($_POST["mID"] != ""){
                        $sql = " UPDATE movies set State = '{$_POST["State"]}', Name = '{$_POST["Name"]}' , Description = '{$_POST["Description"]}', Duration = '{$_POST["Duration"]}', Type = '{$_POST["Type"]}', age_rist = '{$_POST["age_rist"]}' where ID = '{$_POST["mID"]}'";
                        if(mysqli_query($conn, $sql)){
                        }
                        else{
                            print "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                        }
                    }
                    if ($_POST["mID"] == ""){
                        $sql = "INSERT INTO movies (State, Name, Description, Duration, Type, age_rist) VALUES ('{$_POST["State"]}', '{$_POST["Name"]}', '{$_POST["Description"]}', '{$_POST["Duration"]}', '{$_POST["Type"]}', '{$_POST["age_rist"]}')";
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