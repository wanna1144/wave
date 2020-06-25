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
          <ul class="tab_title clear">
            <li>회원관린</li>
            <li>상품관리</li>
            <li>Q&A 관리</li>
          </ul>

          <div class="admin_tab_box tab_box_1">

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
              $con=mysqli_connect("localhost", "wanna", "vldrm4523!", "wanna");
              $sql="select * from member order by num desc limit 5";
              $result=mysqli_query($con, $sql);

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
              ?>
            </ul>

            <form class="admin_search_form clear" name="search_form" action="admin_search_form.php" method="post">
              <div class="admin_search_box clear">
                <select class="" name="admin_search_select">
                  <option value="id">아이디</option>
                  <option value="name">이름</option>
                </select>
                <input type="text" name="admin_search_txt">
                <b onclick="check_input()"><i class="fa fa-search"></i></b>
              </div>
            </form>

          </div>
          <div class="admin_tab_box tab_box_2">

            <div class="panel_title">
              <h2 class="title">상품수정 및 삭제</h2>
            </div>

            <ul class="admin_product_box">
              <li class="admin_product_title clear">
                <span class="col2">번호</span>
                <span class="col3">제목</span>
                <span class="col4">가격</span>
                <span class="col5">사진</span>
                <span class="col6">설명</span>
                <span class="col7">수정</span>
                <span class="col7">삭제</span>
              </li>



              <?php
              $con=mysqli_connect("localhost", "wanna", "vldrm4523!", "wanna");
              $sql="select * from products order by num desc limit 5";
              $result=mysqli_query($con, $sql);
              while($row=mysqli_fetch_array($result)){

                $num=$row["num"];
                $title=$row["title"];
                $price=$row["price"];
                $desc=$row["description"];
                $img=$row["img"];

              ?>



              <li class="admin_product_list clear">
                <form class="clear" name="" action="php/product_delete.php" method="post">
                  <span class="col2"><?=$num?></span>
                  <span class="col3"><input type="text" name="title" value="<?=$title?>"></span>
                  <span class="col4"><input type="text" name="price" value="<?=$price?>"></span>
                  <span class="col5"><img src="img/<?=$img?>" alt=""></span>
                  <span class="col6"><textarea rows="8" name="desc"><?=$desc?></textarea></span>
                  <span class="col7"><input type="submit" formaction="php/product_update.php?num=<?=$num?>" value="수정"></span>
                  <span class="col7"><input type="submit" formaction="php/product_delete.php?num=<?=$num?>" value="삭제"></span>
                </form>

              </li>

              <?php
                }

              ?>

            </ul>




            <form class="admin_search_form clear" name="product_search_form" action="product_search_form.php" method="post">
              <div class="admin_search_box clear">
                <em class="product_name">상품명</em>
                <input type="text" name="product_search_txt">
                <b onclick="product_check_input()"><i class="fa fa-search"></i></b>
              </div>
            </form>

            <div class="panel_title">
              <h2 class="title">상품입력</h2>
            </div>

            <form class="" action="php/product_input.php" method="post" enctype="multipart/form-data" name="form_data" capture="camera" accept="image/*">
              <div class="product_input_title product_input clear">
                <span>상품명</span>
                <span>가격</span>
                <span>사진</span>
                <span>설명</span>
                <span>올리기</span>
              </div>
              <div class="product_input_con product_input clear">
                <span><input type="text" name="title" value=""></span>
                <span><input type="text" name="price" value=""></span>
                <span>
                  <div class="img_wrap1 product_input_wrap">
                    <img id="img1">
                  </div>
                  <div class="filebox product_input_flexbox">
                    <input class="upload-name product_upload_name" value="(768 X 1152)">
                    <label for="input_img1" class="product_input_btn">업로드</label>
                    <input type="file" id="input_img1" class="upload-hidden" name="large">
                  </div>

                </span>
                <span><textarea rows="8" name="desc"></textarea> </span>
                <span><button type="submit" name="button" class="product_up">올리기</button></span>
              </div>
            </form>

          </div>
          <div class="admin_tab_box tab_box_3">

            <div class="panel_title">
              <h2 class="title">Q&A 관리</h2>
            </div>

            <ul class="admin_qna">
              <li class="admin_qna_list qna_title clear">
                <span>선택</span>
                <span>번호</span>
                <span>이름</span>
                <span>제목</span>
                <span>내용</span>
              </li>

              <form class="" name="qna_delete" action="php/qna_delete.php" method="post">

              <?php
                $con=mysqli_connect("localhost", "wanna", "vldrm4523!", "wanna");
                $sql="select * from qna order by num desc limit 10";
                $result=mysqli_query($con, $sql);

                while($row=mysqli_fetch_array($result)){

                  $num=$row["num"];
                  $name=$row["name"];
                  $subject=$row["subject"];
                  $content=$row["content"];
              ?>

              <li class="admin_qna_list clear">
                <span><input type="checkbox" name="item[]" value="<?=$num?>"> </span>
                <span><?=$num?></span>
                <span><?=$name?></span>
                <span><?=$subject?></span>
                <span style="text-align:left"><?=$content?></span>
              </li>
              <?php
                }
              ?>

              </form>
              <div class="admin_qna_btn">
                <button onclick="delete_form()">선택삭제</button>
              </div>
            </ul>

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

    <!-- Livraries JS Files -->
    <script type="text/javascript" src="js/custom.js"></script>
    <script type="text/javascript">
    function product_check_input(){
      if(!document.product_search_form.product_search_txt.value){
        alert("상품명을 입력하세요!");
        document.product_search_form.product_search_txt.focus();
        return;
      }

      document.product_search_form.submit();
    }

    function check_input(){
      if(!document.search_form.admin_search_txt.value){
        alert("제목을 입력하세요!");
        document.search_form.admin_search_txt.focus();
        return;
      }

      document.search_form.submit();
    }

    function delete_form(){
      document.qna_delete.submit();
    }

    function send_del(){
      //alert("abc");
      document.product_form.submit();
    }

    </script>
    <script type="text/javascript">

      //수정 및 삭제 후 원래있던 탭으로 돌아옴
      $(document).ready(function(){
        var num = location.href.substr(
          location.href.lastIndexOf('=') + 1
        );

        if (num == 1) {
          $(".tab_title li").eq(1).trigger("click");
        }

        if (num == 2) {
          $(".tab_title li").eq(2).trigger("click");
        }

        $("#update").click(function () {
          $("form").attr("action", "/manage/update");
        });

        $("#delete").click(function () {
               $("form").attr("action", "/manage/delete");
        });

      });


    </script>
    <script type="text/javascript">

     //상품 올렸을때 미리보기 기능이 있는 코드
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
          $(this).siblings('.upload-name').val(filename);
        });
        $("#input_img1").on("change", handleImgFileSelect);
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

    </script>

  </body>
</html>
