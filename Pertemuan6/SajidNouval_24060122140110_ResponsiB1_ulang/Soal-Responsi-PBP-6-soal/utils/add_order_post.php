<?php
require_once('./lib/db_login.php');

$name = isset($_POST['name']) ? $db->real_escape_string($_POST['name']) : '';
$phone = isset($_POST['phone']) ? $db->real_escape_string($_POST['phone']) : '';
$address = isset($_POST['address']) ? $db->real_escape_string($_POST['address']) : '';
$brand = isset($_POST['brand']) ? $db->real_escape_string($_POST['brand']) : '';
$model = isset($_POST['model']) ? $db->real_escape_string($_POST['model']) : '';
$color = isset($_POST['color']) ? $db->real_escape_string($_POST['color']) : '';

var_dump($_POST); 
$is_valid = true;
$errors = [];
if (empty($name)) {
    $errors['name_error'] = 'Nama harus diisi';
    $is_valid = false;
}
if (empty($phone)) {
    $errors['phone_error'] = 'Nomor telepon harus diisi';
    $is_valid = false;
}
if (empty($address)) {
    $errors['address_error'] = 'Alamat harus diisi';
    $is_valid = false;
}
if (empty($brand)) {
    $errors['brand_error'] = 'Merek harus dipilih';
    $is_valid = false;
}
if (empty($model)) {
    $errors['model_error'] = 'Model harus dipilih';
    $is_valid = false;
}
if (empty($color)) {
    $errors['color_error'] = 'Warna harus dipilih';
    $is_valid = false;
}
if (!$is_valid) {
    echo json_encode(['status' => 'error', 'errors' => $errors]);
    exit;
}
$query = "INSERT INTO orders (name, phone, address, brand, model, color) 
          VALUES ('$name', '$phone', '$address', '$brand', '$model', '$color')";
$result = $db->query($query);

if ($result) {
    echo json_encode(['status' => 'success', 'message' => 'Pesanan berhasil ditambahkan']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Terjadi kesalahan saat menyimpan data: ' . $db->error]);
}

$db->close();
exit;