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
            <li><a href="Accounts.php" class="active">Accounts</a></li>
            <li><a href="adTickets.php">Tickets</a></li>

        </ul>
    </nav>
</header>

<!-- Wrapper -->
<div id="wrapper">

    <!-- Main -->
    <section id="main" class="wrapper">
        <div class="inner">
            <h1 class="major">user</h1>
            <?php

            $sql = "SELECT * FROM user";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);

            if ($rowCount > 0) {
                print "<table><thead><tr><th>ID</th><th>Email</th><th>Password</th><th>role</th><th>name</th><th>birthday</th><th>phone</th></tr></thead><tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    print "<tr><th>{$row["ID"]}</th><th>{$row["Email"]}</th><th>{$row["Password"]}</th><th>{$row["role"]}</th><th>{$row["name"]}</th><th>{$row["birthday"]}</th><th>{$row["phone"]}</th></tr>";
                }
                print "</tbody></table>";
            }
            ?>
            <form method="post">
                user ID:<br>
                <input type="text" name="uID">
                user Email:<br>
                <input type="text" name="Email" required>
                user Password:<br>
                <input type="text" name="Password" required>
                user role:<br>
                <input type="text" name="role" required>
                user name:<br>
                <input type="text" name="name" required>
                user birthday:<br>
                <input type="text" name="birthday" required>
                user phone:<br>
                <input type="text" name="phone" required>
                <br>
                <input type="hidden" name="user">
                <input type='submit' value='submit'>
            </form>

            <form method="post">
                Select a user entry to delete:
                <select name="duID">
                    <?php

                    $sql = "SELECT ID FROM user";
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
                    $sql = "DELETE FROM user WHERE ID = '{$_POST["duID"]}'";

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
                        $sql = " UPDATE user set Email = '{$_POST["Email"]}', Password = '{$_POST["Password"]}' , role = '{$_POST["role"]}', name = '{$_POST["name"]}', birthday = '{$_POST["birthday"]}', phone = '{$_POST["phone"]}' where ID = '{$_POST["uID"]}'";
                        if(mysqli_query($conn, $sql)){
                        }
                        else{
                            print "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                        }
                    }
                    if ($_POST["uID"] == ""){
                        $sql = "INSERT INTO user (Email, Password, role, name, birthday, phone) VALUES ('{$_POST["Email"]}', '{$_POST["Password"]}', '{$_POST["role"]}', '{$_POST["name"]}', '{$_POST["birthday"]}', '{$_POST["phone"]}')";
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
