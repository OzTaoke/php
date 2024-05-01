<?php

// Задание#1
$name = 'Александра';
$age = 29;

echo 'Меня зовут ' . $name;
echo '<br>';
echo 'Мне ' . $age . ' ' . 'лет';
echo '<br>';
echo "\"!|/'\"\\";
echo '<br>';

// Задание#2
const ALL_DRAWING = 80;
const FELT_DRAWING = 23;
const PENCIL_DRAWING = 40;
$colors_drawing = ALL_DRAWING - (FELT_DRAWING + PENCIL_DRAWING);

echo 'Условие задачи: На школьной выставке ' . ALL_DRAWING . ' ' . 'рисунков. ' . FELT_DRAWING . ' ' . 'из них выполнены фломастерами, ' . PENCIL_DRAWING . ' ' . 'карандашами, а остальные — красками. Сколько рисунков, выполненные красками, на школьной выставке?';
echo '<br>';
echo 'Решение: ' . ALL_DRAWING . ' ' . '- (' . FELT_DRAWING . ' ' . '+ ' . PENCIL_DRAWING . ') = ' . $colors_drawing;
echo '<br>';

// Задание#3
$age = rand(1, 100);

if($age >= 18 && $age <= 65){
    echo 'Вам ещё работать и работать';
} elseif($age > 65){
    echo 'Вам пора на пенсию';
} elseif($age <= 17 && $age >= 1) {
    echo 'Вам ещё рано работать';
} else {
    echo 'Неизвестный возраст';
}
echo '<br>';

// Задание#4
$day = rand(1, 10);

switch ($day) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
        echo 'Это рабочий день';
        break;
    case 6:
    case 7:
        echo 'Это выходной день';
        break;
    default:
        echo 'Неизвестный день';
}
echo '<br>';

// Задание#5
$carsKeys = ['model', 'speed', 'doors', 'year',];
$carsValues = ['X5', 120, 5, '2015',];
$bmw = [ 'model' => 'X5', 'speed' => 120, 'doors' => 5, 'year' => '2015'];
$toyota = [ 'model' => 'X5', 'speed' => 120, 'doors' => 5, 'year' => '2015'];
$opel = [ 'model' => 'X5', 'speed' => 120, 'doors' => 5, 'year' => '2015'];
$cars = ['bmw' => $bmw, 'opel' => $toyota, 'toyota' => $opel];

foreach ($cars as $brand => $car) {
    echo 'CAR ' . $brand;
    echo '<br>';
    echo implode(' ', array_values($car));
    echo '<br>';
}

// Задание #6
echo '<table>';
for($i = 1; $i < 10; $i++){
    echo '<tr>';
        for($j = 1; $j < 11; $j++){
            if(($i * $j) % 2 == 0){
                echo '<th>' . '(' . $i * $j . ')' . '</th>';
            } elseif(($i * $j) % 2 == 1){
                echo '<th>' . '[' . $i * $j . ']' . '</th>';
            } else {
                echo '<th>' . $i * $j . '</th>';
            }
        }
    echo '</tr>';
}
echo '</table>';