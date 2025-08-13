<?php
enum ZoomMode {
    case Small;
    case Medium;
    case Big;
    case SuperBig;
}

class Calendar {
    private ZoomMode $zoomMode;

    public function setZoomMode(ZoomMode $mode) {
        $this->zoomMode = $mode;
    }
    
    public function show() {
        if ($this->zoomMode == ZoomMode::Small)
            print "Exibindo no modo pequeno";
        else if ($this->zoomMode == ZoomMode::Medium)
            print "Exibindo no modo médio";
        else if ($this->zoomMode == ZoomMode::Big)
            print "Exibindo no modo grande";
        else if ($this->zoomMode == ZoomMode::SuperBig)
            print "Exibindo no modo super grande";
    }
}

$calendar = new Calendar;
$calendar->setZoomMode( ZoomMode::Big );
$calendar->show();