<?php
function print_title(){
  if(isset($_GET['id'])){
    echo $_GET['id'];
  }else{
    echo "Welcome";
  }
}
function print_content(){
  if(isset($_GET['id'])){
    echo file_get_contents('./data/'.$_GET['id']);
  }else{
    echo "This is Javakong Homepage.";
  }
}
function file_list(){
  $list = scandir('./data/');
  $i=0;
  while($i<count($list)){
    if($list[$i] != '.'){
      if($list[$i] != '..'){
        echo "<li><h3><a href=\"index.php?id=$list[$i]\">$list[$i]</a></h3></li>\n";
      }
    }
    $i++;
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php print_title();?></title>
  </head>
  <body>
    <h1><a href="index.php">Javakong</h1>
    <ol>
      <?php
        file_list();
       ?>
    </ol>
    <a href="create.php">create</a>
    <!-- 게시글 클릭 시만 update 노출  -->
    <?php if(isset($_GET['id'])){ #id값이 있는 경우 true ?>
            <!-- <a href="update.php?id=<?php #echo $_GET['id'];?>">update</a> -->
            <a href="update.php?id=<?=$_GET['id']?>">update</a>
            <!-- GET 방식 삭제 안 됨. -->
            <!-- <a href="delete_process.php?id=<?=$_GET['id']?>">delete</a> -->
            <!-- POST 방식으로 삭제할 것 -->
            <form action="delete_process.php" method="post">
              <input type="hidden" name="id" value="<?=$_GET['id']?>">
              <input type="submit" value="delete">
            </form>
    <?php }?>

    <h2>
      <?php
        print_title();
      ?>
    </h2>
    <?php
        print_content();
     ?>
  </body>
</html>