<?php
require_once('./lib/db_login.php');

// Ambil data dari POST
$isbn = $db->real_escape_string($_POST['isbn']);
$title = $db->real_escape_string($_POST['title']);
$author = $db->real_escape_string($_POST['author']);
$price = $db->real_escape_string($_POST['price']);

// Query untuk menambah buku
$query = "INSERT INTO books (isbn, title, author, price) VALUES ('" . $isbn . "', '" . $title . "', '" . $author . "', '" . $price . "')";
$result = $db->query($query);

// Cek apakah query berhasil
if (!$result) {
    echo '<div class="alert alert-danger alert-dismissible">
            <strong>Error!</strong> Tidak dapat menambahkan buku <br>' . $db->error . '<br>query = ' . $query . '
        </div>';
} else {
    echo '<div class="alert alert-success alert-dismissible">
        <strong>Success!</strong> Data buku berhasil ditambahkan.<br>
        ISBN: ' . $_POST['isbn'] . '<br>
        Judul: ' . $_POST['title'] . '<br>
        Penulis: ' . $_POST['author'] . '<br>
        Harga: ' . $_POST['price'] . '<br>
    </div>';
}

// Tutup koneksi
$db->close();
?>
