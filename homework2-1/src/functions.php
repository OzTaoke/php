<?php

// random name array
const NAMES = ['Sasha', 'Ivan', 'Jane', 'Oleg', 'Andrey'];

// users array creation function
function task1(int $userCount): array {
    $user = [];
    for($i = 0; $i < $userCount; $i++) {
        $user[] = [
            'id' => $i,
            'name' => NAMES[array_rand(NAMES)],
            'age' => mt_rand(18, 45),
        ];
    }
    return $user;
}

// array to json conversion function
function task2(array $users, string $jsonName) {
    file_put_contents($jsonName, json_encode($users));
}

// json to array conversion function
function task3(string $json): array {
    return json_decode(file_get_contents($json), true);
}

// array name counting function
function task4(array $users): array {
    $namesArr = array_column($users, 'name');
    return array_count_values($namesArr);
}

// function for calculating the average age of users
function task5(array $users): int {
    $ageArr = array_column($users, 'age');
    return intdiv(array_sum($ageArr), count($ageArr));
}