<?php

include_once('class/Database.class.php');
include_once('class/SecureInput.class.php');

$db = new Database();
$input = new SecureInput();

?>

<!DOCTYPE html>
<html>
	<head>
		<!--關閉網站時強制跳轉網頁-->
		<!--<meta http-equiv="refresh" content="0;url=http://www.csie.ncue.edu.tw/csie/" />-->
		<meta charset="utf-8">
		<meta http-equiv="expires" content="-1" />
		<!-- 到期時間為每次瀏覽網頁時 -->
		<meta http-equiv="Pragma" content="no-cache">
		<!-- 不cache網頁 -->
		<meta name="google-site-verification" content="7cf2id3eC7-o9caR62H5Q3ELhDrgRsKpri7ZeGBut5U" />
		<meta name="msvalidate.01" content="3BDCFECA73036E90C8F629F8CC7075D7" />
		
		<title>CCPC 2016 中區大專院校程式設計競賽</title>
		<meta name="keywords" content="中區 程式設計 競賽 彰化師大 中區程式競賽 資訊工程學系 資工系 中程杯 中程盃 ncue csie computer competition CCPC 2016"/>
		<meta name="description" content="2016中區大專院校程式設計競賽（CCPC），由國立彰化師範大學資訊工程學系主辦。藉由跨校聯合舉辦比賽提升本校學生程式設計能力及視野，藉由與外校競爭的過程，提升校內程式設計人才之競爭力，並熟悉ACM、ICPC等國際級程式設計競賽的相關規則與經驗。">
		<meta http-equiv="content-language" content="zh-tw"> 
		<link rel="icon" type="image/png" href="img/favicon.ico" />
		<link rel="image_src" type="image/jpeg" href="img/ogimage.png">
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery-ui.effect.min.js"></script>
		<script src="js/jquery.placeholder.min.js"></script>
		<script src="js/jquery.form.js"></script>
		<script src="js/jquery.pager.js"></script>
		<script src="js/jquery.cookie.js"></script>
		<script src="js/jquery.fancybox-1.3.4.pack.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/jquery.blockUI.js"></script>
		
		<!--[if lt IE 9]>
		  <script src="js/PIE.js"></script>
		<![endif]-->
		<script src="contentjs/contentjs.js"></script>
		
		<script src="contentjs/index.js"></script>
		
		
		<link rel="stylesheet" href="css/basicstyle.css" />
		<link rel="stylesheet" href="css/fancybox/jquery.fancybox-1.3.4.css" />
		<link rel="stylesheet" href="css/style.css" />
		
		
		<style>
			
		</style>
		<!-- <link rel="stylesheet" href="css/bootstrap-responsive.css" /> -->
	</head>
	<body>
		
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<div class="span12">
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
						<a class="brand" href="#">CCPC 2016</a>
						<div class="nav-collapse">
							<ul class="nav">
								<li>
									<a style="cursor:pointer;" href="./">首頁</a>
								</li>
								<li>
									<a style="cursor:pointer;" id="display-rule-btn" >競賽資訊</a>
								</li>
								<!--<li>
									<a style="cursor:pointer;" class="inlinebox" href="img/poster.png" >宣傳海報</a>
								</li>-->
								
								<li>
									<a style="cursor:pointer;" id="display-traffic-btn" >交通資訊</a>
								</li>
								<li>
									<a style="cursor:pointer;" id="display-map-btn" class="iframe map-url">
										看地圖
									</a>
								</li>
								<li>
									
								</li>
								<li>
									<a style="cursor:pointer;" href="http://www.csie.ncue.edu.tw" >彰師資工</a>
								</li>
							</ul>
							
						</div>
						<div class="fb-like brand "  style="float:right;"
							data-href="http://ccpc.csie.ncue.edu.tw" 
							data-send="true" 
							data-layout="button_count" 
							data-width="50" 
							data-show-faces="true" 
							data-font="arial">
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="container">
			<div class="span12" id="main">
			
				<div class="page-header">
					<div class="row">
						<div class="span7">
							<a  href="./"><h1 class="head">2016 中區大專院校程式設計競賽</h1></a>
						</div>
						<div class="span5" >
							<ul class="nav nav-pills" id="menu">
								<li><a href="#bulletin" data-toggle="tab">佈告欄</a></li>							
								<li><a href="#rule" data-toggle="tab">競賽資訊</a></li>
								<li><a href="#team-registered" data-toggle="tab">報名結果</a></li>
								<li><a href="#team-modify" data-toggle="tab">修改報名</a></li>
								<li><a href="#schedule" data-toggle="tab">活動流程</a></li>
								<li><a href="#message-board" data-toggle="tab">問題留言</a></li>
								<li><a href="#race-result" data-toggle="tab">競賽結果</a></li>
								<li><a href="#highlight" data-toggle="tab">活動花絮</a></li>
								<li><a href="#traffic" data-toggle="tab" style="display:none">交通資訊</a></li>
								
							</ul>
						</div>
					</div>
				<!-- <hr style="margin-top:15px; margin-bottom:20px;"> -->
				<hr>
				</div>
				<div class="" id="main-section">
					<div class="row">
						<div class="span9 main-content" >
							<div class="boxer">
							<div class="tab-content">
							<div class="tab-pane " id="message-board">
									<?php include('content/message-board.php'); ?>
								</div>
								<div class="tab-pane " id="schedule">
									<?php include('content/schedule.php'); ?>
								</div>
								<div class="tab-pane " id="race-result">
									<?php include('content/race-result.php'); ?>
								</div>
								<div class="tab-pane " id="highlight">
									<?php include('content/highlight.php'); ?>
								</div>
								<div class="tab-pane " id="traffic">
									<a class="pull-right iframe map-url" href="">看google地圖</a>
									<h2>交通資訊</h2>
									<br>
									<label class="label label-info" >鐵公路：</label>
									<p>從彰化火車站搭乘「彰化客運」，「台中客運」101路線，於彰化師範大學下車，步行約五分鐘，即可抵達。</p>
									<br>
　									<label class="label label-info" >中山高速公路：</label>
									<p>1. 彰化市以北者，經高速公路南下，下王田交流道，經大肚橋，台化工廠左轉進德路，即可抵達。</p>
									<p>2. 彰化市以南者，經高速公路北上，下彰化交流道，沿中華西路、中華路、孔門路、中山路、右轉進德路，即可抵達。</p>
									<br>
									<label class="label label-info" >國道三號高速公路：</label>
									<p>由快官系統交流道(往彰化方向)下中彰快速道路(台74線)，至中彰終點右轉彰南路(台14線)，至中山路左轉，經台化工廠，左轉進德路，即可抵達。</p>
									<br>
									<label class="label label-info" >高鐵：</label>
									<p>臺灣高鐵台中站下車，轉搭「台中客運」102(白)路線、101路線，「彰化客運」台中-鹿港路線，「員林客運」台中-西港路線、台中-西螺路線，於彰化師範大學下車，步行約五分鐘，即可抵達。(註：以上資訊若有異動，以高鐵車站現場公告為準)</p>
									<br>
									<img style="WIDTH: 720px; HEIGHT: 560px" alt="交通及資訊位置圖" src="http://www.ncue.edu.tw/ezfiles/0/1000/img/497/position.jpg" border="0">
									<br>
								</div>
								<div class="tab-pane " id="bulletin">
									<?php include('content/bulletin.php'); ?>
								</div>
								<div class="tab-pane " id="rule">
									<?php include('content/rule.php'); ?>
								</div>
								<div class="tab-pane " id="team-registered">
									<?php include('content/team-registered.php'); ?>
								</div>
								<div class="tab-pane " id="team-modify">
									<?php include('content/team-modify.php'); ?>
								</div>
								
								
								
							</div>
						</div>
						</div>
						<div class="span3" id="sidebar">
							<button class="btn btn-primary jhenghei btn-shadow " id="btn-register">立即報名</button>
							<div class="boxer">
							
							<?php $imgsize = 180; ?>
							<fieldset>
								<legend><h3>指導單位</h3></legend>
								<hr>
								<img src="img/ncue.png" alt="國立彰化師範大學" width="<?=$imgsize?>" height="<?=$imgsize?>" title="彰化師範大學" />
							</fieldset>
							<br>
							<fieldset>
								<legend><h3>主辦單位</h3></legend>
								<hr>
								<img src="img/ncue-csie.png"  alt="彰化師範大學資訊工程學系"width="<?=$imgsize?>" height="<?=$imgsize?>" 
								title="彰化師範大學資訊工程學系" style="width:180px" />
							</fieldset>
							
							</div>
						</div>
					</div>
				</div>
				
				
				<div class="" id="register-section">
					<div class="row">
						<div class="span12 main-content">
							<?php include('content/register-section.php'); ?>
						</div>
					</div>
				</div>
				
				<div class="footer span12">
					<p class="pull-right"><a href="#">Back to top</a></p>
					<p>Designed and built by NCUECSIE .</p>
					
				</div>
				
			</div>
		</div>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/zh_TW/all.js#xfbml=1&appId=264191187002419";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		<script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-1671996-6']);
		  _gaq.push(['_trackPageview']);

		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		</script>
		
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-49550932-2', 'auto');
			ga('send', 'pageview');
		</script>
	</body>

</html>