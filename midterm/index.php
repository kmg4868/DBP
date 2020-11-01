<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Film & Actor </title>
    <style>
        body {
            font-family: arial, sans-serif;
            font-family: 10px;
        }
        table {
            border-collapse: collapse;
            margin: 5%;
        }
        th, td {
            padding: 10px;
            border: 1px solid;
            border-collapse: collapse;
        }
        </style>
</head>

<body>
    <center><h1> Film & Actor </h1></center>
    <hr>
        <a href="actor_info.php">(1) Actor 정보 조회</a><br><br>
        <form action="actor_search.php" method="POST">
            (2) Actor 정보 검색<br>
            <input type="text" name="actor_id" placeholder="actor_id">
            <input type="submit" value="Search">
        </form><br>
        <a href="customer_info.php">(3) customer 정보 </a><br><br>

        <form action="rental_list.php" method="POST">
        (4) rental list 조회 <br>
        <input type="text" name="customer_id" placeholder="customer_id">
            <input type="submit" value="Search">
        </form><br>

        <a href="film_info.php">(5) film 정보</a><br><br>
        <a href="total_revenue.php">(6) 카테고리별 총 수입</a><br>
</body>

</html>
