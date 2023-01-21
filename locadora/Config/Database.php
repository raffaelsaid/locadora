<?php

class Database
{
	protected $connection;

	function __construct()
	{
		$this->conectar();
	}

	/**
	 * Função de conexão
	 */
	function conectar()
	{
		try {

			$host = 'localhost';
			$dbname = 'locadora';
			$user = 'root';
			$pass = '';

			$this->connection = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $pass);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			echo 'Erro Dbconfig: ' . $e->getMessage();
		}
	}
}
