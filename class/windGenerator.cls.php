<?php

class windGenerator {
    private $idWV;
    private $wdir;
    private $wspd;
    private $cross;
    private $tail;
    private $rwydir;

    public function __construct($idWV){
        $this->idWV = $idWV;
        $this->wdir = 0;
        $this->wspd = 0;
        $this->cross = 0;
        $this->tail = 0;
        $this->rwydir = 0;
    }

    public function getWindDir() {
        return $this->wdir;
    }

    public function setWindDir($wdir) {
        $this->wdir = $wdir;
    }

    public function getWindSpd() {
        return $this->wspd;
    }
  
    public function setWindSpd($wspd) {
        $this->wspd = $wspd;
    }

    public function getCross() {
        return $this->cross;
    }

    public function setCross($cross) {
        $this->cross = $cross;
    }
    
    public function getTail() {
        return $this->tail;
    }

    public function setTail($tail) {
        $this->tail = $tail;
    }

    public function calcCross($wdir, $wspd, $rwydir){
        $cross = $wspd * sin($wdir - $rwydir);
    }

    public function calcTail($wdir, $wspd, $rwydir){
        $tail = -$wspd * cos($wdir - $rwydir);
    }
}

?>