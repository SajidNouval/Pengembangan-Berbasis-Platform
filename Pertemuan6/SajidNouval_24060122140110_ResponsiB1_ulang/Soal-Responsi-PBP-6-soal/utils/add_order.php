<?php
session_start();
require_once(__DIR__ . '/../lib/db_login.php');

$name = $db->real_escape_string($_POST['name']);
$phone = $db->real_escape_string($_POST['phone']);
$address = $db->real_escape_string($_POST['address']);
$brand = $db->real_escape_string($_POST['brand']);
$model = $db->real_escape_string($_POST['model']); 
$color = $db->real_escape_string($_POST['color']);
$query = "INSERT INTO orders (name, phone_number, address, brand_code, model_code, color) 
          VALUES ('$name', '$phone', '$address', '$brand', '$model', '$color')";
if ($db->query($query) === TRUE) {
    echo json_encode(['status' => 'success', 'message' => 'Pesanan berhasil ditambahkan']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Gagal menambahkan pesanan: ' . $db->error]);
}

$db->close();
exit;