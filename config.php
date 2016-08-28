<?php
date_default_timezone_set("Asia/Taipei");

/* 
 * mktime(hour,minute,second,month,day,year,is_dst) 
 */
define('REGISTER_START_TIME', mktime(0, 0, 0, 8, 13, 2016));
define('REGISTER_END_TIME', mktime(23, 59, 59, 11, 24, 2016));

function IN_REGISTER_TIME($time) {
	return ($time>=REGISTER_START_TIME && $time<=REGISTER_END_TIME);
}

function TODAY_IN_REGISTER_TIME() {
	return IN_REGISTER_TIME(time());
}

//echo IN_REGISTER_TIME(time())?"true":"false";

?>