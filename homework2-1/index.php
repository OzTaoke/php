<?php
require('src/functions.php');
$userCount = 50;

// 1. users array creation
$users = task1($userCount);

// 2. array to json conversion
task2($users, 'users.json');

// 3. json to array conversion
$jsonUsers = task3('users.json');

// 4. array name counting
task4($jsonUsers);

// 5. calculating the average age of users
task5($jsonUsers);
