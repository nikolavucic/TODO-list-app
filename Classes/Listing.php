<?php

require_once('MySQLconnect.php');

class Listing {

	public function __construct() {

		$connection = new MySQLconnect();

		$rows = "SELECT * FROM `list`";
		$result = $connection->conn->query($rows);

		if ( $result->num_rows > 0 ) {
			// output data of each row
			while($row = $result->fetch_assoc()) {

				$state = $row["state"];

				$html  = '';
				$html .= '<article id="'. $row["id"] .'">';
				$html .=    '<div class="'. $state .'">';
				$html .=        '<h4>'. $row["name"]. '</h4>';
				$html .=        '<p>'. $row["descripton"] .'</p>';
				$html .=        '<form class="small-form done float-right" action="Classes/Done.php" method="post">';
				$html .=            '<input type="hidden" name="id-done" value="'. $row["id"] .'" />';
				$html .=            '<input type="submit" value="done" />';
				$html .=        '</form>';
				$html .=        '<form class="small-form delete float-right" action="Classes/Deleting.php" method="post">';
				$html .=            '<input type="hidden" name="id-delete" value="'. $row["id"] .'" />';
				$html .=            '<input type="submit" value="delete" />';
				$html .=        '</form>';
				$html .=    '</div>';
				$html .= '</article>';

				echo $html;
			}
		} else {
			echo '<div class="alert alert-danger" role="alert">There is no cards in DataBase!</div>';
		}

	}
}
