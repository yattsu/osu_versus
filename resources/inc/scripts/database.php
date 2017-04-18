<?php

#security
require $_SERVER['DOCUMENT_ROOT'] . '/osu!versus/resources/inc/scripts/page_security.php';

#config
require_once $_SERVER['DOCUMENT_ROOT'] . '/osu!versus/resources/config.php';

class Database
{
	private $host;
	private $username;
	private $password;
	private $database;
	private $con;

	#set credentials to the object
	public function __construct()
	{
		$this->host = DB_HOST;
		$this->username = DB_USERNAME;
		$this->password = DB_PASS;
		$this->database = DB_DATABASE;
	}

	#connect to the database
	public function connect()
	{
		#connect and store connection
		$con = mysqli_connect($this->host, $this->username, $this->password, $this->database);

		if (!$con) {
			return false;
		}

		#sets the "con" property to the connection variable
		$this->con = $con;

		return true;
	}

	#checking if visitor is new
	public function is_visitor_new()
	{
		$user_ip = $_SERVER['REMOTE_ADDR'];

		$sql = 'SELECT * FROM visitors WHERE ip = "'. $user_ip .'"';
		$query = mysqli_query($this->con, $sql);
		$row_number = mysqli_num_rows($query);

		if ($row_number > 0) {
			return false;
		} else {
			return true;
		}
	}

	#insert data into database
	public function insert_user_data()
	{
		if (!$this->con) {
			return false;
		}

		$user_ip = $_SERVER['REMOTE_ADDR'];
		$today_date = date('d/m/Y');
		$today_time = date('h:i', time());

		#if visitor already exists in the database
		if ($this->is_visitor_new() === false) {
			$sql = 'UPDATE visitors SET today_date = "' . $today_date . '", today_time = "' . $today_time . '" WHERE ip = "' . $user_ip . '"';
			$query = mysqli_query($this->con, $sql);
		#if visitor is new
		} else {
			$sql = 'INSERT INTO visitors (ip, today_date, today_time) VALUES ("' . $user_ip . '", "' . $today_date . '", "' . $today_time . '")';
			$query = mysqli_query($this->con, $sql);
		}
	}

	#count unique users
	public function unique_users()
	{
		if (!$this->con) {
			return false;
		}

		$sql = 'SELECT * FROM visitors';
		$query = mysqli_query($this->con, $sql);
		$unique_users = mysqli_num_rows($query);

		return $unique_users;
	}
}

?>