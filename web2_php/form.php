<?php
  // echo var_dump($_GET);
  // file_put_contents('./data/'.$_GET['title'], $_GET['description']);
  echo var_dump($_POST);
  file_put_contents('./data/'.$_POST['title'], $_POST['description']);
?>
