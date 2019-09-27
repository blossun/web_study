<?php
  require_once('./lib/print.php');
  require('./view/top.php');
 ?>
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
<?php require('./view/bottom.php');?>
