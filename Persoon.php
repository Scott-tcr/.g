<?php

abstract class Persoon {
    protected $naam;
    protected $klas;

    public function __construct($naam, $klas) {
        $this->naam = $naam;
        $this->klas = $klas;
    }

    abstract public function getType();

    public function getNaam() {
        return $this->naam;
    }

    public function getKlas() {
        return $this->klas;
    }
}