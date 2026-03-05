<?php

require 'config.php';

$stmt = $pdo->query("SELECT customer_id, CONCAT(first_name, ' ', last_name) AS full_name FROM customers");
$orders_name = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt2 = $pdo->query("SELECT * FROM menuitems");
$menu_item_name = $stmt2->fetchAll(PDO::FETCH_ASSOC);


?>
