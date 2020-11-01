<?php
  $link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');
  $query = "SELECT * FROM actor_info ORDER BY actor_id" ;
  $result = mysqli_query($link, $query);

  $actor_info = '';
  while($row = mysqli_fetch_array($result)) {

    $film_info = str_replace(";", "\n", $row['film_info']);

    //$actor_name = "select upper(concat(first_name, ' ', last_name)) 'Actor Name' from actor";

    $actor_info .= '<tr>';
    $actor_info .= '<td>'.$row['actor_id'].'</td>';
    $actor_info .= '<td>'.$row['first_name'].'</td>';
    $actor_info .= '<td>'.$row['last_name'].'</td>';
    $actor_info .= "<td>".nl2br($film_info)."</td>";
    $actor_info .= '</tr>';
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
            <th>actor_id</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>film_info</th>
        </tr>
        <?= $actor_info ?>
    </table>
</body>

</html>
