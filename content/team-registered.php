<script src="contentjs/team-registered.js"></script>

<?php
function safe_get($data, $default) {
	return empty($data)?$default:$data;
}
$nopaid_html = '<div class="pull-right team-registered-nopaid">未繳費</div>';
$paid_html = '<div class="pull-right team-registered-paid">已繳費</div>';


$sql = "select team_id, university, department, team_name, is_paid from team order by team_id desc";
$team_result = $db->query($sql);

if( $team_result == null){
	echo '無任何隊伍報名。';
	exit();
}

?>


<h2>報名結果 - 共<?=$team_result->num_rows?>隊</h2>
<br>

<div id="registered-pages">

<?php
$pager = 0;
$pager_num = 3;

echo '<div class="team-page">';

while( $team = $team_result->fetch_assoc()) {

	$sql = "select * from member where team_id = '".$team['team_id']."'";
	$member_result = $db->query($sql);
	
	$member = array();
	while( $t_member = $member_result->fetch_assoc())
		$member[] = $t_member;
	
	
	
	
	//continue;
?>


<table class="table table-bordered team-registered-table">
	<tr>
		<th class="team-registered-head" colspan="3"><?='#'.$team['team_id'].' '.$team['university'].$team['department'].' - '.$team['team_name']?> <?=($team['is_paid']==1)?$paid_html:$nopaid_html?></th>
	</tr>
	<tr>
		<th class="team-registered-subtitle">組員編號</th><th class="team-registered-name">組員姓名</th><th class="team-registered-no">組員學號</th>
	</tr>
	<tr>
		<td class="team-registered-subtitle">組員1:</td><td class="team-registered-name"><?=safe_get(@$member[0]['stud_name'], '無')?></td><td class="team-registered-no"><?=safe_get(@$member[0]['stud_id'], '無')?></td>
	</tr>
	<tr>
		<td class="team-registered-subtitle">組員2:</td><td class="team-registered-name"><?=safe_get(@$member[1]['stud_name'], '無')?></td><td class="team-registered-no"><?=safe_get(@$member[1]['stud_id'], '無')?></td>
	</tr>
	<tr>
		<td class="team-registered-subtitle">組員3:</td><td class="team-registered-name"><?=safe_get(@$member[2]['stud_name'], '無')?></td><td class="team-registered-no"><?=safe_get(@$member[2]['stud_id'], '無')?></td>
	</tr>
</table>
<?php
	
	$pager++;
	if($pager%$pager_num == 0)
		echo '</div><div class="team-page">';
	 
}
echo '</div>';
?>

</div>