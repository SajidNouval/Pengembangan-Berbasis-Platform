<?php
require_once('./lib/db_login.php');

// Ambil data dari GET
$isbn = $db->real_escape_string($_GET['isbn']);
$title = $db->real_escape_string($_GET['title']);
$author = $db->real_escape_string($_GET['author']);
$price = $db->real_escape_string($_GET['price']);

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
        ISBN: ' . $_GET['isbn'] . '<br>
        Judul: ' . $_GET['title'] . '<br>
        Penulis: ' . $_GET['author'] . '<br>
        Harga: ' . $_GET['price'] . '<br>
    </div>';
}

// Tutup koneksi
$db->close();
?>
