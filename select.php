<?php
require 'config.php';

$stmt = $pdo->query("SELECT * FROM customers");
$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt2 = $pdo->query("SELECT * FROM menuitems");
$menu_items = $stmt2->fetchAll(PDO::FETCH_ASSOC);

$stmt3 = $pdo->query("SELECT 
    CONCAT(first_name, ' ', last_name) AS full_name,
    CONCAT(dish_name, ' (x', quantity, ') ') AS dish_quantity,
    menuitems.price,
    CONCAT('₱', menuitems.price * orders.quantity) AS total_price,

    orders.order_date,
    orders.order_id
FROM orders
INNER JOIN customers ON orders.customer_id = customers.customer_id
INNER JOIN menuitems ON orders.item_id = menuitems.item_id");
$order_display = $stmt3->fetchAll(PDO::FETCH_ASSOC);



?>