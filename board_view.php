<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">

    <title>WAVE</title>
    <meta name="keywords" content="swimsuit, bikini, 포트폴리오, wanna, 이원화">
    <meta name="descriptison" content="이원화의 swimsuit, bikini shop 포트폴리오 사이트 입니다.">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon_io/favicon-16x16.png">

    <!-- Awesome Font & Google Fonts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400&display=swap" rel="stylesheet">

    <!-- Main CSS Files -->
    <link rel="stylesheet" href="css/reset.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/style.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/media.css?<?php echo time(); ?>">
  </head>
  <body>

    <div class="wrap">

      <?php include  "include/header.php"?>
      <!----------------------------------->
      <!----------------------------------->


      <section class="main_img">
        <img src="img/wave_13.png" alt="">
        <div class="main_text">
          <p>Q & A</p>
            <h1>SHARE YOUR UNIQUE IDEAS!</h1>
        </div>
      </section><!-- end main img section -->

      <section class="board_input">
        <div class="center">
          <div class="section_title clear">
            <h2 class="title">Q & A Details!</h2>
          </div>

          <?php

            $num=$_GET["num"];

            $con=mysqli_connect("localhost", "wanna", "vldrm4523!", "wanna");
            $sql="select * from qna where num=$num";
            $result=mysqli_query($con, $sql);
            $row=mysqli_fetch_array($result);

            $num=$row["num"];
            $name=$row["name"];
            $subject=$row["subject"];
            $content=$row["content"];
            $hit=$row["hit"];

            // str_replace("바꾸려는부분", "바꾸려는 문자?", 해당부분);
            $content=str_replace(" ", "&nbsp", $content);
            $content=str_replace("\n", "<br>", $content);

            $new_hit=$hit+1;

            $sql="update qna set hit=$new_hit where num=$num";
            mysqli_query($con, $sql);

          ?>

          <ul class="board_form">
            <li class="clear">
              <span class="col1">이름</span>
              <span class="col2"><input type="text" name="name" value="<?=$name?>" readonly></span>
            </li>
            <li class="clear">
              <span class="col1">제목</span>
              <span class="col2"><input type="text" name="subject" value=<?=$subject?> readonly></span>
            </li>
            <li class="text_area clear">
              <span class="col1">내용</span>
              <span class="col2"><textarea name="content"><?=$content?></textarea></span>
            </li>
          </ul>
          <ul class="buttons">
            <li><button type="button" onclick="location.href='board_form.php'">BACK</button></li>

          <?php
            $sql="select * from answer where content_num='$num'";
            $answer_res=mysqli_query($con, $sql);
            $answer_row=mysqli_fetch_array($answer_res);

            if($answer_row || $userlevel !=1){
          ?>

            <input type="hidden">

          <?php
            }else{
          ?>

            <li><button type="button" onclick="location.href='answer_form.php?num=<?=$num?>'">REPLY</button></li>

          <?php
            }
          ?>

          </ul>

        </div><!-- end center -->
      </section>



      <!----------------------------------->
      <!----------------------------------->
      <?php include  "include/footer.php"?>

    </div> <!-- end wrap  -->

    <!-- Livraries JS Files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Main JS Files -->
    <script type="text/javascript" src="js/custom.js"></script>

  </body>
</html>
