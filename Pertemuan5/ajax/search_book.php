<?php
// File: search_book.php
require_once('./lib/db_login.php');

// Inisialisasi variabel
$search = '';
$search_error = '';
$query_result = '';
$is_search = false;

// Cek apakah form pencarian disubmit
if (isset($_GET['search'])) {
    $search = test_input($_GET['search']);
    if ($search == '') {
        $search_error = "Masukkan kata kunci untuk mencari buku";
    } else {
        // Set flag bahwa pencarian telah dilakukan
        $is_search = true;

        // Query untuk mencari buku berdasarkan judul, penulis, atau ISBN
        $query = "SELECT * FROM books WHERE title LIKE '%$search%' OR author LIKE '%$search%' OR isbn LIKE '%$search%'";

        // Eksekusi query
        $query_result = $db->query($query);

        // Cek apakah query berhasil dijalankan
        if (!$query_result) {
            die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query);
        }
    }
}
?>

<?php include('./header.php'); ?>

<div class="container mt-5">
    <h2 class="text-center">Cari Buku</h2>
    
    <!-- Form Pencarian -->
    <form method="GET" action="search_book.php" class="d-flex justify-content-center mb-4">
        <input class="form-control w-50 me-2" type="search" name="search" placeholder="Cari berdasarkan judul, penulis, atau ISBN" value="<?php echo $search; ?>">
        <button class="btn btn-primary" type="submit">Cari</button>
    </form>

    <!-- Tampilkan error jika pencarian kosong -->
    <?php if ($search_error): ?>
        <div class="alert alert-danger text-center"><?php echo $search_error; ?></div>
    <?php endif; ?>

    <!-- Tampilkan hasil pencarian -->
    <?php if ($is_search && $query_result && $query_result->num_rows > 0): ?>
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>ISBN</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i = 1;
                while ($row = $query_result->fetch_object()): ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row->title; ?></td>
                        <td><?php echo $row->author; ?></td>
                        <td><?php echo $row->isbn; ?></td>
                        <td><?php echo $row->price; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php elseif ($is_search): ?>
        <div class="alert alert-warning text-center">Buku tidak ditemukan.</div>
    <?php endif; ?>
</div>

<?php include('./footer.php'); ?>

<?php
// Tutup koneksi ke database dan bebaskan memori hasil query
if (isset($query_result) && $query_result instanceof mysqli_result) {
    $query_result->free();
}
$db->close();
?>
