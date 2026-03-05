<?php
require 'config.php';

if (isset($_GET['delete'])){
$customer_id = $_GET['delete'];

$stmt = $pdo->prepare("DELETE FROM customers WHERE customer_id = ?");
$stmt->execute([$customer_id]);


}

if (isset($_GET['delete'])){
$item_id = $_GET['delete'];

$stmt2 = $pdo->prepare("DELETE FROM menuitems WHERE item_id = ?");
$stmt2->execute([$item_id]);


}

if (isset($_GET['delete'])){
$order_id = $_GET['delete'];

$stmt3 = $pdo->prepare("DELETE FROM orders WHERE order_id = ?");
$stmt3->execute([$order_id]);


}


?>