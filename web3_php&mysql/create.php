<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  '111111',
  'opentutorials');

$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
$list = '';
while($row = mysqli_fetch_array($result)){
  //<li><a href="index.php?id=10">MySQL</a></li>
  $list = $list."<li><a href='index.php?id={$row['id']}'>{$row['title']}</a></li>";
}

# id값이 없을경우, default로 보여줄 본문 내용
$article = array(
  'title'=>'Welcome',
  'description'=>'Hello, web'
);

if(isset($_GET['id'])){
  $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
  $sql = "SELECT * FROM topic WHERE id=$filtered_id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  $article['title']=$row['title'];
  $article['description']=$row['description'];
}
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>WEB</title>
  </head>
  <body>
    <h1><a href="index.php">WEB</a></h1>
    <ol>
      <?=$list?>
    </ol>
    <form action="process_create.php" method="POST">
      <p><input type="text" name="title" placeholder="title"></p>
      <p><textarea name="description" placeholder="description"></textarea></p>
      <p><input type="submit"></p>
    </form>
  </body>
</html>
