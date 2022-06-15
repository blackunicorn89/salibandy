<?php>
// Tällä skriptillä poistetaan pelaaja tietokannasta pelaajan numeron perusteella

require_once 'yhteys.php'; // luodaan yhteys
$conn = dbConnect();

$OK = true; // We use this to verify the status of the update.

// jos numero on asetettu, suoritetaan poisto
if (isset($_GET['nro'])) {
	// Create the query
		$deleteQuery = 'DELETE FROM Pelaajat WHERE nro = ?';
		// we have to tell the PDO that we are going to send values to the query
		$stmt = $conn->prepare($deleteQuery);
		// Now we execute the query passing an array to execute();
		$OK = $stmt->execute(array($_GET['nro']));
		// In case of any error, we get the values.
		$error = $stmt->errorInfo();
		// We use this to verify the integrity of the update.
		if (!$OK) {
			echo $error[2];
			/*
				0	SQLSTATE error code (a five characters alphanumeric identifier defined in the ANSI SQL standard).
				1	Driver specific error code.
				2	Driver specific error message.
			*/
		} 
		// Jos tallennus onnistui, tulostetaan "onnistui". Sanaa hyödynnetään pelaajan_haku.php:n javascriptissä
		else { echo 'onnistui'; }
}

	
?>