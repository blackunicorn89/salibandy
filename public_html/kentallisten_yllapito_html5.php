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
		<!-- T�ll� sivustolla muokataan kent�llisten kokoonpanoja  -->
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
							
								// Skriptill� haetaan pelaajien numerot, nimet, paikat ja kent�t sek� lajitellaan pelaajat kent�n numeron perusteella oikealle kent�lle
								
								// Luodaan yhteys
								require_once 'php/yhteys.php';
								$conn = dbConnect();
								
								// Haetaan pelaajat jotka eiv�t kuuluu mihink��n kent�lliseen
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
									// Haetaan pelaajat, jotka kuuluvat kentt��n 1
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
									// Haetaan pelaajat, jotka kuuluvat kentt��n 2
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
									// Haetaan pelaajat, jotka kuuluvat kentt��n 3
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
									// Haetaan pelaajat, jotka kuuluvat kentt��n 4
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
			
			/* Asetetaan pelaajatpaneelille v�himm�is korkeus */
			.pelaajat {
				min-height: 200px;
			}
			
			/* Asetetaan kent�llispaneeleille v�himm�is korkeus */
			.kentat {
				min-height: 410px;
			}
			
			/* Asetetaan listan taustav�ri sek� py�rristet��n listan kulmat */
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

			// Funktiossa m��ritet��n, mit� tehd��n, kun objektia vedet��n
			function drag(ev) {
				ev.dataTransfer.setData("text", ev.target.id);
			}

			// Funktiossa m��ritet��n, mit� tehd��n, kun objekti on pudotettu
			function drop(ev) {
				ev.preventDefault();
				
				// Otetaan kent�n kirjain talteen. Kirjain on listan "parent noden id eli ul:n id"
				var kentta = ev.target.parentNode.id
				
				// Jos kentt� on tyhj� eli pudotuksessa tulee virhe, estet��n pudotus
				if (kentta == "") { return; }
				
				// Otetaan pelaajan numero talteen
				var numero = ev.dataTransfer.getData("text");
				ev.target.appendChild(document.getElementById(numero));
				
				// Jos kent� on sama kuin numero, poistutaan. Muuten muutetaan kent�n kirjain numeroksi
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
					// Annetaan ajax-funktionille pelaajan kentt� ja numero, joita tarvitaan pelaajan kent�n p�ivitt�miseen
					paivitaPaikkaAjaxRequest(kentta, numero);
				}
			}
			
			// Funktio l�hett�� pelaajan kent�n ja numeron php-skriptille, joka p�ivitt�� pelaajan pelikent�n
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
