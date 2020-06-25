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
        <img src="img/wave_6.png" alt="">
        <div class="main_text">
          <p>PRODUCTS DETAILS</p>
          <h1>BEST QUALITY AND CUSTOM MADE!</h1>
        </div>
      </section><!-- end main img section -->

      <section class="products">
        <div class="center">
          <div class="section_title clear">

            <?php

              $num=$_GET["num"];

              $con=mysqli_connect("localhost", "wanna", "vldrm4523!", "wanna");
              $sql="select * from products where num=$num";
              $result=mysqli_query($con, $sql);

              while($row=mysqli_fetch_array($result)){
                $img=$row["img"];
                $title=$row["title"];
                $price=$row["price"];
                $description=$row["description"];

            ?>

            <h2 class="title"><?=$title?></h2>
          </div>
          <div class="items">
            <div class="detail_box clear">
              <div class="detail_left">
                <img src="img/<?=$img?>" alt="">
              </div>
              <div class="detail_right">
                <p>가격 : <?=$price?></p>
                <b><?=$description?></b>
                <button class="buy_btn">구매하기</button>
              </div>
            </div>
          </div> <!-- end items -->

          <?php
            }
          ?>

        </div> <!-- end center -->
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
