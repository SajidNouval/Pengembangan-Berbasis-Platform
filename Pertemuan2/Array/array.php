<?php
//assignment melalui array identifier 
for ($i=0;$i<10;$i++){ 
    $diskon[] = $i * 5; 
   } 
    
   //assignment menggunakan fungsi array 
   //$diskon = array(0,10,20,30,40,50,60,70,80,90); 
   //cek apakah sebuah variabel bertipe array 
   if (is_array($diskon)) 
   echo 'Array'; 
   else 
   echo 'Not Array'; 
   //menampilkan isi array 
   $n = sizeof($diskon); 
   for($i=0;$i<=($n-1);$i++){ 
   echo 'Diskon hari ke-'.($i+1).'  =  '.$diskon[$i].' % <br />'; 
   } 
?>