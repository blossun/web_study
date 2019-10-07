<?php
#var_dump($_POST); #정보가 잘 받아와 지는지 확인
#mysql 접속 정보를 $conn변수에 저장
$conn = mysqli_connect(
  'localhost',
  'root',
  '111111',
  'opentutorials');
# 실서버에서 관리자 계정을 사용하는 것은 위험하다.
# 최소한으로 필요한 권한만을 가진 사용자를 별도로 만들어서 사용할 것
$sql = "
  INSERT INTO topic
    (title, description, created)
    VALUES(
        '{$_POST['title']}',
        '{$_POST['description']}',
        NOW()
    )
";
# 사용자가 입력한 데이터 전송값이 sql문에 직접 들어가도록 되어있다.
# 악의적인 사용자에게 공격포인트가 될 수 있다.
# DB 삭제, 루트비밀번호 획득 등. sql injection 공격의 인젝션포인트가 될 수 있다.

#echo $sql; #제대로 sql문이 생성되고 있는지 확인
# query 의 실행 결과를 확인
$result = mysqli_query($conn, $sql);
if($result === false){
  echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
  #에러를 DB 서버측에 로그로 기록(사용자가 접근할 수 없는 위치)
  #에러메시지를 사용자에게 절대 보여주면 안 됨.
  error_log(mysqli_error($conn));
} else {
  echo '성공했습니다. <a href="index.php">돌아가기</a>';
}
?>
