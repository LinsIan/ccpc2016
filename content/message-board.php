<script src="contentjs/message-board.js"></script>

<div id="message-alert-msg" class="alert alert-block fade in">
	<a class="close" href="#">×</a>
	<h3 class="alert-heading"></h3>
	<p class="msg-content"></p>
</div>
<div class="message-record">
	<a class=" form-big-btn btn-warning btn " id="wantPostBtn" style="padding:5px 10px; margin-left: 80px; margin-bottom:10px;" >我要留言</a>
	<form class="form-horizontal" id="message-form" action="action/message.php" method="post">
		<!--<legend><h3>我要留言</h3></legend>-->
		<!--<label class="label label-warning form-label" style="padding:5px 10px; margin-left: 80px;">我要留言</label>  -->
		<br>
		<div class="control-group">
			<label class="control-label">暱稱:</label>
			<div class="controls">
				<input type="text" class="span5" name="name" placeholder="該怎麼稱呼您呢?"/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">主旨:</label>
			<div class="controls">
				<input type="text" class="span5" name="title" placeholder="您想要說的主旨是?"/>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label">內文:</label>
			<div class="controls">
				<textarea  class="span5" name="content" style="height:60px;" placeholder="您想要說什麼?" ></textarea>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<input class="btn  form-big-btn" type="submit" value="送出" />
			</div>
		</div>
	</form>
</div>
<br>


<div id="message-pages">
<?php
$pager = 0;
$pager_num = 3;

echo '<div class="msg-page">';
$sql = "select * from message order by msg_id desc";
$message_result = $db->query($sql);
while( $message = $message_result->fetch_assoc()) {

	//continue;
	
?>

<div class="message-record">
	<table id="message-table" class="table">
		<tr>
			<th colspan="2" class="message-head"><h3><?=$message['name'].':'.$message['title']?></h3></th>
		</tr>
		<tr>
			<th class="message-subtitle">內文:</th>
			<td class="message-content"><?=nl2br($message['content'])?></td>
		</tr>
		<? if( !empty($message['reply']) ) {?>
		<tr>
			<th class="message-subtitle">管理員:</th>
			<td class="message-content"><?=nl2br($message['reply'])?></td>
		</tr>
		<? } ?>
	</table>
</div>
<br>
<?php
	
	$pager++;
	if($pager%$pager_num == 0)
		echo '</div><div class="msg-page">';
	 
}
echo '</div>';
?>
</div>