<?php
error_reporting(0); //disable php error reporting as to not print error messages to the user

$servername = "localhost";
$username = "meet";
$password = "=vh2MfzK+G@@t8h!";
$db = "meet_proj_yearlong_final";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);
$conn->query("DELETE FROM forums WHERE id=\"" . htmlspecialchars($_GET["fid"]) . "\";");
$conn->query("drop table " . htmlspecialchars($_GET["fid"]));
$conn->close();
header("Location: home.php");
