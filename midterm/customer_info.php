<?php
  $link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');
  $query = "
  select cus.customer_id, first_name, last_name, email, address, Total_Amount_Pay
    from customer cus
    inner join total_amount_pay tap on cus.customer_id = tap.customer_id
  inner join address ad on cus.address_id = ad.address_id;" ;
  $result = mysqli_query($link, $query);

  $customer_info = '';
  while($row = mysqli_fetch_array($result)) {

    $customer_info .= '<tr>';
    $customer_info .= '<td>'.$row['customer_id'].'</td>';
    $customer_info .= '<td>'.$row['first_name'].'</td>';
    $customer_info .= '<td>'.$row['last_name'].'</td>';
    $customer_info .= "<td>".$row['email']."</td>";
    $customer_info .= "<td>".$row['address']."</td>";
    $customer_info .= "<td>".$row['Total_Amount_Pay']."</td>";
    $customer_info .= '</tr>';
  }
/* create view total_amount_pay as
select cus.customer_id, sum(pay.amount) 'Total_Amount_Pay'
from payment pay
join customer cus on pay.customer_id = cus.customer_id
group by cus.customer_id ;
*/
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
    <h2><a href="index.php">Film & Actor</a> | Customer 정보 조회</h2>
    <table>
        <tr>
            <th>customer_id</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>email</th>
            <th>address</th>
            <th>Total_Amount_Pay</th>
        </tr>
        <?= $customer_info ?>
    </table>
</body>
</html>
