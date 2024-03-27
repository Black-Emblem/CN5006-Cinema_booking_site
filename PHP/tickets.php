<?php
include_once 'C:\wamp\www\includes\database.php';
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: singIn.php");
}
$mID = 0;
$playID = 0;
include_once __DIR__ . '/header.php';
echo "<li><a href='result.php' class='active'>Tickets</a></li>";
include_once __DIR__ . '/headerB.php';
$request_method = strtoupper($_SERVER['REQUEST_METHOD']);

if ($request_method === 'GET') {
    include_once __DIR__ . '/sita.php';
}
elseif ($request_method === 'POST') {
    include_once __DIR__ . '/sita.php';
}

include_once __DIR__ . '/footer.php';
?>