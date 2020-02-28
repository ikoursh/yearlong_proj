<?php
error_reporting(0); //disable php error reporting as to not print error messages to the user
include "database.php";

//check if ip is banned:
$cip = mysqli_real_escape_string($conn, htmlspecialchars($_SERVER['REMOTE_ADDR']));
$b = false;
$banned_ips = mysqli_query($conn, "select IP FROM bannedIP");

while ($row = $banned_ips->fetch_array(MYSQLI_ASSOC)) {
    if (($row["IP"]) == $cip) {
        $b = true;
        break;
    }
}
if (!$b) {
// generate a random id for forum
    $length = 10; //id length
    $uniqe_id = false;
    while (!$uniqe_id) {
        $id = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length); //create a random id
        if (!$conn->query("SELECT * from forums where id=" . $id)) { //if it exists try again
            $uniqe_id = true;
        }
    }


    $query = sprintf("insert into `forums`(id, title, description, imdb, stars, tag, IP) VALUES (\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\");", $id, mysqli_real_escape_string($conn, htmlspecialchars($_POST["title"])), mysqli_real_escape_string($conn, htmlspecialchars($_POST["description"])), mysqli_real_escape_string($conn, htmlspecialchars($_POST["imdb"])), mysqli_real_escape_string($conn, htmlspecialchars($_POST["stars"])), mysqli_real_escape_string($conn, htmlspecialchars($_POST["tag"])), $cip);
    $conn->query($query);


// create messages sql table:

    $sql = "CREATE TABLE " . $id . "( 
    id          INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    poster_name VARCHAR(255) NOT NULL ,
    message     VARCHAR(255) NOT NULL ,
    IP VARCHAR(50) NOT NULL );";


    $conn->query($sql);


//image handling:
    try {
        if (!($_FILES['fileToUpload']['error'] > 0)) {
            // You should  check filesize here.
            if ($_FILES['fileToUpload']['size'] > 25000000) {
                throw new RuntimeException('Exceeded filesize limit.');
            }

            // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
            // Check MIME Type by yourself.
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            if (false === $ext = array_search(
                    $finfo->file($_FILES['fileToUpload']['tmp_name']),
                    array(
                        'jpg' => 'image/jpeg',
                        'png' => 'image/png',
                        'gif' => 'image/gif',
                    ),
                    true
                )) {
                throw new RuntimeException('Invalid file format.');
            }
            move_uploaded_file(
                $_FILES['fileToUpload']['tmp_name'],
                "images/" . $id
            );
        }

    } catch (Exception $ignored) {
    }
    $conn->close();

    header("Location: home.php");

} else {
    $conn->close();

    echo "<script>alert(\"you have been banned from posting\");window.location.href=\"home.php\"</script>";
}
