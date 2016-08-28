<h2>活動花絮</h2>
<br><br>

<div class="message-record" style="padding: 20px">

<h4>2012中區程式設計競賽 試題本: <a href="file/試題本.pdf">點此下載</a></h4>

</div>
<br>
<hr>
<br>

<div class="message-record" style="padding: 20px">

<h3 >活動照片 <small class="pull-right"><b>下載所有照片: <a href="./photo/photo_1296x864.rar">1296x864</a> / <a href="./photo/photo_2592x1728.rar">2592x1728</a></b></small></h3> 
<br>
<ul class="thumbnails">

<?php
	$photo_path = './photo/*.[Jj][Pp][Gg]';
	//$thumbnail_path = './photo/thumbnail/*.[Jj][Pp][Gg]';

	foreach ( glob( $photo_path ) as $photo):
?>

	<li class="span2">
	  <a href="<?=$photo?>" rel="group" class="thumbnail inlinebox">
		<img src="<?=str_replace("/photo/", "/photo/thumbnail/", $photo)?>" alt="">
	  </a>
	</li>

<?php
	endforeach;
?>
	
</ul>

</div>