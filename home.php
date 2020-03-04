<!DOCTYPE html>
<html lang="en">
<head>


    <title>Post Books</title>
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


    <script>
        function deleteReview(id) {
            let request = "delete_page.php?fid=" + id + "&ban=";
            request += confirm("ban user ip?");
            window.location.href = (request);
        }
    </script>
</head>
<body>

<header>
    <a style="color: white;text-decoration: none;" href="#"><h1>PostBook</h1></a>
</header>

<section>
    <nav>
        <ul>
            <li><h3>Books!</h3></li>
            <?php
            error_reporting(0); //disable php error reporting as to not print error messages to the user
            include "database.php";

            $books = mysqli_query($conn, "select * FROM forums where tag='book'");

            while ($row = $books->fetch_array(MYSQLI_ASSOC)) {
                echo "<li><a href=\"forum.php?id=" . $row["id"] . "\">" . $row["title"] . "</a><button class=delete onclick=deleteReview('" . $row["id"] . "')><img  alt=\"delete icon\" src='assets/trash.png' width='20px'/></button></li>";
            }

            echo "<br>";
            echo "<li><h3>TV Shows!</h3></li>";

            $movies = mysqli_query($conn, "select * FROM forums where tag='movie'");

            while ($row = $movies->fetch_array(MYSQLI_ASSOC)) {
                echo "<li><a href=\"forum.php?id=" . $row["id"] . "\">" . $row["title"] . "</a><button class=delete onclick=deleteReview('" . $row["id"] . "')><img  alt=\"delete icon\" src='assets/trash.png' width='20px'/></button></li>";
            }
            $conn->close();
            ?>

        </ul>

        <form action="crete_forum_page.html">
            <input type="submit" value="to create a new review"/>
        </form>

    </nav>

</section>
<footer>
    <p>for any question, please contact us via us@idk.com</p>
    <button onclick="for (let el of document.querySelectorAll('.delete')) if(el.style.visibility === 'visible') {el.style.visibility = 'hidden';}else{el.style.visibility ='visible'}">
        admin mode
    </button>
</footer>
</body>
</html>
