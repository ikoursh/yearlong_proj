<!DOCTYPE html>
<html lang="en">
<head>


    <title>Post Books</title>
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
    <h1>PostBook</h1>
</header>

<section>
    <nav>
        <ul>
            <li><h3>Books!</h3></li>
            <?php
            $servername = "localhost";
            $username = "meet";
            $password = "=vh2MfzK+G@@t8h!";
            $db = "meet_proj_yearlong_final";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $db);

            $books = mysqli_query($conn, "select * FROM forums where tag='book'");

            while ($row = $books->fetch_array(MYSQLI_ASSOC)) {
                echo "<li><a href=\"forum.php?id=" . $row["id"] . "\">" . $row["title"] . "</a></li>";
            }

            echo "<br>";
            echo "<li><h3>TV Shows!</h3></li>";

            $movies = mysqli_query($conn, "select * FROM forums where tag='movie'");

            while ($row = $movies->fetch_array(MYSQLI_ASSOC)) {
                echo "<li><a href=\"forum.php?id=" . $row["id"] . "\">" . $row["title"] . "</a></li>";
            }
            $conn->close();
            ?>

        </ul>
    </nav>
</section>


</body>
</html>
