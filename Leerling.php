<?php

require_once "Persoon.php";

class Leerling extends Persoon {
    private $betaald;

    public function __construct($naam, $klas, $betaald) {
        parent::__construct($naam, $klas);
        $this->betaald = $betaald;
    }

    public function getType() {
        return "Leerling";
    }

    public function heeftBetaald() {
        return $this->betaald;
    }
}