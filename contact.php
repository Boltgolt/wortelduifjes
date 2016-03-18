<?php
	require "include/strings.php";
	session_start();
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
		<h1>Neem contact met ons op</h1>
		<h2>Via de onderstaande manieren kunt u contact met ons opnemen. Wij hebben een 24/7 mail en bel service die altijd offline is en we zijn niet bereikbaar via Twitter of Skype.</h2>
		<p>
			De makkelijkste manier is om ons te bellen op <strong><i class="fa fa-phone"></i> 0800 232 123</strong> of een e-mail te sturen naar <a href="mailto:info@wortelduifjes.boltgo.lt"><strong><i class="fa fa-envelope"></i> 0800 232 123</strong></a>
		</p>
		<p>
			U kunt ons ook komen bezoeken, wij zijn gevestigd op <strong><i class="fa fa-map-marker"></i> Barendrechtseweg 12, 3241AD Barendrecht</strong>
		</p>
			<div id="main">
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
