<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <title>Praktikum PBP B1 | Pertemuan 3</title>

  <!-- 
    Penjelasan:
    Adanya perbedaan penamaan dan pengaksesan pada field hobby dengan field lainnya
    dikarenakan bentuk inputannya yang berupa checkbox.
    Dimana dalam satu field, user dapat memilih lebih dari satu nilai.
    Sehingga diperlukan array untuk menampung nilai yang dipilih oleh user.
    Dan oleh sebab itu untuk mengakses nilai yang dipilih oleh user,
    kita menggunakan perulangan.
  -->

</head>
<body class="container">
  <div class="card">
    <div class="card-header">Form Mahasiswa</div>
    <div class="card-body">
      <form action="" method="GET" class="">
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
        if (isset($_GET['submit'])){
          echo '<h3>Your Input:</h3>';
          echo 'Nama = ' . $_GET['nama'] . '<br>';
          echo 'Email = ' . $_GET['email'] . '<br>';
          echo 'Kota = ' . $_GET['kota'] . '<br>';
          echo 'Jenis Kelamin = ' . $_GET['jenis_kelamin'] . '<br>';
          // echo 'Minat = ' . $_GET['minat'] . '<br>';

          $minat = $_GET['minat'];
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