<?php
require_once ("admin-header.php");
require_once("../include/check_post_key.php");
if(!(isset($_SESSION[$OJ_NAME.'_'.'administrator'])||isset($_SESSION[$OJ_NAME.'_'.'html_tester']))){
  echo "<center><h2><b>SHAOXIA OJ提醒您</b></h2></center><hr>
    <center><h3>很抱歉,您没有此权限!</h3></center>
    <br><br><br>
    <center><h4>您可以通过联系OJ管理员来解决此问题</h4>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <center><img src='shaoxiaoj.PNG' width=500px></center>
    <center><h4>如有疑问,请联系少侠Dr(QQ:847075097)以解决问题哦</h4></center>";
  exit(1);
}

require_once("../include/db_info.inc.php");
require_once("../include/my_func.inc.php");

//contest_id
$title = $_POST['title'];
$content = $_POST['content'];
$showInMenu = $_POST['showInMenu'];
$menu = $showInMenu == "on" ? 1 : 0;

$user_id = $_SESSION[$OJ_NAME.'_'.'user_id'];

if(false){
  $title = stripslashes($title);
  $content = stripslashes($content);
}

$content = str_replace("<p>", "", $content);
$content = str_replace("</p>", "<br />", $content);
$content = str_replace(",", "&#44;", $content);

//多了这一行.
$importance = isset($_POST['importance']) ? 1 : 0;

//别忘了查importance字段.
$sql = "INSERT INTO news(`user_id`,`title`,`content`,`time`,`menu`,`importance`) VALUES(?,?,?,now(),?,?)";
pdo_query($sql,$user_id,$title,$content,$menu,$importance);

echo "<script>window.location.href=\"news_list.php\";</script>";
?>
