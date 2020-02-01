<?php 
    $konek = mysqli_connect("localhost","root","","wilayah");
 
    if (mysqli_connect_errno()){
        echo "Koneksi database gagal : " . mysqli_connect_error();
    }
?>