<?php
  $link = mysqli_connect("localhost", "root", "000000", "test");
$filtered = array(
  'aname' => mysqli_real_escape_string($link, $_POST['aname']),
  'profile' => mysqli_real_escape_string($link, $_POST['profile'])

);

  $query = "
    INSERT INTO author
      (aname, profile)
      VALUES (
        '{$filtered['aname']}',
        '{$filtered['profile']}'
        )
  ";

  $result = mysqli_query($link, $query);
  if($result == false){
  echo '저장하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
  error_log(mysqli_error($link));
} else {
  header('Location: author.php');
}

?>
