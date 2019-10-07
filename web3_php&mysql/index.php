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

if(isset($_GET['id'])){ # id 값이 존재할 경우에만 본문내용을 가져오도록 한다.
  $sql = "SELECT * FROM topic WHERE id={$_GET['id']}"; #id 값에 따라 데이터를 가져온다.
  echo $sql;
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result); #하나의 행만 가져오고 있으므로 반복문 사용 없이 한번만 호출해주면 된다.
  $article['title']=$row['title'];
  $article['description']=$row['description'];
  // $article = array(
  //   'title'=>$row['title'],
  //   'description'=>$row['description']
  // );
}
// print_r($article);
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
    <a href="create.php">create</a>
    <h2><?=$article['title']?></h2>
    <?=$article['description']?>
  </body>
</html>
