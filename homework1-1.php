<?php

// Задание#1
$name = 'Александра';
$age = 29;

print_r('Меня зовут ' . $name);
echo '<br>';
print_r('Мне ' . $age . ' ' . 'лет');
echo '<br>';
print_r("\"!|/'\"\\");
echo '<br>';

// Задание#2
const ALL_DRAWING = 80;
const FELT_DRAWING = 23;
const PENCIL_DRAWING = 40;
$colors_drawing = ALL_DRAWING - (FELT_DRAWING + PENCIL_DRAWING);

print_r('Условие задачи: На школьной выставке ' . ALL_DRAWING . ' ' . 'рисунков. ' . FELT_DRAWING . ' ' . 'из них выполнены фломастерами, ' . PENCIL_DRAWING . ' ' . 'карандашами, а остальные — красками. Сколько рисунков, выполненные красками, на школьной выставке?');
echo '<br>';
print_r('Решение: ' . ALL_DRAWING . ' ' . '- (' . FELT_DRAWING . ' ' . '+ ' . PENCIL_DRAWING . ') = ' . $colors_drawing);
echo '<br>';

// Задание#3
$age = rand(1, 100);

if($age >= 18 && $age <= 65){
    print_r('Вам ещё работать и работать');
} elseif($age > 65){
    print_r('Вам пора на пенсию');
} elseif($age <= 17 && $age >= 1) {
    print_r('Вам ещё рано работать');
} else {
    print_r('Неизвестный возраст');
}
echo '<br>';

// Задание#4
$day = rand(1, 10);

switch ($day) {
    case $day >= 1 && $day <= 5:
        print_r('Это рабочий день');
        break;
    case $day >= 6 && $day <= 7:
        print_r('Это выходной день');
        break;
    default:
        print_r('Неизвестный день');
}
echo '<br>';

// Задание#5
$carsKeys = ['model', 'speed', 'doors', 'year',];
$carsValues = ['X5', 120, 5, '2015',];
$bmw = array_combine($carsKeys, $carsValues);
$toyota = array_combine($carsKeys, $carsValues);
$opel = array_combine($carsKeys, $carsValues);
$cars = compact('bmw', 'opel', 'toyota');

for($i = 0; $i < sizeof($cars); $i++){
    print_r('CAR ' . array_keys($cars)[$i]);
    echo '<br>';
    print_r(implode(' ',array_values($cars)[$i]));
    echo '<br>';
}

// Задание #6
echo '<table>';
for($i = 1; $i < 10; $i++){
    echo '<tr>';
        for($j = 1; $j < 11; $j++){
            if(($i * $j) % 2 == 0){
                print_r('<th>' . '(' . $i * $j . ')' . '</th>');
            } elseif(($i * $j) % 2 == 1){
                print_r('<th>' . '[' . $i * $j . ']' . '</th>');
            } else {
                print_r('<th>' . $i * $j . '</th>');
            }
        }
    echo '</tr>';
}
echo '</table>';