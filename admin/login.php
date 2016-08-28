<?php
session_start();

if( isset($_SESSION['ccpc']['islogin']) and $_SESSION['ccpc']['islogin'] == true)
	header('Location: index.php');

	
include_once('../class/SecureInput.class.php');


$password = 'ccpcncuecsie2016';
$input = new SecureInput();

if( $input->notEmpty('post', 'password'))
{
	if( $password == $input->post('password') ) {
		$_SESSION['ccpc']['islogin'] = true;
		header('Location: index.php');
	}
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>CCPC Admin Login</title>
		<link rel="icon" type="image/png" href="../img/favicon.ico" />
		<link href="../css/basicstyle.css" rel="stylesheet" />
		<script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		
		<style>
			.container {
				margin-top: 100px;
			}
			.form-actions {
				background-color: transparent;
			}
		</style>
		<script>
			$(document).ready(function(){
				$('#password').focus();
			});
		</script>
	</head>

	<body>
	<div class="container">
		<div class="row">
			<div class="span6 offset3">
				<div class="modal">
					<div class="modal-body">
						<form class="form-horizontal" id="login-from" method="post">
							<fieldset>
							<legend><h2>Login <small> - CCPC Admin Panel</small></h2></legend>
							<div class="control-group">
								<label class="control-label">Password</label>
								<div class="controls">
									<input type="password" id="password" name="password"/>
								</div>
							</div>
							<div class="form-actions">
								<button class="btn">Submit</button>
							</div>
							</fieldset>
							
						</form>
					</div>
				</div>	
			</div>
		</div>
	</div>
	</body>
</html>
