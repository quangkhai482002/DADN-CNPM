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
    $topic = 'nhombaton/feeds/V14';
    $mqtt->connect($connectionSettings, $clean_session);
    $mqtt->publish($topic, $input_data, 0, false);
    require_once('connectDatabase.php');
    $connect = Connect();
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $current_time = date('Y-m-d H:i:s');
    $query = "INSERT INTO `statistic` (action_time, device_id, data) VALUES ('" . $current_time . "', '7', " . $input_data . ")";
    $result = $connect->query($query);
}
?>
<H2 class="title">ĐIỀU KHIỂN THIẾT BỊ</H2>
      <form method="post">
      <select style=" 
        float: center;
            color: var(--text);
            font-size: 18px;
            width: 200px;
            height: 50px;
            font-weight: 600;
            text-align: center;
            border-radius: 10px;
            margin-bottom: 20px;
            margin-left: 100px;
            
            border: 3px solid blue;
            " class="dropdown" placeholder="Please choose" id="selection" name="input_data" required>
            <option value=<?php 
            require_once('connectDatabase.php');
            $connect = Connect();
            $result = $connect->query("SELECT data FROM statistic WHERE action_time = (SELECT MAX(action_time) FROM statistic WHERE device_id=7);");
            while ($row = $result->fetch_assoc()) {
                echo  $row["data"];
            }
            ?>>Chế độ:<?php 
            require_once('connectDatabase.php');
              $connect = Connect();
              $result = $connect->query("SELECT data FROM statistic WHERE action_time = (SELECT MAX(action_time) FROM statistic WHERE device_id=7);");
              while ($row = $result->fetch_assoc()) {
                  if($row["data"] == 0){
                    echo " Tự động";
                  } else if ($row["data"] == 1){
                    echo " Thủ công";
                  } else {
                    //NOTHING
                  }
              }   
            ?></option>
            <option value=0>Tự Động</option>
            <option value=1>Thủ Công</option>

        </select>
        <button class="showbtn" id="show" type="submit" name="submit" style="margin-left: 100px; width:100px">Đổi chế độ</button>
      </form>
        <div class="device-container">
          <div class="grid">
            <div class="row" >
              <div class="device c-6" style="display:none;" id="controlTable1">
              <a href="index.php?option=dieukhienden.php">
                <div class="device-content">
                  <div class="Den"></div>
                  <div class="dev-text">
                    <b class="dev-name">Đèn</b>
                    <div class="dev-describe">Hệ thống ánh sáng</div>
                  </div>
                </div>
                </a>
              </div>
              

             
              <div class="device c-6" style="display:none;" id="controlTable2">
              <a href="index.php?option=dieukhienmaybom.php">
                <div class="device-content">
                  <div class="Nuoc"></div>
                  <div class="dev-text">
                    <b class="dev-name">Bơm nước</b>
                    <div class="dev-describe">Hệ thống nước</div>
                  </div>
                </div>
                </a>
              </div>
              

              
            </div>
          </div>
        </div>
<script>
if(document.getElementById('selection').value == 0){
  document.getElementById('controlTable1').style.display = 'none';
  document.getElementById('controlTable2').style.display = 'none';
} else if (document.getElementById('selection').value == 1){
  document.getElementById('controlTable1').style.display = 'block';
  document.getElementById('controlTable2').style.display = 'block';
} else {
  //NOTHING
}
</script>











