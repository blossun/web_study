<?php
function print_title(){
  if(isset($_GET['id'])){
    echo htmlspecialchars($_GET['id']);
  }else{
    echo "Welcome";
  }
}
function print_content(){
  if(isset($_GET['id'])){
    $basename = basename($_GET['id']);
    echo htmlspecialchars(file_get_contents('./data/'.$basename));
  }else{
    echo "This is Javakong Homepage.";
  }
}
function file_list(){
  $list = scandir('./data/');
  $i=0;
  while($i<count($list)){
    $title = htmlspecialchars($list[$i]);
    if($list[$i] != '.'){
      if($list[$i] != '..'){
        echo "<li><h3><a href=\"index.php?id=$title\">$title</a></h3></li>\n";
      }
    }
    $i++;
  }
}
?>
