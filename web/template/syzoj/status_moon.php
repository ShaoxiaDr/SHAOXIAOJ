//此文件为模板端status.php的补充.如果你的OJ包含少侠Dr版本的夜间模式或自己二次开发的夜间模式,请在status.php的上方加入以下CSS代码

<?php if($OJ_DARK){?>
<style>
  .ui.selection.dropdown {
        background-color:#222222;
        border: 1px solid #4e4e4e;
  }
  .ui.selection.dropdown .menu>.item {
        border: 1px solid #4e4e4e;
  }
  .ui.dropdown .menu .selected.item, .ui.dropdown.selected {
        color:white;
  }
  .ui.selection.active.dropdown {
        border: 1px solid #4e4e4e;
        border-color:#4e4e4e;
  }
  .ui.selection.active.dropdown .menu {
        background-color: #222222;
        border-color:#4e4e4e;
  }
  .ui.dropdown .menu>.item:hover {
        color:white;
  }
  .ui.selection.dropdown .menu>.item {
        color:white;
  }
  .ui.selection.active.dropdown:hover .menu {
        border-color:#4e4e4e;
  }
  .ui.selection.active.dropdown:hover {
        border-color:#4e4e4e;
  }

  .ui.form input:not([type]), .ui.form input[type=date], .ui.form input[type=datetime-local], .ui.form input[type=email], .ui.form input[type=file], .ui.form input[type=number], .ui.form input[type=password], .ui.form input[type=search], .ui.form input[type=tel], .ui.form input[type=text], .ui.form input[type=time], .ui.form input[type=url] {
        border: 1px solid #565656;
        background-color: #222222;
  }

  i{
      color:white;
  }
</style>
<?php }?>

//这是夜间模式的CSS代码,可能弄得不尽人意.如果你具有过硬的二次开发的能力,也可以自行修改一下细节.
