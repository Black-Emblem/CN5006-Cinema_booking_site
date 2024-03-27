<!DOCTYPE HTML>
<!--
	Hyperspace by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->


<html>
<?php
include_once 'C:\wamp\www\includes\database.php';
$mID = $_GET['mID'];
?>
	<head>
		<title>
        <?php
        $mName = $_GET['mName'];
        echo $mName;
        ?>
        </title>
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
						<li><a href=movies.php class="active"><?php echo $mName; ?></a></li>
					</ul>
				</nav>
			</header>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main" class="wrapper">
						<div class="inner">
							<h1 class="major"><?php echo $mName; ?></h1>
                            <?php
                            $sql = "SELECT * FROM `movies` where ID = '$mID' ";
                            $result = mysqli_query($conn, $sql);
                            $rowCount = mysqli_num_rows($result);
                            $row = mysqli_fetch_assoc($result);
                                print "<span class='image left'><img src=/images/{$row["ID"]}.jpg alt=''/></span>
                                 <h3>{$row["Description"]}</h3>
                                <ul class='actions fit'>
                                    <li><div class='align-center'><h2>Type</h2></div><a class='button fit'>{$row["Type"]}</a></li>
                                    <li><div class='align-center'><h2>Duration</h2></div><a class='button fit'>{$row["Duration"]} minutes</a></li>
                                    <li><div class='align-center'><h2>Age restriction</h2></div><a class='button fit'>+{$row["age_rist"]}</a></li>
                                </ul>
                                <h1 class=major>Schedule</h1>";

                            $sql = "SELECT * FROM `play` where Movie_ID = '$mID' and nDate >= current_date order by Brunch_ID ";
                            $result = mysqli_query($conn, $sql);
                            $rowCount = mysqli_num_rows($result);

                            if ($rowCount > 0) {
                                print "<table>
											<thead>
												<tr>
													<th>Movie</th>
													<th>Brunch</th>
													<th>Hall</th>
													<th>Date</th>
													<th>time</th>
													<th>Price</th>
												</tr>
											</thead>
											<tbody>";
                                while ($row = mysqli_fetch_assoc($result)) {
                                    print "<tr>
													<td>{$mName}</td>
													<td>{$row["Brunch_ID"]}</td>
													<td>{$row["Hall_ID"]}</td>
													<td>{$row["nDate"]}</td>
													<td>{$row["nTime"]}</td>
													<td>{$row["price"]}</td>
												</tr>";
                                }
                                print "</tbody></table>";
                                print "<form method='get' action='tickets.php'>
										<input type='hidden'name='mID' VALUE='$mID'>
										<button type='submit' value='submit' class=button href='movies.php'>Book your sit now!</button>
										</form>";
                            }
                            else{
                                echo "<h2>There no current scheduled screening</h2>";
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