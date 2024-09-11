<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Data Produk</title>
    <style>
        body {
            font-family: Arial, Lucida;
            background-image: url("C:/Users/sajid/OneDrive/Pictures/IMG_4141.JPG");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            padding: 10px;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: auto;
        }
        .form-container h2 {
            text-align: center;
            font-family: 'Cursive', Lucida;
            color: #000000;
        }
        .form-container label {
            font-weight: bold;
            font-family: 'Cursive', Lucida;
            display: block;
            margin-bottom: 5px;
        }
        .form-container input[type="text"],
        .form-container input[type="number"],
        .form-container textarea,
        .form-container select {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-container input[type="radio"],
        .form-container input[type="checkbox"] {
            margin-right: 10px;
        }
        .form-container input[type="submit"],
        .form-container input[type="reset"] {
            background-color: #295dcc;
            color: white;
            padding: 10px 15px;
            margin-right: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-container input[type="reset"] {
            background-color: #dc3545;
        }
        .form-container input[type="submit"]:hover,
        .form-container input[type="reset"]:hover {
            background-color: #218838;
        }
        .form-container input[type="reset"]:hover {
            background-color: #c82333;
        }
    </style>
    <script>
        // Validasi form
        function validateForm() {
            // Validasi Nama Produk
            const namaProduk = document.getElementById('nama_produk').value;
            if (namaProduk.length < 5 || namaProduk.length > 30) {
                alert("Nama produk harus diisi, minimal 5 karakter, maksimal 30 karakter.");
                return false;
            }

            // Validasi Deskripsi Produk
            const deskripsi = document.getElementById('deskripsi').value;
            if (deskripsi.length < 5 || deskripsi.length > 100) {
                alert("Deskripsi produk harus diisi, minimal 5 karakter, maksimal 100 karakter.");
                return false;
            }

            // Validasi Kategori
            const kategori = document.getElementById('kategori').value;
            if (kategori === "") {
                alert("Kategori harus diisi.");
                return false;
            }

            // Validasi Sub Kategori
            const subKategori = document.getElementById('sub_kategori').value;
            if (subKategori === "") {
                alert("Sub Kategori harus diisi.");
                return false;
            }

            // Validasi Harga Satuan
            const hargaSatuan = document.getElementById('harga_satuan').value;
            if (hargaSatuan === "" || isNaN(hargaSatuan)) {
                alert("Harga satuan harus diisi dan berupa nilai numerik.");
                return false;
            }

            // Validasi Grosir dan Harga Grosir
            const grosir = document.querySelector('input[name="grosir"]:checked').value;
            const hargaGrosir = document.getElementById('harga_grosir').value;
            if (grosir === "ya" && (hargaGrosir === "" || isNaN(hargaGrosir))) {
                alert("Jika Grosir dipilih 'Ya', maka Harga Grosir harus diisi dan berupa nilai numerik.");
                return false;
            }

            if (grosir === "tidak" && hargaGrosir !== "") {
                alert("Jika Grosir dipilih 'Tidak', Harga Grosir harus dikosongkan.");
                return false;
            }

            // Validasi Jasa Kirim
            const jasaKirim = document.querySelectorAll('input[name="jasa_kirim[]"]:checked');
            if (jasaKirim.length < 3) {
                alert("Minimal 3 jasa kirim yang harus dipilih.");
                return false;
            }

            // Validasi Captcha
            const captcha = document.getElementById('captcha').value;
            const captchaInput = document.getElementById('captcha_input').value;
            if (captcha !== captchaInput) {
                alert("Captcha tidak sesuai.");
                return false;
            }

            return true;
        }

        // Fungsi untuk generate captcha secara random
        function generateCaptcha() {
            let captcha = '';
            for (let i = 0; i < 5; i++) {
                const randomChar = String.fromCharCode(Math.floor(Math.random() * 26) + 97); // a-z
                captcha += randomChar;
            }
            document.getElementById('captcha').value = captcha;
        }

        window.onload = function() {
            generateCaptcha();
        };

        // Update Sub Kategori
        function updateSubKategori() {
            const kategori = document.getElementById('kategori').value;
            const subKategori = document.getElementById('sub_kategori');

            subKategori.innerHTML = '<option value="">--Pilih Sub Kategori--</option>';

            if (kategori === "Baju") {
                subKategori.innerHTML += '<option value="Baju Pria">Baju Pria</option>';
                subKategori.innerHTML += '<option value="Baju Wanita">Baju Wanita</option>';
                subKategori.innerHTML += '<option value="Baju Anak">Baju Anak</option>';
            } else if (kategori === "Elektronik") {
                subKategori.innerHTML += '<option value="Mesin Cuci">Mesin Cuci</option>';
                subKategori.innerHTML += '<option value="Kulkas">Kulkas</option>';
                subKategori.innerHTML += '<option value="AC">AC</option>';
            } else if (kategori === "Alat Tulis") {
                subKategori.innerHTML += '<option value="Kertas">Kertas</option>';
                subKategori.innerHTML += '<option value="Map">Map</option>';
                subKategori.innerHTML += '<option value="Pulpen">Pulpen</option>';
            }
        }
    </script>
</head>
<body>
    <div class="form-container">
        <h2>Form Tambah Data Produk</h2>
        <form onsubmit="return validateForm()" method="post">
            <label for="nama_produk">Nama Produk:</label>
            <input type="text" id="nama_produk" name="nama_produk" required>

            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" rows="4" cols="50" required></textarea>

            <label for="kategori">Kategori:</label>
            <select id="kategori" name="kategori" required onchange="updateSubKategori()">
                <option value="">--Pilih Kategori--</option>
                <option value="Baju">Baju</option>
                <option value="Elektronik">Elektronik</option>
                <option value="Alat Tulis">Alat Tulis</option>
            </select>

            <label for="sub_kategori">Sub Kategori:</label>
            <select id="sub_kategori" name="sub_kategori" required>
                <option value="">--Pilih Sub Kategori--</option>
            </select>

            <label for="harga_satuan">Harga Satuan:</label>
            <input type="number" id="harga_satuan" name="harga_satuan" required>

            <label>Grosir:</label>
                <div class="inline-options">
                    <input type="radio" id="grosir_ya" name="grosir" value="ya" required>
                    <label for="grosir_ya">Ya</label>
                    <input type="radio" id="grosir_tidak" name="grosir" value="tidak" required>
                    <label for="grosir_tidak">Tidak</label>
                </div>

            <label for="harga_grosir">Harga Grosir:</label>
            <input type="number" id="harga_grosir" name="harga_grosir">

            <label>Jasa Kirim:</label>
                <div class="inline-options">
                    <input type="checkbox" id="jne" name="jasa_kirim[]" value="JNE">
                    <label for="jne">JNE</label>
                    <input type="checkbox" id="tiki" name="jasa_kirim[]" value="TIKI">
                    <label for="tiki">TIKI</label>
                    <input type="checkbox" id="sicepat" name="jasa_kirim[]" value="SiCepat">
                    <label for="sicepat">SiCepat</label>
                    <input type="checkbox" id="ninja" name="jasa_kirim[]" value="Ninja Express">
                    <label for="ninja">Ninja Express</label>
                    <input type="checkbox" id="wahana" name="jasa_kirim[]" value="Wahana">
                    <label for="wahana">Wahana</label>
                </div>

            <label for="captcha">Captcha:</label>
            <input type="text" id="captcha" name="captcha" readonly>
            <input type="text" id="captcha_input" name="captcha_input" required>

            <input type="submit" name="submit" value="Submit">
            <input type="reset" value="Reset">
        </form>
        <br>
        <?php 
        if (isset($_POST['submit'])) {
            echo '<h3>Your Input:</h3>';
            echo 'Nama Produk: ' . htmlspecialchars($_POST['nama_produk']) . '<br>';
            echo 'Deskripsi: ' . htmlspecialchars($_POST['deskripsi']) . '<br>';
            echo 'Kategori: ' . htmlspecialchars($_POST['kategori']) . '<br>';
            echo 'Sub Kategori: ' . htmlspecialchars($_POST['sub_kategori']) . '<br>';
            echo 'Harga Satuan: ' . htmlspecialchars($_POST['harga_satuan']) . '<br>';   
            $minat = $_POST['jasa_kirim'];
            if (!empty($minat)) {
                echo 'Jasa Kirim yang dipilih: ';
                foreach ($minat as $minat_item) {
                    echo '<br />' . htmlspecialchars($minat_item);
                }
            }
        }
        ?>
    </div>
</body>
</html>
