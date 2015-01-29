<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>比特币行情价格_Mt.Gox行情价格_比特币汇率 by btc123.com</title>
<meta name="keywords" content="比特币行情,Mt.Gox行情,K线图,比特币汇率,比特币价格,比特币走势,比特币分析,比特币兑美元" />
<meta name="description" content="btc123 - 比特币信息行情第一站，提供实时准确的比特币价格、比特币走势行情，实时更新来自Mt.Gox、比特币中国的行情信息，面向比特币投资者、比特币矿工，为您的交易和投资提供实时准确信息。" />
<!--script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script-->
<script type="text/javascript" src="js/external/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript" src="js/extra_and_conf_20130523.js"></script>
<script type="text/javascript" src="js/lang/LANG_<?php
@ $httpLang = getenv('HTTP_ACCEPT_LANGUAGE');
@ $httpLang = empty($httpLang) ? substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) : substr($httpLang, 0, 2);
echo ($httpLang == "zh") ? "zhCN" : "enUS";
?>.js"></script>
<?php
$pre = strtok($_SERVER['SERVER_NAME'],".");
echo $pre!="i" ? '<!--script src="http://cdnjs.cloudflare.com/ajax/libs/socket.io/0.9.10/socket.io.min.js"></script--><script src="js/socket.io.min.js"></script><script src="js/chart_mtgox_20130723.js"></script>' : '';
?>
<script type="text/javascript" src="js/main_20130623.js"></script>
<link rel="stylesheet" type="text/css" href="./css/style_20130420.css" media="all" />
<link rel="apple-touch-icon" href="images/touch-icon-iphone.png" />
<link rel="apple-touch-icon" sizes="72x72" href="images/touch-icon-ipad.png" />
<link rel="apple-touch-icon" sizes="114x114" href="images/touch-icon-iphone-retina.png" />
<link rel="apple-touch-icon" sizes="144x144" href="images/touch-icon-ipad-retina.png" />
</head>
<body>
<div id="ex_m" market="MtGox"></div>

<div id="header_detail">
<div id="logo"><a href="http://www.btc123.com/"><img alt="BTC123_LOGO" src="images/logo_180_60_black_bg.png" /></a></div>
<div class="left">
<div>
<?php
echo '<a ',($pre!="i")?'id="current" ':'href="http://info.btc123.com/" ','class="selector">MtGox(K线)</a>&nbsp;&#124;&nbsp;<a ',($pre!="i")?'href="http://i.btc123.com/" ':'id="current" ','class="selector">MtGox</a>';
?>
&nbsp;&#124;&nbsp;<a class="selector" href="http://info.btc123.com/index_btcchina.php">比特币中国(K线)</a>&nbsp;&#124;&nbsp;<a class="selector" href="http://i.btc123.com/index_btcchina.php">比特币中国</a><!--&nbsp;&#124;&nbsp;<a class="selector" href="index_fxbtc.php">FxBTC</a>-->&nbsp;&#124;&nbsp;<a class="selector" href="http://k.btc123.com/static_k/" target="_blank">静态K线</a>&nbsp;&#124;&nbsp;<a class="selector" href="http://ss.btc123.com">美元实时行情</a>&nbsp;&#124;&nbsp;<a class="selector" href="http://mm.btc123.com">美元动态盘口</a>&nbsp;&#124;&nbsp;<a class="selector" href="http://z.btc123.com" style="color:orange;" target="_blank">行情汇总</a>
<div id="caption"><a>Mt.Gox 行情信息</a></div>
</div>
</div>
</div>

<?php
	if ($pre!="i") {	
		echo '<div id="chart_wrap"><div id="chart"></div><div id="chart_control"></div></div>';
	}
?>

<div id="contentOuter">

<div id="ad1">
	<!--p><a target="_blank" href="https://bter.com/"><img width="80" height="130" alt="比特儿(Bter.com) - 中文比特币交易平台" src="images/antiBlock/bter.png"></a></p-->
	<!--p><a target="_blank" href="http://www.asicme.com/"><img width="80" height="130" alt="ASICME" src="images/antiBlock/asicme_4.jpg"></a></p-->
	<p><a target="_blank" href="https://796.com/ad/index.html?adcode=BTC123"><img width="80" height="130" alt="796交易所" src="images/antiBlock/796_1.jpg"></a></p>
</div>

<div id="content">
	<div id="tickerAndP">
		<div id="ticker"></div><div id="bigP">无价至宝 B_B</div>
		<div style="clear:both;height:0px;"></div>
	</div>

	<div id="depthAndTrade">
		<div id="orderbook">
			<div id="depthBids" class="left"></div>
			<div id="depthAsks" class="left"></div>
		</div>
		<div id="timesales"></div>
		<div style="clear:both;height:0px;"></div>
	</div>
</div>

<div id="ad2">
	<!--p><a target="_blank" href="http://item.taobao.com/item.htm?id=18966221110"><img width="80" height="130" alt="天天矿工" src="images/antiBlock/du_13.jpg"></a></p-->
	<p><a target="_blank" href="https://yesbtc.co"><img width="80" height="130" alt="比特汇" src="images/antiBlock/du_14.jpg"></a></p>
	<!--p><a target="_blank" href="https://www.zydeal.com"><img width="80" height="130" alt="众赢数字货币交易所" src="images/antiBlock/zydeal_4.jpg"></a></p-->
	<p><a target="_blank" href="http://www.chbtc.com"><img width="80" height="130" alt="中国比特币交易中心" src="images/antiBlock/chbtc_1.jpg"></a></p>
	<!--p><a target="_blank" href="http://www.btctrade.com/"><img width="80" height="130" alt="btctrade" src="images/antiBlock/btctrade_80_130.jpg"></a></p-->
</div>
<div style="clear:both;height:0px;"></div>

</div>

<div id="footer">
<a href="http://www.btc123.com/data/html/about_info.html" target="_blank">关于行情信息页面</a>&nbsp;|&nbsp;<a href="http://www.btc123.com/apply.php" target="_blank">网站提交</a>&nbsp;|&nbsp;<a href="http://www.btc123.com/message.php?type=3" target="_blank">意见反馈</a>&nbsp;|&nbsp;<a href="http://mail.btc123.com/" target="_blank"><font color="grey">exmail</font></a>&nbsp;|&nbsp;<script src="http://s16.cnzz.com/stat.php?id=4220260&web_id=4220260" language="JavaScript"></script>&nbsp;|&nbsp;比特币应用QQ交流群: 248372589<br />
<font color="grey" size="1">如果您觉得此网站对您有所帮助,可以略表心意: 1AqsTNrak6jpEcmtfPwc3dkTbuwzenreet</font><br />
<span class="copyright">&copy;2012-2013&nbsp;<a href="http://www.btc123.com/">比特币导航网</a>.&nbsp;<a href="http://www.miibeian.gov.cn/" target="_blank" style="color:#666666">沪ICP备12011456号-1</a>&nbsp;Powered by <a href="http://www.btc123.com/"><font color="orange">btc123.com</font></a> - 比特币信息行情第一站</span>
</div>

<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F32bd829c22f4f3afcb1b6160c9b3a0f0' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-39586643-1']);
  _gaq.push(['_setDomainName', 'btc123.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>
