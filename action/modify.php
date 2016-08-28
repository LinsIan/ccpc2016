<?php
session_start();
include_once('../class/Database.class.php');
include_once('../class/SecureInput.class.php');

$db = new Database();
$input = new SecureInput();


if ( !isset($_SESSION['ccpc_teamid']) )
	die( json_encode( array ( 'isLogout' => true ) ) );
	
function haveEqual($arr)
{
	foreach ( array_count_values($arr) as $key => $val) {
		if ($val > 1) return true;
	}
	return false;
}	

function haveMember($db, $name, $no) {
	$sql = sprintf("select * from member where stud_name='%s' and stud_id='%s'", $name, $no);
	$result = $db->query($sql);
	if( $result->num_rows > 0 ) return true;
	else return false ;
}


$error = array();

	$member = array();
	$member['name'] = array();
	$member['num'] = array();
	for($i=1;$i<=3;$i++) {
		if($input->notEmpty('post', 'member_name_'.$i, 'member_num_'.$i)) {

			$member['name'][] = $input->post('member_name_'.$i);
			$member['num'][] = $input->post('member_num_'.$i);
			
		}
	}
	
	if( count($member['name']) < 1 )
		$error[] = '參賽人員至少需一人';
	else if( haveEqual( $member['name']) or haveEqual( $member['num']) )
		$error[] = '參賽人員不可以重複';

	else {
		/*for($i=0;$i<3;$i++)
			if(@haveMember($db, $member['name'][$i], $member['num'][$i]) )
				$error[] = '隊員:'.$member['name'][$i].' 已經報名了其他隊伍。';;
				*/
	} 
	

if ($input->notEmpty('post', 'is_paid')) {
	if( !$input->notEmpty('post', 'remit_account') )
		$error[] = '必須填寫劃撥繳費寄款人';
	/*else if( !$input->isLenBetween( $input->post('remit_account'), 5, 5 ))
		$error[] = '填入的劃撥帳號必須五個字';*/
}

	
if( $input->notEmpty('post', 'team_name', 'university', 'department', 'cellphone') )
{
	
	if( !$input->isLenBetween( $input->post('team_name'), 2, 30 ))
		$error[] = '隊伍名稱至少需2個字';
	
	if( !$input->isLenBetween( $input->post('university'), 2, 60 ))
		$error[] = '學校名稱至少需2個字';
		
	if( !$input->isLenBetween( $input->post('department'), 2, 60 ))
		$error[] = '系所名稱至少需2個字';
		
	if( !$input->isLenBetween( $input->post('cellphone'), 10, 10 ) || !$input->isInt( $input->post('cellphone') ) )
		$error[] = '聯絡電話格式不正確';
		

}
else
	$error[] = '有需要的欄位未填寫';
	
if( $input->notEmpty('post', 'password', 'chk_password') ) 
{
	if( !$input->isLenBetween( $input->post('password'), 6, 12 ))
		$error[] = '請填入6~12個字的密碼';
		
	if( !$input->isNotSign( $input->post('password')))
		$error[] = '密碼只能是英文或數字';
	
	if( $input->post('password') != $input->post('chk_password') )
		$error[] = '確認密碼不符合';
}


	
if( count($error) == 0)
{
	
	$team_data = array(
		'team_name' => $input->post('team_name'),
		'university' => $input->post('university'),
		'department' => $input->post('department'),
		'cellphone' => $input->post('cellphone'),
		'register_ip' => $input->getIp(),
		'register_date' => $input->getDate().' '.$input->getTime(),
	);
	$condition = " where team_id='".$_SESSION['ccpc_teamid']."'";
	
	if( $input->notEmpty('post', 'password', 'chk_password') ) 
	{
		$team_data['password'] = $input->post('password');
	}
	/*
	$checkfile = isset($_FILES["upload_file"]) && $_FILES["upload_file"]["type"] == "image/jpeg") && 
				($_FILES["upload_file"]["size"] < 20000 && $_FILES["upload_file"]["error"] == 0;
	*/
	if ($input->notEmpty('post', 'is_paid') /* && $checkfile*/) {
		$team_data['is_paid'] = '1';
		$team_data['remit_account'] = $input->post('remit_account');
		$condition .= " and is_paid != '1'";
		/*
		if( !$checkfile  ) {
			$error[] = "沒有上傳圖片";
		}
		*/
	}
	
	if( count($error) == 0 && $db->update('team', $team_data, $condition) == 1 ) {
		$db->delete('member', " where team_id='".$_SESSION['ccpc_teamid']."'");

		$member_registered = count($member['name']);
		for($i=0;$i<count($member['name']);$i++) {
			$member_data = array (
				'stud_name' => $member['name'][$i],
				'stud_id' => $member['num'][$i],
				'team_id' => $_SESSION['ccpc_teamid']
			);
			if( $db->insert('member', $member_data) == -1 ) {
				$error[] = '隊員 '.$member['name'][$i].' 已經報名過。'; 
				$member_registered--;
			}
			//$input->dump($member_data);
		}
		if( $member_registered == 0 )
			$error[] = '無任何隊員報名完成，隊伍中必須至少有一人，請至『修改報名』中更正';
			
			
		/*
		if ( $checkfile )
		{
			$filename = $_SESSION['ccpc_teamid'].'.jpg';
			if (file_exists("upload/" . $filename))
				$error[] = "已經上傳過圖片";
			else
				move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $filename);
		}	
		*/
	}
	else
		$error[] = '更新失敗。 可能是填入了錯誤的資訊。'; //可能是is_paid被亂填
		
}

echo json_encode($error);
	
?>