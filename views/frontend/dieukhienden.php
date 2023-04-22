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
<?php
require('vendor/autoload.php');

use \PhpMqtt\Client\MqttClient;
use \PhpMqtt\Client\ConnectionSettings;

$server   = 'mqtt.ohstem.vn';
$port     = 1883;
$clientId = array(
    "nhombaton/feeds/V1",
    "nhombaton/feeds/V2",
    "nhombaton/feeds/V3",
    "nhombaton/feeds/V4",
    "nhombaton/feeds/V10",
    "nhombaton/feeds/V12",
    "nhombaton/feeds/V13",
    "nhombaton/feeds/V14",
    "nhombaton/feeds/V15",
    "nhombaton/feeds/V16"
);
$username = 'nhombaton';
$password = '';
$clean_session = false;
$mqtt_version = MqttClient::MQTT_3_1_1;

$connectionSettings = (new ConnectionSettings)

    ->setUsername($username)
    ->setPassword($password)
    ->setKeepAliveInterval(6000) //Thời gian sống của chương trình, ở đây mình xét 6000s
    ->setLastWillTopic('nhombaton/feeds/')
    ->setLastWillMessage('client disconnect')
    ->setLastWillQualityOfService(1);

$mqtt = new MqttClient($server, $port, $clientId[0], $mqtt_version); // Sửa lại

if (isset($_POST['submit'])) {
    $input_data = strval($_POST['input_data']); // Chuyển đổi giá trị số sang chuỗi
    $topic = 'nhombaton/feeds/V12';
    $mqtt->connect($connectionSettings, $clean_session);
    $mqtt->publish($topic, $input_data, 0, false);
    require_once('connectDatabase.php');
    $connect = Connect();
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $current_time = date('Y-m-d H:i:s');
    $query = "INSERT INTO `statistic` (action_time, device_id, data) VALUES ('" . $current_time . "', '1', " . $input_data . ")";
    $result = $connect->query($query);
    printf("Data published to topic %s: %s\n", $topic, $input_data);
}
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
                <p class="credit"> <i class="icon fas fa-calendar-week mr-5"></i> Điều khiển thiết bị <i class="fas fa-caret-right mr-5"></i> Điều khiển đèn</p>
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
                                                    <div class="dev-code"><?php echo "#" . $row['device_id'] ?></div>
                                                </div>
                                            </div>
                                            <div class="control-content">
                                                <p style="font-weight: bold;">Mức:</p>
                                                <div class="slider-content">
                                                <form method="post" id="mqtt-form">
                                                    <input type="range" name="input_data" min="0" max="100" value="<?php
                                                        require_once('connectDatabase.php');
                                                        $connect = Connect();
                                                        $result = $connect->query("SELECT data FROM statistic WHERE action_time = (SELECT MAX(action_time) FROM statistic);");
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo  $row["data"];
                                                        }   
                                                        ?>"> 
                                                    <div class="value"><?php
                                                        require_once('connectDatabase.php');
                                                        $connect = Connect();
                                                        $result = $connect->query("SELECT data FROM statistic WHERE action_time = (SELECT MAX(action_time) FROM statistic);");
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo  $row["data"];
                                                        }   
                                                        ?></div>
                                                    <button type="submit" name="submit">Send</button>
                                                    </form>
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