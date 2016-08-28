<script src="contentjs/team-modify.js"></script>

<div id="modify-alert-msg" class="alert alert-block fade in">
	<a class="close" href="#">×</a>
	<h3 class="alert-heading"></h3>
	<p class="msg-content"></p>
</div>
	
<div class="offset1 span6" id="login-modify">
	<form class="form-horizontal" id="login-modify-form" action="action/login.php" method="post">
		<legend><h2>登入修改</h2></legend>
		
		<div class="control-group">
			<label class="control-label">帳號:</label>
			<div class="controls">
				<input type="text" class="span3"  name="email"  placeholder="登入帳號即為報名填寫的電子信箱。"/>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label">密碼:</label>
			<div class="controls">
				<input type="password" class="span3"  name="password"  placeholder="6~12個英數字元組成的密碼。"/>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<button class="btn btn-warning form-big-btn" >登入</button>
				
			</div>
		</div>
	</form>
</div>

<div id="modify-team">

	<form class="form-horizontal" id="modify-team-form" action="action/modify.php" method="post">
		<legend><h2>更正報名表</h2></legend>
		<!-- /*
		<div id="modify-pay-info">
			<label class="label label-warning form-label">繳費資料</label>
			<div class="control-group">
				<div class="controls">
					<label class="checkbox"><input type="checkbox" name="is_paid">我已經劃撥繳費完成</label>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">劃撥繳費寄款人:</label>
				<div class="controls">
					<input type="text" class="span5" name="remit_account" placeholder="繳費後請在此填入寄款人姓名。" disabled />
				</div>
			</div>
			<br><br>
		</div>
		*/ -->
		
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
		<br>
		
		<label class="label label-success form-label">修改密碼</label>
		<div class="control-group">
			<label class="control-label">新密碼:</label>
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
		<br>
		
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

		<br>
		<div class="form-actions">
			<input class="btn btn-success form-big-btn" type="submit" value="送出" />
			<input class="btn form-big-btn" type="button" value="取消" id="ter-modify" />
		</div>
		<br>
	</form>
</div>