<?php
  $link = mysqli_connect('localhost', 'root', '000000', 'test');
  $query = "SELECT * FROM kia";
  $result = mysqli_query($link, $query);
  $list ='';

  while ($row = mysqli_fetch_array($result)) {
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['name']}</a></li>";
  }
  $article =array(
    'no' => 2020,
    'name' => 'KIA 타이거즈',
    'roll' => '선수 정보'
  );

if(isset($_GET['id'])){
  $query = "SELECT * FROM kia WHERE id={$_GET['id']}";
  $result = mysqli_query($link, $query);
  $row = mysqli_fetch_array($result);
  $article = array(
    'no' => $row['no'],
    'name' => $row['name'],
    'roll' => $row['roll']
  );
}
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>KIA 타이거즈</title>
</head>
<body>
  <h1><a href="index.php">KIA 타이거즈</a></h1>
    <ol><?= $list ?></ol>

  <form action="process_create.php" method="POST">
  <p><input type="text" name="no" placeholder="no."></p>
  <p><input type="text" name="name" placeholder="name"></p>
  <p><input type="text" name="roll" placeholder="roll"></p>

  <p><input type="submit"></p>
</body>
</htm>
