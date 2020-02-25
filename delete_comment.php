<?php

$servername = "localhost";
$username = "meet";
$password = "=vh2MfzK+G@@t8h!";
$db = "meet_proj_yearlong_final";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);
mysqli_query($conn, "DELETE FROM " . htmlspecialchars($_GET["fid"]) . " WHERE id=" . htmlspecialchars($_GET["cid"]) . ";");
$conn->close();

header("Location: forum.php?id=" . htmlspecialchars($_GET["fid"]));
