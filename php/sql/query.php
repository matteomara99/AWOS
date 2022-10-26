<?php

if(isset($_POST['uname'])){
    $login = "SELECT * FROM users WHERE username LIKE '" . $login_user . "'";
}

$runway = "SELECT runwayId, runways.icaoCode, priRwyDir, priRwyId, priRwyElv, secRwyDir, secRwyId, secRwyElv, numberRwy, typeAirport FROM airports INNER JOIN runways ON airports.IcaoCode = runways.IcaoCode WHERE airports.IcaoCode LIKE '" . $_GET['icao'] . "' ORDER BY runways.numberRwy";

$airports = "SELECT * FROM airports";

$listAirports = "SELECT icaoCode, name, city, count(*) as numRwy, typeAirport FROM airports INNER JOIN runways ON airports.IcaoCode = runways.IcaoCode";

if(isset($_POST['icaoCode'])){
    $deleteAirport = "DELETE FROM airports WHERE icaoCode = " . $_POST['icaoCode'];
    $lastReports = "SELECT TOP (48) * FROM lastReports WHERE icaoCode LIKE " . $_POST['icaoCode'] . "ORDER BY date" ;
}

?>