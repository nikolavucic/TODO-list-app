<?php

require_once('MySQLconnect.php');

class Done {

	public function __construct() {

		$connection = new MySQLconnect();

		$id_done = $_POST['id-done'];

		$sql = "UPDATE `list` SET state='done' WHERE id='$id_done'";

		$connection->conn->query($sql);

		$connection->conn->close();

		header('Location: ' . 'http://localhost/todo_list_app/' );
	}

}

new Done();
