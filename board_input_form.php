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
            <h2 class="title">Write Your Question!</h2>
          </div>

          <form name="board_input_form" action="php/board_insert.php" method="post">
            <ul class="board_form">
              <li class="clear">
                <span class="col1">이름</span>
                <span class="col2"><input type="text" name="name" value="<?=$username?>" readonly></span>
              </li>
              <li class="clear">
                <span class="col1">제목</span>
                <span class="col2"><input type="text" name="subject"></span>
              </li>
              <li class="text_area clear">
                <span class="col1">내용</span>
                <span class="col2"><textarea name="content"></textarea></span>
              </li>
            </ul>
            <ul class="buttons">
              <li><button type="button" onclick="check_input()">SEND</button></li>
              <li><button type="button" onclick="location.href='board_form.php'">BACK</button></li>
            </ul>
          </form>
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

      function check_input(){

        if(!document.board_input_form.name.value){
          alert("이름을 입력해 주세요!");
          document.board_input_form.name.focus();
          return;
        }

        if(!document.board_input_form.subject.value){
          alert("제목을 입력해 주세요!");
          document.board_input_form.subject.focus();
          return;
        }

        if(!document.board_input_form.content.value){
          alert("내용을 입력해 주세요!");
          document.board_input_form.content.focus();
          return;
        }
        document.board_input_form.submit();

      }

    </script>
  </body>
</html>
