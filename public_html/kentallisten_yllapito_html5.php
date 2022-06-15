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
		
			<div id="tulos"></div>
			<div class="row">
				<div class="col-sm-6 col-md-8 col-md-offset-2">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Pelaajat</h3>
						</div>
						<ul id="a">
							<div class="panel-body pelaajat list-inline" ondrop="drop(event)" ondragover="allowDrop(event)">
							<?php
							
								// Skriptillä haetaan pelaajien numerot, nimet, paikat ja kentät sekä lajitellaan pelaajat kentän numeron perusteella oikealle kentälle
								
								// Luodaan yhteys
								require_once 'php/yhteys.php';
								$conn = dbConnect();
								
								// Haetaan pelaajat jotka eivät kuuluu mihinkään kentälliseen
								$sql = "SELECT nro, nimi, kentta, paikka FROM Pelaajat WHERE kentta = 0 ORDER BY nro ASC;";
								$result = $conn->query($sql);
								
								while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
									echo '<li id="'. $row['nro'] . '" class="draggable" draggable="true" ondragstart="drag(event)">'. $row['nro'] . ' ' . $row['nimi'] . '(' . $row['paikka']. ')</li>';
								}
							?>
							<!--<div id="a" ></div>-->
						</ul> 
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-6 col-md-3">
					<div class="panel panel-success">
						<div class="panel-heading testi">
							<h3 class="panel-title">Kentt&auml;1</h3>
						</div>
						<ul id="b" class="list-unstyled">
							<div class=" panel-body kentat" ondrop="drop(event)" ondragover="allowDrop(event)">
								<?php
									// Haetaan pelaajat, jotka kuuluvat kenttään 1
									$sql = "SELECT nro, nimi, kentta, paikka FROM Pelaajat WHERE kentta = 1 ORDER BY nro ASC;";
									$result = $conn->query($sql);
									
									while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
										echo '<li id="'. $row['nro'] . '" class="draggable" draggable="true" ondragstart="drag(event)">'. $row['nro'] . ' ' . $row['nimi'] . '(' . $row['paikka']. ')</li>';
									}
								?>
							<div class="testi"></div>
							</div>
						</ul>
					</div>
				</div>
			
				<div class="col-sm-6 col-md-3">
					<div class="panel panel-success">
						<div class="panel-heading testi">
							<h3 class="panel-title">Kentt&auml 2</h3>
						</div>
						<ul id="c" class="list-unstyled">
							<div class="panel-body kentat" ondrop="drop(event)" ondragover="allowDrop(event)">
								<?php
									// Haetaan pelaajat, jotka kuuluvat kenttään 2
									$sql = "SELECT nro, nimi, kentta, paikka FROM Pelaajat WHERE kentta = 2 ORDER BY nro ASC;";
									$result = $conn->query($sql);
									
									while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
										echo '<li id="'. $row['nro'] . '" class="draggable" draggable="true" ondragstart="drag(event)">'. $row['nro'] . ' ' . $row['nimi'] . '(' . $row['paikka']. ')</li>';
									}
								?>
								<div class="testi"></div>
							</div>
						</ul>
					</div>
				</div>
				
				<div class="col-sm-6 col-md-3">
					<div class="panel panel-success">
						<div class="panel-heading testi">
							<h3 class="panel-title">Kentt&auml 3</h3>
						</div>
						<ul id="d" class="list-unstyled">
							<div class="panel-body kentat" ondrop="drop(event)" ondragover="allowDrop(event)">
								<?php
									// Haetaan pelaajat, jotka kuuluvat kenttään 3
									$sql = "SELECT nro, nimi, kentta, paikka FROM Pelaajat WHERE kentta = 3 ORDER BY nro ASC;";
									$result = $conn->query($sql);
									
									while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
										echo '<li id="'. $row['nro'] . '" class="draggable" draggable="true" ondragstart="drag(event)">'. $row['nro'] . ' ' . $row['nimi'] . '(' . $row['paikka']. ')</li>';
									}
								?>
							<div class = "testi"></div>
							</div>
						</ul>
					</div>
				</div>
						
				<div class="col-sm-6 col-md-3">
					<div class="panel panel-success">
						<div class="panel-heading testi">
							<h3 class="panel-title">Kentt&auml 4</h3>
						</div>
						<ul id="e" class="list-unstyled">
							<div class="panel-body kentat" ondrop="drop(event)" ondragover="allowDrop(event)">
								<?php
									// Haetaan pelaajat, jotka kuuluvat kenttään 4
									$sql = "SELECT nro, nimi, kentta, paikka FROM Pelaajat WHERE kentta = 4 ORDER BY nro ASC;";
									$result = $conn->query($sql);
									
									while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
										echo '<li id="'. $row['nro'] . '" class="draggable" draggable="true" ondragstart="drag(event)">'. $row['nro'] . ' ' . $row['nimi'] . '(' . $row['paikka']. ')</li>';
									}
								?>
							<div class="testi"></div>
							</div>
						</ul>
					</div>
				</div>
			</div>
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="dist/js/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="dist/js/bootstrap.min.js"></script>
		<style>
			
			.draggable {position:relative;}
			
			/* Asetetaan pelaajatpaneelille vähimmäis korkeus */
			.pelaajat {
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
			
			.testi { position: relative; z-index: -1; }
			
		</style>
		<script>
			var nodeList = document.getElementsByClassName('draggable');
 
			for(var i=0;i<nodeList.length;i++) {
				var obj = nodeList[i];
				obj.addEventListener('touchmove', function(event) {
					var touch = event.targetTouches[0];
 
				// Place element where the finger is
				event.target.style.left = touch.pageX-1000 + 'px';
				event.target.style.top = touch.pageY + 'px';
				event.preventDefault();
				}, false);
			}
			
			
			// Sallitaan pudotus
			function allowDrop(ev) {
				ev.preventDefault();
			}

			// Funktiossa määritetään, mitä tehdään, kun objektia vedetään
			function drag(ev) {
				ev.dataTransfer.setData("text", ev.target.id);
			}

			// Funktiossa määritetään, mitä tehdään, kun objekti on pudotettu
			function drop(ev) {
				ev.preventDefault();
				
				// Otetaan kentän kirjain talteen. Kirjain on listan "parent noden id eli ul:n id"
				var kentta = ev.target.parentNode.id
				
				// Jos kenttä on tyhjä eli pudotuksessa tulee virhe, estetään pudotus
				if (kentta == "") { return; }
				
				// Otetaan pelaajan numero talteen
				var numero = ev.dataTransfer.getData("text");
				ev.target.appendChild(document.getElementById(numero));
				
				// Jos kentä on sama kuin numero, poistutaan. Muuten muutetaan kentän kirjain numeroksi
				if (kentta == numero) { return; }
				else 
				{
					switch(kentta) {
						case 'a':
							kentta = 0;
						break;
						
						case 'b':
							kentta = 1;
						break;
						
						case 'c':
							kentta = 2;
						break;
						
						case 'd':
							kentta = 3;
						break;
						
						case 'e':
							kentta = 4;
						break;
						default: 0
						
					} 
					// Annetaan ajax-funktionille pelaajan kenttä ja numero, joita tarvitaan pelaajan kentän päivittämiseen
					paivitaPaikkaAjaxRequest(kentta, numero);
				}
			}
			
			// Funktio lähettää pelaajan kentän ja numeron php-skriptille, joka päivittää pelaajan pelikentän
			function paivitaPaikkaAjaxRequest(ken, nro) {
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
