<!--
	Hyperspace by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->

<?php
include_once 'C:\wamp\www\includes\database.php';
session_start();
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Apollo theaters</title>
    <meta charset=utf-8 />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="../assets/css/main.css" />
    <noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>
</head>
<body class="is-preload">

<!-- Sidebar -->
<section id="sidebar">
    <div class="inner">
        <nav>
            <ul>
                <li><a href="#intro">Welcome</a></li>
                <li><a href="#one">Movies playing now</a></li>
                <li><a href="#two">Who are we?</a></li>
                <li><a href="#three">Get in touch</a></li>
                <li><a href="tickets.php">Tickets</a></li>
                <?php
                if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
                    print "<li><a href=singIn.php>Sing In</a></li><li><a href=singUp.php>Sing Up</a></li>";
                }
                else{
                    print "<li><a href=Account.php>Account</a><li><a href=singOut.php>Sing Out</a></li>";
                }
                ?>

            </ul>
        </nav>
    </div>
</section>

<!-- Wrapper -->
<div id="wrapper">

    <!-- Intro -->
    <section id="intro" class="wrapper style1 fullscreen fade-up">
        <div class="inner">
            <h1>Apollo theaters</h1>
            <p>The most joyful experience<br />
                Since 1987</p>
            <ul class="actions">
                <li><a href="#one" class="button scrolly">See what's playing now</a></li>
            </ul>
        </div>
    </section>

    <!-- One -->
    <section id="one" class="wrapper style2-alt spotlights">
        <?php
        $sql = "SELECT ID, Name, Description FROM `movies` where State = 'playing' ";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);

        if ($rowCount > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $pID= $row["ID"];
                $pName = $row["Name"];
                $pDesc = $row["Description"];

                print "<section><img src=/images/{$pID}.jpg data-position=center class=image center/>
							<div class=content>
								<div class=inner>
									<h2>{$pName}</h2>
									<p>{$pDesc}</p>
									<ul class=actions>
										<li>
										<form method='get' action='movies.php'>
										<input type='hidden'name='mID' VALUE='$pID'>
										<input type='hidden'name='mName' VALUE='$pName'>
										<button type='submit' class=button href='movies.php'>See more</button>
										</form>
									</ul>
								</div>
							</div>
						</section>";
            }
        }
        else{
            print '<P>"no results found."</P>';
        }
        ?>
    </section>

    <!-- Two -->
    <section id="two" class="wrapper style3 fade-up">
        <div class="inner">
            <h2>Who are we?</h2>
            <p>Our company started its journey in the summer of 1987 where we obtained a small theatre and every weekend we would invite everyone to join us and relax.</p>
            <p>Since then we:</p>
            <div class="features">
                <section>
                    <span class="icon solid major fa-store-alt"></span>
                    <h3>Operate <?php
                        $sql = "SELECT ID from brunch";
                        $result = mysqli_query($conn, $sql);
                        $rowCount = mysqli_num_rows($result);
                        $num = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $num += 1;
                        }
                        echo $num;
                        ?> theatre locations!</h3>
                    <p>More soon will open!</p>
                </section>
                <section>
                    <span class="icon solid major fa-film"></span>
                    <h3>Played <?php
                        $sql = "SELECT ID from movies";
                        $result = mysqli_query($conn, $sql);
                        $rowCount = mysqli_num_rows($result);
                        $num = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $num += 1;
                        }
                        echo $num;
                        ?> movies!
                    </h3>
                    <p>And there more to come!</p>
                </section>
                <section>
                    <span class="icon solid major fa-theater-masks"></span>
                    <h3>Operate <?php
                        $sql = "SELECT ID from hall";
                        $result = mysqli_query($conn, $sql);
                        $rowCount = mysqli_num_rows($result);
                        $num = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $num += 1;
                        }
                        echo $num;
                        ?> halls!</h3>
                    <p>More soon will open!</p>
                </section>
                <section>
                    <span class="icon solid major fa-ticket-alt"></span>
                    <h3>we sold <?php
                        $sql = "SELECT ID from ticket where State = 'confirmed'";
                        $result = mysqli_query($conn, $sql);
                        $rowCount = mysqli_num_rows($result);
                        $num = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $num += 1;
                        }
                        echo $num;
                        ?> tickets</h3>
                    <p>Come and join our family.</p>
            </div>
        </div>
    </section>

    <!-- Three -->
    <section id="three" class="wrapper style1 fade-up">
        <div class="inner">
            <h2>Get in touch</h2>
            <div class="split style1">
                <section>

                    <ul class="contact">
                        <li><a href=singIn.php>Sing In</a></li>
                        <li><a href=singUp.php>Sing Up</a></li>
                        <li><a href=Account.php>Account</a></li>
                        <li><a href=singOut.php>Sing Out</a></li>
                        <li>
                            <h3>Email</h3>
                            <a href="#">demo@not.real</a>
                        </li>
                        <li>
                            <h3>Phone</h3>
                            <span>+<?php
                                $sql = "SELECT Contact from brunch where ID = 1";
                                $result = mysqli_query($conn, $sql);
                                $rowCount = mysqli_num_rows($result);
                                $row = mysqli_fetch_assoc($result);
                                echo $row["Contact"];
                                ?></span>
                        </li>
                        <?php
                        if (isset($_SESSION["id"])) {
                            $sql = "SELECT role from user where ID = {$_SESSION["id"]}";
                            $result = mysqli_query($conn, $sql);
                            $rowCount = mysqli_num_rows($result);
                            $row = mysqli_fetch_assoc($result);
                            if ($row["role"] == "admin") {
                                print "<li><a href='admin.php'>ADMIN</a></li>";
                            }
                        }
                        ?>
                        <li>
                            <h3>Social</h3>
                            <ul class="icons">
                                <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
                                <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
                                <li><a href="https://github.com/Black-Emblem" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
                                <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
                                <li><a href="#" class="icon brands fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </section>
            </div>
        </div>
    </section>

</div>

<!-- Footer -->
<footer id="footer" class="wrapper style1-alt">
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