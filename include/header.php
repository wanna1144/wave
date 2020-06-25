<?php

  session_start();
  //isset은 값의 유무 조회 함수
  if(isset($_SESSION["userid"])){
    $userid=$_SESSION["userid"];
  }else{
    $userid="";
  }

  if(isset($_SESSION["username"])){
    $username=$_SESSION["username"];
  }else{
    $username="";
  }

  if(isset($_SESSION["userlevel"])){
    $userlevel=$_SESSION["userlevel"];
  }else{
    $userlevel="";
  }

 ?>

<header>
  <div class="top-header">
    <div class="center clear">
      <ul class="info-header clear">
        <?php
          if($userlevel==1){
        ?>

        <li><a href="admin.php">ADMIN</a></li>

        <?php
          }
        ?>

        <?php
          if(!$userid){
         ?>

        <li><a href="login_form.php">LOGIN</a></li>
        <li><a href="member_join.php">JOIN</a></li>

        <?php
          }else{
         ?>

         <li><a href="php/logout.php">LOGOUT</a></li>
         <li><a href="member_join.php"><?=$userid?>님</a></li>

        <?php
          }
        ?>

      </ul>
    </div>
  </div>
  <div class="stick">
    <div class="center clear">
      <h2 class="logo"><a href="index.php">WAVE</a></h2>
      <ul class="gnb clear">
        <li><a href="index.php">Home</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="gallery.php">Gallery</a></li>
        <li><a href="board_form.php">Q & A</a></li>
      </ul>

      <?php
        if(!$userid){
      ?>

      <div class="login_btn">
        <div class="menu_icon">
          <a href="login_form.php"><i class="fa fa-user"></i></a>
        </div>
      </div>
      <div class="menu_btn">
        <div class="menu_icon">
          <span></span>
          <span></span>
        </div>
      </div>

      <?php
        }else{ //로그인이 되고 레벨이 9일때
          if($userlevel==1){
      ?>

      <div class="login_btn">
        <div class="menu_icon">
          <a href="#"><i class="fa fa-cog"></i></a>
        </div>
      </div>
      <div class="login_btn" style="right:35px;">
        <div class="menu_icon">
          <a href="php/logout.php"><i class="fa fa-sign-out"></i></a>
        </div>
      </div>
      <div class="menu_btn" style="right:70px;">
        <div class="menu_icon">
          <span></span>
          <span></span>
        </div>
      </div>

      <?php
          }else{ //레벨이 1일때 관리자 페이지 아이콘 보임
      ?>

      <div class="login_btn" style="right:0px;">
        <div class="menu_icon">
          <a href="php/logout.php"><i class="fa fa-sign-out"></i></a>
        </div>
      </div>
      <div class="menu_btn" style="right:35px;">
        <div class="menu_icon">
          <span></span>
          <span></span>
        </div>
      </div>

      <?php
          }
        }
      ?>

    </div>
  </div>
</header>
