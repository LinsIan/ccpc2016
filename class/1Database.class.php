<?php
/***************************************************
* Last Modify: 2011/05/20 
* Description: 提供簡易的方法連接資料庫
****************************************************/
class Database extends MySQLi
{
	function __construct()
	{	
		parent::__construct('localhost', 'root', '0000', 'ccpc');
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