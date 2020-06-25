<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">


    <title>SIXTEEN</title>
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
    <link rel="stylesheet" href="css/all_form.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/style.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/media.css?<?php echo time(); ?>">
  </head>
  <body>

    <div class="wrap">

      <?php include "include/header.php" ?>

      <section class="main_img">
        <img src="img/about-heading.jpg" alt="">
        <div class="main_text">
          <p>ADMIN</p>
          <h1>ADMIN PAGE EDIT!!</h1>
        </div>
      </section>


      <?php
        if(!$userid || $userlevel!=1){
          echo "<p class='abc'>관리자 페이지 입니다. 권한이 있는 관리자만이 접근 가능합니다.</p>";
        } else {
      ?>

      <section class="admin">
        <div class="center">
          <div class="section_title clear">
            <h2 class="title" style="float:none;">회원관리 검색결과</h2>
          </div>


            <ul class="member_list">
              <li class="list_title clear">
                <span class="col1">번호</span>
                <span class="col2">아이디</span>
                <span class="col3">이름</span>
                <span class="col4">레벨</span>
                <span class="col5">포인트</span>
                <span class="col6">가입일</span>
                <span class="col7">수정</span>
                <span class="col8">삭제</span>
              </li>

              <?php
              $search_select=$_POST["admin_search_select"];
              $search_txt=$_POST["admin_search_txt"];

              $con=mysqli_connect("localhost", "wanna", "vldrm4523!", "wanna");

              if($search_select=="id"){
                $sql="select * from member where id LIKE '%$search_txt%' order by num desc";
              } else {
                $sql="select * from member where name LIKE '%$search_txt%' order by num desc";
              }

              $result=mysqli_query($con, $sql);
              $num_row=mysqli_num_rows($result);

              if(!$num_row){
                echo "
                  <li style='padding:15px 0; font-size:14px; width:100%; text-align:center;'>데이터가 존재하지 않습니다. 검색 조건 및 검색어을 확인해 주세요.</li>
                ";
              } else {

              while($row=mysqli_fetch_array($result)){
                $num=$row['num'];
                $id=$row['id'];
                $name=$row['name'];
                $level=$row['level'];
                $point=$row['point'];
                $regist_day=substr($row['regist_day'], 0, 10);
              ?>

              <li class="list_cont clear">
                <form class="" action="php/admin_member_update.php?num=<?=$num?>" method="post">
                  <span class="col1"><?=$num?></span>
                  <span class="col2"><?=$id?></span>
                  <span class="col3"><?=$name?></span>
                  <span class="col4"><input type="text" name="level" value="<?=$level?>"></span>
                  <span class="col5"><input type="text" name="point" value="<?=$point?>"></span>
                  <span class="col6"><?=$regist_day?></span>
                  <span class="col7"><button type="submit">수정</button></span>
                  <span class="col8"><button type="button" onclick="location.href='php/admin_member_delete.php?num=<?=$num?>'">삭제</button></span>
                </form>
              </li>

              <?php
                }
              }
              ?>
            </ul>

            <div class="admin_btn_box">
              <a href="admin.php">목록</a>
            </div>

        </div>
      </section>

      <?php
        }
      ?>


      <?php include "include/footer.php" ?>

    </div>

    <!-- Livraries JS Files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Main JS Files -->
    <script type="text/javascript" src="js/custom.js"></script>

  </body>
</html>














<!-- --- -->
