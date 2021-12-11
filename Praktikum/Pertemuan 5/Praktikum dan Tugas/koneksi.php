<!-- BAGIAN PRAKTIKUM -->
<?php
    $host = "localhost"; //inisiasi host database
    $user = "root"; //inisiasi username database
    $pass = ""; //inisiasi password database
    $dbname = "php_crud"; //inisiasi database yang ingin digunakan

    //membuat koneksi ke server mysql
    $conn = new mysqli($host,$user,$pass,$dbname);

    //pengecekan koneksi ke database mysql
    if($conn->connect_error){ //jika koneksi ke database error atau gagal
        die('Koneksi Gagal : '. $conn->connect_error); //maka koneksi akan dihentikan dan muncul peringatan / pesan koneksi gagal
    }
?>