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

      <section class="qna">
        <div class="center">
          <div class="section_title clear">
            <h2 class="title">Write Your Questions!</h2>
          </div>

          <div class="board_box">
            <ul class="board_list" id="board_list">

            </ul>
          </div>

          <div class="search_write clear">
            <div class="search">
              <form class="search_form clear" action="search_form.php" method="post">
                <select name="search_select">
                  <option value="name">이름</option>
                  <option value="subject">제목</option>
                </select>
                <input type="text" name="subject">
                <button type="submit"><i class="fa fa-search"></i></button>
              </form>
            </div>
            <div class="write">

              <?php
                if(!$userid){
              ?>

              <button type="button" name="button" class="write_btn" onclick="javascript:alert('로그인 해주세요!')">글쓰기</button>

              <?php
                }else{
              ?>

              <button type="button" name="button" class="write_btn" onclick="location.href='board_input_form.php'">글쓰기</button>

              <?php
                }
              ?>

            </div>
          </div>

          <div class="numbering" id="numbering">
            <span onclick="first()"><<</span>
            <span onclick="minus()"><</span>

            <?php

              $con=mysqli_connect("localhost", "wanna", "vldrm4523!", "wanna");
              $sql="select * from qna order by num desc";
              $result=mysqli_query($con, $sql);
              $total_record=mysqli_num_rows($result);
              $scale=4;

              if($total_record % $scale == 0){
                $total_page=floor($total_record/$scale);
                //floor는 소숫점 자르기
              }else{
                $total_page=floor($total_record/$scale)+1;
              }

              for($i=1; $i<=$total_page; $i++){


            ?>

            <span class="num" onclick="get_page('<?=$i?>')"><?=$i?></span>

            <?php
              }
            ?>

            <span onclick="plus()">></span>
            <span onclick="last()">>></span>
          </div>

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
    <script type="text/javascript">

      var val=1;

      $(document).ready(function(){

        $.get("php/board_ajax.php", {page:1}, function(data){
          $("#board_list").html(data);
          $(".num").eq(0).addClass("active");
        });

      });

      function get_page(no){
        $(".num").removeClass("active");
        $(".num").eq(no-1).addClass("active");
        $.get("php/board_ajax.php", {page:no}, function(data){
          $("#board_list").html(data);
          val=no;
        });
      }

      function minus(){
        if(val==1){
          get_page(1);
        }else{
          get_page(val-1);
        }
      }

      function plus(){
        var numbering=$(".num").length;
        if(val==numbering){
          get_page(numbering);
        }else{
          get_page(val+1);
        }
      }

      function first(){
        get_page(1);
      }

      function last(){
        var numbering=$(".num").length;
        get_page(numbering);
      }


    </script>
  </body>
</html>
