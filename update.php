<?php
require 'config.php';

if (isset($_POST['update_customer'])){

$customer_id = $_POST['customer_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$phone_number = $_POST['phone_number'];

$stmt = $pdo->prepare("UPDATE customers SET first_name = ?, last_name = ?, phone_number = ?
WHERE customer_id = ?");
$stmt->execute([ $first_name, $last_name, $phone_number, $customer_id]);


}

if (isset($_POST['update_menu_item'])){

$item_id = $_POST['item_id'];
$dish_name = $_POST['dish_name'];
$price = $_POST['price'];
$category = $_POST['category'];

$stmt2 = $pdo->prepare("UPDATE menuitems SET dish_name = ?, price = ?, category = ?
WHERE item_id = ?");
$stmt2->execute([$dish_name, $price, $category, $item_id]);


}

if (isset($_POST['update_order'])){

$customer_id = $_POST['customer_id'];
$item_id = $_POST['item_id'];
$quantity = $_POST['quantity'];
$order_id = $_POST['order_id'];

$stmt3 = $pdo->prepare("UPDATE orders SET customer_id = ?, item_id = ?, quantity = ?
WHERE order_id = ?");
$stmt3->execute([$customer_id, $item_id, $quantity, $order_id]);


}

?>