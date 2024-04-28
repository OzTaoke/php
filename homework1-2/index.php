<?php

require('src/functions.php');
$array = ['Просто', 'какой-то', 'текст'];
file_put_contents('test.txt', 'Hello again!');

task1($array, true);
task2('+', 6,8,10);
task3(7, 6);
task4();
task5();
task6('test.txt');
