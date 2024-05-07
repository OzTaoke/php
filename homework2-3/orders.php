<?php
include 'rate.php';

// class for creating a basic tariff
final class orderBasicRate extends basicRate {
    function __construct(int $kilometers,int $minutes,string $service = '') {
        $basic = new basicRate();
        echo '1. Тариф базовый';
        $basic->setParams($kilometers, $minutes);
        echo '(' . $kilometers . ' км, ' . $minutes . ' мин)' . '<br>';
        if($service) {
            echo '- добавить услугу ' . $service . '<br>';
        }
        $price = $basic->calculationPrice();
        echo '= ' . $kilometers . 'км * ' . $this->priceKilometer . 'руб / км + ' . $minutes . ' мин * ' . $this->priceMinute . ' руб / мин';
        $servicePrice = $basic->calculationServicePrice($service);
        echo ' = ' . $kilometers * $this->priceKilometer . " + " . $minutes * $this->priceMinute . ' + ' . $servicePrice;
        echo '<br>';
        echo ' = ' . ($price + $servicePrice);
        echo '<br>';
    }
}

// class for creating an hourly tariff
final class orderHourlyRate extends hourlyRate {
    function __construct(int $kilometers,int $minutes,string $service = '') {
        $hourly = new hourlyRate();
        echo '2. Тариф почасовой';
        $hourly->setParams($kilometers, $minutes);
        echo '(' . $kilometers . ' км, ' . $minutes . ' мин)' . '<br>';
        if($service) {
            echo '- добавить услугу ' . $service . '<br>';
        }
        $price = $hourly->calculationPrice();
        echo '= ' . floor(($minutes / 60) + 1) . ' час * ' . $this->priceHour . ' руб / час';
        $servicePrice = $hourly->calculationServicePrice($service);
        echo ' = ' . floor(($minutes / 60) + 1) * $this->priceHour . ' + ' . $servicePrice;
        echo '<br>';
        echo ' = ' . ($price + $servicePrice);
        echo '<br>';
    }
}

// class for creating a student tariff
final class orderStudentRate extends studentRate {
    function __construct(int $kilometers,int $minutes,string $service = '') {
        $student = new studentRate();
        echo '3. Тариф студенческий';
        $student->setParams($kilometers, $minutes);
        echo '(' . $kilometers . ' км, ' . $minutes . ' мин)' . '<br>';
        if($service) {
            echo '- добавить услугу ' . $service . '<br>';
        }
        $price = $student->calculationPrice();
        echo '= ' . $kilometers . 'км * ' . $this->priceKilometer . 'руб / км + ' . $minutes . ' мин * ' . $this->priceMinute . ' руб / мин';
        $servicePrice = $student->calculationServicePrice($service);
        echo ' = ' . $kilometers * $this->priceKilometer . " + " . $minutes * $this->priceMinute . ' + ' . $servicePrice;
        echo '<br>';
        echo ' = ' . ($price + $servicePrice);
        echo '<br>';
    }
}