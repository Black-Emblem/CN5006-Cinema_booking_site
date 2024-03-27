<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "theaterdb";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn)
{
    mysqli_set_charset($conn, 'utf8');
    mysqli_query($conn, "SET CHARACTER SET utf8");
    mysqli_query($conn, "SET NAMES utf8");
}
else{
die("Database connection failed!");
}