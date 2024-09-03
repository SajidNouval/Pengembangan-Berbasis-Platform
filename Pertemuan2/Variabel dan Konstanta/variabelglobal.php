<?php
// Define a function 
function diskon1( ){ 
    // Define harga as a global variable 
    global $harga; 
    // Multiple harga by 0.8 
    $harga = 0.8 * $harga; 
} 
// Set harga 
$harga = 2000; 
// Call the function 
diskon1( ); 
// Display the age 
echo 'harga = '.$harga.'<br />'; 
?>