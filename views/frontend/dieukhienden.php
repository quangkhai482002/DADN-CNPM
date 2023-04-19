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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/grid.css" />
    <link rel="stylesheet" href="assets/css/defaultlayout.css" />

    <title>Điều khiển đèn</title>
</head>

<body>



<div class="wrapper">

<?php include_once("includes/header.php"); ?>

<div class="container">

<?php include_once("includes/sidebar.php"); ?>

    <div class="content">
        <H2 class="title">ĐIỀU KHIỂN ÁNH SÁNG</H2>
        <p class="credit"> <i class="icon fas fa-calendar-week mr-5"></i> Điều khiển thiết bị <i
                class="fas fa-caret-right mr-5"></i> Điều khiển đèn</p>
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

        <?php
            $b = null;
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $b = $_POST['phankhu'];
            }
            ?>
        <?php
            $dv = "SELECT distinct * FROM `user`, `farm`, `subfarm`,`device` where 
                user.user_name= '$a' and user.user_id=farm.user_id and farm.farm_id=subfarm.farm_id 
                and subfarm.subfarm_name= '$b'and subfarm.subfarm_id=device.subfarm_id and device.device_name='den'
                ";
            $result_dv = mysqli_query($conn, $dv);
            ?>

        <div class="dev-control-container">
            <div class="grid">
                <div class="row">
                <?php
                    if (mysqli_num_rows($result) > 0) {

                        while ($row = mysqli_fetch_assoc($result_dv)) {
                    ?>
                    <div class="dev-control c-6">
                        <div class="dev-control-content-container">
                            <div class="dev-control-content">
                                <div class="Den"></div>
                                <div class="dev-text">
                                    <b class="dev-name">Điều khiển Đèn</b>
                                    <div class="dev-code" ><?php echo "#" . $row['device_id'] ?></div>
                                </div>
                            </div>
                            <div class="control-content">
                            <p style="font-weight: bold;">Mức:</p>
                            <div class="slider-content">
                                <input type="range" min="0" max="10" step="1" value="0">
                            <div class="value">0</div>
                            </div>

                            
                            <form action="" method="POST">
                            <label class="switch">
                                <input type="checkbox">
                                <div>
                                    <span></span>
                                </div>
                            </label>
                            </form>
                            </div>
                        </div>
                        

                    </div>
                    <?php }
                                    } ?>

                    
                    
                </div>
            </div>
        </div>

    </div>


</div>
</div>

<script src="assets/css/defaultlayout.js"></script>
<script src="assets/css/controlitem.js"></script>


</body>

</html>