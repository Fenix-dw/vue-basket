<?php 
namespace application\core;

use \PDO;

class Database
{
	public $isConn;
	protected $datab;
	
	public function __construct($username = "root", $password = "", $host = "localhost", $dbname = "market", $option = [])
	{	
		$this->isConn = true;
		try {
			$this->datab = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $option);
			$this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());
		}
	}

	public function Disconnect()
	{
		$this->isConn = false;
		$this->datab = null;
	}

	public function getRow($query, $params = [])
	{
		try {
			$stmt = $this->datab->prepare($query);
			$stmt->execute($params);
			return $stmt->fetch();
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());
		}
	}

	public function getRows($query, $params = [])
	{
		try {
			$stmt = $this->datab->prepare($query);
			$stmt->execute($params);
			return $stmt->fetchAll();
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());
		}		
	}

	public function insertRow($query, $params = [])
	{
		try {
			$stmt = $this->datab->prepare($query);
			$stmt->execute($params);
			return true;
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());
		}	
	}

	public function updateRow($query, $params = [])
	{
		$this->insertRow($query, $params);
	}

	public function deleteRow($query, $params = [])
	{
		$this->insertRow($query, $params);
	}
}
