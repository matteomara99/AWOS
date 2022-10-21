<?php

$login = "SELECT * from users where username LIKE ";

$runway = "SELECT runwayId, runways.icaoCode, priRwyDir, priRwyId, priRwyElv, secRwyDir, secRwyId, secRwyElv, numberRwy FROM airports INNER JOIN runways ON airports.IcaoCode = runways.IcaoCode WHERE airports.IcaoCode LIKE '" . $_GET['icao'] . "' ORDER BY runways.numberRwy";

$airports = "SELECT * FROM airports";

?>