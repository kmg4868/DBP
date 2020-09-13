<?php
  $link = mysqli_connect("localhost", "root", "000000", "test");
  $query = "
    INSERT INTO kia
      (no, name, roll)
      VALUES (
        '{$_POST['no']}',
        '{$_POST['name']}',
          '{$_POST['roll']}'
        )
  ";

  $result = mysqli_query($link, $query);
  if($result == false){
  echo '저장하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
  error_log(mysqli_error($link));
} else {
  echo '성공했습니다. <a href="index.php">돌아가기</a>';
}

?>
