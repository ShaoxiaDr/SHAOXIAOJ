# SHAOXIAOJ
基于HUSTOJ二改的OJ样式
本站为您展示SHAOXIAOJ进行HUSTOJ二改的部分内容,各位观众感兴趣的话,点亮一个star关注支持一下~

SHAOXIAOJ网址: [https://www.shaoxiaoj.top](https://www.shaoxiaoj.top)


![image](index.png)


## SHAOXIAOJ更新日志
注意:db_info.inc.php 下称 "配置文件".

<details open>
<summary><b>2024年-10月</b></summary>
	
日期  | 类型 |  更新内容
------- | :--: | :-------
10-9 | 新增 | 新增其他的排名页面(合集).
10-9 | 新增 | 新增用户PK功能,双方可直接查看对方的情况以及自己的PK结果,每人每天限用3次.
10-6 | 更新 | 后台公告和活动分页展示,便于管理员进行管理.
10-1 | 修复 | 修复后台商城页面外来网址的缩略图图片无法正常显示的问题.
10-1 | 新增 | 后台权限添加新增操作记录审验.
</details>

<details>
<summary><b>2024年-9月</b></summary>
	
日期  | 类型 |  更新内容
------- | :--: | :-------
09-24 | 新增 | 后台新增竞赛出题人 审核人 列表,方便管理员观看
09-22 | 新增 | 竞赛页面新增 出题人 审题人 展示内容,且后台可更改.(仅管理员发布的比赛显示)
09-22 | 新增 | 新增兑换码功能,使成员更有动力去刷题或关注OJ活动等
09-19 | 新增 | 新增系统日志页面,该页面只允许管理员访问,目的是为了查看权限人员操作记录.
09-10 | 更新 | 更新班级列表localstorage逻辑,使其记住你选择新版/旧版页面.
</details>

<details>
<summary><b>2024年-8月</b></summary>
	
日期  | 类型 |  更新内容
------- | :--: | :-------
08-28 | 新增 | 新增题目点赞和收藏功能,且成员可在右上角功能栏查看收藏的题目
08-23 | 新增 | 新增OJ主题商店,便于成员选择自己心仪的主题~
08-17 | 新增 | 后台问题列表新增升序降序按钮,便于管理题目.
08-17 | 修复 | 修复主页自建赛列表竞赛标题全为空格字符的情况下竞赛名称不显示的问题.
08-17 | 更新 | 更新题目/竞赛列表显示逻辑,非管理员只显示自己添加的题目/竞赛.
08-17 | 新增 | 新增修改题目序号以改变题目列表顺序的功能.
08-11 | 更新 | 公告和活动列表新增浏览量标识.
08-10 | 更新 | 更新夜间模式的题解代码显示,更护眼清晰好看.
08-10 | 更新 | 考试屏蔽页面包含班级页和反馈建议页,以及个性配置页面.
08-10 | 新增 | 新增每日打卡功能,连续打卡还能多送金币哦~(代码已上传)
08-09 | 更新 | 更新文本框功能,将多余的功能删除,防止非法写入对网站有害的内容.
08-09 | 新增 | 新增OJ日志功能,当用户对OJ使用高级权限时,数据库会把行为记录在案,方便核查.
08-09 | 新增 | 新增个性配置功能,用户可调节夜间模式以及AC音效的显示.
08-06 | 新增 | 新增性别字段和QQ字段,方便我们联系,该内容不公开,保障用户隐私.
08-05 | 新增 | 新增问题反馈功能,成员可以反馈OJ存在的bug或建议.
08-04 | 修复 | 修复包括管理员在内的成员添加题目失败的问题,以及管理员添加反馈回答失败的问题.
08-04 | 更新 | 班级审核功能上线,并更新了比赛创建和编辑样式.
08-02 | 新增 | 新增题解功能,用户可以花费相应的金币查看对应的题解.
08-01 | 新增 | 新增班级审核功能,但是班级审核在OJ暂无其他用处,暂不开放.
08-01 | 新增 | 新增金币-商城功能,使用户实现刷题时获取对应的金币值,从而在商城购买相应的商品.
</details>

<details>
<summary><b>2024年-7月</b></summary>
	
日期  | 类型 |  更新内容
------- | :--: | :-------
07-30 | 更新 | 右上角姓名新增码龄属性,同时主页面欢迎区域改为活动列表区域,减轻上方功能栏压力.
07-30 | 新增 | 新增活动列表页面,少侠OJ会把有趣的活动公布在此处,欢迎大家来玩~
07-30 | 新增 | 新增金币功能,用户可以通过答题获取金币值,并且提交记录也会显示此题获取的金币值.
07-29 | 新增 | 新增 教师用户 和 教练用户 权限,并开启至高无上的OJ专属外框标识(提交记录和排名).
07-27 | 更新 | 更新排行榜按钮样式,并优化了下方翻页区域的链接跳转逻辑.同时默认页面将总排名换为月排名.
07-25 | 更新 | 捐赠页面改用数组进行PHP输入,且自动按照捐赠金额排序.
07-24 | 更新 | 后台竞赛列表和自建赛列表链接跳转不再统一跳转至contest.php,而是根据比赛类型跳转到对应的页面.
07-22 | 新增 | 新增可以设置某公告是否重要的功能.若重要,则在公告栏置顶显示并标红.
07-22 | 更新 | 公告编辑页高度调低,便于提交.
07-22 | 更新 | 前台页面允许用户进行页面缩放.
07-22 | 更新 | 补充consolas的字体指向,以便Mac用户以及移动端访问网站中有关consolas的内容.
07-21 | 修复 | 修复用户修改个性签名后昵称和学校重置的问题.
07-20 | 新增 | 新增待完成任务页面,二改源码状态图标,新增百分比图表,修改竞赛状态显示时分秒,竞赛举办者改为昵称.
07-18 | 更新 | 配置文件调整主页弹窗逻辑,可选择强制显示(刷新后再弹窗)和不强制显示(刷新后无弹窗).
07-18 | 更新 | 主页左栏下面排行榜新增"正确率"列和"码龄"列.
07-18 | 修复 | 修复成员自建赛白屏问题.
07-18 | 更新 | 调整私有题目逻辑,使私有题目只能在作业/比赛页面却比赛进行中时可见,其余时间不可见.
07-18 | 更新 | 调整本地cookie逻辑,修复管理员使用新的弹窗时成员不显示的问题.
07-18 | 修复 | 修复倒计时页面"了解更多"中序号排序错误的问题.
07-18 | 更新 | 调整主页中栏下方显示,当自建赛开启时显示自建赛表格,且开始前和进行中的比赛优先,否则显示轮播图.
07-18 | 更新 | 修改注册页面的部分文字.
07-18 | 更新 | 竞赛问题页面的problem.php改为contest_problem.php,方便后续的权限管理.
07-18 | 更新 | 修改后台页面竞赛列表的逻辑,无权限用户进入后台竞赛列表页面时会自动跳转到自建赛页面.
07-18 | 更新 | 修改后台搜索样式.
07-18 | 更新 | 删除后台用户审核列表的搜索功能.
07-18 | 更新 | 调整竞赛列表和自建赛的搜索逻辑.
07-18 | 更新 | 修改网页的meta属性,禁止移动设备双击放大,便于管理员修改用户信息.
07-18 | 更新 | 自建赛允许创建者点击自建赛编号复制比赛邀请链接.
07-18 | 更新 | 修改自建赛的后台管理页面逻辑,若您不是管理员,删除"审查"和"导出"链接.
07-13 | 更新 | 主页倒计时栏下方新增NOIP和蓝桥杯的专属倒计时.
07-13 | 修复 | 修复页面模式下后台表格部分文字不显示的问题.
07-13 | 更新 | 主页"最近追题"改为"各大OJ传送门".
07-12 | 新增 | 新增OJ提示弹窗,点击"我知道了"后网页刷新后不再显示弹窗.次日0点后重置.
07-12 | 更新 | OJ竞赛弹窗新增"不再提示"按钮.
07-11 | 新增 | 新增倒计时"了解更多"页面,同时过滤掉已结束的倒计时.
07-11 | 更新 | 调整主页倒计时的数据引用,由配置文件指定变量改为"了解更多"页面中表格的第一列数据.
07-10 | 新增 | 新增作业/比赛/自建赛下的做题百分比.
07-06 | 新增 | 新增"网页屏蔽页面"模式,当管理员在配置文件中打开此开关,则除管理员外所有用户访问任何页面显示屏蔽提示.
07-06 | 更新 | 主页右栏中间内容替换为"OJ信息全知道",展示注册用户数等信息.
07-01 | 更新 | 调整主页部分功能迁移回上方功能栏中,竞赛页面合并抽屉,题单页面页分类页面合并抽屉.
</details>

<details>
<summary><b>2024年-6月</b></summary>

  日期  | 类型 |  更新内容
------- | :--: | :-------
06-26 | 新增 | 新增SYZOJ版本入口.
06-19 | 更新 | 在夜间模式中,修改查看源码页面实现字体变大和背景为黑色的夜间模式自适应.
06-18 | 更新 | 上方功能栏部分功能入口移到主页中.
06-06 | 更新 | 修改meta下的viewport参数使之在移动设备上显示正常.
06-06 | 更新 | 配置文件新增数组变量用来存储允许访问私有题目的用户名.
06-03 | 新增 | 新增自建赛功能.
</details>

<details>
<summary><b>2024年-5月</b></summary>

  日期  | 类型 |  更新内容
------- | :--: | :-------
05-29 | 新增 | 新增添加题目预览模块并修改了样式.
05-23 | 新增 | 作业/比赛中时间进度条显示功能并在配置文件中增加了开关.
05-19 | 更新 | 将竞赛页面分为 作业&实验 和 竞赛&考试 两个页面,调整了比赛公告的位置.
05-19 | 修复 | 修复部分电脑访问竞赛页面标题居中的问题.
05-17 | 更新 | 新增竞赛分类,分为 作业&实验(公开) 作业&实验(私有) 竞赛&考试.
05-16 | 新增 | 新增网页指针为小鲨鱼指针,感谢B站大佬 泽牛小鲨鱼 ~
05-14 | 更新 | 限制未登录用户查看题单页面和竞赛内容,并屏蔽 合作伙伴 和 软件下载 链接.
05-14 | 更新 | 当比赛结束后,竞赛列表页面出现"ACM排名"和"OI排名"按钮.
05-14 | 修复 | 修复竞赛页面翻页功能多空页面的问题.
05-11 | 新增 | 功能栏管理员新增"待审核"页面.
05-11 | 更新 | 修改注册页面弹窗显示文字.
05-10 | 新增 | 配置文件新增自动开启夜间模式设置项.
05-10 | 更新 | 配置文件重新排版和注释.
05-10 | 更新 | 更新后台页面翻页样式并修复注册功能.
05-09 | 修复 | 修复无权限用户在比赛结束前能看到ACM排名和OI排名的问题.
05-05 | 更新 | SHAOXIAOJ网站部署ssh证书,使此网站可以https访问,保障了网站安全.
05-05 | 修复 | 修复夜间模式某图标显示为长方形的显示异常的问题.
05-05 | 说明 | 本次更新非常感谢 mxdyeah 同学的大力支持!
</details>

<details>
<summary><b>2024年-4月</b></summary>

  日期  | 类型 |  更新内容
------- | :--: | :-------
04-29 | 更新 | 备份脚本支持仅php备份.
04-29 | 说明 | SHAOXIAOJ 已停止 bs3 模板的支持.
04-28 | 新增 | 竞赛信息页面新增动态倒计时.
04-28 | 更新 | 主页将"新增题目"栏改为"破敌数"栏.oyoukuandu
04-27 | 新增 | 主页新增一言功能.
04-27 | 更新 | 修改提交记录页面样式,类似Libre OJ样式.
04-26 | 更新 | 后台导出题目功能仅对管理员开放.
04-25 | 新增 | 新增软件下载功能.
04-24 | 更新 | 更新题单样式.
04-23 | 更新 | 修改登录页面样式.
04-08 | 新增 | 新增分栏式答题页面的调整左右宽度的功能条,并隐藏iframe标签的边框.
04-07 | 新增 | 排行表新增等级列.
</details>

<details>
<summary><b>2024年-3月</b></summary>

  日期  | 类型 |  更新内容
------- | :--: | :-------
03-31 | 新增 | 主页新增愚人节小丑特效.
03-30 | 新增 | 主页新增可莉挂件和大宝走路动画.新增轮播图栏.
03-30 | 修复 | 修复题单功能无法切换下一个标题的问题.
03-29 | 说明 | SHAOXIAOJ 对 syzoj 模板开始支持.
</details>

<details>
<summary><b>2024年-1月</b></summary>

  日期  | 类型 |  更新内容
------- | :--: | :-------
01-16 | 说明 | SHAOXIAOJ 对 bs3 模板的更新内容已忽略.
01-16 | 说明 | SHAOXIAOJ 服务器正式启用.
</details>

## 说明
里面涉及的文件部分公开在我的存储库中,如果大家需要,可以借鉴看一下.因为各大OJ都有所不同,所以可能会出现不兼容问题,请谨慎使用!
