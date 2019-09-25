<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h1>Conditional</h1>
    <?php #시간의 순서에 따라서 동작한다
      echo '1<br>';
      if(false){ //조건이 true일 때 싪행
        echo '2-1<br>';
      }else{  //조건이 false일 때 실행
        echo '2-2<br>';
      }
      echo '3<br>';

     ?>
  </body>
</html>
