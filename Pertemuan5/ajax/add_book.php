<?php
require_once('./lib/db_login.php');

// Cek jika form disubmit
if (isset($_POST['submit'])) {
    $is_valid = TRUE;

    // Validasi Judul
    $title = test_input($_POST['title']);
    if ($title == '') {
        $title_error = "Judul buku diperlukan";
        $is_valid = FALSE;
    }

    // Validasi Penulis
    $author = test_input($_POST['author']);
    if ($author == '') {
        $author_error = "Penulis diperlukan";
        $is_valid = FALSE;
    }

    // Validasi ISBN
    $isbn = test_input($_POST['isbn']);
    if ($isbn == '') {
        $isbn_error = "ISBN diperlukan";
        $is_valid = FALSE;
    }

    // Validasi Harga
    $price = test_input($_POST['price']);
    if ($price == '' || !is_numeric($price)) {
        $price_error = "Harga diperlukan dan harus berupa angka";
        $is_valid = FALSE;
    }

    // Jika valid, cek ISBN di database
    if ($is_valid) {
        // Escape inputs
        $title = $db->real_escape_string($title);
        $author = $db->real_escape_string($author);
        $isbn = $db->real_escape_string($isbn);
        $price = $db->real_escape_string($price);

        // Cek apakah ISBN sudah ada di database
        $query_check_isbn = "SELECT * FROM books WHERE isbn = '$isbn'";
        $result_check_isbn = $db->query($query_check_isbn);

        if ($result_check_isbn->num_rows > 0) {
            // ISBN sudah ada, tampilkan pesan kesalahan
            echo "<script>alert('ISBN sudah terdaftar, silakan gunakan ISBN yang berbeda.');</script>";
        } else {
            // ISBN belum ada, masukkan buku ke database
            $query = "INSERT INTO books (title, author, isbn, price) VALUES ('$title', '$author', '$isbn', '$price')";
            $result = $db->query($query);

            if (!$result) {
                die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query);
            } else {
                $db->close();
                header('Location: show_books.php');
                exit;
            }
        }
    }
}
?>

<?php include('./header.php') ?>

<div class="row w-50 mx-auto">
    <div class="col">
        <div class="card mt-4">
            <div class="card-header">Tambah Buku Baru</div>
            <div class="card-body">
                <form method="POST" autocomplete="on">
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul:</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?php if (isset($title)) echo $title ?>">
                        <div class="text-danger small"><?php if (isset($title_error)) echo $title_error ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">Penulis:</label>
                        <input type="text" class="form-control" id="author" name="author" value="<?php if (isset($author)) echo $author ?>">
                        <div class="text-danger small"><?php if (isset($author_error)) echo $author_error ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="isbn" class="form-label">ISBN:</label>
                        <input type="text" class="form-control" id="isbn" name="isbn" value="<?php if (isset($isbn)) echo $isbn ?>">
                        <div class="text-danger small"><?php if (isset($isbn_error)) echo $isbn_error ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Harga:</label>
                        <input type="text" class="form-control" id="price" name="price" value="<?php if (isset($price)) echo $price ?>">
                        <div class="text-danger small"><?php if (isset($price_error)) echo $price_error ?></div>
                    </div>

                    <!-- Tombol untuk menambah buku -->
                    <button type="submit" class="btn btn-primary" name="submit">Tambah Buku</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('./footer.php') ?>
