<?php include('./header.php') ?>
<div class="row w-50 mx-auto mt-5">
    <div class="col">
        <div class="card">
            <div class="card-header">Daftar Buku</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>ISBN</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once('./lib/db_login.php');

                        // Ambil semua buku
                        $query = "SELECT * FROM books";
                        $result = $db->query($query);

                        if (!$result) {
                            die("Tidak bisa menjalankan query: <br>" . $db->error);
                        }

                        while ($row = $result->fetch_object()) {
                            echo '<tr>';
                            echo '<td>' . $row->title . '</td>';
                            echo '<td>' . $row->author . '</td>';
                            echo '<td>' . $row->isbn . '</td>';
                            echo '<td>' . $row->price . '</td>';
                            echo '</tr>';
                        }

                        $result->free();
                        $db->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include('./footer.php') ?>
