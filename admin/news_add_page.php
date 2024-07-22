<?php
$show_title="添加公告";
require_once("admin-header.php");
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
include("../template/syzoj/header-admin.php");
echo "<center><h1>".$MSG_ADD.$MSG_NEWS."</h1></center>";
echo "<hr>";

include_once("kindeditor.php");
?>

<?php
if(isset($_GET['cid'])){
  $cid = intval($_GET['cid']);
  $sql = "SELECT * FROM news WHERE `news_id`=?";
  $result = pdo_query($sql,$cid);
  $row = $result[0];
  $title = $row['title'];
  $content = $row['content'];
  $defunct = $row['defunct'];
}
$plist = "";
if(isset($_POST['pid'])){
	sort($_POST['pid']);
	foreach($_POST['pid'] as $i){
	  if($plist)
	    $plist.=','.intval($i);
	  else
	    $plist = $i;
	}
	
  $plist = trim($_POST['hlist']);
  $pieces = explode(",",$plist );
  $pieces = array_unique($pieces);
  if($pieces[0]=="") unset($pieces[0]);
  $plist=implode(",",$pieces);

	  $content="[plist=".$plist."]".htmlentities($_POST['keyword'],ENT_QUOTES,"utf-8")."[/plist]";
}
?>

<div class="container">
  <form method=POST action=news_add.php>
    <p align=left>
      <label <?php if($OJ_DARK) echo "style='color:white'";?> class="col control-label"><?php echo $MSG_TITLE?></label>
      <input style='color: black;' type=text name=title size=71 value='<?php echo isset($title)?$title."-Copy":""?>'>
    </p>
    <p align=left>
      <label <?php if($OJ_DARK) echo "style='color:white'";?> class="col control-label"><?php echo $MSG_NEWS_MENU?>
        <input style="display: inline-block;" type="checkbox" name=showInMenu />
      </label>
    </p>
    <p align=left>
      <textarea class=kindeditor name=content rows=36 >
        <?php echo isset($content)?$content:""?>
      </textarea>
    </p>

    <!--新增了一个p-->
    <p align=left>  

      <!--$MSG_IMPORTANCE内容为:设置为重要-->
      <label <?php if($OJ_DARK) echo "style='color:white'";?> class="col control-label"><?php echo $MSG_IMPORTANCE ?></label>  
      <input style="display: inline-block;" type="checkbox" name="importance" value="1" />  
    </p>
    
    <p>
      <center>
        <?php if(isset($_SESSION[$OJ_NAME.'_'.'html_tester'])){?>
        <span>禁止提交</span>
        <?php }else{ ?>
        <input class='ui button' type=submit value='提交并发布' >
        <?php }?>
      </center>
    </p>
    <?php require_once("../include/set_post_key.php");?>
  </form>
</div>
