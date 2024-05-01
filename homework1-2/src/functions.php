<?php

function task1($array, $join)
{
    for ($i = 0; $i < sizeof($array); $i++) {
        echo '<p>';
            echo $array[$i];
        echo '</p>';
    }
    if($join) {
        return implode($array);
    }
}

function task2(string $operation, ... $numbers)
{
    $result = 0;
    $c = sizeof($numbers) - 1;
    switch ($operation) {
        case '+':
            $result = array_sum($numbers);
            break;
        case '*':
            $result = array_product($numbers);
            break;
        case '-':
            $result = array_shift($numbers);
            for ($i = 0; $i < $c; $i++) {
                $result -= $numbers[$i];
            }
            break;
        case '/':
            $result = array_shift($numbers);
            for ($i = 0; $i < $c ; $i++) {
                $result /= $numbers[$i];
            }
            break;
    }

    return $result;
}

function task3($num1,$num2)
{
    if(!is_int($num1) || !is_int($num2)) {
        trigger_error('Аргументы должены быть числом');
        return false;
    } elseif ($num1 <= 0 || $num2 <= 0){
        trigger_error('Аргументы должны быть положительными числами и не равны 0');
        return false;
    }

    echo '<table>';
    for($i = 1; $i <= $num1; $i++) {
        echo '<tr>';
        for($j = 1; $j <= $num2; $j++) {
            echo '<th>' . $i * $j . '</th>';
        }
        echo '</tr>';
    }
    echo '</table>' . '<br>';
}

function task4()
{
    date_default_timezone_set('Europe/Moscow');
    echo date('d.m.Y H:i') . '<br>' . strtotime('24.02.2016 00:00:00') . '<br>';
}

function task5()
{
    $str1 = 'Карл у Клары украл Кораллы';
    echo str_replace('К', ' ', $str1) . '<br>';

    $str2 =  'Две бутылки лимонада';
    echo str_replace('Две', 'Три', $str2) . '<br>';
}

function task6($fileName,string $text){
    file_put_contents($fileName, $text);
}
function task7(string $fileName)
{
    echo file_get_contents($fileName);
}