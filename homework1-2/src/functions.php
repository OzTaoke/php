<?php

function task1($array, $true)
{
    for ($i = 0; $i < sizeof($array); $i++) {
        echo '<p>';
            print_r($array[$i]);
        echo '</p>';
    }
    if($true) {
        return implode($array);
    }
}

function task2(string $operation)
{
    $args = func_get_args();
    $result = 0;

    for ($i = 1; $i < sizeof($args); $i++) {
        if($operation == "+") {
            $result += $args[$i];
        } elseif($operation == "-") {
            $result -= $args[$i];
        } elseif($operation == "*") {
            $result *= $args[$i];
        } elseif($operation == "/") {
            $result /= $args[$i];
        }
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
    } else {
        echo '<table>';
            for($i = 1; $i <= $num1; $i++) {
                echo '<tr>';
                    for($j = 1; $j <= $num2; $j++) {
                        print_r('<th>' . $i * $j . '</th>');
                    }
                echo '</tr>';
            }
        echo '</table>' . '<br>';
    }
}

function task4()
{
    date_default_timezone_set('Europe/Moscow');
    print_r(date('d.m.Y H:i') . '<br>' . strtotime('24.02.2016 00:00:00') . '<br>');
}

function task5()
{
    $str1 = 'Карл у Клары украл Кораллы';
    print_r(str_replace('К', ' ', $str1) . '<br>');

    $str2 =  'Две бутылки лимонада';
    print_r(str_replace('Две', 'Три', $str2) . '<br>');
}

function task6(string $fileName)
{
    $file = fopen($fileName, 'r');
    if (!$file) {
        return false;
    }

    $str = '';
    while (!feof($file)) {
        $str .= fgets($file);
    }
    print_r($str);
}