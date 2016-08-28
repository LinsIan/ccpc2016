<?php
/***************************************************
* Last Modify: 2011/06/12 
* Description: 提供簡易安全的方法取的get/post
****************************************************/
//require_once('../Anti-invasion.php');

class SecureInput 
{
	function post($name)
	{
		if (!get_magic_quotes_gpc()) {
			return addslashes($_POST[$name]);
		} else {
			return $_POST[$name];
		}	
	}
	function post_contains($name)
	{
		return isset($_POST[$name]);	
	}
	function get($name)
	{
		if (!get_magic_quotes_gpc()) {
			return addslashes($_GET[$name]);
		} else {
			return $_GET[$name];
		}	
	}
	function get_contains($name)
	{
		return isset($_GET[$name]);	
	}
	/***
	 notEmpty : 
	 若只輸入一個參數，則判斷該參數代表的變數是否為空
	 若輸入二個參數以上，則第二個之後參數代表變數內的key，若key代表的值皆為null則傳回true
	 ***/
	function notEmpty($name)
	{
		if($name == 'post')         $method = $_POST;
		else if($name == 'get')     $method = $_GET;
		else if($name == 'request') $method = $_REQUEST;
		
		if( func_num_args() == 1)
			return count($method)!=0;
		else if(func_num_args() >= 2)
		{
			$vals = func_get_args();
			array_shift($vals);
			foreach($vals as $val)
				if(empty($method[$val])) return false;
			return true;
		}
		
	}
	function dump($name)
	{
		echo '<pre>';
		if($name == 'post')         print_r($_POST);
		else if($name == 'get')     print_r($_GET);
		else if($name == 'session') print_r($_SESSION);
		else if($name == 'cookie')  print_r($_COOKIE);
		else if($name == 'request') print_r($_REQUEST);
		else                        print_r($name);
		echo '</pre>';
	}
	
	function isEmail($email)
	{
		return preg_match('/^[\w\d_\.]+@[\w\d_]+(\.[\w\d_]+)+/i', $email);
	}
	
	function isInt($int)
	{
		return preg_match('/^[0-9]+$/', $int);
	}
	
	function isEng($eng)
	{
		return preg_match('/^[a-zA-Z]+$/', $eng);
	}
	
	function isNotSign($str)
	{
		return preg_match('/^[0-9a-zA-Z]+$/', $str);
	}
	
	function isLenBetween($str, $from, $to)
	{
		return strlen($str)>= $from && strlen($str) <=$to;
	}
	
	function getIp()
	{
		return isset($_SERVER["HTTP_VIA"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"];
	}
	
	function getDate($str = "Y-m-d"){
		date_default_timezone_set("Asia/Taipei");
		return date($str);
	}
	
	function getTime($str = "H:i:s"){
		date_default_timezone_set("Asia/Taipei");
		return date($str);
	}
	
	
	
}
/*
$in = new Input();
echo $in->get('q');
*/
?>