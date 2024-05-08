<?php
include 'rate.php';

// function for creating a basic tariff order
function orderBasicRate (int $kilometers,int $minutes,string $service = '')
{
    $basic = new basicRate();
    echo '1. Тариф базовый';
    $basic->setParams($kilometers, $minutes);
    echo '(' . $kilometers . ' км, ' . $minutes . ' мин)' . '<br>';
    if($service) {
        echo '- добавить услугу ' . $service . '<br>';
    }
    $price = $basic->calculationPrice();
    echo '= ' . $kilometers . 'км * ' . $basic->priceKilometer . 'руб / км + ' . $minutes . ' мин * ' . $basic->priceMinute . ' руб / мин';
    $servicePrice = $basic->calculationServicePrice($service);
    echo ' = ' . $kilometers * $basic->priceKilometer . " + " . $minutes * $basic->priceMinute . ' + ' . $servicePrice;
    echo '<br>';
    echo ' = ' . ($price + $servicePrice);
    echo '<br>';
}

// function for creating an hourly tariff order
function orderHourlyRate(int $kilometers,int $minutes,string $service = '')
{
    $hourly = new hourlyRate();
    echo '2. Тариф почасовой';
    $hourly->setParams($kilometers, $minutes);
    echo '(' . $kilometers . ' км, ' . $minutes . ' мин)' . '<br>';
    if($service) {
        echo '- добавить услугу ' . $service . '<br>';
    }
    $price = $hourly->calculationPrice();
    echo '= ' . floor(($minutes / 60) + 1) . ' час * ' . $hourly->priceHour . ' руб / час';
    $servicePrice = $hourly->calculationServicePrice($service);
    echo ' = ' . floor(($minutes / 60) + 1) * $hourly->priceHour . ' + ' . $servicePrice;
    echo '<br>';
    echo ' = ' . ($price + $servicePrice);
    echo '<br>';
}

// function for creating a student tariff order
function orderStudentRate(int $kilometers,int $minutes,string $service = '') {
    $student = new studentRate();
    echo '3. Тариф студенческий';
    $student->setParams($kilometers, $minutes);
    echo '(' . $kilometers . ' км, ' . $minutes . ' мин)' . '<br>';
    if($service) {
        echo '- добавить услугу ' . $service . '<br>';
    }
    $price = $student->calculationPrice();
    echo '= ' . $kilometers . 'км * ' . $student->priceKilometer . 'руб / км + ' . $minutes . ' мин * ' . $student->priceMinute . ' руб / мин';
    $servicePrice = $student->calculationServicePrice($service);
    echo ' = ' . $kilometers * $student->priceKilometer . " + " . $minutes * $student->priceMinute . ' + ' . $servicePrice;
    echo '<br>';
    echo ' = ' . ($price + $servicePrice);
    echo '<br>';
}