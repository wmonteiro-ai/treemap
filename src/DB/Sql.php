<?php

namespace Demander\DB;
$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2));
$dotenv->load();

class Sql
{
	private $conn;

	public function __construct()
	{	
		$this->conn = new \PDO(
			"mysql:dbname=" . $_ENV['DBNAME'] . ";host=" . $_ENV['HOSTNAME'],
			$_ENV['USERNAME'],
			""
		);
	}

	private function setParams($statement, $parameters = array())
	{
		foreach ($parameters as $key => $value) {

			$this->bindParam($statement, $key, $value);
		}
	}

	private function bindParam($statement, $key, $value)
	{
		$statement->bindParam($key, $value);
	}

	// Executa uma consulta
	public function query($rawQuery, $params = array())
	{
		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();
	}

	// Executa uma consulta e retorna um valor
	public function select($rawQuery, $params = array()): array
	{
		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
}
