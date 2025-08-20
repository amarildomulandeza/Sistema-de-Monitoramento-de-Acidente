<?php 

include"includes/connect.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<!-- index22:59-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>SMAT</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
	
	

    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOVYRIgupAurZup5y1PRh8Ismb1A3lLao&libraries=places&callback=initMap"></script>
    <script>
        var map;
        var marker;

        function initMap() {
            var initialLocation = {lat: -19.830356, lng: 34.843930}; // Coordenadas iniciais de exemplo

            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14,
                center: initialLocation,
                mapTypeId: 'roadmap'
            });

            marker = new google.maps.Marker({
                position: initialLocation,
                map: map,
                draggable: true
            });

            google.maps.event.addListener(marker, 'dragend', function(evt){
                document.getElementById('address').value = evt.latLng.lat() + ", " + evt.latLng.lng();
            });
            
                    // Tenta obter a localização atual do usuário
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var userLocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                map.setCenter(userLocation);
                marker.setPosition(userLocation);
                document.getElementById('address').value = userLocation.lat.toFixed(6) + ", " + userLocation.lng.toFixed(6);
            }, function() {
                alert("Não foi possível obter a sua localização atual.");
            });
        } else {
            alert("O seu navegador não suporta Geolocalização.");
        }
        }
    </script>
</head>