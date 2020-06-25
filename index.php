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


      <!-- ======= Intro Section ======= -->
      <!-- https://codepen.io/dfitzy/pen/xZqGVo 슬라이드 cdn 참고 -->
      <section class="main_section">
        <div class="slider">
          <div class="slide_viewer">
            <div class="slide_group">
              <div class="slide">
                <img src="img/wave_8.png" alt="">
                <div class="main_text">
                  <p>BEST OFFER</p>
                  <h1>NEW ARRIVALS ON SALE</h1>
                </div>
              </div>
              <div class="slide">
                <img src="img/wave_3.png" alt="">
                <div class="main_text">
                  <p>BEST OFFER</p>
                  <h1>NEW ARRIVALS ON SALE</h1>
                </div>
              </div>
              <div class="slide">
                <img src="img/wave_11.png" alt="">
                <div class="main_text">
                  <p>BEST OFFER</p>
                  <h1>NEW ARRIVALS ON SALE</h1>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End // .slider -->

        <!-- ======= Latest Section ======= -->
      <section class="latest">
        <div class="center">
          <div class="section_title clear">
            <h2 class="title">Latest Products</h2>
            <p class="more"><a href="products.php">VIEW ALL PRODUCTS</a></p>
          </div>
          <div class="latest_items clear">

            <?php

              $con=mysqli_connect("localhost", "wanna", "vldrm4523!", "wanna");
              $sql="select * from products order by num desc limit 3";
              $result=mysqli_query($con, $sql);

              while($row=mysqli_fetch_array($result)){
                $img=$row["img"];
                $title=$row["title"];
                $price=$row["price"];
                $description=$row["description"];

            ?>

            <div class="item">
              <div class="item_pic">
                <img src="img/<?=$img?>" alt="">
              </div>
              <div class="item_txt">
                <div class="txt_title clear">
                  <h3><?=$title?></h3>
                  <p><?=$price?></p>
                </div>
                <em class="descrip"><?=$description?></em>
                <div class="star">
                  <span><i class="fa fa-star"></i></span>
                  <span><i class="fa fa-star"></i></span>
                  <span><i class="fa fa-star"></i></span>
                  <span><i class="fa fa-star"></i></span>
                </div>
              </div>
            </div><!-- End item -->

            <?php
              }
            ?>

          </div><!-- End latest_items -->
        </div>
      </section><!-- End latest section -->

      <!-- ======= About Section ======= -->
      <section class="about">
        <div class="center clear">
          <div class="section_title clear">
            <h2 class="title">About WAVE</h2>
          </div>
          <div class="about_right">
            <img src="img/feature-image.jpg" alt="">
          </div>
          <div class="about_left">
            <h3>Looking for the best products?</h3>
            <em>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</em>
            <ul class="about_exp">
              <li>page when looking at its layout.</li>
              <li>some form, by injected humour,</li>
              <li>The first line of Lorem Ipsum</li>
              <li>Lorem Ipsum passage, and going through the cites</li>
              <li>The generated Lorem Ipsum is therefore always</li>
            </ul>
            <a href="#" class="read_more">Read More</a>
          </div>
        </div>
      </section><!-- End about section -->

      <!-- ======= Purchase Section ======= -->
      <section class="purchase">
        <div class="center">
          <div class="purchase_box clear">
            <div class="purchase_txt">
              <h3>Creative & Unique <span>WAVE</span> Products</h3>
              <em>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</em>
            </div>
            <a href="#" class="read_more">Purchase Now</a>
          </div>
        </div>
      </section><!-- End purchase section -->



      <!----------------------------------->
      <!----------------------------------->
      <?php include  "include/footer.php"?>

    </div> <!-- end wrap  -->


    <!-- Livraries JS Files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Main JS Files -->
    <script type="text/javascript" src="js/custom.js?<?php echo time(); ?>"></script>
    <script type="text/javascript">

      $(document).ready(function(){

        var txt_len=$(".descrip").text();
        $(".descrip").text(txt_len.slice(0, 100)+"...");

      });

    </script>
  </body>
</html>
