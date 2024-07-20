<?php 
// 本文件是二次开发系统配置文件,如果网页被改坏且无法恢复,请用/home/judge/src/install/fixing.sh脚本撤销所有更改回到源码。

//二次开发部分

/* 资源模式 */
static  $OJ_SOURCE_LIST_ALLOWED = true;//默认为false。true代表启用资源中心。

/* 夜间模式 */
static  $OJ_DARK_LIMITTIME = false;//默认为false。true代表开始时间小于结束时间。
static  $OJ_DARK_STARTTIME = 19;//夜间模式开始时间,单位:时。默认为20,代表晚上8点开始。
static  $OJ_DARK_ENDTIME = 7;//夜间模式结束时间,单位:时。默认为8,代表上午8点结束。

/* OJ主页 */

/* OJ私有题目 */
static  $OJ_PRIVATEPROBLEMS_TEAMS=['admin','shaoxiaacmer','Ho177777','jason111','msv'];//允许查看私有题目的用户

//比赛活动弹窗
static  $OJ_TIPS=false;//主页弹窗显示通知。注意:不能与下方的$OJ_FLOWBASIC重合为true。
static  $OJ_TIPKIND=2;//1:SHAOXIAOJ 活动快报 2:SHAOXIAOJ 提醒您
static  $DISABLED_NOTICE=false;//强制显示,刷新后依然存在弹窗.
static  $OJ_TIPSBASIC="刷题忠告";//主题
static  $OJ_TIPSDESCRIPTION="<p style='font-size: 20px;'>请各位同学理性刷题,按照题目要求来.比如改错题,不要按照你的意思重写,我们看重的是技能,不是刷题量.</p>";

static  $OJ_BASICTHEME=2;//比赛弹窗模板选择,可填1,2或false。
static  $OJ_FLOWBASIC=" ";//主页显示比赛链接弹窗。false或一个空格禁用,启用的话填写竞赛标题。
static  $OJ_FLOWCONTEST=1026;//比赛弹窗指向的竞赛编号。
static  $OJ_BASICDESCRIPTION="SHAOXIAOJ的代码查看者权限等你拿~";//比赛邀请弹窗描述,置一个空格或false禁用。

//主页节日红包下落效果
static  $OJ_HONGBAOIMAGE="image/tree.png";//主页红包下落动画图片路径。
static  $OJ_HONGBAOFONTS="祝各位考生高考顺利!";//主页红包下落动画结束后显示的文字。
static  $OJ_HONGBAO_START_DATE = "2024-06-01"; // 红包活动开始时间  
static  $OJ_HONGBAO_END_DATE = "2024-06-08";   // 红包活动结束时间
static  $OJ_HONGBAOFONTS2="夺取桂冠,金榜题名!"; //第二文字内容,该文字在$OJ_HONGBAOFONTS显示后显示。false或置空禁用。

/* OJ公告 */
static  $NEWLIST_ALLOW_NICK = true;//true为公告发布人允许显示姓名,false为公告发布人不允许显示姓名,会显示用户名。

/* OJ竞赛 */
static  $CONTESTRANK_SET_PROGRESSBAR = true;//作业&实验和竞赛&考试清单中的进度条显示。
static  $CONTESTRANK_AUTO_FRESHING = 5;//比赛排名榜单自动刷新时间。
static  $OJ_CONTEST_MYSELF_ALLOWED = true;//允许无权限成员新建自建赛。

/* OJ后台 */
static 	$OJ_LOGO_URL="../admin/shaoxiaoj.PNG";//OJ_logo存放位置,目前使用在admin目录下的hello.php中。
static  $OJ_PROBLEM_IMPORTS=false;//true则表示此OJ可以导入来源于其他OJ的zip文件。false则代表只能导入xml文件。

/* OJ全局 */
static 	$OJ_STYLE_CUR=true;//少侠OJ的网页自定义光标样式。感谢BiliBili大佬 泽牛小鲨鱼 的动态指针分享!
static 	$OJ_TESTDEBUGER=true;//true则表示除指定人员外其余成员无法调试此网页(屏蔽F12,右击等操作)。
static 	$OJ_TESTSTATUS=false;//默认为false。此项为启动网页屏蔽状态，除管理员外其他用户将无法访问网页的所有内容。
static 	$OJ_TESTINFORMATION="2024数据结构期末考试中...";//此项为网页屏蔽页面当前状态显示内容。false或一个空格为关闭状态。

/* 代码部分,勿改 */
//夜间模式核心代码
$now_time = time();  
$hours = date('H', $now_time);
if($OJ_DARK_LIMITTIME){
    if($hours >= $OJ_DARK_STARTTIME && $hours < $OJ_DARK_ENDTIME) $OJ_DARK = true;
    else $OJ_DARK = false;
}else{
    if($hours >= $OJ_DARK_STARTTIME || $hours < $OJ_DARK_ENDTIME) $OJ_DARK = true;
    else $OJ_DARK = false;
}

//源码部分

/* OJ数据库部分,禁止更改 */
static 	$DB_HOST="localhost";  //数据库服务器ip或域名
static 	$DB_NAME="jol";   //数据库名
static 	$DB_USER="hustoj";  //数据库账户
static 	$DB_PASS="9S49NcWz6pfseU99j4J4AWwwx62gjY";  //数据库密码

/* OJ功能与外观 */
//全局配置
static  $OJ_PCOIN="2";  //设置每道题的初始金币数量
static  $OJ_ONLINE=false;  //是否记录在线情况。
static  $OJ_LANG="cn";  //默认语言,cn代表中文。
static  $OJ_LIMIT_TO_1_IP=false;  // 限制用户同一时刻只能在一个IP地址登录。
static  $OJ_REGISTER=true; //允许注册新用户。
static  $OJ_REG_NEED_CONFIRM=true; //新注册用户需要审核。
static  $OJ_EMAIL_CONFIRM=false; //允许邮件激活账号。
static  $OJ_NEED_LOGIN=false; //需要登录才能访问。
static  $OJ_LONG_LOGIN=true; //启用长时间登录信息保留。
static  $OJ_KEEP_TIME="7";  //登录Cookie有效时间(单位:天(day),仅在上一行为true时生效)。
static 	$OJ_REG_SPEED=0 ; //限制每小时同ip注册个数，0不限制。
static 	$OJ_HIDE_RIGHT_ANSWER=true;//隐藏选择/填空题正确答案。

//上方功能栏
static 	$OJ_NAME="SHAOXIAOJ";  //左上角显示的系统名称,如需图片，可修改template/syzoj/header.php
static  $OJ_SHARE_CODE=false; // 代码分享功能
static  $OJ_RECENT_CONTEST="http://algcontest.rainng.com/contests.json"; // "http://algcontest.rainng.com/contests.json" ; // 名校联赛

//主页
static  $OJ_INDEX_NEWS_TITLE='HelloWorld!';   // 在syzoj的首页显示哪一篇标题的文章（可以有多个相同标题）
static 	$OJ_BG=false;  //OJ前台背景图片。

//题目提交配置
static  $OJ_SIM=false;  //查重功能开关。
static  $OJ_LANGMASK=4194228; //修改提交语言种类，详见https://pigeon-developer.github.io/hustoj-langmask/
static  $OJ_ACE_EDITOR=true;  // 高亮输入框，建议不要改动。
static  $OJ_AUTO_SHARE=false; //设为true则通过的题目可在统计页查看其他人代码.
static  $OJ_VCODE=false;  //提交答案验证码。
static  $OJ_APPENDCODE=true;  // 代码预定模板
if (!$OJ_APPENDCODE) 	ini_set("session.cookie_httponly", 1);  //建议不要更改
@session_start();
static  $OJ_CE_PENALTY=true;  // 编译错误是否罚时。
static  $OJ_MARK="percent"; // "mark" 显示正确得分， "percent" 显示错误百分比。
static  $OJ_UDPSERVER="127.0.0.1";    // 多个判题机可用逗号分隔，有非标端口可以用冒号
static  $OJ_RANK_HIDDEN="'admin'";  // 管理员不显示在排名中。
static  $OJ_DIV_FILTER=false;   // 过滤题面中的div，修复显示异常，特别是来自其他OJ系统的题面。
static  $OJ_FREE_PRACTICE=false; //自由练习，不受比赛作业用题限制。
static  $OJ_SUBMIT_COOLDOWN_TIME=2; //提交冷却时间，连续两次提交的最小间隔，单位秒。
static  $OJ_POISON_BOT_COUNT=1000; //AC最大限制。即同一道题AC次数不能超过的最大次数。否则会给出随机判题结果。

//比赛配置
static  $OJ_RANK_LOCK_PERCENT=0; //比赛封榜时间比例，例如设0.2，则5小时的比赛，最后一小时为封榜时间。
static  $OJ_RANK_LOCK_DELAY=3600; //赛后封榜持续时间，单位秒。根据实际情况调整，在闭幕式颁奖结束后设为0即可立即解封。
static  $OJ_SHOW_METAL=true; //榜单上是否按比例显示奖牌
static  $OJ_SHOW_DIFF=true; //是否显示WA的对比说明
static  $OJ_DL_1ST_WA_ONLY=false; //是否只允许下载第一个WA的测试数据(前提需开启$OJ_DOWNLOAD)
static  $OJ_DOWNLOAD=false; //是否允许下载所有WA的测试数据
static  $OJ_TEST_RUN=false; //提交界面是否允许测试运行
static  $OJ_OI_1_SOLUTION_ONLY=false; //蓝桥杯模式,只保留最后一次提交。
static  $OJ_OI_MODE=false; //是否开启OI比赛模式，禁用排名、状态、统计、用户信息、内邮、论坛等。
static  $OJ_CONTEST_RANK_FIX_HEADER=false; //比赛排名水平滚动时固定名单。
static  $OJ_NOIP_KEYWORD="NOIP";  // 标题包含此关键词，激活noip模式，赛中不显示结果，仅保留最后一次提交。
static  $OJ_NOIP_TISHI=false;  //noip比赛中 设置为ture则在noip比赛中显示题目提示，false不显示提示。
static  $OJ_REMOTE_JUDGE=true; //是否启用Remote Judge ，启用哪些模块请在remote.php中设置
static  $OJ_NO_CONTEST_WATCHER=true ; //是否禁止无权限用户观战私有比赛
static  $OJ_CONTEST_TOTAL_100=true; //是否让比赛按100分计分
//static  $OJ_EXAM_CONTEST_ID=1000; // 启用考试状态，填写考试比赛ID
//static  $OJ_ON_SITE_CONTEST_ID=1000; //启用现场赛状态，填写现场赛比赛ID
static $OJ_ON_SITE_TEAM_TOTAL=0;  //用于根据比例的计算奖牌的队伍总数，0表示根据榜单上的出现的队伍总数计算，不计打星队伍。

//其他配置
static 	$OJ_ADMIN_BG=false;  //OJ后台界面背景图片。
static  $OJ_BEIAN="皖ICP备2024035384号-1";  // 如果有备案号，填写备案号。

/* OJ谨慎修改配置 */
static 	$OJ_HOME="./";    //服务器主页目录
static 	$OJ_ADMIN="root@localhost";  //管理员email。
static 	$OJ_DATA="/home/judge/data";  //测试数据目录。
static  $OJ_CSS="blue.css";  // 此项不生效。
static 	$OJ_BBS=false; //该项无效。
static  $OJ_DICT=true; //该项无效。
static  $OJ_SAE=false; //该项无效。
static  $OJ_PRINTER=false;  //该项无效。
static  $OJ_MAIL=false; //该项无效。
static  $OJ_MEMCACHE=false;  //使用内存缓存。
static  $OJ_MEMSERVER="127.0.0.1";
static  $OJ_MEMPORT=11211;   //建议不要改动。
static  $OJ_UDP=true;   //建议不要改动。
static  $OJ_UDPPORT=1536;  //建议不要改动。
static  $OJ_JUDGE_HUB_PATH="../judge";  //建议不要改动。
static  $OJ_REDIS=false;   ////建议不要改动。
static  $OJ_REDISSERVER="127.0.0.1";   //建议不要改动。
static  $OJ_REDISPORT=6379;   //建议不要改动。
static  $OJ_REDISQNAME="hustoj";   //建议不要改动。
static  $SAE_STORAGE_ROOT="http://hustoj-web.stor.sinaapp.com/";  //建议不要改动。
static  $OJ_CDN_URL="";  // 此项无效。
static  $OJ_TEMPLATE="syzoj"; //使用的默认模板,只有一个模板,不能动。
static  $OJ_LOGIN_MOD="hustoj"; //建议不要改动
static  $OJ_MATHJAX=true;  //建议不要改动
static  $OJ_BLOCKLY=false; //建议不要改动
static  $OJ_ENCODE_SUBMIT=false; //建议不要改动
static  $OJ_BENCHMARK_MODE=false; //建议不要改动
static  $OJ_FRIENDLY_LEVEL=0; //建议不要改动
static  $OJ_MARKDOWN="marked.js"; //建议不要改动
static  $OJ_OPENID_PWD='8a367fe87b1e406ea8e94d7d508dcf01';
static  $OJ_SaaS_ENABLE=false;
static  $OJ_MENU_NEWS=true;

//微博登录配置
static  $OJ_WEIBO_AUTH=false;
static  $OJ_WEIBO_AKEY='1124518951';
static  $OJ_WEIBO_ASEC='df709a1253ef8878548920718085e84b';
static  $OJ_WEIBO_CBURL='http://192.168.0.108/JudgeOnline/login_weibo.php';

//微博登录配置
static  $OJ_RR_AUTH=false;
static  $OJ_RR_AKEY='d066ad780742404d85d0955ac05654df';
static  $OJ_RR_ASEC='c4d2988cf5c149fabf8098f32f9b49ed';
static  $OJ_RR_CBURL='http://192.168.0.108/JudgeOnline/login_renren.php';

//QQ登录配置
static  $OJ_QQ_AUTH=false;
static  $OJ_QQ_AKEY='1124518951';
static  $OJ_QQ_ASEC='df709a1253ef8878548920718085e84b';
static  $OJ_QQ_CBURL='192.168.0.108';

//日志功能
static  $OJ_LOG_ENABLED=false;
static  $OJ_LOG_DATETIME_FORMAT="Y-m-d H:i:s";
static  $OJ_LOG_PID_ENABLED=false;
static  $OJ_LOG_USER_ENABLED=false;
static  $OJ_LOG_URL_ENABLED=false;
static  $OJ_LOG_URL_HOST_ENABLED=false;
static  $OJ_LOG_URL_PARAM_ENABLED=false;
static  $OJ_LOG_TRACE_ENABLED=false;

require_once(dirname(__FILE__) . "/pdo.php");
require_once(dirname(__FILE__) . "/init.php");

//ini_set("display_errors", "Off");  //set this to "On" for debugging  ,especially when no reason blank shows up.
//error_reporting(E_ALL);
//header('X-Frame-Options:SAMEORIGIN');
//for people using hustoj out of China , be careful of the last two line of this file !

/* 感谢大家对少侠Dr的支持! */

// 
//                                    　  　▃▆█▇▄▖
//                             　 　 　 ▟◤▖　　　◥█▎
//                                　 ◢◤　 ▐　　　 　▐▉
//                             　 ▗◤　　　▂　▗▖　　▕█▎
//                             　◤　▗▅▖◥▄　▀◣　　█▊
//                             ▐　▕▎◥▖◣◤　　　　◢██
//                             █◣　◥▅█▀　　　　▐██◤
//                             ▐█▙▂　　     　◢██◤
//                             ◥██◣　　　　◢▄◤
//                              　　▀██▅▇▀
// 
// 

/* 臭臭的114514。*/
