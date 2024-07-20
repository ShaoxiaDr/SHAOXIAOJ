<?php 
  include(dirname(__FILE__)."/header.php");
?>
<?php
    if(!isset($_SESSION[$OJ_NAME.'_'.'user_id'])){
        echo "<center><h1><b>".$OJ_NAME."提醒您</b></h1></center><hr>
        <center><h1>请登录后查看!</h1></center>
        <br><br><br>
        <center><h3>未登录用户无法显示做题数据哦,请登录后再来吧。谢谢配合哦~</h3>
        <br><br><br><br><br><br><br><br><br><br><br><br>";
        if($OJ_NAME=="SHAOXIAOJ"){
        echo "<center><img src='shaoxiaoj.PNG' width=500px></center>
        <center><h3>如有疑问,请联系少侠Dr(QQ:847075097)以解决问题哦</h3></center>";
        exit(1);
        }
    }
?>
<style>
  .toprow{
    font-weight:bold;
  }
</style>
<center><h1><?php echo $MSG_TODO?></h1></center><hr>
  <div class="ui <?php echo $ui_class?> icon message">
  <div class="content">
  <table class="ui very basic center aligned table">
					<thead>
						<tr class='toprow'>
							<td style='width: 4%;'>状态</td>
							<td class='hidden-xs center' style='width:7%;'>
								<?php echo $MSG_PROBLEM_ID?>
							</td>
							<td style='text-align:left;'><!--标题左对齐-->
								<?php echo $MSG_TITLE?>
							</td>
							<td class='hidden-xs center' style='width: 21%;'>
								<?php echo $MSG_SOURCE?>
							</td>
							<td style="cursor:hand;width: 4%;" class='center'>
								<?php echo $MSG_SOVLED?>
							</td>
							<td style="cursor:hand;width: 4%;" class='center'>
								<?php echo $MSG_SUBMIT?>
							</td>
              <td style="cursor:hand;width: 7%;" class='center'>
								正确率
							</td>
						</tr>
					</thead>
    <tbody>
						<?php
						$cnt = 0;
						foreach ( $view_problemset as $row ) {
							if ( $cnt )
								echo "<tr class='oddrow'>";
							else
								echo "<tr class='evenrow'>";
							$i = 0;
							foreach ( $row as $table_cell ) {
								if ( $i == 1 || $i == 3 )echo "<td  class='hidden-xs'>";
								else echo "<td>";
								echo "\t" . $table_cell;
								echo "</td>";
								$i++;
							}
							echo "</tr>";
							$cnt = 1 - $cnt;
						}
						?>
    </tbody>
  </table><br>
      <table class='ui very basic center aligned table'>
        <thead>
          <tr class=toprow align=center>
            <td><?php echo $MSG_CONTEST_ID?></td>
            <td style='text-align:left;'><?php echo $MSG_CONTEST_NAME?></td><!--标题左对齐-->
            <td><?php echo $MSG_CONTEST_STATUS?></td>
            <td><?php echo $MSG_CONTEST_OPEN?></td>
            <td><?php echo $MSG_CONTEST_CREATOR?></td>
          </tr>
        </thead>
        <tbody align='center'>
          <?php
          $cnt=0;
          foreach($view_contest as $row){
            if ($cnt)
              echo "<tr class='oddrow'>";
            else
              echo "<tr class='evenrow'>";
            $i=0;
            foreach($row as $table_cell){
              if($i==1) echo "<td style='text-align:left;'>";//标题左对齐
              else echo "<td>";
              echo "\t".$table_cell;
              echo "</td>";
              $i++;
            }
            echo "</tr>";
            $cnt=1-$cnt;
          }
          ?>
        </tbody>
      </table>
    <!-- 我感觉返回上一页这个按钮没必要显示.
    <p>
      <a href="javascript:history.go(-1)"><?php echo $MSG_BACK;?></a>
    </p> 
    -->
  </div>
</div>
<br>
<?php include(dirname(__FILE__)."/footer.php");?>
