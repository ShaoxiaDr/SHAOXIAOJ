<?php
// 使用本功能前,你要做的就是新建loging表,字段有:
// id(主键);
// user_id  VARCHAR(255) NOT NULL;
// nick VARCHAR(255);
// time DATETIME;
// doing TEXT;
// kind VARCHAR(255);

// 新建表请百度~
// 然后,应用这个loging表到各个需要记录的页面中,例如contest_add.php,将contest表插入记录后再加一句loging表的插入语句,像这样:

// $sql = "INSERT INTO `contest`(`title`,`start_time`,`end_time`,`private`,`langmask`,`description`,`password`,`user_id`,class_group)
//           VALUES(?,?,?,?,?,?,?,?,?)";

//   $description = str_replace("<p>", "", $description); 
//   $description = str_replace("</p>", "<br />", $description);
//   $description = str_replace(",", "&#44; ", $description);
//   $user_id=$_SESSION[$OJ_NAME.'_'.'user_id'];
//   if($chosen_class_name) $title = $chosen_class_name."-".$title;
//   echo $sql.$title.$starttime.$endtime.$private.$langmask.$description.$password,$user_id;
//   $cid = pdo_query($sql,$title,$starttime,$endtime,$private,$langmask,$description,$password,$user_id,$chosen_class_name) ;
//   echo "Add Contest ".$cid;

//   //添加log
//   $doing = "添加'".$title."'竞赛";
//   $kind = 'contest';
//   $sql_nick = "SELECT nick FROM users WHERE user_id = ?";
//   $result_nick = pdo_query($sql_nick, $_SESSION[$OJ_NAME.'_user_id']);
//   $nick = $result_nick[0][0];
  
//   $sql_log = "INSERT INTO loging (`user_id`,`nick`,`time`,`doing`,`kind`) VALUES (?, ?, NOW(), ?, ?)";
//   pdo_query($sql_log,$_SESSION[$OJ_NAME.'_user_id'],$nick,$doing,$kind);

// 在测试loging是否插入,我们可以用SELECT * FROM loging;来看看有没有成功记录.

// 说明就到这里,祝大家借鉴愉快doge~
?>
<?php $show_title="SHAOXIAOJ-系统日志"; ?>
<?php if($OJ_TESTSTATUS && !isset($_SESSION[$OJ_NAME.'_administrator'])){
    include("Test_information.php");
    exit(1);
}
?>
<link rel="stylesheet" href="../include/hoj.css" type="text/css">
<?php include("template/$OJ_TEMPLATE/header.php");?>
<style>
.pagination a {
    border:none;
}
</style>
<?php
    if(!isset($_SESSION[$OJ_NAME.'_'.'user_id'])){
        echo "<center><h1><b>".$OJ_NAME."提醒您</b></h1></center><hr>
        <center><h1>请登录后查看!</h1></center>
        <br><br><br>
        <center><h3>".$OJ_NAME." 为保证其安全性,请登录后再来吧。谢谢配合哦~</h3>
        <br><br><br><br><br><br><br><br><br><br><br><br>";
        if($OJ_NAME=="SHAOXIAOJ"){
            echo "<center><img src='shaoxiaoj.PNG' width=500px></center>
            <center><h3>如有疑问,请联系少侠Dr(QQ:847075097)以解决问题哦</h3></center>";
        }
        exit(1);
    }else if(!isset($_SESSION[$OJ_NAME.'_administrator'])){
        echo "<center><h1><b>".$OJ_NAME."提醒您</b></h1></center><hr>
        <center><h1>您暂无此权限!</h1></center>
        <br><br><br>
        <center><h3>错误码:ERROR 404</h3>
        <br><br><br><br><br><br><br><br><br><br><br><br>";
        if($OJ_NAME=="SHAOXIAOJ"){
            echo "<center><img src='shaoxiaoj.PNG' width=500px></center>
            <center><h3>如有疑问,请联系少侠Dr(QQ:847075097)以解决问题哦</h3></center>";
        }
        exit(1);
    }
    $page_size = 13; // 每页显示的记录数  
    $start = isset($_GET['start']) ? intval($_GET['start']) : 0;
    $where = "";
    if((isset($_GET['user_id']) && $_GET['user_id']) && (isset($_GET['kinds']) && $_GET['kinds'] && $_GET['kinds'] != 'all')){
      $where = " WHERE user_id = ? AND kind = ?";
    }else if((isset($_GET['user_id']) && $_GET['user_id']) || (isset($_GET['kinds']) && $_GET['kinds'] && $_GET['kinds'] != 'all')){
      $where = " WHERE";
      if(isset($_GET['user_id']) && $_GET['user_id']){
        $where .= " user_id = ?";
      }else if(isset($_GET['kinds']) && $_GET['kinds'] && $_GET['kinds'] != 'all'){
        $where .= " kind = ?";
      }
    }
    
    $sql = "SELECT * FROM loging $where ORDER BY id DESC LIMIT $start, $page_size";
    if((isset($_GET['user_id']) && $_GET['user_id']) && (isset($_GET['kinds']) && $_GET['kinds'] && $_GET['kinds'] != 'all')){
      $result = pdo_query($sql,$_GET['user_id'],$_GET['kinds']);
    }else if((isset($_GET['user_id']) && $_GET['user_id']) || (isset($_GET['kinds']) && $_GET['kinds'] && $_GET['kinds'] != 'all')){
      if(isset($_GET['user_id']) && $_GET['user_id']){
        $result = pdo_query($sql,$_GET['user_id']);
      }else if(isset($_GET['kinds']) && $_GET['kinds'] && $_GET['kinds'] != 'all'){
        $result = pdo_query($sql,$_GET['kinds']);
      }
    }else{
      $result = pdo_query($sql);
    }
    
    // echo $sql;echo $_GET['kinds'];
?>
<center><h1>系统日志</h1></center><hr>
<form class="ui mini form" action="loging_list.php" method=GET>
    <div class="inline fields" style="margin-bottom: 25px; white-space: nowrap; ">
      <label style="font-size: 1.2em; margin-right: 1px; <?php if($OJ_DARK) echo "color: #fff;";?>"><?php echo $MSG_USER?>：</label>
        <div class="field"><input name="user_id" style="width: 149px;height:34px;box-shadow: 0 0 0 100px #b983dc59 inset !important; <?php if($OJ_DARK) echo "background-color: #b983dc3b;color: white;";?>" type="text" value="<?php echo  htmlspecialchars($_GET['user_id'], ENT_QUOTES) ?>"></div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label style="font-size: 1.2em; margin-right: 1px; <?php if($OJ_DARK) echo "color: #fff;";?>">类型：</label>
        <select class="form-control" size="1" name="kinds" style="width: 110px;font-size: 1.2em; <?php if($OJ_DARK) echo "background-color: #b983dc3b;color:white";?>">
          <option value="all" <?php if(!$_GET['kinds']) echo "selected"?>>全部</option>
          <option value="contest" <?php if($_GET['kinds'] == 'contest') echo "selected"?>>作业/竞赛</option>
          <option value="problem" <?php if($_GET['kinds'] == 'problem') echo "selected"?>>题目</option>
          <option value="tijie" <?php if($_GET['kinds'] == 'tijie') echo "selected"?>>题解</option>
          <option value="privilege" <?php if($_GET['kinds'] == 'privilege') echo "selected"?>>用户权限</option>
          <option value="style" <?php if($_GET['kinds'] == 'style') echo "selected"?>>主题</option>
          <option value="score" <?php if($_GET['kinds'] == 'score') echo "selected"?>>金币</option>
          <option value="class" <?php if($_GET['kinds'] == 'class') echo "selected"?>>班级</option>
          <option value="news" <?php if($_GET['kinds'] == 'news') echo "selected"?>>新闻</option>
          <option value="others" <?php if($_GET['kinds'] == 'others') echo "selected"?>>其他</option>
        </select>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <button class="ui small green button" type="submit" style="margin-left: 20px;">
        <i class="search icon"></i>
       <?php echo $MSG_SEARCH;?>
      </button>
      <a class='ui small red button' href='loging_list.php'><i class='minus circle icon'></i>清除过滤条件</a>
    </div>
  </form>
<table class="ui very basic center aligned table">
  <thead>
    <tr>
      <td style='width: 6%;'><b>编号</b></td>
      <td style='width: 10%;'><b>操作人员</b></td>
      <td><b>操作事件</b></td>
      <td style='width: 15%;'><b>操作时间</b></td>
      <td style='width: 8%;'><b>操作类型</b></td>
    </tr>
  </thead>
  <tbody>
  <?php 
          foreach($result as $row){
            ?>  
            <tr>  
                <td><b><?php echo $row['id'];?></b></td>
                <td><a href='userinfo.php?user=<?php echo $row['user_id'];?>'><?php echo $row['nick'];?></a></td>
                <td><?php echo $row['doing'];?></td>  
                <td><b><?php echo $row['time'];?></b></td>  
                <?php
                switch($row['kind']){
                  case 'contest':$DOING = "作业/竞赛";break;
                  case 'tijie':$DOING = "题解";break;
                  case 'problem':$DOING = "题目";break;
                  case 'score':$DOING = "金币";break;
                  case 'style':$DOING = "主题";break;
                  case 'class':$DOING = "班级";break;
                  case 'news':$DOING = "新闻";break;
                  case 'privilege':$DOING = "用户权限";break;
                  default:$DOING = $row['kind'];break;
                }
                ?>
                <td><b><?php echo $DOING;?></b></td>  
            </tr>  
        <?php 
      }?>  
  </tbody>
  </table>     
    <?php
    $sql_count = "SELECT COUNT(*) AS total FROM loging $where"; 
    if((isset($_GET['user_id']) && $_GET['user_id']) && (isset($_GET['kinds']) && $_GET['kinds'] && $_GET['kinds'] != 'all')){ 
        $result_count = pdo_query($sql_count,$_GET['user_id'],$_GET['kinds']);
    }else if((isset($_GET['user_id']) && $_GET['user_id']) || (isset($_GET['kinds']) && $_GET['kinds'] && $_GET['kinds'] != 'all')){
      if(isset($_GET['user_id']) && $_GET['user_id']){
        $result_count = pdo_query($sql_count,$_GET['user_id']);
      }else if(isset($_GET['kinds']) && $_GET['kinds'] && $_GET['kinds'] != 'all'){
        $result_count = pdo_query($sql_count,$_GET['kinds']);
      }
    }else{
      $result_count = pdo_query($sql_count);
    }
    $total_records = $result_count[0]['total'];  
    $total_pages = ceil($total_records / $page_size);
    ?>
<div style="text-align: center;">  
    <div class="ui pagination menu" style="box-shadow: none;">  
      
        <?php  
        $geturl = '';
        $geturls = '';
        if(!((isset($_GET['user_id']) && $_GET['user_id']) || (isset($_GET['kinds']) && $_GET['kinds'] && $_GET['kinds'] != 'all'))){
          $geturl = '';
          $geturls = '';
        }
        else {
          $geturl = "?user_id=".$_GET['user_id']."&kinds=".$_GET['kinds'];
          $geturls = "&user_id=".$_GET['user_id']."&kinds=".$_GET['kinds'];
        }
 
        echo "<a class='icon item' href='loging_list.php$geturl'>首页</a>";
        if($_GET['start'] <= 60) {
          $top = 0;
          if($total_records >= $page_size * 13)
            $end = 13;
          else
            $end = $total_records / $page_size;
        }else if($total_records - ($_GET['start'] + 7 * $page_size) <= $page_size){
            $top = $total_records / $page_size - 13;
            $end = $total_records / $page_size;
        }
        else {
          $top = $_GET['start'] / $page_size - 5;
          $end = $_GET['start'] / $page_size + 8;
        }
        for ($i = $top * $page_size; $i < $end * $page_size; $i += $page_size) {  
            $page_number = ($i + 1)/$page_size;  
            $page_number = (int)$page_number + 1;
            echo "<a class='item";
            if($page_number == ($_GET['start'] / $page_size) + 1) echo " active";
            echo "' style='";
                if($OJ_DARK) echo "color:white;";
            echo "' href='loging_list.php?start=$i$geturls'";  
            if ($i == $start) {  
                echo " style='font-weight: bold;'";  
            }  
            echo ">$page_number</a>&nbsp;";  
        }  
        for ($i = 0; $i < $total_records - $page_size; $i += $page_size);
            echo "<a class='icon item' href='loging_list.php?start=$i$geturls'>尾页</a>";
        ?>  
    </div>  
</div>
<br>
<?php include("template/$OJ_TEMPLATE/footer.php");?>
