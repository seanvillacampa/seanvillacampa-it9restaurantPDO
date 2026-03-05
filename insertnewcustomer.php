<?php
require 'config.php';

if (isset($_POST['add_customer'])){

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$phone_number = $_POST['phone_number'];


$stmt = $pdo->prepare("INSERT INTO customers (first_name, last_name, phone_number)
 VALUES (?,?,?)");
$stmt->execute([$first_name, $last_name, $phone_number]);

$customer_id = $pdo->lastInsertId();

echo "Customer added successfully!";

}



?>