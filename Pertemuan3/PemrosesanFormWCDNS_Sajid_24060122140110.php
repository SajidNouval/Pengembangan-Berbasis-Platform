<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>

<?php
$nis = $name = $gender = $kelas = "";
$extracurricular = [];
$nisErr = $nameErr = $genderErr = $kelasErr = $extracurricularErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // bagian nis
    if (empty($_POST["nis"])) {
        $nisErr = "Masukan NIS";
    } elseif (!preg_match("/^[0-9]{10}$/", $_POST["nis"])) {
        $nisErr = "NIS Berisi 10 Digit";
    } else {
        $nis = $_POST["nis"];
    }
    // bagian nama
    if (empty($_POST["name"])) {
        $nameErr = "Masukan Nama";
    } else {
        $name = $_POST["name"];
    }
    // bagian jenis kelamin
    if (empty($_POST["gender"])) {
        $genderErr = "Masukan Jenis Kelamin";
    } else {
        $gender = $_POST["gender"];
    }
    // bagian kelas
    if (empty($_POST["kelas"])) {
        $kelasErr = "Mauskan Kelas";
    } else {
        $kelas = $_POST["kelas"];
    }
    // bagian ekstrakurikuler kusus kelas x dan xi,
    if ($kelas == "X" || $kelas == "XI") {
        if (empty($_POST["extracurricular"])) {
            $extracurricularErr = "Minimal Memilih 1 Ekstrakurikuler";
        } elseif (count($_POST["extracurricular"]) < 1 || count($_POST["extracurricular"]) > 3) {
            $extracurricularErr = "Minimal Memilih 1, Maksimal Memilih 3";
        } else {
            $extracurricular = $_POST["extracurricular"];
        }
    }
}
?>

<div class="container mt-5">
    <div class="form-container">
        <h2 class="text-center">Form Input Siswa</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="needs-validation" novalidate>
            <div class="form-group mb-3">
                <label for="nis" class="form-label">NIS:</label>
                <input type="text" class="form-control" name="nis" value="<?php echo $nis;?>" required>
                <div class="text-danger"><?php echo $nisErr;?></div>
            </div>

            <div class="form-group mb-3">
                <label for="name" class="form-label">Nama:</label>
                <input type="text" class="form-control" name="name" value="<?php echo $name;?>" required>
                <div class="text-danger"><?php echo $nameErr;?></div>
            </div>

            <div class="form-group mb-3">
                <label for="gender" class="form-label">Jenis Kelamin:</label>
                <div>
                    <input type="radio" name="gender" value="Pria" <?php if (isset($gender) && $gender == "Pria") echo "checked";?>> Pria
                    <input type="radio" name="gender" value="Wanita" <?php if (isset($gender) && $gender == "Wanita") echo "checked";?>> Wanita
                </div>
                <div class="text-danger"><?php echo $genderErr;?></div>
            </div>

            <div class="form-group mb-3">
                <label for="kelas" class="form-label">Kelas:</label>
                <select name="kelas" class="form-select" required>
                    <option value="">--Pilih Kelas--</option>
                    <option value="X" <?php if ($kelas == "X") echo "selected";?>>X</option>
                    <option value="XI" <?php if ($kelas == "XI") echo "selected";?>>XI</option>
                    <option value="XII" <?php if ($kelas == "XII") echo "selected";?>>XII</option>
                </select>
                <div class="text-danger"><?php echo $kelasErr;?></div>
            </div>

            <?php if ($kelas == "X" || $kelas == "XI") { ?>
            <div class="form-group mb-3">
                <label for="extracurricular" class="form-label">Ekstrakurikuler:</label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="extracurricular[]" value="Pramuka" <?php if (in_array("Pramuka", $extracurricular)) echo "checked";?>>
                    <label class="form-check-label">Pramuka</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="extracurricular[]" value="Seni Tari" <?php if (in_array("Seni Tari", $extracurricular)) echo "checked";?>>
                    <label class="form-check-label">Seni Tari</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="extracurricular[]" value="Sinematografi" <?php if (in_array("Sinematografi", $extracurricular)) echo "checked";?>>
                    <label class="form-check-label">Sinematografi</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="extracurricular[]" value="Basket" <?php if (in_array("Basket", $extracurricular)) echo "checked";?>>
                    <label class="form-check-label">Basket</label>
                </div>
                <div class="text-danger"><?php echo $extracurricularErr;?></div>
            </div>
            <?php } ?>

            <div class="form-actions d-flex justify-content-between">
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </form>
    </div>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($nisErr) && empty($nameErr) && empty($genderErr) && empty($kelasErr) && empty($extracurricularErr)) {
    echo "<div class='container mt-5'>";
    echo "<div class='alert alert-success'>";
    echo "<h4>Form Terisi</h4>";
    echo "NIS: $nis<br>";
    echo "Name: $name<br>";
    echo "Gender: $gender<br>";
    echo "Kelas: $kelas<br>";
    if (!empty($extracurricular)) {
        echo "Ekstrakurikuler: " . implode(", ", $extracurricular) . "<br>";
    }
    echo "</div></div>";
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pO5LwzJ2RxzB1lPqA1rOgMqnXp5u8IczBcyBZZkEitcXj4LReG9G0iF5ls0I1I5" crossorigin="anonymous"></script>
</body>
</html>
