<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');

    if(mysqli_connect_errno()){
        echo "Failed to connect to MariaDB: " . mysqli_connect_error();
        exit();
    }


    $query = "select title, description, release_year, length, name
    from film f
    inner join film_category fc on f.film_id=fc.film_id
    inner join category c on fc.category_id = c.category_id limit 100;";

    $result = mysqli_query($link, $query);

    $article = '';
    while($row = mysqli_fetch_array($result)){
        $article .= '<tr><td>';
        $article .= $row["title"];
        $article .= '</td><td>';
        $article .= $row["description"];
        $article .= '</td><td>';
        $article .= $row["release_year"];
        $article .= '</td><td>';
        $article .= $row["length"];
        $article .= '</td><td>';
        $article .= $row["name"];
        $article .= '</td></tr>';
    }

    mysqli_free_result($result);
    mysqli_close($link);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>film 정보</title>
    <style>
        body {
            font-family: 10px;
        }
        table {
            border-collapse: collapse;
            margin: 5%;
        }
        th, td {
            padding: 8px;
            border: 1px solid;
            border-collapse: collapse;
        }
      </style>
</head>

<body>
    <h2><a href="index.php">Film & Actor</a> | film 정보</h2>
    <table>
        <tr>
            <th>title</th>
            <th>description</th>
            <th>release_year</th>
            <th>length</th>
            <th>genre</th>
        </tr>
        <?= $article ?>
    </table>
</body>

</html>
