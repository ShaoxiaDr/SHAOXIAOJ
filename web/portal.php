<!-- 
建议将此style代码放在header.php中.此代码为百分比图标css.
<style>
.skillbar{
    width:100%;
    padding:10px;
    margin:0 0;
    position:relative;
    display:block;
    overflow:hidden;
    height:22px;
    background-color:red;
    border-radius:5px 5px 5px 5px;
}
.skillbar.html .title{
    background-color:#c96300;
}
.skillbar.html .filled{
    background-color:green;
}
.skillbar.css .title{
    background-color:#0f5487;
}
.skillbar.css .filled{
    background-color:#177fcb;
}
.skillbar.js .title{
    background-color:#f0b109;
}
.skillbar.js .filled{
    background-color:#f8ca4d;
}
.skillbar.php .title{
    background-color:#3d4670;
}
.skillbar.php .filled{
    background-color:#5864a2;
}
.skillbar.jquery .title{
    background-color:#064a7a;
}
.skillbar.jquery .filled{
    background-color:#0977c3;
}
.skillbar.sass .title{
    background-color:#ba437d;
}
.skillbar.sass .filled{
    background-color:#cf7aa4;
}
.skillbar.less .title{
    background-color:#1f3861;
}
.skillbar.less .filled{
    background-color:#31599b;
}
.skillbar.react .title{
    background-color:#33c7f0;
}
.skillbar.react .filled{
    background-color:#7adbf5;
}
.skillbar.nodejs .title{
    background-color:#5e8f35;
}
.skillbar.nodejs .filled{
    background-color:#83bf51;
}
.skillbar.angular .title{
    background-color:#8f0023;
}
.skillbar.angular .filled{
    background-color:#dc0035;
}
.skillbar.vue .title{
    background-color:#2f8f67;
}
.skillbar.vue .filled{
    background-color:#47c390;
}
.skillbar.meteor .title{
    background-color:#cc2b2c;
}
.skillbar.meteor .filled{
    background-color:#de6566;
}
.skillbar.backbone .title{
background-color:#005086;
}
.skillbar.backbone .filled{
    background-color:#007dd3;
}
.skillbar.ember .title{
    background-color:#c63d2d;
}
.skillbar.ember .filled{
    background-color:#dc7064;
}
.skillbar.mysql .title{
    background-color:#003e58;
}
.skillbar.mysql .filled{
    background-color:#0073a5;
}
.skillbar.python .title{
    background-color:#295479;
}
.skillbar.python .filled{
    background-color:#3d7cb2;
}
.skillbar.django .title{
    background-color:#010705;
}
.skillbar.django .filled{
    background-color:#0e4731;
}
.skillbar.agile .title{
    background-color:#198cb7;
}
.skillbar.agile .filled{
    background-color:#37b6e4;
}
.skillbar.photoshop .title{
    background-color:#211a56;
}
.skillbar.photoshop .filled{
    background-color:#382c90;
}
.skillbar.illustrator .title{
    background-color:#572e11;
}
.skillbar.illustrator .filled{
    background-color:#98511d;
}
.skillbar.indesign .title{
    background-color:#a42b69;
}
.skillbar.indesign .filled{
    background-color:#d04c8f;
}
.skillbar.laravel .title{
    background-color:#f0280f;
}
.skillbar.laravel .filled{
    background-color:#f56856;
}
.skillbar .title{
    background-color:rgba(0,0,0,.6);
    height:30px;
    width:85px;
    text-align:center;
    left:0;
    color:#f0f0f0;
    border-radius:5px 0 0 5px;
}
.skillbar .percent,.skillbar .title{
    padding:3px;
    position:absolute;
    top:0;
    z-index:9;
}
.skillbar .percent{ 
    font-size:12px; 
    bottom:5px; 
    right:30px;
    color:#FFF;
    font-weight:700;
}
.skillbar .filled{
    z-index:8;
    position:absolute;
    top:0;
    left:0;
    background-color:rgba(0,80,80,.3);
    height:100%;
    width:20px;
    border-radius:5px 0 0 5px;
}
</style>
-->
<?php
	ini_set("display_errors", "Off");  //set this to "On" for debugging  ,especially when no reason blank shows up.
	require_once("include/db_info.inc.php");
	require_once('include/const.inc.php');
	require_once('include/my_func.inc.php');
	if(isset($_SESSION[$OJ_NAME.'_user_id'])){
		$user_id=$_SESSION[$OJ_NAME.'_user_id'];
		$show_title=$OJ_NAME."-我的待办";
		$sub_arr = Array(); 
		$acc_arr = Array(); 
		if (isset($_SESSION[$OJ_NAME.'_'.'user_id'])){
			$sql = "SELECT problem_id, MIN(result) AS result FROM solution WHERE user_id=? and result>=4 GROUP BY problem_id ";
			$result = pdo_query($sql,$_SESSION[$OJ_NAME.'_'.'user_id']);
			foreach ($result as $row){
				$sub_arr[$row['problem_id']] = true;
				if($row['result'] == 4) $acc_arr[$row['problem_id']] = true;		
			}		
		}

	}else{
		$user_id="Guest";
		$show_title=$OJ_NAME."-我的待办";

	}
	$sql="select * from problem p inner join (select distinct problem_id,contest_id from solution where 
			result!=4 and user_id=? and problem_id not in (select distinct problem_id from solution where result=4 and user_id=?)) f on p.problem_id=f.problem_id ";
	$result=pdo_query($sql,$user_id,$user_id); // 查找做了但是没做对的题
$cnt = 0;
$view_problemset = Array();
$i = 0;

//竞赛显示时分秒的函数:formatTimeLength($length).
function formatTimeLength($length) {
	$hour = 0;
	$minute = 0;
	$second = 0;
	$result = '';
  
	global $MSG_SECONDS, $MSG_MINUTES, $MSG_HOURS, $MSG_DAYS;
  
	if ($length>=60) {
	  $second = $length%60;
	  
	  if ($second>0 && $second<10) {
		  $result = '0'.$second.' '.$MSG_SECONDS;}
	  else if ($second>0) {
		  $result = $second.' '.$MSG_SECONDS;
	  }
  
	  $length = floor($length/60);
	  if ($length >= 60) {
		$minute = $length%60;
		
		if ($minute==0) {
			if ($result != '') {
				$result = '00'.' '.$MSG_MINUTES.' '.$result;
			}
		}
		else if ($minute>0 && $minute<10) {
			if ($result != '') {
				$result = '0'.$minute.' '.$MSG_MINUTES.' '.$result;}
				  }
				  else {
					  $result = $minute.' '.$MSG_MINUTES.' '.$result;
				  }
				  
				  $length = floor($length/60);
  
				  if ($length >= 24) {
					  $hour = $length%24;
  
				  if ($hour==0) {
					  if ($result != '') {
						  $result = '00'.' '.$MSG_HOURS.' '.$result;
					  }
				  }
				  else if ($hour>0 && $hour<10) {
					  if($result != '') {
						  $result = '0'.$hour.' '.$MSG_HOURS.' '.$result;
					  }
				  }
				  else {
					  $result = $hour.' '.$MSG_HOURS.' '.$result;
				  }
  
				  $length = floor($length / 24);
				  $result = $length .$MSG_DAYS.' '.$result;
			  }
			  else {
				  $result = $length.' '.$MSG_HOURS.' '.$result;
			  }
		  }
		  else {
			  $result = $length.' '.$MSG_MINUTES.' '.$result;
		  }
	  }
	  else {
		  $result = $length.' '.$MSG_SECONDS;
	  }
	  return $result;
  }

foreach ($result as $row) {
	$view_problemset[$i] = Array();

	if (isset($sub_arr[$row['problem_id']])) {
		if (isset($acc_arr[$row['problem_id']])) 
			$view_problemset[$i][0] = "<span class=\"status accepted\"><i class=\"checkmark icon\"></i></span>";
		else
			$view_problemset[$i][0] = "<span class=\"status wrong_answer\"><i class=\"remove icon\"></i></span>";
	}
	else {
		$view_problemset[$i][0] = "<div class=none> </div>";
	}

	$category = array();
	$cate = explode(" ",$row['source']);
	foreach($cate as $cat){
                        $cat=trim($cat);
                        if(mb_ereg("^http",$cat)){
                                $cat=get_domain($cat);
                        }
                        array_push($category,trim($cat));
        }
	$view_problemset[$i][1] = "<div fd='problem_id' class='center'>".$row['problem_id']."</div>";
  //问题名称左对齐.
	$view_problemset[$i][2] = "<div style='text-align:left;' class='left'><a href='problem.php?id=".$row['problem_id']."'>".$row['title']."</a></div>";;
	$view_problemset[$i][3] = "<div pid='".$row['problem_id']."' fd='source' class='center'>";

	foreach ($category as $cat) {
		if(trim($cat)==""||trim($cat)=="&nbsp")
			continue;

		$hash_num = hexdec(substr(md5($cat),0,7));
		$label_theme = $color_theme[$hash_num%count($color_theme)];

		if ($label_theme=="")
			$label_theme = "default";

		$view_problemset[$i][3] .= "<a title='".htmlentities($cat,ENT_QUOTES,'UTF-8')."' class='label label-$label_theme' style='display: inline-block;' href='problemset.php?search=".htmlentities(urlencode($cat),ENT_QUOTES,'UTF-8')."'>".mb_substr($cat,0,10,'utf8')."</a>&nbsp;";
	}

	$view_problemset[$i][3] .= "</div >";
	$view_problemset[$i][4] = "<div class='center'><a href='status.php?problem_id=".$row['problem_id']."&jresult=4'>".$row['accepted']."</a></div>";
	$view_problemset[$i][5] = "<div class='center'><a href='status.php?problem_id=".$row['problem_id']."'>".$row['submit']."</a></div>";

  //百分比进度栏
	$view_problemset[$i][6] =  "<div class=\"skillbar html\" style=\"text-align: center;\">";  
	if ($row['submit'] == 0) {  
		$view_problemset[$i][6] .=  "<div class=\"filled\" data-width=\"0\" style=\"width: 0%;\"></div>";  
		$view_problemset[$i][6] .=  "<span class=\"percent\" style='right: 35%;'>0%</span>";  
	} else {  
		$zhengque1 = number_format($row['accepted'] / $row['submit'] * 100, 0);  
		if ($zhengque1 >= 100) {  
			$zhengque1 = 100; // 如果百分比大于100，设置为100  
			$view_problemset[$i][6] .=  "<div class=\"filled\" data-width=\"100\" style=\"width: 100%;\"></div>";  
			$view_problemset[$i][6] .=  "<span class=\"percent\" style='right: 28%;'>100".$MSG_PERCENT."</span>";  
		} else {   
			$view_problemset[$i][6] .=  "<div class=\"filled\" data-width=\"".$zhengque1."\" style=\"width: ".$zhengque1."%;\"></div>";  
			$view_problemset[$i][6] .=  "<span class=\"percent\" style='right: 33%;'>".$zhengque1.$MSG_PERCENT."</span>";  
		}  
	}  
	$view_problemset[$i][6] .=  "</div>"; // 关闭最外层的 <div>  
	$i++;
}
	$mycontests=$wheremy="";

	if (isset($_SESSION[$OJ_NAME.'_user_id'])) {
		$sql = "select distinct contest_id from solution where contest_id>0 and user_id=?";
		$result = pdo_query($sql,$_SESSION[$OJ_NAME.'_user_id']);

		foreach ($result as $row) {
			$mycontests .= ",".$row[0];
	        }

		$len = mb_strlen($OJ_NAME.'_');
                $user_id = $_SESSION[ $OJ_NAME . '_' . 'user_id' ];

                if(!empty($user_id)){
                        // 已登录的
                        $sql = "SELECT * FROM `privilege` WHERE `user_id`=?";
                        $result = pdo_query( $sql, $user_id );

                        // 刷新各种权限
                        foreach ( $result as $row ){
                                if(isset($row[ 'valuestr' ])){
                                        $_SESSION[ $OJ_NAME . '_' . $row[ 'rightstr' ] ] = $row[ 'valuestr' ];
                                }else {
                                        $_SESSION[ $OJ_NAME . '_' . $row[ 'rightstr' ] ] = true;
                                }
                        }
                       if(isset($_SESSION[ $OJ_NAME . '_vip' ])) {  // VIP mark can access all [VIP] marked contest
                                $sql="select contest_id from contest where title like '%[VIP]%'";
                                $result=pdo_query($sql);
                                foreach ($result as $row){
                                        $_SESSION[ $OJ_NAME . '_c' .$row['contest_id'] ] = true;
                                }
                        };
                }

		foreach ($_SESSION as $key => $value) {
			if ((mb_substr($key,$len,1)=='m' || mb_substr($key,$len,1)=='c') && intval(mb_substr($key,$len+1))>0) {
                         	//echo substr($key,1)."<br>";
				$mycontests .= ",".intval(mb_substr($key,$len+1));
			}
		}

		//echo "=====>$mycontests<====";
		if (!empty($mycontests)){
			$mycontests=substr($mycontests,1);
			$wheremy=" and  contest_id in ($mycontests) "; 
		}
		$wheremy.= " and start_time < now() and end_time > now() ";
	}

		$sql = "SELECT *  FROM contest WHERE contest.defunct='N' $wheremy  ORDER BY contest_id DESC";
		//echo htmlentities($sql);
		$result = pdo_query($sql);
		$view_contest=array();
	foreach ($result as $row) {
		$view_contest[$i][0] = $row['contest_id'];

		if (trim($row['title'])=="")
			$row['title'] = $MSG_CONTEST.$row['contest_id'];

		$view_contest[$i][1] = "<a href='contest.php?cid=".$row['contest_id']."'>".$row['title']."</a>";
		$start_time = strtotime($row['start_time']);
		$end_time = strtotime($row['end_time']);
		$now = time();

		$length = $end_time-$start_time;
		$left = $end_time-$now;
			// $view_contest[$i][2] = $row['start_time']."&nbsp;";
			$view_contest[$i][2] = "<span class=text-danger>$MSG_LeftTime</span>"." ".formatTimeLength($left)."</span>";
		$private = intval($row['private']);
		    if ($private==0)
			$view_contest[$i][4] = "<span class=text-primary>$MSG_Public</span>";
		    else if($private==1)
			$view_contest[$i][5] = "<span style='color:orange'>$MSG_Private</span>";
			else if($private==2)
			$view_contest[$i][6] = "<span class=text-danger>竞赛&考试</span>";
			else
			$view_contest[$i][7] = "<span style='color:green'>成员自建赛</span>";

			$sql_nick = "SELECT nick FROM users WHERE user_id = ?";
			$result_nick = pdo_query($sql_nick, $row['user_id']);
		    $view_contest[$i][8] = $result_nick[0][0];
	    $i++;
  	}
	require("template/".$OJ_TEMPLATE."/".basename(__FILE__));
