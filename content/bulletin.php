<h2>公告事項</h2>


<br>
<table id="bulletin-table" class="table hover-effect">
	<tr>
		<th class="bulletin-subtitle bulletin-head ">公告日期</th>
		<th class="bulletin-content bulletin-head ">內容</th>
	</tr>
<?php
	$sql = "select * from bulletin order by id desc";
	$result = $db->query($sql);
	while( $bulletin = $result->fetch_assoc() )
	{
	
?>
	<tr>
		<td class="bulletin-subtitle"><?=$bulletin['time']?></td>
		<td class="bulletin-content"><?=$bulletin['content']?></td>
	</tr>
<?php
	}
?>
</table>