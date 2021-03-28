<?php
include 'functions.php';

$id_mahasiswa = $_GET["id_mahasiswa"];

$mhs = query("SELECT*FROM datamhs WHERE id_mahasiswa = $id_mahasiswa")[0];

if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) {
        echo "
        <script>
        alert('Data berhasil diubah!');
        document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data gagal diubah!');
        document.location.href = 'index.php';
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <h1 class="header">Ubah Data Mahasiswa</h1>
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_mahasiswa" value="<?= $mhs["id_mahasiswa"]; ?>">
            <input type="hidden" name="fotoLama" value="<?= $mhs["foto"]; ?>">

            <div class="form-group"><label for="nim">NIM</label>
                <input type="text" name="nim" id="nim" required class="form-control" value="<?= $mhs["nim"] ?>">
            </div>
            <div class="form-group">
                <label for="nama_mahasiswa">Nama</label>
                <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" required class="form-control" value="<?= $mhs["nama_mahasiswa"] ?>">
            </div>
            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" required class="form-control" value="<?= $mhs["tempat_lahir"] ?>">
            </div>

            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" required class="form-control" value="<?= $mhs["tempat_lahir"] ?>">
            </div>
            <div class="form-group">
                <label for="agama">Agama</label>
                <select name="agama" id="agama" class="form-control">
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <div class="form-check">
                    <input type="radio" name="jenis_kelamin" id="laki-laki" value="Laki-laki" checked class="form-check-input">
                    <label for="laki-laki" class="form-check-label">Laki-laki</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" class="form-check-input">
                    <label for="perempuan" class="form-check-label">Perempuan</label>
                </div>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" required class="form-control" value="<?= $mhs["alamat"] ?>">
            </div>
            <div class="form-group">
                <label for="no_hp">No. Handphone</label>
                <input type="text" name="no_hp" id="no_hp" class="form-control" value="<?= $mhs["no_hp"] ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?= $mhs["email"] ?>">
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <select name="jurusan" id="jurusan" class="form-control">
                    <option value="Teknik Sipil">Teknik Sipil</option>
                    <option value="Teknik Mesin">Teknik Mesin</option>
                    <option value="Teknik Kimia">Teknik Kimia</option>
                    <option value="Teknik Elektro">Teknik Elektro</option>
                    <option value="Akuntansi">Akuntansi</option>
                    <option value="Administrasi Bisnis">Administrasi Bisnis</option>
                    <option value="Teknik Komputer">Teknik Komputer</option>
                    <option value="Manajemen Informatika">Manajemen Informatika</option>
                    <option value="Bahasa Inggris">Bahasa Inggris</option>
                </select>
            </div>
            <div class="form-group">
                <label for="foto">Foto</label> <br>
                <img src="img/<?= $mhs['foto'] ?>" alt="" width="100"> <br>
                <input type="file" name="foto" id="foto" class="form-control">
            </div>
            <button type="submit" name="submit" class="btn btn-success">Ubah Data</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>