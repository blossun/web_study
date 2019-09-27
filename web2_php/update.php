<?php
  require('./lib/print.php');
  require('./view/top.php');
 ?>
    <a href="create.php">create</a>
    <!-- 게시글 클릭 시만 update 노출  -->
    <?php if(isset($_GET['id'])){ #id값이 있는 경우 true ?>
            <!-- <a href="update.php?id=<?php #echo $_GET['id'];?>">update</a> -->
            <a href="update.php?id=<?=$_GET['id']?>">update</a>
    <?php }?>
    <form action="update_process.php" method="post">
      <input type="hidden" name="old_title" value="<?=$_GET['id']?>">
      <p><input type="text" name="title" placeholder="Title" value="<?php print_title(); ?>"></p>
      <p><textarea name="description" placeholder="Description"> <?php print_content();?></textarea></p>
      <p><input type="submit"></p>
    </form>
<?php require('./view/bottom.php');?>
