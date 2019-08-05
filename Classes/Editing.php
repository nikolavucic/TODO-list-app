<?php

require_once('MySQLconnect.php');

class Editing {

	public function __construct() {
		$connection = new MySQLconnect();

		$name = $_POST['name'];
		$description = $_POST['description'];
		$timestamp = date("Y-m-d");

		$sql = "INSERT INTO `list` (`name`, `descripton`, `state`, `date`)
        VALUES ( '$name', '$description', 'active', '$timestamp')";

		mysqli_query( $connection->conn, $sql );

		mysqli_close( $connection->conn );

		header('Location: ' . 'http://localhost/todo_list_app/' );
	}
}

new Editing;
