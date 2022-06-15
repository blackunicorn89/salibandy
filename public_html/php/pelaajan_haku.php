<?php
	// Tällä skriptillä haetaan pelaajan tiedot muokkausta tai poisto - ikkunaaan  pelaajan numeron perusteella	
	if (isset($_GET['nro'])) {
	require_once 'yhteys.php';
	$conn = dbConnect();
	
	// Create the query
	$sql = 'SELECT nro, nimi, paikka, joukkue FROM Pelaajat WHERE nro = ?;';
	// we have to tell the PDO that we are going to send values to the query
	$stmt = $conn->prepare($sql);
	// Now we execute the query passing an array toe execute();
	$stmt->execute(array($_GET['nro']));
	// Extract the values from $result
	$row = $stmt->fetch();
	}
?>
	<!--Pelaajan muokkaus/poisto - modalin sisältö, modalin kutsu tapahtuu pelaajien_yllpito.php:ssä-->
	<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="MPModal">Muokkaa tai poista pelaaja</h4>
				</div>
				<div class="modal-body">
					<form method = "get" role="form" id="MPForm">
						<div class="form-group">
							<label for = "MPnumero">Pelaajanumero:*</label>
							<input type="text" name="MPnumero" id="MPnumero" class="form-control" value="<?php echo $row['nro'];?>" readonly>
						</div>
						<div class="form-group">
							<label for = "MPnimi">Nimi:</label>
							<input type="text" name="MPnimi" id="MPnimi" value="<?php echo $row['nimi'];?>" class="form-control" maxlength = "50" placeholder="Nimi">
						</div>
						<div class="form-group">
							<label for = "MPpaikka">Paikka:*</label>
							<input type="text" name="MPpaikka" id="MPpaikka" value="<?php echo $row['paikka'];?>" class="form-control" maxlength = "1" placeholder="Paikka">
						</div>
						<div class="form-group">
							<label for = "lisaysJoukkue">Joukkue:*</label>
							<input type="text" name="MPjoukkue" id="MPjoukkue" value="<?php echo $row['joukkue'];?>" class="form-control" maxlength = "50" placeholder="Joukkue">
						</div>
					</form>
					<p>* pakollinen tieto</P>
					<div id = "mpVirheilmoitus" class="virhe"></div>
				</div>
				<div class="modal-footer">
					<button type="button" id="btn-MPtallena" class="btn btn-primary" >Tallenna</button>
					<button type="button" id="btn-MPpoista" class="btn btn-danger">Poista</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>
				</div>
			</div>
	</div>
	
	<style>
		
		#mpVirheilmoitus p{
			color: red;
			font-weight: bold;
		}
	
	</style>
	
	<script>
	jQuery(document).ready(function($) {
			// Poistaa muokkaus/poisto ikkunasta mahdolliset virheet ja kutsuu funktiota, joka välittää pelaajan numeron pelaajan_poisto.php:lle
			$('#btn-MPpoista').click(function(){
				$( "#mpVirheilmoitus" ).empty();
				poistoAjaxRequest();
			});
			
			// Poistaa muokkaus/poisto ikkunasta mahdolliset virheet ja kutsuu funktiota, joka välittää parametrit pelaajan_muokkaus.php:lle
			$('#btn-MPtallena').click(function(){
				$( "#mpVirheilmoitus" ).empty();
				muokkausAjaxRequest();
			});
		});
		
	// Funktio välittää pelaajan numeron poisto_php:lle. Jos vastaus on "onnistui", päivitetään pelaajien tiedot taulukkoon sekä piilotetaan ikkuna,
	// muuten näytetään tullut virheilmoitus
	function poistoAjaxRequest() {
			$.ajax({
				url: 'php/pelaajan_poisto.php',
				type: 'get',
				data:   { nro: $('input#MPnumero').val() },
						
				success: function(data) {
							 if (data == "onnistui") {
									loadPage();
									MPModalHide();
							 }
							 else { mpResponse(data); }
						 }
						 
			});
		}
		
	// Funktio välittää pelaajan päivittyneet tiedot muokkkaus_php:lle. Jos vastaus on "onnistui", päivitetään pelaajien tiedot taulukkoon sekä piilotetaan ikkuna,
	// muuten näytetään tullut virheilmoitus
	function muokkausAjaxRequest() {
			$.ajax({
				url: 'php/pelaajan_muokkaus.php',
				type: 'get',
				data:   {   numero: $('input#MPnumero').val(),
							nimi: $('input#MPnimi').val(),
							paikka: $('input#MPpaikka').val(),
							joukkue: $('input#MPjoukkue').val() },
						
				success: function(data) {
							 if (data == "onnistui") {
									loadPage();
									MPModalHide();
							 }
							 else { mpResponse(data); }
						 }
						 
			});
		}
		
		// Funktio ottaa lisäys-ikkunan virheviestin talteen ja näyttää sen pelaajan muokkaus/poisto - ikkunassa
		function mpResponse(response) {
			$( "#mpVirheilmoitus" ).append(response);
		}
	</script
		  
		  
		