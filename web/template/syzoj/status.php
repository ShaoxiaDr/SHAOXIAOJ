//以上的代码忽略...

<!-- <form id=simform class="ui mini form" action="status.php" method="get">
    <div class="inline fields" style="margin-bottom: 25px; white-space: nowrap; ">
      <label style="font-size: 1.2em; margin-right: 1px; "><?php echo $MSG_PROBLEM_ID?>：</label>
      <div class="field"><input name="problem_id" style="width: 50px; " type="text" value="<?php echo isset($problem_id)?htmlspecialchars($problem_id, ENT_QUOTES):"" ?>"></div>
        <label style="font-size: 1.2em; margin-right: 1px; "><?php echo $MSG_USER?>：</label>
        <div class="field"><input name="user_id" style="width: 50px; " type="text" value="<?php echo  isset($user_id)?htmlspecialchars($user_id, ENT_QUOTES):"" ?>"></div>

        <label style="font-size: 1.2em; margin-right: 1px; "><?php echo $MSG_SCHOOL?>：</label>
        <div class="field"><input name="school" style="width: 50px; " type="text" value="<?php echo isset($school)?htmlspecialchars($school, ENT_QUOTES):"" ?>"></div>
        <label style="font-size: 1.2em; margin-right: 1px; "><?php echo $MSG_GROUP_NAME?>：</label>
        <div class="field"><input name="group_name" style="width: 50px; " type="text" value="<?php echo isset($group_name)?htmlspecialchars($group_name, ENT_QUOTES):"" ?>"></div>
        <label style="font-size: 1.2em; margin-right: 1px; "><?php echo $MSG_LANG?>：</label>
        <select class="form-control" size="1" name="language" style="width: 110px;font-size: 1em ">
          <option value="-1">All</option>
          <?php
          if(isset($_GET['language'])){
            $selectedLang=intval($_GET['language']);
          }else{
            $selectedLang=-1;
          }
          $lang_count=count($language_ext);
          $langmask=$OJ_LANGMASK;
          $lang=(~((int)$langmask))&((1<<($lang_count))-1);
          for($i=0;$i<$lang_count;$i++){
            if($lang&(1<<$i))
            echo"<option value=$i ".( $selectedLang==$i?"selected":"").">
            ".$language_name[$i]."
            </option>";
          }
          ?>
        </select>
        <label style="font-size: 1.2em; margin-right: 1px;margin-left: 10px; ">状态：</label>
        <select class="form-control" size="1" name="jresult" style="width: 110px;">
          <?php if (isset($_GET['jresult'])) $jresult_get=intval($_GET['jresult']);
          else $jresult_get=-1;
          if ($jresult_get>=12||$jresult_get<0) $jresult_get=-1;
          if ($jresult_get==-1) echo "<option value='-1' selected>All</option>";
          else echo "<option value='-1'>All</option>";
          for ($j=0;$j<12;$j++){
          $i=($j+4)%12;
          if ($i==$jresult_get) echo "<option value='".strval($jresult_get)."' selected>".$jresult[$i]."</option>";
          else echo "<option value='".strval($i)."'>".$jresult[$i]."</option>";
          }
          echo "</select>";
          ?>
          <?php if(isset($_SESSION[$OJ_NAME.'_'.'administrator'])||isset($_SESSION[$OJ_NAME.'_'.'source_browser'])){
            if(isset($_GET['showsim']))
            $showsim=intval($_GET['showsim']);
            else
            $showsim=0;
            echo "<label style=\"font-size: 1.2em; margin-right: 1px;margin-left: 10px; \">相似度：</label>";
          echo "
          <select id=\"appendedInputButton\" class=\"form-control\" name=showsim onchange=\"document.getElementById('simform').submit();\" style=\"width: 110px;\">
          <option value=0 ".($showsim==0?'selected':'').">All</option>
          <option value=80 ".($showsim==80?'selected':'').">80</option>
          <option value=85 ".($showsim==85?'selected':'').">85</option>
          <option value=90 ".($showsim==90?'selected':'').">90</option>
          <option value=95 ".($showsim==95?'selected':'').">95</option>
          <option value=100 ".($showsim==100?'selected':'').">100</option>
          </select>";
          }
          ?>
      <button class="ui labeled icon mini green button" type="submit" style="margin-left: 20px;">
        <i class="search icon"></i>
       <?php echo $MSG_SEARCH;?>
      </button>
                <span class='ui mini grey button'>AWT:<?php echo round($avg_delay,2)?>s </span>
                 <script>var AWT=<?php echo round($avg_delay*500,0) ?>;</script>
    </div>
  </form> -->

//把form代码注释或删除,但是建议备份一下再做尝试,否则出现网站崩溃等问题后果自负!

//以下为更新代码
<form id=simform class="ui mini form" action="status.php" method="get">
    <div class="inline fields" style="margin-bottom: 25px; white-space: nowrap;">
      <div style='width: 65%;'>
          <div class="ui left icon input" style='font-size: 14px;width: 13%;'>
              <input name="problem_id" style="width: 100px; <?php if($OJ_DARK) echo "background-color: #222222;color: white;";?>" placeholder="题目编号" type="text" value="<?php echo htmlspecialchars($problem_id, ENT_QUOTES) ?>">
              <i class="hashtag icon"></i>
          </div>
          &nbsp;&nbsp;&nbsp;&nbsp;
          <div class="ui left icon input" style='font-size: 14px;width: 25%;margin-left: 3%;'>
              <input name="user_id" style="width: 100px; <?php if($OJ_DARK) echo "background-color: #222222;color: white;";?>" placeholder="提交者" type="text" value="<?php echo  htmlspecialchars($user_id, ENT_QUOTES) ?>"><i class="user circle icon"></i>
          </div>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <div class="ui dropdown selection" tabindex="0" style="font-size: 14px;margin-left: 3%;">
                <input type="hidden" name="language" value="<?php echo isset($_GET['language']) ? intval($_GET['language']) : '-1'; ?>">
                <i class="dropdown icon"></i>
                <div class="default text" style="color:<?php echo $OJ_DARK ? 'white' : 'black'; ?>;">
                    <i class="question icon"></i>
                    <?php
                    if (isset($_GET['language'])) {
                        $selectedLang = intval($_GET['language']);
                    } else {
                        $selectedLang = -1;
                    }
                    echo $selectedLang == -1 ? "全部" : (isset($language_name[$selectedLang]) ? $language_name[$selectedLang] : "语言");
                    ?>
                </div>
                <div class="menu">
                    <!-- 全部选项 -->
                    <div class="item" style="font-size: 14px;" data-value="-1" <?php echo $selectedLang == -1 ? "selected" : ""; ?>>
                        <i class="globe icon"></i>全部语言
                    </div>
                    <?php
                    // 遍历生成语言选项
                    $lang_count = count($language_ext);
                    $langmask = $OJ_LANGMASK;
                    $lang = (~((int)$langmask)) & ((1 << ($lang_count)) - 1); // 过滤受限制语言

                    for ($i = 0; $i < $lang_count; $i++) {
                        switch ($language_name[$i]) {
                            case 'C': $icons = 'copyright'; $colors = 'green'; break;
                            case 'C++': $icons = 'copyright'; $colors = 'blue'; break;
                            case 'Java': $icons = 'plus circle'; $colors = 'red'; break;
                            case 'Python': $icons = 'registered'; $colors = 'orange'; break;
                            default: $icons = 'question'; break;
                        }
                        if ($lang & (1 << $i) && $language_name[$i] != "Pascal") {
                            echo "<div style='font-size: 14px;' class='item' data-value='{$i}' " . ($selectedLang == $i ? "selected" : "") . "><i class='".$icons." icon'></i>
                                {$language_name[$i]}
                            </div>";
                        }
                    }
                    ?>
                </div>
            </div>

            &nbsp;&nbsp;&nbsp;&nbsp;
            
            <div class="ui dropdown selection" tabindex="0" style="font-size: 14px;margin-left: 3%;">
        <input type="hidden" name="jresult" value="<?php echo isset($_GET['jresult']) && is_numeric($_GET['jresult']) ? intval($_GET['jresult']) : '-1'; ?>">
        <i class="dropdown icon"></i>
        <div class="default text" style="color:<?php echo $OJ_DARK ? 'white' : 'black'; ?>;">
            <i class="question icon"></i>
            <?php 
            $jresult_get = isset($_GET['jresult']) && is_numeric($_GET['jresult']) ? intval($_GET['jresult']) : -1;
            echo $jresult_get == -1 ? "全部状态" : (isset($jresult[$jresult_get]) ? $jresult[$jresult_get] : "状态");
            ?>
        </div>
        <div class="menu">
            <?php 
            if ($jresult_get == -1) {
                echo "<div class='item' style='font-size: 14px;' data-value='-1' selected><i class='question icon'></i>全部状态</div>";
            } else {
                echo "<div class='item' style='font-size: 14px;' data-value='-1'><i class='question icon'></i>全部状态</div>";
            }

            // switch语句里面的内容自行修改,本代码中的文字少侠Dr以前二改过.
            for ($j = 0; $j < 12; $j++) {
                $i = ($j + 4) % 12;
                $colors = 'black';
                switch ($jresult[$i]) {
                    case '完全正确': $icons = 'checkmark'; $colors = 'green'; break;
                    case '格式错误': $icons = 'file'; $colors = 'blue'; break;
                    case '答案错误': $icons = 'remove'; $colors = 'red'; break;
                    case '时间超限': $icons = 'clock'; $colors = 'orange'; break;
                    case '内存超限': $icons = 'microchip'; $colors = 'orange'; break;
                    case '输出超限': $icons = 'print'; $colors = '#8b00ff'; break;
                    case '运行错误': $icons = 'bomb'; $colors = '#8b00ff'; break;
                    case '编译错误': $icons = 'code'; $colors = 'orange'; break;
                    case '等待判题':
                    case '等待重判':
                    case '正在判题': $icons = 'hourglass half'; $colors = 'skyblue'; break;
                    default: $icons = 'question'; break;
                }
                if ($i == $jresult_get) {
                    echo "<div class='item' style='font-size: 14px;color:" . $colors . "' data-value='" . strval($jresult_get) . "' selected><i class='" . $icons . " icon'></i><b>" . $jresult[$i] . "</b></div>";
                } else {
                    echo "<div class='item' style='color:" . $colors . ";font-size: 14px;' data-value='" . strval($i) . "'><i class='" . $icons . " icon'></i><b>" . $jresult[$i] . "</b></div>";
                }
            }
            ?>
        </div>
    </div>
          </div>
          <div style='width: 35%;'>

      <a style='float: right;font-size: 14px;' class="ui small blue button"  id="toggleButton" onclick="toggleAutoRefresh()" >开启<?php echo $CONTESTRANK_AUTO_FRESHING;?>s后自动刷新提交记录</a>
      <button class="ui small red button" type="button" id="resetButton" style="float: right;font-size: 14px;">
        <i class="minus circle icon"></i>
       重置选择
      </button>
      <button class="ui small green button" type="submit" style="float: right;font-size: 14px;">
        <i class="search icon"></i>
       <?php echo $MSG_SEARCH;?>
      </button>
    </div>
    </div>
  </form>
    <script>
        // 重置按钮功能
        document.getElementById('resetButton').addEventListener('click', function () {
            document.querySelector('input[name="problem_id"]').value = '';
            document.querySelector('input[name="user_id"]').value = '';
            document.querySelector('input[name="language"]').value = '-1';
            document.querySelector('input[name="jresult"]').value = '-1';
            document.querySelector('div[name="language"] .default.text').textContent = "全部语言";
            document.querySelector('div[name="jresult"] .default.text').textContent = "全部状态";
        });
    </script>

//以下的代码忽略...
