<?php

require_once "Persoon.php";

class Docent extends Persoon {
    public function getType() {
        return "Docent";
    }
}