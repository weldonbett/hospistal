<?php
class Database{
	var $host = "localhost";
	var $user = "root";
	var $password = "";
	var $db = "hospice";
	var $conn;
	var $sel;
	
	function __construct(){
		$this->Database_Connect();
		$this->Database_select();
	}
	
	function Database_Connect(){
		$this->conn = mysql_connect($this->host,$this->user,$this->password);
		return $this->conn;
	}
	function Database_select(){
		$this->sel = mysql_select_db($this->db);
		return $this->sel;
	}
}

$db = new Database();
?>