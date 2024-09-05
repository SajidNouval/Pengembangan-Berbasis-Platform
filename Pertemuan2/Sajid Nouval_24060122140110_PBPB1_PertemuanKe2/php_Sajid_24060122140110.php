<?php
function hitung_rata($array) {
    $total = array_sum($array);
    $jumlah = count($array);
    return $total / $jumlah;
}

function print_mhs($array_mhs) {
    echo "
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        table {
            border-collapse: collapse;
            text-align: center;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
        }
    </style>";
    echo "<table>";
    echo "<tr><th>Nama</th><th>Nilai 1</th><th>Nilai 2</th><th>Nilai 3</th><th>Rata2</th></tr>";
    
    $new_array_mhs = [];
    foreach ($array_mhs as $nama => $nilai) {
        if (!isset($new_array_mhs[$nama])) {
            $new_array_mhs[$nama] = $nilai;
        } else {
            $new_array_mhs[$nama] = array_map(function ($a, $b) {
                return ($a + $b) / 2;
            }, $new_array_mhs[$nama], $nilai);
        }
    }
    
    foreach ($new_array_mhs as $nama => $nilai) {
        $rata2 = hitung_rata($nilai);
        echo "<tr>";
        echo "<td>$nama</td>";
        echo "<td>{$nilai[0]}</td>";
        echo "<td>{$nilai[1]}</td>";
        echo "<td>{$nilai[2]}</td>";
        echo "<td>$rata2</td>";
        echo "</tr>";
    }
    
    echo "</table>";
}

$array_mhs = array(
    'Abdul' => array(89, 90, 54),
    'Budi' => array(78, 60, 64),
    'Nina' => array(67, 56, 84),
    'Budi' => array(87, 69, 50),
    'Budi' => array(98, 65, 74)
);

print_mhs($array_mhs);
?>
