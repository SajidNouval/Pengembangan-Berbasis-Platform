<?php
$nilai = 'AB'; 
switch ($nilai) { 
case "A": 
echo "Sangat Baik. <br />"; 
break; 
case "B": 
echo "Baik. <br />"; 
break; 
case "C": 
echo "Cukup. <br />"; 
break; 
case "D": 
echo "Kurang. <br />"; 
break; 
case "E": 
echo "Tidak Lulus. <br />"; 
break; 
default: 
echo "Invalid nilai! <br />"; 
break; 
}
?>