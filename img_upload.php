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
        <img src="img/poto_4.png" alt="">
        <div class="main_text">
          <p>Image Upload</p>
          <h1>SHARE YOUR BEAUTIFUL IMAGES!</h1>
        </div>
      </section><!-- end main img section -->

      <section class="input_view">
        <div class="center">
          <div class="section_title clear">
            <h2 class="title">Image Upload</h2>
          </div>
          <form class="clear" action="php/img_insert.php" method="post" enctype="multipart/form-data" name="form_data">
            <div class="upload_tit">
              <label for="title">제목</label>
              <input type="text" name="title" id="title">
            </div>
            <div class="input_left">
              <div class="filebox">
                <input class="upload_name" value="thumbnail image">
                <label for="input_img1">업로드</label>
                <input type="file" name="thumb" id="input_img1" class="upload-hidden">
              </div>
              <div class="img_wrap1">
                <img id="img1">
              </div>
            </div>
            <div class="input_right">
              <div class="filebox">
                <input class="upload_name" value="large image">
                <label for="input_img2">업로드</label>
                <input type="file" name="large" id="input_img2" class="upload-hidden">
              </div>
              <div class="img_wrap1">
                <img id="img2">
              </div>
            </div>
          </form>
          <button type="submit" class="upload_btn" onclick="imgSubmit()">올리기</button>
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
          var sel_file;
          $(document).ready(function(){

            var fileTarget = $('.filebox .upload-hidden');
            fileTarget.on('change', function(){ // 값이 변경되면
              if(window.FileReader){
                // modern browser
                var filename = $(this)[0].files[0].name; } else {
                  // old IE
                var filename = $(this).val().split('/').pop().split('\\').pop();
                // 파일명만 추출
              }
              // 추출한 파일명 삽입
              $(this).siblings('.upload_name').val(filename);
            });
            $("#input_img1").on("change", handleImgFileSelect);
            $("#input_img2").on("change", handleImgFileSelect1);
          })
            function handleImgFileSelect(e){
              var files=e.target.files;
              var filesArr=Array.prototype.slice.call(files);

              filesArr.forEach(function(f){
                if(!f.type.match("image.*")){
                  return;
                }
                sel_file=f;
                var reader=new FileReader();
                reader.onload=function(e){
                  $("#img1").attr("src", e.target.result);
                }
                reader.readAsDataURL(f);
              });
            }

            function handleImgFileSelect1(e){
              var files=e.target.files;
              var filesArr=Array.prototype.slice.call(files);

              filesArr.forEach(function(f){
                if(!f.type.match("image.*")){
                  return;
                }
                sel_file=f;
                var reader=new FileReader();
                reader.onload=function(e){
                  $("#img2").attr("src", e.target.result);
                }
                reader.readAsDataURL(f);
              });
            }

            function imgSubmit(){
              document.form_data.submit();
            }

        </script>

  </body>
</html>
