<?php
	require "include/strings.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?= $globalTitle ?> - Contact</title>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300">
		<link rel="stylesheet" type="text/css" href="static/style/global.css">
		<link rel="stylesheet" type="text/css" href="static/style/contact.css">
		<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	</head>
	<body>
		<?php require "include/header.php"; ?>
		<?php endif; ?>
		<h1>Neem contact met ons op</h1>
		<h2>Via de onderstaande manieren kunt u contact met ons opnemen. Wij hebben een 24/7 mail en bel service die altijd offline is en we zijn niet bereikbaar via Twitter of Skype.</h2>
			<div id="main">
				<div id="info">
					<a href="google.nl"><i class="fa fa-phone"></i><p>Telefoonnummer</p></a></br>
					<a href="google.nl"><i class="fa fa-envelope"></i><p>Emailadres</p></a></br>
					<a href="google.nl"><i class="fa fa-fax"></i><p>Fax nummer</p></a></br>
					<a href="google.nl"><i class="fa fa-facebook"></i><p>Facebook link</p></a></br>
					<a href="google.nl"><i class="fa fa-skype"></i><p>Skype naam</p></a></br>
					<a href="google.nl"><i class="fa fa-google-plus"></i><p>Google+ link</p></a></br>
					<a href="google.nl"><i class="fa fa-twitter"></i><p>Twitter link</p></a></br>
					<a href="google.nl"><i class="fa fa-map-marker"></i><p>Uhm deze werkt niet</p></a></br>
				</div>
				<div id="map"></div>
				<script>
					function initMap() {
						var mapDiv = document.getElementById('map');
						var map = new google.maps.Map(mapDiv, {
							center: {lat: 51.862904, lng: 4.536859999999933},
							zoom: 17
						});
					}
				</script>
				<script src="https://maps.googleapis.com/maps/api/js?callback=initMap"
					async defer></script>
			</div>
	</body>
</html>
