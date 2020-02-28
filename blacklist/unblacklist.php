<?php
error_reporting(0); //disable php error reporting as to not print error messages to the user

$servername = "localhost";
$username = "meet";
$password = "=vh2MfzK+G@@t8h!";
$db = "meet_proj_yearlong_final";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

if (isset($_GET["all"])) {
    $conn->query("delete from bannedip;");
} else {
    $conn->query(sprintf("delete from bannedip where id='%s';", $_POST["id"]));
}

$conn->close();

header("Location: index.php");

