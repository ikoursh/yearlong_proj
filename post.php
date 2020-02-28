<?php
error_reporting(0); //disable php error reporting as to not print error messages to the user
$servername = "localhost";
$username = "meet";
$password = "=vh2MfzK+G@@t8h!";
$db = "meet_proj_yearlong_final";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

//check if ip is banned:
$cip = htmlspecialchars($_SERVER['REMOTE_ADDR']);
$b = false;
$banned_ips = mysqli_query($conn, "# noinspection SqlResolveForFile

select IP FROM bannedIP");

while ($row = $banned_ips->fetch_array(MYSQLI_ASSOC)) {
    if (($row["IP"]) == $cip) {
        $b = true;
        break;
    }
}
if (!$b) {
    $query1 = sprintf("insert into `%s`(poster_name, message, IP) VALUES (\"%s\",\"%s\",\"%s\");", htmlspecialchars($_POST["id"]), htmlspecialchars($_POST["name"]), htmlspecialchars($_POST["text"]), $cip);
    $conn->query($query1);
    $conn->close();

    header("Location: forum.php?id=" . htmlspecialchars($_POST["id"]));

} else {
    $conn->close();

    echo "<script>alert(\"you have been banned from posting\");window.location.href=\"forum.php?id=" . htmlspecialchars($_POST["id"]) . "\"</script>";
}


