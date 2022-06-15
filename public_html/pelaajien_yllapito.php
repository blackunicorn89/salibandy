<!DOCTYPE html>
<html lang="fi">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Pelaajien yll&auml;pito</title>

		<!-- Bootstrap -->
		<link href="dist/css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
  <body>
	<!-- Tämä sivusto toimii pelaajien ylläpitosivustona, missä näkyy pelaajien tiedot, voi lisätä pelaajan sekä muokata ja poistaa pelaajan tiedot  -->
	<div class ="page-header"> 
		<h1>Pelaajien yll&auml;pito</h1>
	</div>

    <div id="pelaajat">
	<?php
		// Skriptillä haetaan pelaajien tiedot tietokannasta	

		// Luodaan yhteys
		require_once 'php/yhteys.php';
		$conn = dbConnect();
	  
		// Haetaan pelaajien tiedot
		$sql = "SELECT nro, nimi, paikka FROM Pelaajat ORDER BY nro ASC;";

		$result = $conn->query($sql);
				  
			echo '<div class = "row">';
				echo '<div class = "col-md-6">';
					echo '<table class = "table table-striped">';
						// Taulun otsikkorivi
						echo '<thead>';
							echo '<tr>';
								echo '<th>Numero</th>';
								echo '<th>Nimi</th>'; 
								echo '<th>Paikka</th>';
							echo '</tr>';
						echo '</thead>';
						
						// Taulun sisältö
						echo '<tbody>';
							while($row = $result->fetch(PDO::FETCH_ASSOC))
							{
								echo '<tr>';
									echo '<td>'.$row["nro"].'</td>';
									echo '<td>'.$row["nimi"].'</td>';
									echo '<td>'.$row["paikka"].'</td>';
									echo '<td><a href="php/pelaajan_haku.php?nro=' . $row["nro"] .'" data-toggle="modal" data-target="#MPModal" class = "lisaysPoisto">Muokkaa/poista</a></td>';
								echo '</tr>';
							}
							// Uuden pelaajan lisäys
							echo '<tr>';
								echo '<td><a href="#" data-toggle="modal" data-target="#lisaysModal">Lis&auml;&auml; uusi pelaaja</a></td>';
							echo '<tr>';
						echo '</tbody>';
					echo '</table>';
				echo '</div>';
			echo '</div>';
    ?>
	</div>
	
	<!-- Modal pelaajanlisäys -->
	<div class="modal fade" id="lisaysModal" tabindex="-1" role="dialog" aria-labelledby="lisaysModal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="lisaysModal">Lis&auml;&auml; uusi pelaaja</h4>
				</div>
				<div class="modal-body">
					<form method = "get" role="form">
						<div class="form-group">
							<label for = "lisaysNumero">Pelaajanumero:*</label>
							<input type="text" name="lisaysNumero" id="lisaysNumero" class="form-control" maxlength = "3" placeholder="Pelaajanumero">
						</div>
						<div class="form-group">
							<label for = "lisaysNimi">Nimi:</label>
							<input type="text" name="lisaysNimi" id="lisaysNimi" class="form-control" maxlength = "50" placeholder="Nimi">
						</div>
						<div class="form-group">
							<label for = "lisaysPaikka">Paikka:*</label>
							<input type="text" name="lisaysPaikka" id="lisaysPaikka" class="form-control" maxlength = "1" placeholder="Paikka">
						</div>
						<div class="form-group">
							<label for = "lisaysJoukkue">Joukkue:*</label>
							<input type="text" name="lisaysJoukkue" id="lisaysJoukkue" class="form-control" maxlength = "50" placeholder="Joukkue">
						</div>
					</form>
					<p>* pakollinen tieto</P>
					<div id = "lisaystallennavirhe"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>
					<button type="button" id="btn-lisaysTallenna" class="btn btn-primary">Tallenna</button>
				</div>
			</div>
		</div>
	</div>	
	
	<!-- Modal pelaajan muokkaus ja poisto -->
	<div class="modal fade" id="MPModal" tabindex="-1" role="dialog" aria-labelledby="MPModal" aria-hidden="true">
		<div id="muokkausPoisto"/>
	</div>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="dist/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="dist/js/bootstrap.min.js"></script>
	<style>
		
		#lisaystallennavirhe p{
			color: red;
			font-weight: bold;
		}
	
	</style>
	
	<script>
		jQuery(document).ready(function($) {
			
			// Poistaa mahdolliset virheviestit tallenna-nappia painettaessa ja kutsuu funktiota, joka välittää uuden pelaajan tiedot pelaajan_lisays.php:lle
			$('#btn-lisaysTallenna').click(function(){
				$( "#lisaystallennavirhe" ).empty();
				makeAjaxRequest();
			});

			// Estää Formin normaalin submitin, jotta ajax-requestin tekeminen on mahdollista
			$('form').submit(function(e){
				e.preventDefault();
				//makeAjaxRequest();
				return false;
			});
			
			// Tämä skripti välittää pelaajan numeron lisää/poista - linkkiä painettaessa php/pelaajan_haku.php - tiedostoon,
			//joka hakee pelaajan numeroa vastaavan pelaajan tiedot muokkaus ja poisto näyttöön
			$('.lisaysPoisto').click(function(e){
				e.preventDefault();
				var osoite = $(this).attr('href');
				$.ajax ({
					url: osoite,
					type: 'get',
					success: function(response) {
								$('div#muokkausPoisto').html(response);
							}
				}); 
			});
			
			$( "#lisaysNumero" ).keydown(function(event) {
				// Allow only tab, backspace and delete
				if ( event.keyCode == 9 || event.keyCode == 46 || event.keyCode == 8 ) {
					// let it happen, don't do anything
				}
				else {
				// Ensure that it is a number and stop the keypress
					if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 93 || event.keyCode > 106)) {
						event.preventDefault();	
					}
				}	
		
			});
			
		});

		// Funktio lähettää uuden pelaajan tiedot php/pelaajan_lisays.php:lle, joka huolehtii varsinaisen pelaajan lisäyksen tietokantaan
		// Jos tallennus onnistuu, päivitetään pelaajien tiedot
		function makeAjaxRequest() {
			$.ajax({
				url: 'php/pelaajan_lisays.php',
				type: 'get',
				data:   { 	numero: $('input#lisaysNumero').val(), 
							nimi: $('input#lisaysNimi').val(), 
							paikka: $('input#lisaysPaikka').val(), 
							joukkue: $('input#lisaysJoukkue').val() },
						
				success: function(data) {
							 if (data == "onnistui") {
									$('#lisaysModal').modal('hide');
									$('#lisaysModal').unbind();
									loadPage();
									
							 }
							 else { lisaysResponse(data); }
						 }
			});
		}
	
		// Funktio lataa sivun body-osan uudelleen
		function loadPage() {
			$.ajax({
				url: "",
				context: document.body,
				success: function(s,x){
							$(this).html(s);
						}
			});
		}
		
		// Funktiota käytetään pelaajan muokkaus- ja poistamis - formin piilottamiseen
		// Funktiota hyödynnetään pelaajan_haku.php:ssä, mutta se pitää määrittää täällä, jotta piilottaminen toimisi
		function MPModalHide() {
			$('#MPModal').modal('hide');
		}
		
		// Funktio ottaa lisäys-ikkunan virheviestin talteen ja näyttää sen pelaajan muokkaus/poisto - ikkunassa
		function lisaysResponse(response) {
			$("#lisaystallennavirhe").append(response);
		}
	</script>
  </body>
</html>
