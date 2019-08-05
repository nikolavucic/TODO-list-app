<?php

class MySQLconnect {

	public $conn;

	public function __construct() {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$db_name = "to_do_list_base";

		// Create connection
		$this->conn = mysqli_connect( $servername, $username, $password, $db_name );

		// Check connection
		if (! $this->conn ) {
			die( "Connection failed: " . mysqli_connect_error() );
		}

		if ( $this->conn ) {
			echo '<div class="alert alert-success" role="alert"><div class="container">Connected successfully to "to_do_list_base" !</div></div></br>';
		}
	}

	public function connection_failed() {

	}

	public function connected_successfully() {

	}
}
