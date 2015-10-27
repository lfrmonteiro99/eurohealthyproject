<?php

session_start();

	if($_SESSION['login'] != 1){
		header("Location: login.html");
	}


?>

<html>
<head>
<title>EuroHealthy</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="robots" content="index, follow" />
	<meta charset="utf-8" />
	<!-- // General meta information -->
	
	
	<!-- Load Javascript -->
	
	<!-- // Load Javascipt -->
	<script src="js/modernizr.custom.63321.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="main.js"></script>
	<!-- Load stylesheets -->
	<link type="text/css" rel="stylesheet" href="estilos1.css" media="screen" />
</head>
<body>
<div id="content">
	<div id="leftnologin">
	</div>

	<div id="centernologin">
		<div id="wrappermiddlenologin">
			<h1>EuroHealthy</h1><br><br>
			<p>Graecis partiendo interpretaris duo no, sumo eros voluptua ex mel, veritus appetere no has. Patrioque referrentur nec id, nec eirmod erroribus aliquando cu, no sint probatus complectitur vix. Vel ea fugit omnium discere. Eos an summo cetero suscipiantur, cu pro complectitur voluptatibus. Et veniam impetus tacimates est.</p><br>

				<p>Mel te dico definitionem, eu noster moderatius nam. Pro at doctus principes molestiae, ad amet corrumpit mel. Ex oratio detraxit has, dictas platonem est te, ex duo tollit mandamus honestatis. Duis debitis ponderum ex sed, ei mea epicuri intellegat. Rebum efficiantur vis in.</p><br>

				<p>Mei ne prima tritani persequeris, ei dicit accumsan omnesque mea. Mea id ullum incorrupte, docendi temporibus has et. Mei eu cetero tractatos, eros meis adhuc est ea. Pro regione maiorum te, viderer quaeque rationibus et vix.</p><br>

				<p>Ei ornatus vocibus qui. Et his ferri iriure disputando, per nihil omnium ex. Nam esse periculis contentiones in, sed volumus detracto senserit cu. Ei periculis quaerendum has, per no tritani verterem euripidis. No nec agam quidam, graecis expetenda suavitate ius cu, feugiat partiendo temporibus in ius. Per et mollis democritum inciderint, natum quidam menandri has ut, eu his duis oportere.</p>

				<a href="index.php" id="buttonwelcome">Next</a>
		</div>
		

	</div>

	<div id="rightnologin">
		
	</div>
</div>
</body>
</html>