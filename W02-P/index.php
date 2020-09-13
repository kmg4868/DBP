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
    <h1>KIA 타이거즈</h1>
    <ol><?=$list ?><ol>
    <a href="create.php">create</a>
<p></p>
    <?=$article['no']?>
    <?=$article['name']?>
    <?=$article['roll']?>
  </body>
</html>
