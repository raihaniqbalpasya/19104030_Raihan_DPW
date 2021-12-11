<!-- BAGIAN LATIHAN PRAKTIKUM -->
<?php
    include "koneksi.php"; //memanggil seluruh fungsi yang terdapat pada file koneksi.php

    $nama = $_POST['nama']; //mengambil atau menangkap data nama yang diinput pada form html
    $kelas = $_POST['kelas']; //mengambil atau menangkap data kelas yang diinput pada form html
    $alamat = $_POST['alamat']; //mengambil atau menangkap data alamat yang diinput pada form html

    //menginput data nama, kelas, dan alamat kedalam tabel data
    $sql = "insert into data(nama, kelas, alamat) values('$nama', '$kelas', '$alamat')";
    $add = $conn->query($sql); //melakukan koneksi ke database dan menjalankan query pada $sql

    if($add){ //jika koneksi dan query pada variabel $add sudah berhasil dijalankan
        $conn->close(); //maka koneksi akan ditutup
        header("location:index.php"); //lalu melakukan redirect ke file index.php
        exit(); //kemudian menghentikan fungsi saat ini
    }else { //namun jika koneksi dan query pada variabel $add gagal
        echo "Error : ".$conn->error; //maka akan muncul peringatan / pesan Error
        $conn->close(); //lalu koneksi akan ditutup
        exit(); //kemudian menghentikan fungsi saat ini
    }
?>