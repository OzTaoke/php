<?php

// user creation function
function task1(string $name, string $phone, string $email):array {
    $pdo = task4();

    $user = $pdo->query("SELECT * FROM users WHERE email = '$email'")->fetchAll(PDO::FETCH_ASSOC);
    $orders = 1;

    if($user) {
        $orders = $user[0]['orders'] + 1;
        $pdo->query("UPDATE users SET orders = '$orders' WHERE `email` = '$email'");
    } else {
        $pdo->query( "INSERT INTO users (`name`, phone, email, orders ) VALUES ('$name', '$phone', '$email', $orders)");
    }

    $pdo = task4();
    $user = $pdo->query("SELECT * FROM users WHERE email = '$email'")->fetchAll(PDO::FETCH_ASSOC);

    return [
        'id' => $user[0]['id'],
        'orders' => $orders,
    ];
}

// function for order creation
function task2(int $id, string $address): int {
    date_default_timezone_set('Europe/Moscow');
    $date = date('d-m-Y H:i:s');

    $pdo = task4();
    $pdo->query( "INSERT INTO burgers.order (user_id, date, address) VALUES ($id, '$date', '$address')");
    $order = $pdo->query("SELECT * FROM burgers.order WHERE date = '$date'")->fetchAll(PDO::FETCH_ASSOC);

    return $order[0]['order_id'];
}

// function for displaying an order message to the user
function task3(string $address, int $orders, int $order_id ) {
    echo 'Спасибо, Ваш заказ будет доставлен по адресу: ' . $address;
    echo '<br>';
    echo 'Номер Вашего заказа: ' . $order_id;
    echo '<br>';
    echo 'Это Ваш ' . $orders . '-й заказ!';
}

// function for accessing the database
function task4() {
    try {
        return new PDO("mysql:host=localhost;dbname=burgers", "root", "");
    } catch (PDOException $e) {
        echo $e->getMessage();
        die;
    }
}






