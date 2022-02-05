<?php
    /*BAGIAN PRAKTIKUM*/
    include "koneksi.php"; //memanggil seluruh fungsi yang terdapat pada file koneksi.php
    session_start();
    $kelas = ['SE-03-A', 'SE-03-B']; //data array untuk memilih kelas
    $sql = "Select * from data"; //mengambil seluruh data mahasiswa pada tabel data
    $data = $conn->query($sql); //melakukan koneksi ke database dan menjalankan query pada $sql

    /*BAGIAN TUGAS*/
    //menghitung jumlah data pada tabel
    $get = mysqli_query($conn,"Select * from data"); //mengambil total data pada tabel
    $jumlah = mysqli_num_rows($get); /*menjalankan query pada variabel $get  dan menghitung jumlah seluruh kolom pada tabel (karena data 1 mahasiswa berada dalam 1 kolom)*/
?>

<!-- BAGIAN PRAKTIKUM -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/d2e84c86a6.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <title>CRUD PHP</title>
  </head>

  <body>

    <div class="container">
        <h1 class="text-center mt-5 mb-5">Form Mahasiswa</h1>
        <div class="row">
            <div class="col-lg-6 mb-5">
                <h4>Input Data</h4>
                <?php include "read_message.php" ?>
            </div>

            <!-- memberikan tujuan data pada form ke file simpan.php dengan method post -->
            <form action="simpan.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" placeholder="Nama" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <select name="kelas" class="form-control" required>
                        <option value="">Pilih</option>
                        <!-- menampilkan data array kelas pada tampilan html dengan tag option -->
                        <?php foreach($kelas as $kl) : ?>
                        <option value="<?= $kl; ?>"><?= $kl; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" placeholder="Alamat" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="gambar">Gambar</label> <br>
                    <input type="file" name="gambar" id="gambar" onchange="loadfile(event)">
                </div>

                <!-- TUGAS preview gambar -->
                <div class="form-group text-center">
                    <img id="preimage" src="uploads/<?= $dt['gambar']; ?>" width="500px" height="500px">
                        <script type="text/javascript">
                            function loadfile(event){
                                var output = document.getElementById('preimage');
                                output.src = URL.createObjectURL(event.target.files[0]);
                            };
                        </script>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>

        <div class="col-lg-6">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Data Mahasiswa</span>
                    <button type="button" class="btn btn-dark" style="width:40px; height:40px; border-radius:50%;">
                        <p class="text-center" style="font-size:20px; position:absolute; top:5px;"><?= $jumlah; ?></p> <!-- memanggil data jumlah -->
                    </button>
                </h4>
                
                <!-- melakukan perulangan foreach untuk menampilkan setiap data nama, kelas, dan alamat mahasiswa yang sudah diinput pada html -->
                <?php foreach($data as $dt) : ?>
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- TUGAS insert gambar pada data mahasiswa -->
                                <img src="uploads/<?= $dt['gambar']; ?>" width="100px" height="100px"> 
                            </div>
                            <div style="position:absolute; left:130px">
                                <!-- memanggil data nama -->
                                <h4><?= $dt['nama']; ?></h4>
                            </div>
                            
                            <div class="col-md-6">
                                <a class="float-right ml-3 text-danger" href="hapus_data.php?mahasiswa_id=<?php echo $dt['id']?>" type="button" class="close">
                                    <span class="fa fa-trash"></span>
                                </a>

                                <input type="hidden" name="del" value="<?= $dt['gambar']; ?>">
                                <a class="float-right ml-3 text-success" href="update_form.php?mahasiswa_id=<?php echo $dt['id']?>" type="button" class="close">
                                    <span class="fa fa-edit"></span>
                                </a>

                                <!-- memanggil data kelas -->
                                <p class="text-right"><?= $dt['kelas']; ?></p>
                            </div>
                        </div>
                        <div class="row float-right">
                            <div class="col-md-12">
                                <!-- memanggil data alamat -->
                                <p><?= $dt['alamat']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
               <?php endforeach; ?>
               <!-- perulangan berakhir -->
            </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </body>
</html>