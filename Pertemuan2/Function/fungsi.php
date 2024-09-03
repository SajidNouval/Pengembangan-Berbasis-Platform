<?php
function hitung_diskon($harga,$diskon){ 
    $harga = $harga - ($harga*$diskon/100); 
    return $harga; 
    } 

    
function faktorial($n)   
{ 
 if($n == 0){ 
  return 1; 
 }else{ 
  return $n * faktorial($n-1); 
 } 
}   
?>
