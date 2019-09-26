<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1><a href="index.php">Javakong</h1>
    <ol>
      <?php
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
       ?>
    </ol>
    <h2>
      <?php
      if(isset($_GET['id'])){
        echo $_GET['id'];
      }else{
        echo "Welcome";
      }
      ?>
    </h2>
    <?php
      if(isset($_GET['id'])){
        echo file_get_contents('./data/'.$_GET['id']);
      }else{
        echo "This is Javakong Homepage.";
      }
     ?>
  </body>
</html>
