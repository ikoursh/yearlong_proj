<a href="unblacklist.php?all">clear all</a>
<br/>
<?php
//error_reporting(0); //disable php error reporting as to not print error messages to the user

$servername = "localhost";
$username = "meet";
$password = "=vh2MfzK+G@@t8h!";
$db = "meet_proj_yearlong_final";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

$bIP = mysqli_query($conn, "SELECT * FROM bannedIP;");
while ($ip = $bIP->fetch_array(MYSQLI_ASSOC)) {
    echo sprintf("<form style='display: inline-block' action=\"unblacklist.php\" method=\"post\">
<p>%s
<input type='hidden' name='id' value='%s'/>
<input type=\"image\" name=\"submit\" src='../assets/trash.png' width='20px' alt=\"delete\"  />
</form><a href='lookup.php?IP=%s'>IP lookup</a></p>", $ip['IP'], $ip["id"], $ip["IP"]);
}
$conn->close();

