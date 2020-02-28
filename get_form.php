<?php

error_reporting(0); //disable php error reporting as to not print error messages to the user
include "database.php";

header('Content-Type: application/json'); //set page to display as a json file


//get forum info:

$info_array = Array();

$info_result = mysqli_query($conn, "select * FROM forums where id='" . mysqli_real_escape_string($conn, htmlspecialchars($_POST["id"])) . "'");


while ($row = $info_result->fetch_array(MYSQLI_ASSOC)) {
    array_push($info_array, $row);
}


$result = mysqli_query($conn, "SELECT * FROM " . mysqli_real_escape_string($conn, htmlspecialchars($_POST["id"])));

while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    array_push($info_array, $row);
}


echo json_encode($info_array);

