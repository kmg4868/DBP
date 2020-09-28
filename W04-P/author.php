<?php
    $link = mysqli_connect('localhost', 'root', '000000', 'test');

    $query = "SELECT * FROM author";
    $result = mysqli_query($link, $query);
    $author_info='';

    while($row = mysqli_fetch_array($result)){
        $filtered = array(
            'id' => htmlspecialchars($row['id']),
            'aname' => htmlspecialchars($row['aname']),
            'profile' => htmlspecialchars($row['profile'])
        );
        $author_info.='<tr>';
        $author_info .='<td>'.$filtered['id'].'</td>';
        $author_info .='<td>'.$filtered['aname'].'</td>';
        $author_info .='<td>'.$filtered['profile'].'</td>';
        $author_info .= '<td><a href="author.php?id='.$filtered['id'].'">update</a></td>';
$author_info .='<td>
<form action="process_delete_author.php" method="post"><input type="hidden" name="id" value="'.$filtered['id'].'">
<input type="submit" value="delete">
</form>
</td>';
        $author_info.='</tr>';
};

$escaped = array(
  'aname' => '',
  'profile' => ''
);

$form_action = 'process_create_author.php';
$label_submit = 'Create author';
$form_id='';

if(isset($_GET['id'])) {
    $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
    settype($filtered_id, 'integer');
    $query = "SELECT * FROM author WHERE id = {$filtered_id}";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $escaped['aname'] = htmlspecialchars($row['aname']);
    $escaped['profile'] = htmlspecialchars($row['profile']);

    $form_action = 'process_update_author.php';
    $label_submit = 'Update author';
    $form_id='<input type="hidden" name="id" value="'.$_GET['id'].'">';
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>DATABASE</title>
    </head>
    <body>
        <h1><a href="index.php">DATABASE</a></h1>
        <p><a href="index.php">kia</a></p>

        <table border="1">
    <tr>
        <th>id</th>
        <th>aname</th>
        <th>profile</th>
        <th>update</th>
        <th>delete</th>
    </tr>
    <tr>
      <?=$author_info ?>
    </tr>
    </table>
    <br>
<form action="<?=$form_action?>" method="post">
  <?=$form_id?>
  <label for="fname">aname:</label><br>
    <input type="text" id="aname" name="aname" placeholder="aname" value="<?=$escaped['aname']?>"><br>
    <label for="lname">profile:</label><br>
    <input type="text" id="profile" name="profile" placeholder="profile" value="<?=$escaped['profile']?>" ><br><br>
    <input type="submit" value="<?=$label_submit?>">
  </form>

    </body>
</html>
