<?php

if(isset($_POST["username"])){
    $login = "SELECT * FROM users WHERE username LIKE '" . $_POST['username'] . "'";
}

$airports = "SELECT icaoCode, iataCode, name, city, elevation, typeAirport, atis FROM airports ORDER BY icaoCode";

$listAirports = "SELECT icaoCode, name, city, count(*) as numRwy, typeAirport FROM airports INNER JOIN runways ON airports.IcaoCode = runways.IcaoCode";

if(isset($_POST["icaoCode"])){
    $deleteAirport = "DELETE FROM airports WHERE icaoCode = '" . $_POST['icaoCode'] . "'";
	$logoAirport = "SELECT icaoCode, iataCode, name, city, elevation, typeAirport FROM airports WHERE icaoCode = '" . $_POST['icaoCode'] . "'";
}

if(isset($_POST["airport"])){
	$runway = "SELECT runwayId, runways.icaoCode, priRwyDir, priRwyId, priRwyElv, secRwyDir, secRwyId, secRwyElv, numberRwy, typeAirport, rvrRwyPri, rvrRwyCen, rvrRwySec, windPriRwy, windSecRwy FROM airports INNER JOIN runways ON airports.IcaoCode = runways.IcaoCode WHERE airports.IcaoCode LIKE '" . $_POST['airport'] . "' ORDER BY runways.numberRwy";
    $lastReports = "SELECT * FROM lastreports WHERE icaoCode = '" . $_POST['airport'] . "' ORDER BY metar LIMIT 48";
    $logo = "SELECT icaoCode, typeAirport FROM airports WHERE icaoCode = '" . $_POST['airport'] . "'";
}

?>