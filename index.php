<?php

require_once "SchooltripList.php";

$schooltrip = new SchooltripList(25);

$schooltrip->voegLeerlingToe(new Leerling("Jan", "SD1A", true));
$schooltrip->voegLeerlingToe(new Leerling("Piet", "SD1A", true));
$schooltrip->voegLeerlingToe(new Leerling("Lisa", "SD1A", true));
$schooltrip->voegLeerlingToe(new Leerling("Sara", "SD1A", true));
$schooltrip->voegLeerlingToe(new Leerling("Tom", "SD1A", true));
$schooltrip->voegLeerlingToe(new Leerling("Emma", "SD1A", false));

$schooltrip->voegDocentToe(new Docent("Meneer Jansen", "SD1A"));

echo "<h2>Schooltriplijst</h2>";

$schooltrip->toonLijst();

echo "<h2>Ingezameld bedrag</h2>";
echo "Totaal: €" . $schooltrip->getTotaalBedrag();

echo "<h2>Bedrag per klas</h2>";
echo "SD1A: €" . $schooltrip->getTotaalPerKlas("SD1A");

echo "<h2>Percentage opgegeven</h2>";
echo "SD1A: " . $schooltrip->getPercentage("SD1A", 20) . "%";