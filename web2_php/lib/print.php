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
