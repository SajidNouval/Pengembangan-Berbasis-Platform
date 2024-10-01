<?php
require_once(__DIR__ . '/../lib/db_login.php');
$phone_number = $_GET['phone_number'];
$query = "SELECT * FROM orders WHERE phone = '$phone_number'";
$result = $db->query($query);
if ($result->num_rows > 0) {
    echo json_encode(['status' => 'error', 'message' => 'Nomor telepon sudah digunakan']);
} else {
    echo json_encode(['status' => 'success', 'message' => 'Nomor telepon tersedia']);
}

$db->close();
exit;
?>