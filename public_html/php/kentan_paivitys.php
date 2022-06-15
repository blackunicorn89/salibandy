<?php
	// Tällä skriptillä päivitetään tietokantaan, millä pelikentällä pelaaja pelaa
	
	// Otetaan ajax-pyynnöllä tulleet tiedot talteen muuttujiin
	$numero = $_GET['numero'];
	$kentta = $_GET['kentta'];
	
	// Jos kaikkiin muuttujiin on asetettu arvo, suoritetaan päivitys
	if (empty($numero) or $kentta == "") { return; }
	else {
		
		require_once 'yhteys.php'; // Luodaan yhteys
		$conn = dbConnect();
		
		$OK = true; // We use this to verify the status of the update.	
		// Create the query
		$updateQuery = 'UPDATE Pelaajat SET kentta = ? WHERE nro = ?;';
		// we have to tell the PDO that we are going to send values to the query
		$stmt = $conn->prepare($updateQuery);
		// Now we execute the query passing an array to execute();
		$OK = $stmt->execute(array($kentta, $numero));
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
	}
?>