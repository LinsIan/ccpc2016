<?php
include_once('config.php');
if( !TODAY_IN_REGISTER_TIME() ) {
?>

<div class="boxer">
	<div class="hero-unit">
		<div class="row">
			<div class="span2">
				<img width="250" src="img/thank-you.png" />
			</div>
			<div class="span4">
				<h2>目前非報名期間</h2>
				<p>抱歉，目前非開放報名的時間。</p>
				<a  href=".">回首頁</a>
			</div>
		</div>
		
		
	</div>
</div>

<?php
	return;
} else {
?>


<script src="contentjs/register-section.js"></script>

<div class="boxer">
	<div id="register-alert-msg" class="alert alert-block fade in">
		<a class="close" href="#">×</a>
		<h3 class="alert-heading"></h3>
		<p class="msg-content"></p>
	</div>

	<form class="form-horizontal" id="register-form" action="action/register.php" method="post">
		<legend><h2>競賽報名表</h2></legend>
		
		<label class="label label-important form-label">基本資料</label>
		<div class="control-group">
			<label class="control-label">隊伍名稱:</label>
			<div class="controls">
				<input type="text" class="span5" name="team_name" placeholder="隊伍名稱至少需2個字"/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">學校:</label>
			<div class="controls">
				<input type="text" class="span5" name="university"   placeholder="學校名請填全稱，如:國立彰化師範大學" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">系所:</label>
			<div class="controls">
				<input type="text" class="span5" name="department"  placeholder="系所名請填全稱，如:資訊工程學系"/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">電子信箱:</label>
			<div class="controls">
				<input type="text" class="span5"  name="email"  placeholder="登入帳號即為電子信箱，請謹慎填寫。報名成功訊息會寄至此"/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">連絡電話:</label>
			<div class="controls">
				<input type="text" class="span5"  name="cellphone"  placeholder="請填入聯絡人的手機號碼"/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">密碼:</label>
			<div class="controls">
				<input type="password" class="span5"  name="password"  placeholder="密碼為6~12個英數字元組成"/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">密碼確認:</label>
			<div class="controls">
				<input type="password" class="span5" name="chk_password"  placeholder="請再輸入一次密碼"/>
			</div>
		</div>
		<label class="label label-info form-label">隊員一</label>
		<div class="control-group">
			<label class="control-label"  >姓名:</label>
			<div class="controls">
				<input type="text" name="member_name_1"/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">學號:</label>
			<div class="controls">
				<input type="text" name="member_num_1"/>
			</div>
		</div>
		<label class="label label-info form-label">隊員二</label>
		<div class="control-group">
			<label class="control-label">姓名:</label>
			<div class="controls">
				<input type="text" name="member_name_2"/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">學號:</label>
			<div class="controls">
				<input type="text" name="member_num_2"/>
			</div>
		</div>
		<label class="label label-info form-label">隊員三</label>
		<div class="control-group">
			<label class="control-label">姓名:</label>
			<div class="controls">
				<input type="text" name="member_name_3"/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">學號:</label>
			<div class="controls">
				<input type="text" name="member_num_3"/>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<label class="checkbox"><input type="checkbox" name="agree_rule">我已閱讀並同意<a id="display-rule-content" href="" >比賽規則</a> </label>
			</div>
		</div>
		<br>
		<div class="form-actions">
			<input class="btn btn-success form-big-btn" type="submit" value="送出" />
			<input class="btn form-big-btn" type="reset" value="重填" />
		</div>
		<br>
	</form>
</div>

<?php
}
?>




