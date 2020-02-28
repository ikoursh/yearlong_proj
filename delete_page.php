<?php

error_reporting(0); //disable php error reporting as to not print error messages to the user
include "database.php";

$ipq = mysqli_query($conn, sprintf("SELECT IP FROM forums WHERE id=\"%s\";", mysqli_real_escape_string($conn, htmlspecialchars($_GET["fid"]))));
$ip = $ipq->fetch_array(MYSQLI_ASSOC);


$conn->query(sprintf("DELETE FROM forums WHERE id=\"%s\";", mysqli_real_escape_string($conn, htmlspecialchars($_GET["fid"]))));
$conn->query("drop table " . htmlspecialchars($_GET["fid"]));


if (htmlspecialchars($_GET["ban"]) == "true") {
    $conn->query(sprintf("insert into bannedIP(IP) VALUES(\"%s\")", implode("", $ip)));
}


$conn->close();
header("Location: home.php");
