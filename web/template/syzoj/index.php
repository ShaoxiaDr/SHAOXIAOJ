<!--以上代码忽略-->
<!--签到功能-->
            <h4 class="ui top attached block header" style='margin-top: 10px;'><i class="calendar check icon"></i>每日打卡</h4>
        <div class="ui bottom attached center aligned segment" style='height:<?php echo $OJ_DARK?"107":"124";?>px'>
            <?php
                //$OJ_DARK是夜间模式的意思,源码是没有配置的.

                //查询一下当前用户的连续签到值.
                $sql_lianxu = "SELECT lianxu FROM qiandao WHERE user_id = ? ORDER BY time DESC LIMIT 1";
                $result_lianxu = pdo_query($sql_lianxu,$_SESSION[$OJ_NAME.'_user_id']);
                $lianxu = $result_lianxu[0][0]?$result_lianxu[0][0]:0;

                //明天的连续值,为显示明天奖励做准备.
                $next_day = $lianxu + 1;

                //看看用户今天签到没.
                $currentDate = date('Y-m-d');
                $userId = $_SESSION[$OJ_NAME.'_user_id'];
                $sql_search = "SELECT * FROM qiandao WHERE user_id = ? AND DATE(time) = ?";
                $result_search = pdo_query($sql_search,$userId,$currentDate);
                $search = $result_search[0];

                $add_score = "2金币";//每日签到金币值
                $add_score1 = "2金币";//每日签到金币值
                
                //连续登录有奖
                if($lianxu == 6) $add_score = "<font color=orange>[连续登录7天专享]5金币</font>";
                else if($lianxu == 14) $add_score = "<font color=orange>[连续登录15天专享]8金币</font>";
                else if($lianxu == 29) $add_score = "<font color=orange>[连续登录30天专享]15金币</font>";
                else if($lianxu == 65) $add_score = "<font color=orange>[连续登录66天专享]25金币</font>";
                else if($lianxu == 149) $add_score = "<font color=orange>[连续登录150天专享]36金币</font>";
                else if($lianxu == 364) $add_score = "<font color=orange>[连续登录365天专享]73金币</font>";
                else if($lianxu == 665) $add_score = "<font color=orange>[连续登录666天专享]128金币</font>";
                else if($lianxu == 999) $add_score = "<font color=orange>[连续登录1000天专享]288金币</font>";
                else if($lianxu == 1313) $add_score = "<font color=orange>[连续登录1314天专享]520金币</font>";

                //连续登录有奖
                if($next_day == 7) $add_score1 = "<font color=orange>[连续登录7天专享]5金币</font>";
                else if($next_day == 15) $add_score1 = "<font color=orange>[连续登录15天专享]8金币</font>";
                else if($next_day == 30) $add_score1 = "<font color=orange>[连续登录30天专享]15金币</font>";
                else if($next_day == 66) $add_score1 = "<font color=orange>[连续登录66天专享]25金币</font>";
                else if($next_day == 150) $add_score1 = "<font color=orange>[连续登录150天专享]36金币</font>";
                else if($next_day == 365) $add_score1 = "<font color=orange>[连续登录365天专享]73金币</font>";
                else if($next_day == 666) $add_score1 = "<font color=orange>[连续登录666天专享]128金币</font>";
                else if($next_day == 1000) $add_score1 = "<font color=orange>[连续登录1000天专享]288金币</font>";
                else if($next_day == 1314) $add_score1 = "<font color=orange>[连续登录1314天专享]520金币</font>";
            ?>
          <p style='margin-top: -11px;'><span style='<?php if($OJ_DARK) echo "color:white;";?>'>连续打卡<?php echo $lianxu?>天-<?php echo $search?"明日打卡奖励":"今日打卡奖励"?>:<?php echo $search?$add_score1:$add_score;?></span></p><p style='margin-top: 21px;'>
          <?php
          //若用户签到过了.
          if($search) {
                echo "<span style='font-size: 48px;";
                echo "color:green;";
                echo "'><b>已打卡</b></span>";
          }
          //若用户没登录.
          else if(!isset($_SESSION[$OJ_NAME.'_user_id'])){
            echo "<a href='loginpage.php' style='font-size: 48px;";
            echo "color:orange;";
            echo "'><b>登录后打卡</b></span>";
          }
          //用户还没签到呢.
          else{
            echo "<a href='qiandao_update.php' style='font-size: 48px;";
            echo "color:orange;";
            echo "'><b>点我打卡</b></span>";
          }
          ?>
          <!--this-div是动态字体样式,请确保你的CSS有这种样式-->
          </p><p style='margin-top: 20px;'><span id="hitokoto-display" style="font-size: 14px;" class='this-div'></span></p>
        </div>
        <!--一言代码忽略-->

<!--下方代码忽略-->
