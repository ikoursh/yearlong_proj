<?php


error_reporting(0); //disable php error reporting as to not print error messages to the user
include "../database.php";


if (isset($_GET["all"])) {
    $conn->query("delete from bannedip;");
} else {
    $conn->query(sprintf("delete from bannedip where id='%s';", $_POST["id"]));
}

$conn->close();

header("Location: index.php");

