<?php
  $link = mysqli_connect("localhost", "root", "000000", "test");
$filtered = array(
  'id' => mysqli_real_escape_string($link, $_POST['id']),
  'aname' => mysqli_real_escape_string($link, $_POST['aname']),
  'profile' => mysqli_real_escape_string($link, $_POST['profile'])
);

  $query = "
  UPDATE author
  SET
    aname='{$filtered['aname']}',
    profile='{$filtered['profile']}'
    WHERE
    id='{$filtered['id']}'

  ";

  $result = mysqli_query($link, $query);
  if($result == false){
  echo '수정하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
  error_log(mysqli_error($link));
} else {
  header('Location: author.php');
}

?>
