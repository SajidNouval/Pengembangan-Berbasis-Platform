<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'bookorama');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$title = $_GET['title'];

// Query untuk mencari buku berdasarkan judul
$sql = "SELECT isbn, author, title, price FROM books WHERE title LIKE '%" . $conn->real_escape_string($title) . "%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div onclick='window.location.href=\"show_book.php\"'>";
        echo "<h2>" . $row['title'] . "</h2>";
        echo "<p><strong>Penulis:</strong> " . $row['author'] . "</p>";
        echo "<p><strong>ISBN:</strong> " . $row['isbn'] . "</p>";
        echo "<p><strong>Harga:</strong> $" . $row['price'] . "</p>";
        echo "</div>";
    }
} else {
    echo "Buku tidak ditemukan.";
}

$conn->close();
?>
