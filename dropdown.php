<?php

require 'config.php';

$stmt = $pdo->query("SELECT * FROM customers");
$orders_name = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt2 = $pdo->query("SELECT * FROM menuitems");
$menu_item_name = $stmt2->fetchAll(PDO::FETCH_ASSOC);


?>
