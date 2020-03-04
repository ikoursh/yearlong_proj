<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forum</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .delete {
            visibility: hidden;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            width: 100%;
        }

        header {
            background-color: #36588a;
            padding: 30px;
            text-align: left;
            font-size: 35px;
            color: white;
        }


        section {
            display: -webkit-flex;
            display: flex;
        }


        nav {
            -webkit-flex: 1;
            -ms-flex: 1;
            flex: 1;
            background: #ccc;
            padding: 20px;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        article {
            -webkit-flex: 3;
            -ms-flex: 3;
            flex: 3;
            background-color: #f1f1f1;
            padding: 10px;
        }

        article {
            -webkit-flex: 3;
            -ms-flex: 3;
            flex: 3;
            background-color: #f2f2f2;
            padding: 10px;
        }

        footer {
            background-color: #777;
            padding: 10px;
            text-align: center;
            color: white;
        }

        @media (max-width: 600px) {
            section {
                -webkit-flex-direction: column;
                flex-direction: column;
            }
        }


    </style>
</head>
<body>

<header>
    <a style="color: white;text-decoration: none;" href="home.php"><h1>PostBook</h1></a>
</header>

<section>
    <nav>
        <ul>
            <script>
                function deletePost(fid, id) {
                    let request = "delete_comment.php?fid=" + fid + "&cid=" + id + "&ban=";
                    request += confirm("ban user ip?");
                    window.location.href = (request);
                }
            </script>
            <?php

            error_reporting(0); //disable php error reporting as to not print error messages to the user
            include "database.php";


            $forum = mysqli_query($conn, sprintf("select * FROM forums where id=\"%s\";", mysqli_real_escape_string($conn, htmlspecialchars($_GET["id"]))));

            $forum = $forum->fetch_array(MYSQLI_ASSOC);
            echo "<img src='images/" . $forum["id"] . "' alt='picture for " . $forum["title"] . "'>";
            echo "<h3>" . $forum["title"] . "</h3><br>";
            echo "<p> Description:<br>" . $forum["description"] . "</p><br>";
            echo "<p>" . $forum["stars"] . " stars</p><br>";
            echo "<a href=\"" . $forum["imdb"] . "\" target=\"_blank\">for more information</a>";

            echo "</ul>";
            echo "</nav>";
            echo "<article>";
            echo "<forum>";
            echo "<h4>Comments</h4>";

            $comments = mysqli_query($conn, "select * FROM " . htmlspecialchars($_GET["id"]));

            while ($comment = $comments->fetch_array(MYSQLI_ASSOC)) {
                echo "<b>" . $comment["poster_name"] . "</b>: " . $comment["message"] . "<button class=delete onclick=deletePost('" . $forum["id"] . "','" . $comment["id"] . "')><img  alt=\"delete icon\" src='assets/trash.png' width='20px'/></button> <br />";
            }

            echo "<br/>";

            $conn->close();
            ?>

            <form method="post" action="post.php">
                <label for="name">name:</label><br>
                <input required type="text" id="name" name="name" value="John"><br>
                <label for="text">comment:</label><br>
                <input required type="text" id="text" name="text" value="great"><br><br>
                <?php echo "<input required type=\"hidden\" name=\"id\" value=\"" . htmlspecialchars($_GET["id"]) . "\">"; ?>
                <input type="submit" value="comment">
            </form>


            </article>
</section>


</section>

<footer>
    <p>for any question, please contact us via us@idk.com</p>
    <button onclick="for (let el of document.querySelectorAll('.delete')) if(el.style.visibility === 'visible') {el.style.visibility = 'hidden';}else{el.style.visibility ='visible'}">
        admin mode
    </button>
</footer>

</body>
</html>
