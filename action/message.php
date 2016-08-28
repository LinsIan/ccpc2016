<?php
include_once('../class/Database.class.php');
include_once('../class/SecureInput.class.php');

$db = new Database();
$input = new SecureInput();

$error = array();
if( $input->notEmpty('post', 'name', 'title', 'content') )
{
	if( !$input->isLenBetween( $input->post('name'), 2, 30 ))
		$error[] = '暱稱至少需2個字';
	
	if( !$input->isLenBetween( $input->post('title'), 2, 50 ))
		$error[] = '主旨至少需2個字';
		
	if( !$input->isLenBetween( $input->post('content'), 0, 1000 ))
		$error[] = '內文不可以是空白';
}
else
	$error[] = '全部的欄位皆要填寫';
	
	
if( count($error) == 0)
{
	$team_data = array(
		'name' => $input->post('name'),
		'title' => $input->post('title'),
		'content' => $input->post('content'),
		'post_ip' => $input->getIp(),
		'post_date' => $input->getDate().' '.$input->getTime(),
	);
	if( $db->insert('message', $team_data) != -1 ) {
		//留言成功
	}
	else
		$error[] = '留言失敗';
}

echo json_encode($error);
	
?>