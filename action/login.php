<?php
session_start();

include_once('../class/Database.class.php');
include_once('../class/SecureInput.class.php');

$db = new Database();
$input = new SecureInput();


	
$error = array();
if( $input->notEmpty('post', 'email', 'password') )
{
	$sql = sprintf("select * from team where email = '%s' and password = '%s'", $input->post('email'), $input->post('password'));
	$result = $db->query($sql);
	$team = $result->fetch_assoc();
	if ( !$team )
		$error[] = '帳號或密碼錯誤';
	
	
}
else
	$error[] = '請輸入帳號密碼';


unset($_SESSION['ccpc_teamid']);
if( count($error) == 0) {
	$_SESSION['ccpc_teamid'] = $team['team_id'];
	
	$c_time = 3600;
	$path = '/';//dirname(dirname($_SERVER['PHP_SELF']));
	
	//setting team's info
	setcookie('team_name',	$team['team_name'], time()+$c_time, $path);
	setcookie('university',	$team['university'], time()+$c_time, $path);
	setcookie('department',	$team['department'], time()+$c_time, $path);
	//setcookie('email',		$team['email'], time()+$c_time, $path);
	setcookie('cellphone',	$team['cellphone'], time()+$c_time, $path);
	setcookie('is_paid',	$team['is_paid'], time()+$c_time, $path);
	//setcookie('remit_account',	$team['remit_account'], time()+$c_time, $path);
	
	
	
	//clear member cookie
	for($i=1;$i<=3;$i++) {
		setcookie('member_name_'.$i, '', time());
		setcookie('member_num_'.$i, '', time());
	}
	
	$sql = "select * from member where team_id = '".$team['team_id']."'";
	$result = $db->query($sql);
	//setting member's info
	for($i=1;$member = $result->fetch_assoc();$i++) {
		setcookie('member_name_'.$i, $member['stud_name'], time()+$c_time, $path);
		setcookie('member_num_'.$i, $member['stud_id'], time()+$c_time, $path);
	}
}
	
echo json_encode($error);
	
?>