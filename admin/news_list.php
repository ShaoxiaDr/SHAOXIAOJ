<?php
//后台体验者为SHAOXIAOJ特有权限,大家借鉴一下代码,复制部分代码即可哦~少侠Dr贴心给你们弄了注释!

$show_title="公告列表";
require("admin-header.php");
require_once("../include/set_get_key.php");

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

if(isset($OJ_LANG)){
  require_once("../lang/$OJ_LANG.php");
}
?>
<?php include("../template/syzoj/header-admin.php");?>
<title>新闻列表</title>
<center><h1><?php echo $MSG_NEWS."-".$MSG_LIST?></h1></center>
<hr>

<div class='container' <?php if($OJ_DARK) echo "style='color: white;'";?>>

<?php
$sql = "SELECT COUNT('news_id') AS ids FROM `news`";
$result = pdo_query($sql);
$row = $result[0];

$ids = intval($row['ids']);

$idsperpage = 10;
$pages = intval(ceil($ids/$idsperpage));

if(isset($_GET['page'])){ $page = intval($_GET['page']);}
else{ $page = 1;}

$pagesperframe = 5;
$frame = intval(ceil($page/$pagesperframe));

$spage = ($frame-1)*$pagesperframe+1;
$epage = min($spage+$pagesperframe-1, $pages);

$sid = ($page-1)*$idsperpage;

$sql = "";
if(isset($_GET['keyword']) && $_GET['keyword']!=""){
  $keyword = $_GET['keyword'];
  $keyword = "%$keyword%";

  //别忘了数据库查询语句添加一个importance字段.
  $sql = "SELECT `news_id`,`user_id`,`title`,`time`,`defunct`,`importance`,`menu` FROM `news` WHERE (title LIKE ?) OR (content LIKE ?) ORDER BY `news_id` DESC";
  $result = pdo_query($sql,$keyword,$keyword);
}else{

  //别忘了数据库查询语句添加一个importance字段.
  $sql = "SELECT `news_id`,`user_id`,`title`,`time`,`defunct`,`importance`,`menu` FROM `news` ORDER BY `news_id` DESC LIMIT $sid, $idsperpage";
  $result = pdo_query($sql);
}
?>

<center>
<form action=news_list.php class="form-search form-inline">
<div class="ui action left icon input inline"><i class="search icon"></i>
  <input type="text" name=keyword class="form-control search-query" placeholder="<?php echo $MSG_TITLE.', '.$MSG_CONTENTS?>">
  <button type="submit" class="ui mini button" style='border:none'><?php echo $MSG_SEARCH?></button>
  <?php 
        $urlx = $_SERVER['REQUEST_URI']; // 获取当前请求的 URL  
  
        // 要检查的字段  
        $searchTerms = ['keyword'];  
          
        $SEARCH_ALL = false;
        // 遍历要检查的字段  
        foreach ($searchTerms as $term) {  
            if (strpos($urlx, $term) !== false) {  
                $SEARCH_ALL = true;
            }
        }  
        ?>
        <?php if($SEARCH_ALL){?>
                <a href='news_list.php' class='ui mini button' style='margin-left:15px;'>恢复全部</a>
        <?php }?>
        </div>
</form>
</center>

<center>
  <table class="table table-striped content-box-header" width=100% border=1 style="text-align:center;">
  <thead>
    <tr style='height:22px;' class='toprow'>
      <td class='text-center' style="text-align:center;font-weight:bold;width: 6%;">新闻编号</td>
      <td class='text-center' style="text-align:left;font-weight:bold">新闻名称</td>
      <td class='text-center' style="text-align:center;font-weight:bold;width: 20%;">最后更新时间</td>
      <td class='text-center' style="text-align:center;font-weight:bold;width: 5%;">状态</td>
      
      <!-- 新增列.-->
      <td class='text-center' style="text-align:center;font-weight:bold;width: 5%;">重要性</td>
      
      <td class='text-center' style="text-align:center;font-weight:bold;width: 5%;">复制</td>
      <!-- 我个人是没有把公告直接弄到上方功能栏的习惯,所以这一段注释掉了.
      <td class='text-center' style="text-align:center;font-weight:bold">展示菜单栏</td> -->
    </tr>
    </thead>
    <tbody>
    <?php
    foreach($result as $row){
      echo "<tr style='height:22px;background-color: #f9f9f9;color:black'>";
        echo "<td class='text-center' style='text-align:center;color:black;'>".$row['news_id']."</td>";

        //判断是否为后台体验者,如果是,公告无法编辑.
        if(isset($_SESSION[$OJ_NAME.'_'.'html_tester']))
          echo "<td class='text-center' style='text-align:left;color:black;'><span>".($row['title']==""?"Empty":$row['title'])."</span>"."</td>";
        else
          echo "<td class='text-center' style='text-align:left;color:black;'><a href='news_edit.php?id=".$row['news_id']."'>".($row['title']==""?"Empty":$row['title'])."</a>"."</td>";
        echo "<td class='text-center' style='text-align:center;color:black;'>".$row['time']."</td>";

        //判断是否为后台体验者,如果是,无法修改公告的禁用和启用.
        if(isset($_SESSION[$OJ_NAME.'_'.'html_tester'])){
          echo "<td class='text-center' style='text-align:center;color:black;'><span>".($row['defunct']=="N"?"<span class=green>启用</span>":"<span class=red>禁用</span>")."</span>"."</td>";

          //新增代码.
          echo "<td class='text-center' style='text-align:center;color:black;'><span>".($row['importance']?"<span class=orange>是</span>":"<span class=green>否</span>")."</span>"."</td>";
        }
        
        else{
          echo "<td class='text-center' style='text-align:center;color:black;'><a href=news_df_change.php?id=".$row['news_id']."&getkey=".$_SESSION[$OJ_NAME.'_'.'getkey'].">".($row['defunct']=="N"?"<span class=green>启用</span>":"<span class=red>禁用</span>")."</a>"."</td>";

          //新增代码.
          echo "<td class='text-center' style='text-align:center;color:black;'><a href=news_importance_change.php?id=".$row['news_id']."&getkey=".$_SESSION[$OJ_NAME.'_'.'getkey'].">".($row['importance']?"<span class=orange>是</span>":"<span class=green>否</span>")."</a>"."</td>";
        }
        

        //判断是否为后台体验者,如果是,无法复制新闻.
        if(isset($_SESSION[$OJ_NAME.'_'.'html_tester']))
        echo "<td class='text-center' style='text-align:center;color:black;'><span>禁止复制</span></td>";
        else
        echo "<td class='text-center' style='text-align:center;color:black;'><a href=news_add_page.php?cid=".$row['news_id'].">复制</a></td>";
        // echo "<td class='text-center' style='text-align:center;color:black;'>" . ($row['menu'] == 1 ? "是" : "否") . "</td>";
      echo "</tr>";
    }
    ?>
    </tbody>
  </table>
</center>
- <?php echo $MSG_HELP_ADD_FAQS?>

<?php
if(!(isset($_GET['keyword']) && $_GET['keyword']!=""))
{
  echo "<div style='text-align: center; '>";
  echo "<div class=\"ui pagination menu\" style=\"box-shadow: none; \">";
  echo "<a style='border: none;' class=\"";
  if($page==1) echo "disabled ";
  echo "icon item\" href='news_list.php?page=".(strval(1))."'>首页</a>";
  echo "<a style='border: none;' class=\"";
  if($page==1) echo "disabled ";
  echo "icon item\" href='news_list.php?page=".($page==1?strval(1):strval($page-1))."'><i class=\"left chevron icon\"></i></a>";
  for($i=$spage; $i<=$epage; $i++){
    echo "<a class=\"".($page==$i?"active ":"")."item\" style='border: none;' title='go to page' href='news_list.php?page=".$i."'>".$i."</a>";
  }
  echo "<a style='border: none;' class=\"";
  if($page==$pages) echo "disabled ";
  echo "icon item\" href='news_list.php?page=".($page==$pages?strval($page):strval($page+1))."'><i class=\"right chevron icon\"></i></a>";
  echo "<a style='border: none;' class=\"";
  if($page==$pages) echo "disabled ";
  echo "icon item\" href='news_list.php?page=".(strval($pages))."'>尾页</a>";
  echo "</div>";
  echo "</div>";
}
?>

</div>
