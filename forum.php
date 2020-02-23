<!DOCTYPE html>
<html lang="en">
<head>
    <title>CSS Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
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
            <?php

            $servername = "localhost";
            $username = "meet";
            $password = "=vh2MfzK+G@@t8h!";
            $db = "meet_proj_yearlong_final";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $db);
            $forum = mysqli_query($conn, "select * FROM forums where id=\"" . htmlspecialchars($_GET["id"]) . "\";");

            $forum = $forum->fetch_array(MYSQLI_ASSOC);
            echo "<h3>" . $forum["title"] . "</h3><br>";
            echo "<p> Description:<br>" . $forum["description"] . "</p><br>";
            echo "<p>" . $forum["stars"] . " stars</p><br>";
            echo "<a href=\"" . $forum["imdb"] . "\">for more information</a>";

            echo "</ul>";
            echo "</nav>";
            echo "<article>";
            echo "<forum>";
            echo "<h4>Comments</h4>";

            $comments = mysqli_query($conn, "select * FROM " . htmlspecialchars($_GET["id"]) . ";");

            while ($comment = $comments->fetch_array(MYSQLI_ASSOC)) {
                var_dump($comment);
                echo "<p>" . $comment["message"] . "</p>";
            }

            $conn->close();
            ?>

            </article>
</section>


</section>

<footer>
    <p>for any question, please contact us via us@idk.com</p>
</footer>

</body>
</html>
