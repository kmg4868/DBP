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
  $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
  $query = "SELECT * FROM kia WHERE id={$filtered_id}";
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

  <form action="process_update.php" method="POST">
    <inpuut type="hidden" name="id" value="<?=$filtered_id?>">
  <p><input type="text" name="no" placeholder="no." value="<?=$article['no']?>"></p>
  <p><input type="text" name="name" placeholder="name" value="<?=$article['name']?>"></p>
  <p><input type="text" name="roll" placeholder="roll" value="<?=$article['roll']?>"></p>

  <p><input type="submit"></p>
</body>
</htm>
