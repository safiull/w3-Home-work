<?php
error_reporting(0);
class Db{
	public $conn;

	public function __construct($host,$user,$pass,$dbName){
		$this->conn = new mysqli($host,$user,$pass,$dbName);
		if ($this->conn->connect_errno>0) {
			die("Connection faild : ". $this->conn->connect_error);
		}
	}
	public function Insert($table, $cols){
		$sql = "INSERT INTO $table SET $cols";
		$result = $this->conn->query($sql);
		if ($this->conn->affected_rows>0) {
			return true;
		}
		return false;
	}
	public function getAll($table, $cols){
		$sql = "SELECT $cols FROM $table";
		$result = $this->conn->query($sql);
		if ($result->num_rows>0) {
			return $result->fetch_all(MYSQLI_ASSOC);
		}
		return "No data available.";
	}

	public function Update($cols, $table, $condition){
		$sql = "UPDATE $table SET $cols WHERE $condition";
		$result = $this->conn->query($sql);
		if ($result->num_rows>0) {
			return $result->fetchAll(MYSQLI_ASSOC);
		} else {
			return "No data available.";
		}
	}
	public function getElementByCondition($cols, $table, $condition){
		$sql = "SELECT $cols FROM $table WHERE $condition";
		$result = $this->conn->query($sql);
		if ($result->num_rows>0) {
			return $result->fetch_all(MYSQLI_ASSOC);
		} else {
			return "No data available.";
		}
	}

	public function Delete($table, $condition){
		$sql = "DELETE FROM $table WHERE $condition";
		$result = $this->conn->query($sql);
		if ($result->num_rows>0) {
			return $result->fetch_all(MYSQLI_ASSOC);
		} else {
			return "No data available.";
		}
	}
}
 
$obj = new Db("localhost","root", "", "first_crud");

