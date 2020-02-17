<?php
error_reporting(0); //disable php error reporting as to not print error messages to the user
header('Content-Type: application/json'); //set page to dissplay as a json file


$servername = "localhost";
$username = "meet";
$password = "=vh2MfzK+G@@t8h!";
$db = "meet_proj_yearlong_final";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);


//get forum info:

$info_array = Array();

$info_result = mysqli_query($conn, "select * FROM forums where id='".htmlspecialchars($_POST["id"])."'");


while ( $row = $info_result -> fetch_array(MYSQLI_ASSOC)) {
    array_push($info_array,$row);
}


$result = mysqli_query($conn, "SELECT * FROM ".htmlspecialchars($_POST["id"]));

while ( $row = $result -> fetch_array(MYSQLI_ASSOC)) {
    array_push($info_array,$row);
}


echo json_encode($info_array);
 ?>
