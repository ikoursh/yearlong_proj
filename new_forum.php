<?php
error_reporting(0); //disable php error reporting as to not print error messages to the user



$servername = "localhost";
$username = "meet";
$password = "=vh2MfzK+G@@t8h!";
$db = "meet_proj_yearlong_final";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);



// generate a random id for forum
$length = 10; //id length
$uniqe_id = false;
while (!$uniqe_id) {
    $id = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)))), 1, $length); //create a random id
  if (!$conn->query("SELECT * from forums where id=".$id)) { //if it exists try again
    $uniqe_id = true;
  }
}

echo $id;





$query = "insert into `forums`(id, title, description, imdb, stars, tag) VALUES (\"".$id."\",\"".htmlspecialchars($_POST["title"])."\",\"".htmlspecialchars($_POST["description"])."\",\"".htmlspecialchars($_POST["imdb"])."\",\"".htmlspecialchars($_POST["stars"])."\",\"".htmlspecialchars($_POST["tag"])."\");";
$conn->query($query);



//image handelng:
if (!($_FILES['fileToUpload']['error']>0)) {
    // You should  check filesize here.
    if ($_FILES['fileToUpload']['size'] > 1000000) {
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
    // get the file extention
    $ext = end(explode(".", $_FILES['fileToUpload']['name']));

    move_uploaded_file(
         $_FILES['fileToUpload']['tmp_name'],
         "forums/". $id .".". $ext
     );
}



        // create messages sql table:


$sql = "create table ".$id." (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, poster_name VARCHAR(255) , message VARCHAR(255));";
$conn->query($sql);
$conn->close();

header("Location: home.html");
