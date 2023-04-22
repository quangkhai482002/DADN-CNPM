<div class="displayData-container">
          <div class="grid">
            <div class="row">
              <div class="displayData-1 c-12">
                <h3 class="dataTitle">THÔNG SỐ MÔI TRƯỜNG</h3>
                <div class="phankhu-1">
                  <select class="dropdown-1" placeholder="Please choose">
                    <option>Phân khu A</option>
                    <option>Phân khu B</option>
                    <option>Phân khu C</option>
                    <option>Phân khu D</option>
                  </select>
                </div>
              </div>
              <div class="displayData c-12">
                <div class="data-content c-3">
                  <div class="AS"><img class="weather-icon" alt="" src="assets/svg/Sun 2.svg" /></div>
                  <div class="dev-text">
                    <b class="data-name">ÁNH SÁNG</b>
                    <b class="data-val"><?php
                    require_once('connectDatabase.php');
                    $connect = Connect();
                    $result = $connect->query("SELECT data FROM statistic WHERE action_time = (SELECT MAX(action_time) FROM statistic WHERE device_id = 3);");
                    while ($row = $result->fetch_assoc()) {
                        echo  $row["data"];
                    }   
                    ?> %</b>
                  </div>
                </div>

                <div class="data-content c-3">
                    <div class="ND"><img class="weather-icon" alt="" src="assets/svg/Temperature.svg" /></div>
                    <div class="dev-text">
                      <b class="data-name">NHIỆT ĐỘ</b>
                      <b class="data-val"><?php
                    require_once('connectDatabase.php');
                    $connect = Connect();
                    $result = $connect->query("SELECT data FROM statistic WHERE action_time = (SELECT MAX(action_time) FROM statistic WHERE device_id = 4);");
                    while ($row = $result->fetch_assoc()) {
                        echo  $row["data"];
                    }   
                    ?> *C</b>
                    </div>
                  </div>

                  <div class="data-content c-3">
                    <div class="DA"><img class="weather-icon" alt="" src="assets/svg/Waterdrops.svg" /></div>
                    <div class="dev-text">
                      <b class="data-name">ĐỘ ẨM</b>
                      <b class="data-val"><?php
                    require_once('connectDatabase.php');
                    $connect = Connect();
                    $result = $connect->query("SELECT data FROM statistic WHERE action_time = (SELECT MAX(action_time) FROM statistic WHERE device_id = 5);");
                    while ($row = $result->fetch_assoc()) {
                        echo  $row["data"];
                    }   
                    ?> %</b>
                    </div>
                  </div>
                  
                  <div class="data-content c-3">
                    <div class="DAD"><img class="weather-icon" alt="" src="assets/svg/Waterdrops-1.svg" /></div>
                    <div class="dev-text">
                      <b class="data-name">ĐỘ ÂM ĐẤT</b>
                      <b class="data-val"><?php
                    require_once('connectDatabase.php');
                    $connect = Connect();
                    $result = $connect->query("SELECT data FROM statistic WHERE action_time = (SELECT MAX(action_time) FROM statistic WHERE device_id = 6);");
                    while ($row = $result->fetch_assoc()) {
                        echo  $row["data"];
                    }   
                    ?> %</b>
                    </div>
                  </div>
              </div>

              
            </div>
          </div>
        </div>
        <script>
           init_reload();
          function init_reload(){
              setInterval( function(){
                  window.location.reload();
              },5000);
          }
        </script>