<?php
require 'config.php';

if (isset($_POST['add_menu_item'])){

$dish_name = $_POST['dish_name'];
$price = $_POST['price'];
$category = $_POST['category'];


$stmt2 = $pdo->prepare("INSERT INTO menuitems (dish_name, price, category) VALUES (?,?,?)");
$stmt2->execute([$dish_name, $price, $category]);

$item_id = $pdo->lastInsertId();

echo "Menu Item added successfully!";

}



?>