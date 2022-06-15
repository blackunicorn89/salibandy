<?php
// Skriptillä lisätään pelaaja sen jälkeen tietokantaan

// Muuttujat
$numero = $nimi = $paikka = $joukkue = "";
$OK = true; // We use this to verify the status of the update.

// Otetaan muuttujiin talteen ajax-pyynnöllä tulleet arvot
$numero = $_GET["numero"];
$nimi = $_GET["nimi"];
$paikka = $_GET["paikka"]; 
$joukkue = $_GET["joukkue"]; 

if(empty($numero) or empty($paikka) or empty($joukkue))
{
	echo '<p>Tarkista puuttuvat tiedot</p>';
}
else {
	// Luodaan yhteys tietokantaan
	require_once 'yhteys.php';
	$conn = dbConnect();
	
	// Tarkistetaan ensin, onko pelaajanumero jo olemassa
	$selectSql = "SELECT nro FROM Pelaajat WHERE nro = " . $numero . ";";
	$result = $conn->query($selectSql);
	$row = $result->fetch(PDO::FETCH_ASSOC);
	
	// Jos pelaajanumero on jo olemassa, annetaan virhe
	if ($row["nro"] == $numero) { echo '<p>Pelaaja numero on jo olemassa.</p>'; }
	// Muuten lisätään pelaaja tietokantaan
	else 
	{
		$insertSql = "INSERT INTO Pelaajat (nro, nimi, paikka, joukkue) VALUES (:numero, :nimi, :paikka, :joukkue);";
		$result = $conn->prepare($insertSql);
		$OK = $result->execute(array(':numero'=>$numero, ':nimi'=>$nimi, ':paikka'=>$paikka, ':joukkue'=>$joukkue));

		// In case of any error, we get the values.
		$error = $result->errorInfo();
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

}
?>