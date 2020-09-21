<?php
  $link = mysqli_connect("localhost", "root", "000000", "test");
$filtered = array(
  'no' => mysqli_real_escape_string($link, $_POST['no']),
  'name' => mysqli_real_escape_string($link, $_POST['name']),
  'roll' => mysqli_real_escape_string($link, $_POST['roll'])
)
  $query = "
  UPDATE kia
  SET
    no='{$filterd['no']}',
    name='{$filterd['name']}',
    roll='{$filterd['roll']}'
    WHERE
    id='{$filterd['id']}'

  ";

  $result = mysqli_multi_query($link, $query);
  if($result == false){
  echo '수정하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
  error_log(mysqli_error($link));
} else {
  echo '성공했습니다. <a href="index.php">돌아가기</a>';
}

?>
