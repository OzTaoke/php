<?php
require('src/functions.php');
$name = $_GET["name"];
$phone = $_GET["phone"];
$email = $_GET["email"];
$street = $_GET["street"];
$home = $_GET["home"];
$part = $_GET["part"];
$appt = $_GET["appt"];
$floor = $_GET["floor"];

if($part == '') {
    $part = '-';
}
if($appt == '') {
    $appt = '-';
}
if($floor == '') {
    $floor = '-';
}

$address = 'ул. ' . $street . ', д. ' . $home . ', корп. ' . $part . ', кв. ' . $appt . ', этаж ' . $floor;

// 1. check email and create a new user, get user id and number of orders
$user = task1($name, $phone, $email);
// 2. creating an order and receiving its id
$order_id = task2($user['id'], $address);
// 3. displaying an information message for the user
task3($address, $user['orders'], $order_id);

