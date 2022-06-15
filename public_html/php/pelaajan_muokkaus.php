<?php
	// Tällä skriptillä päivitetään pelaajan tiedot tietokantaan
	
	// Otetaan ajax-pyynnöllä tulleet tiedot talteen muuttujiin
	$numero = $_GET['numero'];
	$nimi = $_GET['nimi'];
	$paikka = $_GET['paikka'];
	$joukkue = $_GET['joukkue'];
	
	// Jos kaikkiin muuttujiin on asetettu arvo, suoritetaan päivitys
	if (empty($numero) or empty($paikka) or empty($joukkue)) {
		
		echo "<p>Tarkista puuttuvat tiedot</p>";
	}
	else {
		
		require_once 'yhteys.php'; // Luodaan yhteys
		$conn = dbConnect();
		
		$OK = true; // We use this to verify the status of the update.	
		// Create the query
		$updateQuery = 'UPDATE Pelaajat SET nimi = ?, paikka = ?, joukkue = ? WHERE nro = ?;';
		// we have to tell the PDO that we are going to send values to the query
		$stmt = $conn->prepare($updateQuery);
		// Now we execute the query passing an array to execute();
		$OK = $stmt->execute(array($nimi, $paikka, $joukkue, $numero));
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
		// Jos tallennus onnistui, tulostetaan "onnistui". Sanaa hyödynnetään pelaajan_haku:php:n javascriptissä
		else { echo 'onnistui'; }
	}
?>