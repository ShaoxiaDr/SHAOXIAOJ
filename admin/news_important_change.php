<?php 

//其实就是仿照news_df_change.php的写法,改了几个变量而已.把defunct改为importance,把"Y"改成1,"N",改成0.(1和0是数字,不是字符)
require_once("admin-header.php");
require_once("../include/check_get_key.php");
if (!(isset($_SESSION[$OJ_NAME.'_'.'administrator']))){
	echo "<center><h2><b>SHAOXIA OJ提醒您</b></h2></center><hr>
    <center><h3>很抱歉,您没有此权限!</h3></center>
    <br><br><br>
    <center><h4>您可以通过联系OJ管理员来解决此问题</h4>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <center><img src='shaoxiaoj.PNG' width=500px></center>
    <center><h4>如有疑问,请联系少侠Dr(QQ:847075097)以解决问题哦</h4></center>";
	exit(1);
}
?>
<?php $id=intval($_GET['id']);
$sql="SELECT `importance` FROM `news` WHERE `news_id`=?";
$result=pdo_query($sql,$id);
$row=$result[0];
$importance=$row[0];
echo $importance;

if ($importance == 0) $sql="update `news` set `importance`= 1 where `news_id`=?";
else $sql="update `news` set `importance`= 0 where `news_id`=?";
pdo_query($sql,$id) ;
?>
<script language=javascript>
	history.go(-1);
</script>
