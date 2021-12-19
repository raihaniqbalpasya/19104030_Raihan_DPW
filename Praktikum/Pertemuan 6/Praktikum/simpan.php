<!-- BAGIAN PRAKTIKUM DAN TUGAS -->
<?php
    include "koneksi.php"; //memanggil seluruh fungsi yang terdapat pada file koneksi.php
    include "create_message.php"; //memanggil seluruh fungsi yang terdapat pada file create_message.php

    //TUGAS inisiasi variabel yang dibutuhkan
    $nama = $_POST['nama']; 
    $kelas = $_POST['kelas']; 
    $alamat = $_POST['alamat']; 
    $image = $_POST['gambar']; 
    $nama_gambar = $_FILES['gambar']['name'];
    $gambar = $_FILES['gambar']['tmp_name'];
    $folder = './uploads/';

    //TUGAS update data mahasiswa
    if(isset($_POST['mahasiswa_id'])) {

        $sql = "UPDATE data SET nama='$nama', kelas='$kelas', alamat='$alamat', gambar='$image' where id=".$_POST['mahasiswa_id'];
        
        $edit = $conn->query($sql);

        if($edit) {
            $conn->close();
            create_message('Ubah data berhasil','success','check');
            header("location:".$_SERVER['HTTP_REFERER']);
            exit();
        } else {
            $conn->close();
            create_message("Error: " . $sql . "<br>" . $conn->error,"danger","warning");
            header("location:".$_SERVER['HTTP_REFERER']);
            exit();
        }
    } else {

        //TUGAS insert data mahasiswa
        move_uploaded_file($gambar, $folder.$nama_gambar);
        //menginput data nama, kelas, dan alamat kedalam tabel data
        $sql = "insert into data(nama, kelas, alamat, gambar) values('$nama', '$kelas', '$alamat', '$nama_gambar')";

        $add = $conn->query($sql); //melakukan koneksi ke database dan menjalankan query pada $sql

        if($add){ //jika koneksi dan query pada variabel $add sudah berhasil dijalankan
            $conn->close(); //maka koneksi akan ditutup
            create_message('Simpan data berhasil','success','check');
            header("location:".$_SERVER['HTTP_REFERER']);
            exit(); //kemudian menghentikan fungsi saat ini
        } else { //namun jika koneksi dan query pada variabel $add gagal
            $conn->close();
            create_message("Error: " . $sql . "<br>" . $conn->error,"danger","warning");
            header("location:".$_SERVER['HTTP_REFERER']);
            exit();
        }
    }
?>