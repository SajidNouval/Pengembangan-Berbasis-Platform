<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <title>Praktikum PBP D1 | Pertemuan 3</title>

  <!--
    Penjelasan:
    Pada saat sebagian field dikosongkan, pesan error sudah ditampilkan dengan benar.
    Untuk field yang sudah terisi sebelumnya, setelah kita klik submit maka isiannya akan
    hilang atau bisa dikatakan seluruh isian pada form ter-reset.
    Hal ini dapat terjadi karena kita tidak menyimpan apa yang sudah user isikan
    pada value untuk tiap fieldnya.
    Sehingga begitu user men-submit form, form akan melakukan reload dan
    pada bagian field input akan dikembalikan sebagaimana ia ditampilkan di awal
    dengan tidak menyimpan value apapun sehingga isinya kosong.
    
    Peran fungsi test_input($data) pada proses validasi berguna untuk
    membersihkan data yang diinputkan oleh user dari karakter-karakter yang tidak diinginkan.
    Fungsi ini akan menghapus spasi ekstra, backslash (\), dan karakter-karakter khusus HTML.
    Sehingga bila ada user jahat yang ingin memasukkan script yang dapat merusak website,
    maka script tersebut akan jadi tidak terbaca dan hanya berupa text biasa
    dengan adanya fungsi test_input($data).
    Fungsi tersebut hanya dikenakan pada isian nama, email, dan alamat karena
    hanya ketiga isian tersebut yang dapat diisi dengan diketikkan secara langsung oleh user.
    Sedangkan untuk isian jenis kelamin, kota, dan peminatan, isian tersebut sudah disediakan
    dan user hanya dapat memilih pilihan yang tersedia.
    
    Untuk melakukan validasi yang digunakan untuk mengecek agar isian tidak boleh kosong,
    kita menggunakan fungsi empty() yang akan mengembalikan nilai true jika isian kosong.
    Kita juga dapat mengecek apakah isian tersebut bernilai string kosong atau tidak.
  -->

</head>
<body class="container">
<?php 
  if(isset($_POST['submit'])){
    // validasi nama: tidak boleh kosong, hanya dapat berisi huruf dan spasi
    $nama = test_input($_POST['nama']);
    if (empty($nama)) {
      $error_nama = "Nama harus diisi";
    } elseif (!preg_match("/^[a-zA-Z ]*$/",$nama)) {
      $error_nama = "Nama hanya boleh berisi huruf dan spasi";
    }

    // validasi email: tidak boleh kosong, format harus benar
    $email = test_input($_POST['email']);
    if ($email == "") {
      $error_email = "Email harus diisi";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error_email = "Format email tidak benar";
    }

    // validasi alamat: tidak boleh kosong
    $alamat = test_input($_POST['alamat']);
    if ($alamat == "") {
      $error_alamat = "Alamat harus diisi";
    }

    // validasi jenis kelamin: tidak boleh kosong
    $jenis_kelamin = $_POST['jenis_kelamin'];
    if ($jenis_kelamin == "") {
      $error_jenis_kelamin = "Jenis kelamin harus diisi";
    }

    // validasi kota: tidak boleh kosong
    $kota = $_POST['kota'];
    if ($kota == "") {
      $error_kota = "Kota harus diisi";
    }

    // validasi minat: tidak boleh kosong
    $minat = $_POST['minat'];
    if (empty($minat)) {
      $error_minat = "Peminatan harus dipilih";
    }
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>

  <div class="card">
    <div class="card-header">Form Mahasiswa</div>
    <div class="card-body">
      <form action="" method="POST" class="">
        <div class="form-group">
          <label for="nama">Nama:</label>
          <input type="text" class="form-control" id="nama" name="nama" maxlength="50">
          <div class="error text-danger"><?php if(isset($error_nama)) echo $error_nama;?></div>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" name="email">
          <div class="error text-danger"><?php if(isset($error_email)) echo $error_email;?></div>
        </div>
        <div class="form-group">
          <label for="alamat">Alamat:</label>
          <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="10"></textarea>
          <div class="error text-danger"><?php if(isset($error_alamat)) echo $error_alamat;?></div>
        </div>
        <div class="form-group">
          <label for="kota">Kota / Kabupaten:</label>
          <select name="kota" id="kota" class="form-control">
            <option value="Semarang">Semarang</option>
            <option value="Jakarta">Jakarta</option>
            <option value="Bandung">Bandung</option>
            <option value="Surabaya">Surabaya</option>
          </select>
          <div class="error text-danger"><?php if(isset($error_kota)) echo $error_kota;?></div>
        </div>
        <label>Jenis Kelamin:</label>
        <div class="form-check">
          <label class="form-check-label">
            <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria">Pria 
          </label>
        </div>
        <div class="form-check">
          <label class="form-check-label">
            <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita">Wanita 
          </label>
        </div>
        <div class="error text-danger"><?php if(isset($error_jenis_kelamin)) echo $error_jenis_kelamin;?></div>
        <br>
        <label>Peminatan: </label>
        <div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="minat[]" value="coding">Coding
          </label>
        </div>
        <div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="minat[]" value="ux_design">UX Design
          </label>
        </div>
        <div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="minat[]" value="data_science">Data Science
          </label>
        </div>
        <div class="error text-danger"><?php if(isset($error_minat)) echo $error_minat;?></div>
        <br>
        <!-- submit, reset dan button -->
        <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
        <button type="reset" class="btn btn-danger" value="reset">Reset</button>
      </form>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>