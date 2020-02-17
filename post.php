<?php

$servername = "localhost";
$username = "meet";
$password = "=vh2MfzK+G@@t8h!";
$db = "meet_proj_yearlong_final";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);
$query1 = "CREATE TABLE ".htmlspecialchars($_POST["id"])." (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,poster_name VARCHAR(255) ,message VARCHAR(255));";
$conn->query($query1);
$query2 = "insert into `". htmlspecialchars($_POST["id"]) ."`(poster_name, message) VALUES (\"".htmlspecialchars($_POST["name"])."\",\"".htmlspecialchars($_POST["text"])."\");";
$conn->query($query2);
$conn->close();
 ?>
