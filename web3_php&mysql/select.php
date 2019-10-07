<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  '111111',
  'opentutorials');
// 1 row
echo "<h1>single row</h1>";
$sql = "SELECT * FROM topic WHERE id=10";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
echo '<h1>'.$row['title'].'</h1>';
echo $row['description'];

// all rows
echo "<h1>multi row</h1>";
$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)) { #데이터가 있다면 반 - 모든행을 가져온다.
  echo '<h2>'.$row['title'].'</h2>';
  echo $row['description'];
}
?>
