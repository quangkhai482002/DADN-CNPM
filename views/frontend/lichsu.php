
<?php if (!isset($_SESSION)) {
    session_start();
} ?>
<?php
$a = $_SESSION['user_name'];
include "./includes/config.php";
$sql = "SELECT distinct * FROM `user`, `farm`, `subfarm` where 
user.user_name= '$a' and user.user_id=farm.user_id and farm.farm_id=subfarm.farm_id 
";
$result = mysqli_query($conn, $sql);


?>

<H2 class="title">LỊCH SỬ HOẠT ĐỘNG</H2>

<form action="" method="POST">
        <div class="phankhu">
            <select class="dropdown" placeholder="Please choose" name="phankhu">
            <?php
                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {
                ?>

                        <option method="POST" type="submit">

                            <?php
                            echo $row['subfarm_name']
                            ?>
                        </option>


                <?php
                    }
                }
                ?>
                <input class="showbtn" type="submit" name="" value="chọn">
            </select>
        </div>
        </form>

        <div class="history-container">
            <div class="grid">
                <div class="row">
                    <div class="history c-12">
                        <div class="htr-name c-1"></div>
                        <div class="htr-name c-2">Đối tượng</div>
                        <div class="htr-name c-2">Hành động</div>
                        <div class="htr-name c-2">Thiết bị</div>
                        <div class="htr-name c-2">Mã thiết bị</div>
                        <div class="htr-name c-2">Thời gian</div>
                    </div>
                    
                    <div class="history c-12">

                        <div class="history-content">
                            <img class="htr-icon c-1" alt="" src="assets/svg/icon.svg" />
                            <div class="htr-name c-2">Hệ thống</div>
                            <div class="htr-action c-2">Đã bật</div>

                            <div class="htr-dev c-2">Đèn</div>
                            <div class="htr-code c-2">#123abc</div>
                            <div class="htr-time c-3">2 March 2023, 13:45 PM</div>
                        </div>
                    </div>
                    <div class="history c-12">

                        <div class="history-content">
                            <img class="htr-icon c-1" alt="" src="assets/svg/icon.svg" />
                            <div class="htr-name c-2">Người dùng</div>
                            <div class="htr-action c-2">Đã tắt</div>

                            <div class="htr-dev c-2">Đèn</div>
                            <div class="htr-code c-2">#123abc</div>
                            <div class="htr-time c-3">2 March 2023, 13:45 PM</div>
                        </div>
                    </div>
                    <div class="history c-12">

                        <div class="history-content">
                            <img class="htr-icon c-1" alt="" src="assets/svg/icon.svg" />
                            <div class="htr-name c-2">Hệ thống</div>
                            <div class="htr-action c-2">Tải dữ liệu</div>

                            <div class="htr-dev c-2">CB ánh sáng</div>
                            <div class="htr-code c-2">#123abc</div>
                            <div class="htr-time c-3">2 March 2023, 13:45 PM</div>
                        </div>
                    </div>
                    <div class="history c-12">

                        <div class="history-content">
                            <img class="htr-icon c-1" alt="" src="assets/svg/icon.svg" />
                            <div class="htr-name c-2">Người dùng</div>
                            <div class="htr-action c-2">Đã tắt</div>

                            <div class="htr-dev c-2">Bơm nước</div>
                            <div class="htr-code c-2">#123abc</div>
                            <div class="htr-time c-3">2 March 2023, 13:45 PM</div>
                        </div>
                    </div>
                    <div class="history c-12">

                        <div class="history-content">
                            <img class="htr-icon c-1" alt="" src="assets/svg/icon.svg" />
                            <div class="htr-name c-2">Hệ thống</div>
                            <div class="htr-action c-2">Tải dữ liệu</div>

                            <div class="htr-dev c-2">CB nhiệt độ</div>
                            <div class="htr-code c-2">#123abc</div>
                            <div class="htr-time c-3">2 March 2023, 13:45 PM</div>
                        </div>
                    </div>
                    <div class="history c-12">

                        <div class="history-content">
                            <img class="htr-icon c-1" alt="" src="assets/svg/icon.svg" />
                            <div class="htr-name c-2">Hệ thống</div>
                            <div class="htr-action c-2">Đã bật</div>

                            <div class="htr-dev c-2">Đèn</div>
                            <div class="htr-code c-2">#123abc</div>
                            <div class="htr-time c-3">2 March 2023, 13:45 PM</div>
                        </div>
                    </div>
                    <div class="history c-12">

                        <div class="history-content">
                            <img class="htr-icon c-1" alt="" src="assets/svg/icon.svg" />
                            <div class="htr-name c-2">Hệ thống</div>
                            <div class="htr-action c-2">Tải dữ liệu</div>

                            <div class="htr-dev c-2">CB độ ẩm đất</div>
                            <div class="htr-code c-2">#123abc</div>
                            <div class="htr-time c-3">2 March 2023, 13:45 PM</div>
                        </div>
                    </div>



                </div>
            </div>
        </div>