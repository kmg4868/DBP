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
$update_link='';
$delete_link='';
$author='';

  if(isset($_GET['id'])){
    $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
    $query = "SELECT * FROM kia LEFT JOIN author ON kia.author_id = author.id WHERE kia.id={$filtered_id}";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);

    $article = array(
      'no' => $row['no'],
      'name' => $row['name'],
      'roll' => $row['roll'],
      'aname' => $row['aname']
    );


    $update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';
    $delete_link = '
      <form action="process_delete.php" method="POST">
        <input type="hidden" name="id" value="'.$_GET['id'].'">
        <input type="submit" value="delete">
      </form>
      ';
      $author = "<p>by{$article['aname']}</p>";
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
    <a href="author.php">author</a>
    <ol><?=$list ?><ol>
    <a href="create.php">create</a>
    <?=$update_link?>
    <?=$delete_link?>
<p></p>
    <?=$article['no']?>
    <?=$article['name']?>
    <?=$article['roll']?>
    <?= $author ?>
  </body>
</html>
