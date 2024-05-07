<?php

interface iCalculatingPriceAndAddingServices
{
    public function calculationPrice();
    public function calculationServicePrice(string $service);
}
// common class for tariffs
abstract class rate implements iCalculatingPriceAndAddingServices {
    use addAdditional;
    public $kilometers;
    public $minutes;
    public function setParams(int $kilometer,int $minute){
        $this->kilometers = $kilometer;
        $this->minutes = $minute;
    }
    public function calculationPrice(): int{
        return $this->priceKilometer * $this->kilometers + $this->priceMinute * $this->minutes;
    }
    public function calculationServicePrice(string $service): int {

        if($service == 'GPS') {
            $result = $this->addGps($this->minutes);
            echo ' + ' . $this->priceGps . ' руб / час * ' . $this->time . ' час';
        } elseif($service == 'Driver') {
            $result = $this->addDriver();
            echo ' + ' . $this->priceDriver . ' руб';
        } else {
            $result = 0;
        }
        return $result;
    }
}

// class basic tariffs
class basicRate extends rate {
    public $priceKilometer = 10;
    public $priceMinute = 3;
}

// class hourly tariffs
class hourlyRate extends rate {
    public $priceKilometer = 0;
    public $priceHour = 200;
    public $priceMinute = 200 / 60;
    public $time;
    public function calculationPrice(): int{
        if($this->minutes % 60 > 0){
            $this->time = floor($this->minutes / 60) + 1;
        }
        return $this->priceKilometer * $this->kilometers + $this->priceHour * $this->time;
    }
}

// class student tariffs
class studentRate extends rate {
    public $priceKilometer = 4;
    public $priceMinute = 1;
}

// ancillary services calculation trait
trait  addAdditional {
    public $priceGps = 15;
    public $priceDriver = 100;
    public $time;
    function addGps(int $minute): int {
        if($minute % 60 > 0){
            $this->time = floor($minute / 60) + 1;
        }
        return $this->priceGps * $this->time;
    }
    function addDriver(): int {
        return $this->priceDriver;
    }
}