<?php

$login = "SELECT * from users where username LIKE ";




$runway = "SELECT RunwayIdentifier FROM airports INNER JOIN runways ON airports.IcaoCode = runways.IcaoCode WHERE airports.IcaoCode LIKE '" . $_GET['icao'] . "' ORDER BY runways.RwyPrimary";

?>