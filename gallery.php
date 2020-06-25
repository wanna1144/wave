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
    <link rel="stylesheet" href="css/lib/colorbox.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/style.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/media.css?<?php echo time(); ?>">
  </head>
  <body>

    <div class="wrap">

      <?php include  "include/header.php"?>
      <!----------------------------------->
      <!----------------------------------->



      <section class="main_img">
        <img src="img/poto_4.png" alt="">
        <div class="main_text">
          <p>Gallery</p>
          <h1>ART AND STYLISH COLLECTION!</h1>
        </div>
      </section><!-- end main img section -->

      <section class="gallery">
        <div class="center">
          <div class="section_title clear">
            <h2 class="title">Gallery</h2>
          </div>
          <div class="page_main">
            <ul id="gallery">
              <li class="gallery-size"></li>

            </ul>
            <div class="gallery_btns">
              <button class="load_more" id="load_more">Load More</button>
              <?php

                if(!$userid){
                  echo "
                    <button class='load_more' onclick='plzLog()'>Upload Image</button>
                  ";
                } else {
                  echo "
                    <button class='load_more' onclick='goToWrite()'>Upload Image</button>
                  ";
                }
               ?>
            </div>
          </div>
        </div>
      </section>



      <!----------------------------------->
      <!----------------------------------->
      <?php include  "include/footer.php"?>

    </div> <!-- end wrap  -->

    <!-- Livraries JS Files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/lib/masonry.js"></script>
    <script type="text/javascript" src="js/lib/imagesloaded.pkgd.min.js"></script>
    <script type="text/javascript" src="js/lib/jquery.colorbox-min.js"></script>

    <!-- Main JS Files -->
    <script type="text/javascript" src="js/custom.js"></script>
    <script type="text/javascript">

      function plzLog(){
        alert("로그인 해주세요!");
      }

      function goToWrite(){
        location.href="img_upload.php";
      }

      $(document).ready(function(){

        var container=$("#gallery");
        var count =0;

        container.masonry({
          itemSelector:'.gallery_item', //클래스명 지정
          //gutter:10, 사진 사이의 간격(px)
          columnWidth:'.gallery-size', //직접 퍼센트값 입력이 안됨. css에 지정한 값을 가져옴.
          percentPosition:true
        });

        $.getJSON('json_data/contents.json', function(data){

          function addItems(){

            var elements =[];
            var sliceItems=data.slice(count, count+5);
            $.each(sliceItems, function(i, item){
              var itemHTML=
              '<li class="gallery_item">'+
                '<a href="json_data/imgs/'+item.large+'">'+
                  '<img src="json_data/imgs/'+item.thumb+'" alt="">'+
                  '<span class="inner">'+item.title+'</span>'+
                '</a>'+
              '</li>';
              elements.push($(itemHTML).get(0));
            });
            container.append(elements);
            //append를 사용하면 하위요소를 div로 한번 더 감싸줌.
            container.imagesLoaded(function(){
              container.masonry('appended', elements);
            });

            container.find("a").colorbox({
              maxWidth:'80%',
              maxHeight:'80%',
              title:function(){
                return $(this).find('.inner').html();
              }
            });

            count=count+5;
            var imgs_len=data.length;

            if(count > imgs_len){
              $("#load_more").hide();
            } else {
              $("#load_more").show();
            }
          }

          addItems();

          $("#load_more").on("click", addItems);
          $("#load_more").on("click", function(){
            var bottom=$(".gallery").height();
            $("html, body").animate({"scrollTop":bottom},400)
          });
        });

      });

    </script>
  </body>
</html>
