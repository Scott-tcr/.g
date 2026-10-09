<?php

require_once "Leerling.php";
require_once "Docent.php";

class SchooltripList {
    private $deelnemers = [];
    private $prijs;

    public function __construct($prijs) {
        $this->prijs = $prijs;
    }

    public function voegLeerlingToe(Leerling $leerling) {
        $this->deelnemers[] = $leerling;
    }

    public function voegDocentToe(Docent $docent) {
        $betalendeLeerlingen = 0;

        foreach ($this->deelnemers as $deelnemer) {
            if ($deelnemer instanceof Leerling && $deelnemer->heeftBetaald()) {
                $betalendeLeerlingen++;
            }
        }

        $aantalDocenten = 0;

        foreach ($this->deelnemers as $deelnemer) {
            if ($deelnemer instanceof Docent) {
                $aantalDocenten++;
            }
        }

        if ($aantalDocenten < floor($betalendeLeerlingen / 5)) {
            $this->deelnemers[] = $docent;
        }
    }

    
public function toonLijst() {
    echo "<table border='1' cellspacing='0' cellpadding='4'>";
    echo "<tr>
            <th>Docent</th>
            <th>Student</th>
            <th>Klas</th>
            <th>Betaald</th>
          </tr>";

    foreach ($this->deelnemers as $deelnemer) {
        echo "<tr>";

        if ($deelnemer instanceof Docent) {
            echo "<td>" . $deelnemer->getNaam() . "</td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
        } else {
            echo "<td></td>";
            echo "<td>" . $deelnemer->getNaam() . "</td>";
            echo "<td>" . $deelnemer->getKlas() . "</td>";
            echo "<td>" . ($deelnemer->heeftBetaald() ? "Ja" : "Nee") . "</td>";
        }

        echo "</tr>";
    }

    echo "</table>";
}


    }

     function getTotaalBedrag() {
        $totaal = 0;

        foreach ($this->deelnemers as $deelnemer) {
            if ($deelnemer instanceof Leerling && $deelnemer->heeftBetaald()) {
                $totaal += $this->prijs;
            }
        }

        return $totaal;
    }

    function getPercentage($klas, $totaalLeerlingen) {
        $aantal = 0;

        foreach ($this->deelnemers as $deelnemer) {
            if ($deelnemer instanceof Leerling && $deelnemer->getKlas() == $klas) {
                $aantal++;
            }
        }

        if ($totaalLeerlingen == 0) {
            return 0;
        }

        return round(($aantal / $totaalLeerlingen) * 100, 2);
    }

 function getTotaalPerKlas($klas) {
        $totaal = 0;

        foreach ($this->deelnemers as $deelnemer) {
            if ($deelnemer instanceof Leerling &&
                $deelnemer->getKlas() == $klas &&
                $deelnemer->heeftBetaald()) {
                $totaal += $this->prijs;
            }
        }

        return $totaal;
    }
