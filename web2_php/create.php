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
    <form action="create_process.php" method="post">
      <p><input type="text" name="title" placeholder="Title"></p>
      <p><textarea name="description" placeholder="Description"></textarea></p>
      <p><input type="submit"></p>
    </form>
  </body>
</html>
