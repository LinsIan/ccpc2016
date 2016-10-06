<?php
/***************************************************
* Last Modify: 2011/05/20 
* Description: 提供簡易的方法連接資料庫
****************************************************/
//require_once('../Anti-invasion.php');

class Database extends MySQLi
	{

	function __construct()
	{		
		
	$sql_host = "127.0.0.1"; // Host name 
	$sql_acc = "linsyee"; // Mysql username 
	$sql_pwd = ""; // Mysql password 
	$sql_selectedDB="ccpc2016";
		//parent::__construct('localhost', 'ncuecsie', 'M0154007_CSIE_M0254009', 'ccpc2015');
		parent::__construct($sql_host, $sql_acc, $sql_pwd, $sql_selectedDB);
		//parent::__construct('localhost', 'root', '', 'ccpc');
		$this->query('SET CHARACTER SET utf8');
		$this->query("SET collation_connection = 'utf8_chinese_ci'");
		$this->query("SET time_zone = 'Asia/Taipei'");
	}
	function insert($table, $data)
	{
		$col = array();
		$values = array();
		foreach($data as $key=>$value) {
			$col[] = '`'.$key.'`';
			$values[] = '\''.$value.'\'';	
		}
		
		$sql = "insert into ".$table."(".join(",",$col).") values (".join(",",$values).")";
		$this->query($sql);
		return $this->affected_rows;
		//return $this->insert_id;
	}
	function select($table, $attr = array("*"), $condition="")
	{
		
		$sql = "select ".join(",", $attr)." from ".$table." ".$condition;
		return $this->query($sql);
	}
	function delete($table, $condition=""){

		$sql = "DELETE FROM ".$table." ".$condition;
		$this->query($sql);
		return $this->affected_rows;
	}
	function update($table, $data, $condition=""){
		$set_values = array();
		foreach($data as $key => $value){
			$set_values[] = '`'.$key.'` = \''.$value.'\'';
		}
		
		$sql = "UPDATE ".$table." SET ".join(",",$set_values)." ".$condition;
		
		$this->query($sql);
		return $this->affected_rows;
	}
	
}
?>