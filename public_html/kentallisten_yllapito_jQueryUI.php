<!DOCTYPE html>
<html lang="fi">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Kent&auml;llisten yll&auml;pito</title>

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
		<!-- Tällä sivustolla muokataan kentällisten kokoonpanoja  -->
		<div class ="page-header"> 
			<h1>Kent&auml;llisten yll&auml;pito</h1>
		</div>
		
			<!--Pelaajat-->
			<div class="row">
				<div class=" col-xs-12 col-sm-6 col-md-8 col-md-offset-2">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Pelaajat</h3>
						</div>
						<ul>
							<div id="a" class="panel-body draggable list-inline">
								<?php
									// Skriptillä haetaan pelaajien numerot, nimet, paikat ja kentät sekä lajitellaan pelaajat kentän numeron perusteella oikealle kentälle
									
									// Luodaan yhteys
									require_once 'php/yhteys.php';
									$conn = dbConnect();
									
									// Haetaan pelaajat jotka eivät kuuluu mihinkään kentälliseen
									$sql = "SELECT nro, nimi, kentta, paikka FROM Pelaajat WHERE kentta = 0 ORDER BY nro ASC;";
									$result = $conn->query($sql);
									
									while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
										echo '<li id="'. $row['nro'] . '">'. $row['nro'] . ' ' . $row['nimi'] . '(' . $row['paikka']. ')</li>';
									}
								?>
							</div>
						</ul>
					</div>
				</div>
			</div>
			
			<!--Kentät-->
			<div class="row">
				<!--Kenttä1-->
				<div class="col-xs-3 col-sm-6 col-md-3">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h3 class="panel-title">Kentt&auml;1</h3>
						</div>
						<ul  class="list-unstyled">
							<div id="b" class=" panel-body draggable kentat">
								<?php
									// Haetaan pelaajat, jotka kuuluvat kenttään 1
									$sql = "SELECT nro, nimi, kentta, paikka FROM Pelaajat WHERE kentta = 1 ORDER BY nro ASC;";
									$result = $conn->query($sql);
									
									while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
										echo '<li id="'. $row['nro'] . '">'. $row['nro'] . ' ' . $row['nimi'] . '(' . $row['paikka']. ')</li>';
									}
								?>
							</div>
						</ul>
					</div>
				</div>
			
				<!--Kenttä2-->
				<div class="col-xs-3 col-sm-6 col-md-3">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h3 class="panel-title">Kentt&auml 2</h3>
						</div>
						<ul class="list-unstyled">
							<div id="c" class="panel-body draggable kentat">
								<?php
									// Haetaan pelaajat, jotka kuuluvat kenttään 2
									$sql = "SELECT nro, nimi, kentta, paikka FROM Pelaajat WHERE kentta = 2 ORDER BY nro ASC;";
									$result = $conn->query($sql);
									
									while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
										echo '<li id="'. $row['nro'] . '">'. $row['nro'] . ' ' . $row['nimi'] . '(' . $row['paikka']. ')</li>';
									}
								?>
							</div>
						</ul>
					</div>
				</div>
				
				<!--Kenttä3-->
				<div class="col-xs-3 col-sm-6 col-md-3">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h3 class="panel-title">Kentt&auml 3</h3>
						</div>
						<ul class="list-unstyled ">
							<div id="d" class="panel-body draggable kentat">
								<?php
									// Haetaan pelaajat, jotka kuuluvat kenttään 3
									$sql = "SELECT nro, nimi, kentta, paikka FROM Pelaajat WHERE kentta = 3 ORDER BY nro ASC;";
									$result = $conn->query($sql);
									
									while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
										echo '<li id="'. $row['nro'] . '">'. $row['nro'] . ' ' . $row['nimi'] . '(' . $row['paikka']. ')</li>';
									}
								?>
							</div>
						</ul>
					</div>
				</div>
						
				<!--Kenttä4-->
				<div class="col-xs-3 col-sm-6 col-md-3">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h3 class="panel-title">Kentt&auml 4</h3>
						</div>
						<ul class="list-unstyled">
							<div id="e" class="panel-body draggable kentat">
								<?php
									// Haetaan pelaajat, jotka kuuluvat kenttään 4
									$sql = "SELECT nro, nimi, kentta, paikka FROM Pelaajat WHERE kentta = 4 ORDER BY nro ASC;";
									$result = $conn->query($sql);
									
									while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
										echo '<li id="'. $row['nro'] . '">'. $row['nro'] . ' ' . $row['nimi'] . '(' . $row['paikka']. ')</li>';
									}
								?>
							</div>
						</ul>
					</div>
				</div>
			</div>
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="dist/js/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="dist/js/bootstrap.min.js"></script>
		<script src="dist/js/jquery-ui.min.js"></script>
		<script src="dist/js/jquery.ui.touch-punch.min.js"></script>
		<style>
			
			/* Asetetaan pelaajatpaneelille vähimmäis korkeus */
			#a {
				min-height: 200px;
			}
			
			/* Asetetaan kentällispaneeleille vähimmäis korkeus */
			.kentat {
				min-height: 410px;
			}
			
			/* Asetetaan listan taustaväri sekä pyörristetään listan kulmat */
			li {
				background-color: #00FF66;
				border-radius: 25px;
			}
			
		</style>
		<script>
			jQuery(document).ready(function($) {	
			
				// Funktio huolehtii siirtotapahtumasta
				$(function () {
				// Muuttujat
				var kentta, kenttaNumero, item;
				$(".draggable").sortable({
					// Yhdistetään listat, jotta siirtoja voidaan tehdä niiden välillä
					connectWith: $('.draggable'),
					// Kun siirto aloitetaan, määritetään pelaaja(item) ja kenttä
					start: function (event, ui) {
						item = ui.item;
						kentta = ui.item.parent();
					},
					// Kun siirto pysähtyy, muutetaan kentän kirjain sitä vastaavaksi numeroksi
					stop: function (event, ui) {
					
						switch(kentta.attr('id')) {
							case 'a':
								kenttaNumero = 0;
							break;
							
							case 'b':
								kenttaNumero = 1;
							break;
							
							case 'c':
								kenttaNumero = 2;
							break;
							
							case 'd':
								kenttaNumero = 3;
							break;
							
							case 'e':
								kenttaNumero = 4;
							break;
							default: kenttaNumero = 0;
							
						}
						//console.log("Siirretty pelaaja " + item.attr('id') + " kenttään " + kenttaNumero);
						// Annetaan kentän numero ja pelaajan id funktiolle, joka lähettää tiedot päivitysskriptille
						paivitaKenttaAjaxRequest(kenttaNumero, item.attr('id'));
						
					},
					//Jos vaihdetaan pelaajan kenttää, muutetaan kentta - muuttuja 
					change: function (event, ui) {
						if (ui.sender) {
							kentta = ui.placeholder.parent();
						}
					},
				})
					.disableSelection();

				});
			
			});

			// Funktio lähettää pelaajan kentän ja numeron php-skriptille, joka päivittää pelaajan pelikentän tietokantaan
			function paivitaKenttaAjaxRequest(ken, nro) {
				$.ajax({
					url: 'php/kentan_paivitys.php',
					type: 'get',
					data:   { 	kentta: ken, 
								numero: nro },
							
					success: function(response) {
								 $('div#tulos').html(response);
							 }
				});
			}
		</script>
	</body>
</html>
