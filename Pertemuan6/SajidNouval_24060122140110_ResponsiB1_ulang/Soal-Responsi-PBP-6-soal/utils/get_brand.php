<?php
require_once(__DIR__ . '/../lib/db_login.php');
$query = "SELECT * FROM brands";
$result = $db->query($query);
if (!$result) {
    die("Query Error: " . $db->error); 
}
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['brand_code'] . '">' . $row['brand_name'] . '</option>';
    }
} else {
    echo '<option value="none">Tidak ada merek tersedia</option>';
}

$db->close();
?>