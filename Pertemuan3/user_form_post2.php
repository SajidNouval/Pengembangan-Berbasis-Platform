<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <title>Praktikum PBP D1 | Pertemuan 3</title>

  <!--
    Penjelasan:
    Setelah semua selesai, isi form yang sebelumnya
    sudah ditampilkan dengan benar.
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
          <input type="text" class="form-control" id="nama" name="nama" maxlength="50" value="<?php if(isset($nama)) echo $nama;?>">
          <div class="error text-danger"><?php if(isset($error_nama)) echo $error_nama;?></div>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" name="email" value="<?php if(isset($email)) echo $email;?>">
          <div class="error text-danger"><?php if(isset($error_email)) echo $error_email;?></div>
        </div>
        <div class="form-group">
          <label for="alamat">Alamat:</label>
          <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="10">
          <?php if(isset($alamat)) {echo $alamat;}?>
          </textarea>
          <div class="error text-danger"><?php if(isset($error_alamat)) echo $error_alamat;?></div>
        </div>
        <div class="form-group">
          <label for="kota">Kota / Kabupaten:</label>
          <select name="kota" id="kota" class="form-control">
            <option value="Semarang" <?php if ((isset($kota)) && $kota=="Semarang") echo 'selected="true"';?> >Semarang</option>
            <option value="Jakarta" <?php if ((isset($kota)) && $kota=="Jakarta") echo 'selected="true"';?> >Jakarta</option>
            <option value="Bandung" <?php if ((isset($kota)) && $kota=="Bandung") echo 'selected="true"';?> >Bandung</option>
            <option value="Surabaya" <?php if ((isset($kota)) && $kota=="Surabaya") echo 'selected="true"';?> >Surabaya</option>
          </select>
          <div class="error text-danger"><?php if(isset($error_kota)) echo $error_kota;?></div>
        </div>
        <label>Jenis Kelamin:</label>
        <div class="form-check">
          <label class="form-check-label">
            <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria" <?php if(isset($jenis_kelamin) && $jenis_kelamin == "pria") echo "checked" ?> >Pria 
          </label>
        </div>
        <div class="form-check">
          <label class="form-check-label">
            <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita" <?php if(isset($jenis_kelamin) && $jenis_kelamin == "wanita") echo "checked" ?>>Wanita 
          </label>
        </div>
        <div class="error text-danger"><?php if(isset($error_jenis_kelamin)) echo $error_jenis_kelamin;?></div>
        <br>
        <label>Peminatan: </label>
        <div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="minat[]" value="coding" <?php if(isset($minat) && in_array("coding", $minat)) echo "checked" ?>>Coding
          </label>
        </div>
        <div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="minat[]" value="ux_design" <?php if(isset($minat) && in_array("ux_design", $minat)) echo "checked" ?>>UX Design
          </label>
        </div>
        <div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="minat[]" value="data_science" <?php if(isset($minat) && in_array("data_science", $minat)) echo "checked" ?>>Data Science
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