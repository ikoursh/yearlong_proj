<?php
error_reporting(0); //disable php error reporting as to not print error messages to the user

$servername = "localhost";
$username = "meet";
$password = "=vh2MfzK+G@@t8h!";
$db = "meet_proj_yearlong_final";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

$ipq = mysqli_query($conn, "SELECT IP FROM forums WHERE id=\"" . htmlspecialchars($_GET["fid"]) . "\";");
$ip = $ipq->fetch_array(MYSQLI_ASSOC);



$conn->query("DELETE FROM forums WHERE id=\"" . htmlspecialchars($_GET["fid"]) . "\";");
$conn->query("drop table " . htmlspecialchars($_GET["fid"]));


if (htmlspecialchars($_GET["ban"]) == "true") {
    $conn->query("insert into bannedIP(IP) VALUES(\"" . implode("", $ip) . "\")");
}


$conn->close();
header("Location: home.php");
