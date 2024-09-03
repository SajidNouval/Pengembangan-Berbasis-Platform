<?php
$nilai = 60; 
if ($nilai >= 80 && $nilai <= 100){ 
echo 'Nilai : A <br />'; 
}elseif ($nilai >= 60 && $nilai < 80){ 
echo 'Nilai : B <br />'; 
}elseif ($nilai >= 40 && $nilai < 60){ 
echo 'Nilai : C <br />'; 
}elseif ($nilai >= 20 && $nilai < 40){ 
echo 'Nilai : D <br />'; 
}elseif ($nilai >= 0 && $nilai < 20){ 
echo 'Nilai : E <br />'; 
}else{ 
echo 'Invalid nilai <br />'; 
} 
?>