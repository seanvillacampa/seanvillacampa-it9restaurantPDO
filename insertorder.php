<?php
require 'config.php';

if (isset($_POST['add_order'])){

$customer_id = $_POST['customer_id'];
$item_id = $_POST['item_id'];
$quantity = $_POST['quantity'];



$stmt2 = $pdo->prepare("INSERT INTO orders (customer_id, item_id, quantity, order_date)
        VALUES (?, ?, ?, NOW())");
$stmt2->execute([$customer_id, $item_id, $quantity]);

$order_id = $pdo->lastInsertId();

echo "Menu Item added successfully!";

}




?>