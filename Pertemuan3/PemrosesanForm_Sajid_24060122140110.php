<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            max-width: 400px;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="radio"] {
            margin-right: 10px;
        }
        .checkbox-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        input[type="submit"],
        input[type="reset"] {
            background-color: green;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="reset"] {
            background-color: #dc3545;
        }
        input[type="submit"]:hover,
        input[type="reset"]:hover {
            opacity: 0.9;
        }
        .error {
            color: red;
            font-size: 12px;
        }
    </style>
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

<div class="form-container">
    <h2>Form Input Siswa</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group">
            <label>NIS:</label>
            <input type="text" name="nis" value="<?php echo $nis;?>">
            <span class="error">* <?php echo $nisErr;?></span>
        </div>

        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="name" value="<?php echo $name;?>">
            <span class="error">* <?php echo $nameErr;?></span>
        </div>

        <div class="form-group">
            <label>Jenis Kelamin:</label>
            <input type="radio" name="gender" value="Pria" <?php if (isset($gender) && $gender == "Pria") echo "checked";?>>Pria
            <input type="radio" name="gender" value="Wanita" <?php if (isset($gender) && $gender == "Wanita") echo "checked";?>>Wanita
            <span class="error">* <?php echo $genderErr;?></span>
        </div>

        <div class="form-group">
            <label>Kelas:</label>
            <select name="kelas">
                <option value="">--Pilih Kelas--</option>
                <option value="X" <?php if ($kelas == "X") echo "selected";?>>X</option>
                <option value="XI" <?php if ($kelas == "XI") echo "selected";?>>XI</option>
                <option value="XII" <?php if ($kelas == "XII") echo "selected";?>>XII</option>
            </select>
            <span class="error">* <?php echo $kelasErr;?></span>
        </div>

        <?php if ($kelas == "X" || $kelas == "XI") { ?>
        <div class="form-group">
            <label>Ekstrakurikuler:</label>
            <div class="checkbox-group">
                <label><input type="checkbox" name="extracurricular[]" value="Pramuka" <?php if (in_array("Pramuka", $extracurricular)) echo "checked";?>>Pramuka</label>
                <label><input type="checkbox" name="extracurricular[]" value="Seni Tari" <?php if (in_array("Seni Tari", $extracurricular)) echo "checked";?>>Seni Tari</label>
                <label><input type="checkbox" name="extracurricular[]" value="Sinematografi" <?php if (in_array("Sinematografi", $extracurricular)) echo "checked";?>>Sinematografi</label>
                <label><input type="checkbox" name="extracurricular[]" value="Basket" <?php if (in_array("Basket", $extracurricular)) echo "checked";?>>Basket</label>
            </div>
            <span class="error">* <?php echo $extracurricularErr;?></span>
        </div>
        <?php } ?>

        <div class="form-actions">
            <input type="submit" name="submit" value="Submit">
            <input type="reset" name="reset" value="Reset">
        </div>
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($nisErr) && empty($nameErr) && empty($genderErr) && empty($kelasErr) && empty($extracurricularErr)) {
    echo "<div class='form-container'>";
    echo "<h2>Form Terisi</h2>";
    echo "NIS: $nis<br>";
    echo "Name: $name<br>";
    echo "Gender: $gender<br>";
    echo "Kelas: $kelas<br>";
    if (!empty($extracurricular)) {
        echo "Ekstrakurikuler: " . implode(", ", $extracurricular) . "<br>";
    }
    echo "</div>";
}
?>
</body>
</html>