<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');

    if(mysqli_connect_errno()){
        echo "Failed to connect to MariaDB: " . mysqli_connect_error();
        exit();
    }


    $query = "select ca.name category_name, sum(IFNULL(pay.amount,0)) revenue
    from category ca
    left join film_category film_ca on ca.category_id = film_ca.category_id
    left join film f on film_ca.film_id = f.film_id
    left join inventory inv on f.film_id = inv.film_id
    left join rental ren on inv.inventory_id = ren.inventory_id
    left join payment pay on ren.rental_id = pay.rental_id
    group by ca.name
    order by revenue desc; ";

    $result = mysqli_query($link, $query);

    $article = '';
    while($row = mysqli_fetch_array($result)){
        $article .= '<tr><td>';
        $article .= $row["category_name"];
        $article .= '</td><td>';
        $article .= $row["revenue"];
        $article .= '</td></tr>';
    }

    mysqli_free_result($result);
    mysqli_close($link);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>카테고리별 총 수입</title>
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
    <h2><a href="index.php">Film & Actor</a> | 카테고리별 총 수입</h2>
    <hr>
    <table>
        <tr>
            <th>category_name</th>
            <th>revenue</th>
        </tr>
        <?= $article ?>
    </table>
</body>

</html>
