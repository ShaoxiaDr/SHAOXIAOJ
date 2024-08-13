<?php
//本文件仅用来借鉴学习,请勿全盘复制!

//本文件创建了qiandao表,涉及到的数据库有qiandao.users,请确保你的数据库有这些表或列.

//创建qiandao表:
//CREATE TABLE qiandao (id INT AUTO_INCREMENT PRIMARY KEY,user_id VARCHAR(255) NOT NULL,time DATETIME NOT NULL,lianxu INT DEFAULT 1);

//当然还涉及用户金币值,你可以自行在users表里创建一个表示金币值的列,比如gold列.
//ALTER TABLE users ADD COLUMN gold INT;

//我这里用的是score列.
?>
<?php require_once("include/check_get_key.php");?>
<?php include("template/syzoj/header.php");?>
<?php
if(!isset($_SESSION[$OJ_NAME.'_'.'user_id'])){
	echo "<center><h1><b>".$OJ_NAME."提醒您</b></h1></center><hr>
	<center><h1>您未登录</h1></center>
	<br><br><br>
	<center><h3>请登录后再来哦~</h3>
	<br><br><br><br><br><br><br><br><br><br><br><br>";
	if($OJ_NAME=="SHAOXIAOJ"){
	echo "<center><img src='shaoxiaoj.PNG' width=500px></center>
	<center><h3>如有疑问,请联系少侠Dr(QQ:847075097)以解决问题哦</h3></center>";
	exit(1);
	}
}

//首先在数据库中查找用户名对应的签到日期,看看有没有日期等于当天的行,如果有说明你已经签到过了.
$currentDate = date('Y-m-d');
$userId = $_SESSION[$OJ_NAME.'_user_id'];
$sql_search = "SELECT * FROM qiandao WHERE user_id = ? AND DATE(time) = ?";
$result_search = pdo_query($sql_search,$userId,$currentDate);
$search = $result_search[0];

//抛出错误信息
if($search){
	echo "<center><h1><b>".$OJ_NAME."提醒您</b></h1></center><hr>
	<center><h1>你已经签过到了</h1></center>
	<br><br><br>
	<center><h3>请返回至主页面</h3>
	<br><br><br><br><br><br><br><br><br><br><br><br>";
	if($OJ_NAME=="SHAOXIAOJ"){
	echo "<center><img src='shaoxiaoj.PNG' width=500px></center>
	<center><h3>如有疑问,请联系少侠Dr(QQ:847075097)以解决问题哦</h3></center>";
	exit(1);
	}
}
//有的服务器exit(1);没有起到终止作用,所以我这里再加一个else语句了.

else{
//看看该用户昨天签到没
$yesterday = date('Y-m-d', strtotime('-1 day'));  
$sql_search_yesterday = "SELECT * FROM qiandao WHERE user_id = ? AND DATE(time) = ?";  
$result_search_yesterday = pdo_query($sql_search_yesterday, $userId, $yesterday);  
$search_yesterday = $result_search_yesterday[0];

$lianxu = 0;
//若昨天签过到了,lianxu值加1,否则从1开始.当然这也包含了数据库没有该用户,即该用户一次也没签过到的情况.
if ($search_yesterday) {  
    //查询该用户的连续签到天数,注意是查找最近的时间(ORDER BY time DESC意思是列出的数据以time降序排列,LIMIT 1代表只列举1行.
    $sql_search_lianxu = "SELECT lianxu FROM qiandao WHERE user_id = ? ORDER BY time DESC LIMIT 1";  
    $result_search_lianxu = pdo_query($sql_search_lianxu, $userId);  
    $search_lianxu = $result_search_lianxu[0];  
    $lianxu = $search_lianxu['lianxu'] + 1;
} else {  
    $lianxu = 1;  
}

//在qiandao表新增一行.
$sql_insert = "INSERT INTO qiandao (user_id, time, lianxu) VALUES (?, NOW(), ?)";  

//若输入失败,抛出问题,以供开发者调试专用.
if (!pdo_query($sql_insert, $userId, $lianxu)) {  
    echo "签到表INSERT新用户失败!";  
    exit(1);  
} 

$add_score = 2;//每日签到金币值
if($lianxu == 7) $add_score = 5;

//连续登录有奖
else if($lianxu == 15) $add_score = 8;
else if($lianxu == 30) $add_score = 15;
else if($lianxu == 66) $add_score = 25;
else if($lianxu == 150) $add_score = 36;
else if($lianxu == 365) $add_score = 73;
else if($lianxu == 666) $add_score = 128;
else if($lianxu == 1000) $add_score = 288;
else if($lianxu == 1314) $add_score = 520;

//更新用户金币值.
$sql_gold = "UPDATE users SET score = score + ? WHERE user_id = ?";

//调试专用.
if(!pdo_query($sql_gold,$add_score,$userId))
{
	echo "更新金币失败!";
	exit(1);
}
?>

<!--返回上一页,即主页index.php-->
<script language=javascript>
	history.go(-1);
</script>
<?php }?>
