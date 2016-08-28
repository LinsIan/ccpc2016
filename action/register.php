<?php
include_once('../class/Database.class.php');
include_once('../class/SecureInput.class.php');


$db = new Database();
$input = new SecureInput();


include_once('../config.php');

if( !TODAY_IN_REGISTER_TIME() )
	exit(0);

	
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
			/*$member[] = array (
				'name' => $input->post('member_name_'.$i),
				'num' => $input->post('member_num_'.$i),
			);*/
			$member['name'][] = $input->post('member_name_'.$i);
			$member['num'][] = $input->post('member_num_'.$i);
			
		}
	}
	
	if( count($member['name']) < 1 )
		$error[] = '參賽人員至少需一人';
	else if( haveEqual( $member['name']) or haveEqual( $member['num']) )
		$error[] = '參賽人員不可以重複';
	else {
		for($i=0;$i<3;$i++)
			if(@haveMember($db, $member['name'][$i], $member['num'][$i]) )
				$error[] = '隊員:'.$member['name'][$i].' 已經報名了其他隊伍。';;
	} 
	
	
	
if( $input->notEmpty('post', 'team_name', 'university', 'department', 'email', 'cellphone', 'password', 'chk_password') )
{
	if( !$input->notEmpty('post', 'agree_rule') )
		$error[] = '請閱讀比賽規則後確認同意';
	
	if( !$input->isLenBetween( $input->post('team_name'), 2, 30 ))
		$error[] = '隊伍名稱至少需2個字';
	
	if( !$input->isLenBetween( $input->post('university'), 2, 60 ))
		$error[] = '學校名稱至少需2個字';
		
	if( !$input->isLenBetween( $input->post('department'), 2, 60 ))
		$error[] = '系所名稱至少需2個字';
		
	if( !$input->isEmail( $input->post('email') ))
		$error[] = '信箱格式不正確';
	
	if( !$input->isLenBetween( $input->post('cellphone'), 10, 10 ) || !$input->isInt( $input->post('cellphone') ) )
		$error[] = '聯絡電話格式不正確';
		
	if( !$input->isNotSign( $input->post('password')))
		$error[] = '密碼只能是英文或數字';
	
	if( !$input->isLenBetween( $input->post('password'), 6, 12 ))
		$error[] = '請填入6~12個字的密碼';
		
	if( $input->post('password') != $input->post('chk_password') )
		$error[] = '確認密碼不符合';
		
	$sql = sprintf("select * from team where email = '%s' ", $input->post('email'));
	$result = $db->query($sql);
	if ( $result->fetch_assoc() )
		$error[] = 'Email地址已經使用過';
		
}
else
	$error[] = '有需要的欄位未填寫';
	
	
if( count($error) == 0)
{
	$team_data = array(
		'team_name' => $input->post('team_name'),
		'university' => $input->post('university'),
		'department' => $input->post('department'),
		'email' => $input->post('email'),
		'cellphone' => $input->post('cellphone'),
		'password' => $input->post('password'),
		'register_ip' => $input->getIp(),
		'register_date' => $input->getDate().' '.$input->getTime(),
	);
	if( $db->insert('team', $team_data) != -1 ) {
		
		$team_id = $db->insert_id;
		//$input->dump($team_data);
		
		$member_registered = count($member['name']);
		for($i=0;$i<count($member['name']);$i++) {
			$member_data = array (
				'stud_name' => $member['name'][$i],
				'stud_id' => $member['num'][$i],
				'team_id' => $team_id
			);
			
			if( $db->insert('member', $member_data) == -1 ) {
				$error[] = '隊員 '.$member['name'][$i].' 已經報名過。'; 
				$member_registered--;
			}
			//$input->dump($member_data);
		}
		if( $member_registered == 0 )
			$error[] = '無任何隊員報名完成，隊伍中必須至少有一人，請至『修改報名』中更正';
	}
	else
		$error[] = '此隊伍已經報名過，請勿重複報名。';
}


if ( count($error) == 0)
{
	include_once('../class/phpmailer/class.phpmailer.php');
	include_once('../class/phpmailer/class.smtp.php');
	$mail = new PHPMailer();
	$mail->IsSMTP();

	
	$mail->SMTPAuth = true;      
	$mail->SMTPSecure = "ssl";    
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465;
	$mail->CharSet = "utf-8";
	$mail->Encoding = "base64";


	$mail->Username = "council@csie.ncue.edu.tw";
	$mail->Password = "ncuecsie2012102";     

	$mail->From = "council@csie.ncue.edu.tw";
	$mail->FromName = "彰化師範大學 資訊工程學系系學會";
	$mail->Subject = "2015中區大專院校程式設計競賽 線上報名結果"; 
	$mail->Body = sprintf( file_get_contents('tmpl-mail.php'), $input->post('team_name') );    
	$mail->IsHTML(true);

	// 收件人
	$mail->AddAddress( trim($input->post('email')), $input->post('team_name') );

	// 顯示訊息
	if(!$mail->Send()) {     
		$error[] = $mail->ErrorInfo;     
	} 

}

echo json_encode($error);
	
?>