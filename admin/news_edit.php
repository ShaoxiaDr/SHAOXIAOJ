<?php
require_once("admin-header.php");
if(!(isset($_SESSION[$OJ_NAME.'_'.'administrator']))){
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

include("../template/syzoj/header-admin.php");
echo "<center><h1>".$MSG_NEWS."-"."修改"."</h1></center>";
echo "<hr>";
include_once("kindeditor.php");
?>

<div class="container">
<?php
if(isset($_POST['news_id'])){
  require_once("../include/check_post_key.php");

  $title = $_POST['title'];
  $content = $_POST['content'];
  $showInMenu = $_POST['showInMenu'];
  $menu = $showInMenu == "on" ? 1 : 0;

  $content = str_replace("<p>", "", $content);
  $content = str_replace("</p>", "<br />", $content);
  $content = str_replace(",", "&#44;", $content);

  $user_id = $_SESSION[$OJ_NAME.'_'.'user_id'];
  $news_id = intval($_POST['news_id']);

  if(false){
    $title = stripslashes($title);
    $content = stripslashes($content);
  }

  //别忘了添加importance字段.
  $importance = isset($_POST['importance']) ? 1 : 0;
  $sql = "UPDATE `news` SET `title`=?,`time`=now(),`content`=?,user_id=?,`menu`=?, `importance`=? WHERE `news_id`=?";
  //echo $sql;
  pdo_query($sql,$title,$content,$user_id,$menu, $importance,$news_id);

  header("location:news_list.php");
  exit();
}else{
  $news_id = intval($_GET['id']);
  $sql = "SELECT * FROM `news` WHERE `news_id`=?";
  $result = pdo_query($sql,$news_id);
  if(count($result)!=1){
    echo "No such News!";
    exit(0);
  }

  $row = $result[0];

  $title = htmlentities($row['title'],ENT_QUOTES,"UTF-8");
  $content = $row['content'];
  $showInMenu = $row['menu'] == 1;
}
?>

  <form method=POST action=news_edit.php>
    <input type=hidden name='news_id' value=<?php echo $news_id?>>
    <p align=left>
      <label <?php if($OJ_DARK) echo "style='color:white'";?> class="col control-label"><?php echo $MSG_TITLE?></label>
      <input style='color:black' type=text name=title size=71 value='<?php echo $title?>'>
    </p>
    <p align=left>
      <label <?php if($OJ_DARK) echo "style='color:white'";?> class="col control-label"><?php echo $MSG_NEWS_MENU?>
        <input style="display: inline-block;" type="checkbox" name=showInMenu <?php if($showInMenu) { echo "checked"; } ?> />
      </label>
    </p>
    <p align=left>
      <textarea class=kindeditor name=content rows=36 >
        <?php echo htmlentities($content,ENT_QUOTES,"UTF-8")?>
      </textarea>
    </p>

    <!--跟add_page同理-->
    <p align=left>  
      <label <?php if($OJ_DARK) echo "style='color:white'";?> class="col control-label"><?php echo $MSG_IMPORTANCE ?></label>  
      <input style="display: inline-block;" type="checkbox" name="importance" value="1" <?php if ($row['importance'] == 1) echo 'checked'; ?> />  
    </p>
    
    <?php require_once("../include/set_post_key.php");?>
    <p>
      <center>
      <input class='ui button' type=submit value='提交并发布' name=submit>
      </center>
    </p>
  </form>
</div>
