<?php
  $link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');

if(isset($_GET['customer_id'])){
    $filtered_id = mysqli_real_escape_string($link, $_GET['customer_id']);
} else {
    $filtered_id = mysqli_real_escape_string($link, $_POST['customer_id']);
}

$query = "
        select cus.customer_id, first_name, last_name, title, name
        from rental ren
        inner join customer cus on cus.customer_id = ren.customer_id
        inner join inventory inv on inv.inventory_id = ren.inventory_id
        inner join film f on f.film_id = inv.film_id
        inner join film_category film_ca on film_ca.film_id = f.film_id
        inner join category ca on ca.category_id = film_ca.category_id
        where cus.customer_id = '{$filtered_id}'
        group by ca.category_id;
        ";

  $result = mysqli_query($link, $query);

  $customer_info = '';

  while($row = mysqli_fetch_array($result)) {
    $customer_info .= '<tr>';
    $customer_info .= '<td>'.$row['customer_id'].'</td>';
    $customer_info .= '<td>'.$row['first_name'].'</td>';
    $customer_info .= '<td>'.$row['last_name'].'</td>';
    $customer_info .= '<td>'.$row['title'].'</td>';
    $customer_info .= '<td>'.$row['name'].'</td>';
    $customer_info .= '</tr>';
  }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Film & Actor</title>
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
    <h2><a href="index.php">Film & Actor</a> | Actor 정보 조회</h2>
    <table>
        <tr>
            <th>customer_id</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>title</th>
            <th>name</th>
        </tr>
        <?= $customer_info ?>
    </table>
</body>

</html>
