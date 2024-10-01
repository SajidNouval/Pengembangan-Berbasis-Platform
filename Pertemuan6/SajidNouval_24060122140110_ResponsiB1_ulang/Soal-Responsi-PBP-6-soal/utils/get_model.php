<?php
require_once(__DIR__ . '/../lib/db_login.php');
$brand_code = $db->real_escape_string($_GET['brand_code']);
if (empty($brand_code)) {
    die("Brand code tidak ada");
}
$query = "SELECT * FROM models WHERE brand_code = '$brand_code'";
$result = $db->query($query);
if (!$result) {
    die("Query Error: " . $db->error); 
}
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['model_code'] . '">' . $row['model_name'] . '</option>';
    }
} else {
    echo '<option value="">Model tidak ditemukan untuk brand tersebut</option>';
}

$db->close();
?>