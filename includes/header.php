<?php if(!isset($_SESSION)) { session_start(); } ?>
<?php if(!isset($_SESSION)) { session_start(); } ?>

<div class="headerWrapper">
  <div class="inner">
    <div class="logo">
          <img src="assets/img/group-20.svg" alt="logo" />
          <b class="name"> bat <b class="on">ON</b> </b>
        </div>

    <!-- partial:index.partial.html -->
    <div class="dropholder">
      <p class="farm">Farm</p>
      <div class="drop-down">
        <p><i class="fa fa-foursquare"></i> Trang trai Tulip</p>
      </div>
      <ul class="menubox">
        <li><i class="fa fa-thumbs-down"></i> Trang trai Dat</li>
        <li><i class="fa fa-thumbs-up"></i> Trang trai Khai</li>
        <li><i class="fa fa-star"></i> Trang trai Kien</li>
        <li><i class="fa fa-heart"></i> Trang trai Danh</li>
      </ul>
    </div>
    <!-- partial -->
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


    <div class="actions">
      <div class="action-btn">
        <i class="far fa-bell fa-xs"></i>
        <!-- <span class="badge">12</span> -->
      </div>
      <div class="action-btn">
        <i class="far fa-comments fa-xs"></i>
        <!-- <span class="badge">12</span> -->
      </div>


      <img onclick="toggleAccountOption()" class="user-avatar" src="https://i.pinimg.com/736x/6c/22/e3/6c22e3e5685c422a6e6d7a013139472d.jpg"
            alt="shizuka" />

            <ul id="AccountOption" class="AccountOption">
              <li><a href="index.php?option=profile.php">Thông tin cá nhân</a></li>
              <li><a href="#"><i class="icon fas fa-sign-out-alt" style="color: #ff0000;"></i>Đăng xuất</a></li>
            </ul>
  
    </div>
  </div>
</div>
<script src="assets/js/defaultlayout.js"></script>
<!-- ------------------ -->