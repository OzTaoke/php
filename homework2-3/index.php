<?php
include 'orders.php';

$order1 = new orderBasicRate(100,100,'GPS');
$order2 = new orderHourlyRate(100,100, 'Driver');
$order3 = new orderStudentRate(100,100);
