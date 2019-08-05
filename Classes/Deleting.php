<?php

require_once('MySQLconnect.php');

class Deleting {

	public function __construct() {

		$connection = new MySQLconnect();

		$id_delete = $_POST['id-delete'];

		$sql = "DELETE FROM `list` WHERE id='$id_delete'";

		$connection->conn->query($sql);

		$connection->conn->close();

		header('Location: ' . 'http://localhost/todo_list_app/' );
	}

}

new Deleting();
