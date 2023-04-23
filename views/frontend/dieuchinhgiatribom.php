
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
    $topic = 'nhombaton/feeds/V16';
    $mqtt->connect($connectionSettings, $clean_session);
    $mqtt->publish($topic, $input_data, 0, false);  
    require_once('connectDatabase.php');
    $connect = Connect();
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $current_time = date('Y-m-d H:i:s');
    $query = "INSERT INTO `statistic` (action_time, device_id, data) VALUES ('" . $current_time . "', '2', " . $input_data . ")";
    $result = $connect->query($query);
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
          <div class="dev-control-container"  id="control">
                    <div class="grid">
                        <div class="row">
                            <div class="dev-control c-6">
                                <div class="dev-control-content-container">
                                    <div class="dev-control-content" >
                                        <div class="Den"></div>
                                        <div class="dev-text">
                                            <b class="dev-name">Máy bơm</b>
                                            <div class="dev-code">#abc12345</div>
                                        </div>
                                    </div>
                                    <div class="control-content" >
                                        <p style="font-weight: bold;">Mức:</p>
                                        <div class="slider-content" >
                                        <form method="post" id="mqtt-form">
                                          <input type="range" name="input_data" min="0" max="100" step="25" value="<?php
                                              require_once('connectDatabase.php');
                                              $connect = Connect();
                                              $result = $connect->query("SELECT data FROM statistic WHERE action_time = (SELECT MAX(action_time) FROM statistic WHERE device_id=2);");
                                              while ($row = $result->fetch_assoc()) {
                                                  echo  $row["data"];
                                              }   
                                              ?>"> 
                                          <div class="value"><?php
                                              require_once('connectDatabase.php');
                                              $connect = Connect();
                                              $result = $connect->query("SELECT data FROM statistic WHERE action_time = (SELECT MAX(action_time) FROM statistic WHERE device_id=2);");
                                              while ($row = $result->fetch_assoc()) {
                                                    if($row["data"] == 0){
                                                      echo "Tắt";
                                                  } else if ($row["data"] == 25){
                                                      echo "1";
                                                  } else if ($row["data"] == 50){
                                                      echo "2";
                                                  } else if ($row["data"] == 75){
                                                      echo "3";
                                                  } else if ($row["data"] == 100){
                                                      echo "Mạnh nhất";
                                                  }  else {
                                                      //Nothing
                                                  }
                                              }   
                                              ?></div>
                                          <button class="showbtn" type="submit" name="submit" style="margin-top: 50px">Send</button>
                                          </form>
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