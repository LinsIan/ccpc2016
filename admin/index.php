<?php
session_start();
ob_start();
include_once('../class/SecureInput.class.php');
include_once('../class/Database.class.php');

if( !isset($_SESSION['ccpc']['islogin']) or $_SESSION['ccpc']['islogin'] != true)
	header('Location: login.php');

$input = new SecureInput();
$db = new Database();

if( $input->notEmpty('get', 'logout'))
{ 
	unset($_SESSION['ccpc']);
	header('Location: login.php');
}

if( $input->notEmpty('post', 'act') && isset($_SESSION['ccpc']['islogin']) )
{
	if( $input->post('act') == 'bulletin' ) {
		$db->insert('bulletin', array (
			'time' => $input->post('time'),
			'content' => $input->post('content'),
		));
	}
	else if( $input->post('act') == 'message' ) {
		$db->update('message', array (
			'reply' => $input->post('reply'),
		), "where msg_id = '".$input->post('msg_id')."'");
	}
	else if( $input->post('act') == 'team' ) {
		$db->update('team', array (
			'is_paid' => $input->notEmpty('post', 'is_paid')?'1':'0',
			'remit_account' => $input->post('remit_account'),
		), "where team_id = '".$input->post('team_id')."'");
	}
}


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>CCPC Admin</title>
		<link rel="icon" type="image/png" href="../img/favicon.ico" />
		<link href="../css/basicstyle.css" rel="stylesheet" />
		<script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/jquery.form.js"></script>
		<script src="../js/jquery.toastmessage.js"></script>
		<script src="js/script.js"></script>
		
		<style>
			.container {
				//margin-top: 100px;
			}
			.book_title {
				margin-top: 50px;
				margin-bottom: 50px;
				font-size:30px;
			}
		</style>
		
		<script>
		$(function(){
			$('.tabs').find('a[data-toggle=tab]:first').tab('show');
		});
		</script>
	</head>

	<body>
	<a class="btn btn-primary offset10 " id="logout" href="?logout=true">Logout</a>
	<div class="container">
		
		<div class="row">
			<div class="span8 offset2">
				<div class="book_title">CCPC Admin Panel</div>
				<ul class="tabs nav nav-tabs">
					<li><a href="#message" data-toggle="tab">管理留言</a></li>
					<li><a href="#bulletin" data-toggle="tab">新增公告</a></li>
					<li><a href="#team_paid" data-toggle="tab">報名費</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane" id="bulletin">
						<form class="form-horizontal" method="post" id="" action=''>
							<legend>新增公告</legend>
							<input type="hidden" value="bulletin" name="act" />
							<div class="control-group">
								<label class="control-label">公告日期</label>
								<div class="controls">
									<input type="text" class="span4" name="time" />
								</div>
							</div>	
							<div class="control-group">
								<label class="control-label">內容</label>
								<div class="controls">
									<textarea class="span4" name="content" style="height: 100px;" ></textarea>
								</div>
							</div>						
							<div class="form-actions">
								<button class="btn btn-primary" type="submit" >確定</button>
								<button class="btn" type="reset">清除</button>
							</div>
						</form>
					</div>
					<div class="tab-pane" id="message">
						<?php
							$sql = "select * from message where reply = '' order by msg_id desc";
							$result = $db->query($sql);
							
							while($message = $result->fetch_assoc()) {
						?>
							<form class="form-horizontal" method="post" id="" action=''>
								<input type="hidden" value="message" name="act" />
								<input type="hidden" value="<?=$message['msg_id']?>" name="msg_id" />
								<div class="control-group">
									<label class="control-label">主旨</label>
									<div class="controls">
										<?=$message['name'].':'.$message['title']?>
									</div>
								</div>	
								<div class="control-group">
									<label class="control-label">內容</label>
									<div class="controls">
										<?=nl2br($message['content'])?>
									</div>
								</div>	
								<div class="control-group">
									<label class="control-label">回應</label>
									<div class="controls">
										<textarea  class="span5" name="reply" style="height:60px;"></textarea>
									</div>
								</div>								
								<div class="form-actions">
									<button class="btn btn-primary" type="submit" >確定</button>
									<button class="btn" type="reset">清除</button>
								</div>
							</form>
						
						<?php
							}
						?>
					</div>
					<div class="tab-pane" id="team_paid">
						<table class="table">
						<?php
							$sql = "select * from team order by team_id desc";
							$result = $db->query($sql);
							
							while($team = $result->fetch_assoc()) {
						?>
							<form class="" method="post" id="" action=''>
								<input type="hidden" value="team" name="act" />
								<input type="hidden" value="<?=$team['team_id']?>" name="team_id" />
								<tr>
									<td><?='#'.$team['team_id']?></td>
									<td><?=$team['team_name']?></td>
									<td><label class="checkbox"><input type="checkbox" name="is_paid" <?=$team['is_paid']==1?'checked':''?> > 已付款</label></td>
									<td>劃撥寄件人:<input type="text" class="span2" name="remit_account" value="<?=@$team['remit_account']?>" /></td>
									<td><button class="btn btn-info" type="submit" >更新</button></td>
								<tr>
							</form>
						<?php
							}
							ob_end_flush();
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	</body>
</html>
