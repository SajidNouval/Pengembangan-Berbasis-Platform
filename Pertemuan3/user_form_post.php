<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <title>Praktikum PBP D1 | Pertemuan 3</title>

  <!--
    Penjelasan:
    Perbedaan antara method GET pada file user_form_get.php dengan
    method POST pada file user_form_post.php adalah pada saat kita mengirim form tersebut.
    Pada method GET, data yang dikirimkan akan ditampilkan pada URL.
    Sedangkan pada method POST, data yang dikirimkan tidak akan ditampilkan pada URL.
    
    Yang lebih baik antara method GET atau POST, menurut saya tergantung penggunaannya.
    Jika data yang dikirimkan tidak sensitif, maka lebih baik menggunakan method GET.
    Namun jika data yang dikirimkan sensitif, maka lebih baik menggunakan method POST.
    Hal ini karena jika kita menggunakan method GET, semua user akan dapat melihat data yang
    dikirimkan oleh user lain melalui URL serta data yang dikirimkan akan tersimpan pada history browser.
    Sehingga jika data yang dikirimkan merupakan data sensitif seperti akses login user,
    maka method POST lebih baik digunakan.
  -->

</head>
<body class="container">
  <div class="card">
    <div class="card-header">Form Mahasiswa</div>
    <div class="card-body">
      <form action="" method="POST" class="">
        <div class="form-group">
          <label for="nama">Nama:</label>
          <input type="text" class="form-control" id="nama" name="nama" maxlength="50">
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
          <label for="kota">Kota / Kabupaten:</label>
          <select name="kota" id="kota" class="form-control">
            <option value="Semarang">Semarang</option>
            <option value="Jakarta">Jakarta</option>
            <option value="Bandung">Bandung</option>
            <option value="Surabaya">Surabaya</option>
          </select>
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
        <br>
        <!-- submit, reset dan button -->
        <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
        <button type="reset" class="btn btn-danger" value="reset">Reset</button>
      </form>
      <br>
      <?php 
        if (isset($_POST['submit'])){
          echo '<h3>Your Input:</h3>';
          echo 'Nama = ' . $_POST['nama'] . '<br>';
          echo 'Email = ' . $_POST['email'] . '<br>';
          echo 'Kota = ' . $_POST['kota'] . '<br>';
          echo 'Jenis Kelamin = ' . $_POST['jenis_kelamin'] . '<br>';
          // echo 'Minat = ' . $_POST['minat'] . '<br>';

          $minat = $_POST['minat'];
          if (!empty($minat)){
            echo 'Peminatan yang dipilih: ';
            foreach($minat as $minat_item) {
              echo '<br />' , $minat_item;
            }
          }
        }
      ?>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>