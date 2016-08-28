<?php
session_start();
include_once('../class/SecureInput.class.php');
include_once('../class/Database.class.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="big5">
		<title>CCPC Admin</title>
		<meta http-equiv="expires" content="-1" />
		<meta http-equiv="Pragma" content="no-cache">
		<link rel="icon" type="image/png" href="../img/favicon.ico" />
		<link href="../css/basicstyle.css" rel="stylesheet" />
		<script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/jquery.form.js"></script>
		<script src="../js/jquery.toastmessage.js"></script>
		
		<style>
			.book_title {
				margin-top: 50px;
				margin-bottom: 50px;
				font-size:30px;
				font-w
			}
		</style>
		
		<script>
		function addCSS(){
			$('#scoreboard table:first').addClass('table table-striped table-bordered table-condensed').find('tr').each(function(){
				if ( $(this).find('td').size() == 4 ) $(this).remove();
			});
		}
		function refreshScoreboard(){
			/*$('#scoreboard').load('scoreboard.php', addCSS);
			
			setTimeout(arguments.callee, 10000);*/
			setTimeout("location.reload()", 10000);
		}
		
		$(function(){
		refreshScoreboard();
		addCSS();
		});
		</script>
	</head>

	<body>
	<div class="container">
		

				<div class="book_title">CCPC SCOREBOARD</div>
				
				<div id="scoreboard">
					<?php include('scoreboard.php'); ?>
				</div>
	</div>
	</body>
</html>
