<?php
$koneksi = mysqli_connect("localhost", "root", "", "mahasiswa");
if (!$koneksi) {
    die("Koneksi database gagal! : " . mysqli_connect_error());
}


function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data)
{
    global $koneksi;
    $nim = $data["nim"];
    $nama_mahasiswa = $data["nama_mahasiswa"];
    $tempat_lahir = $data["tempat_lahir"];
    $tgl_lahir = $data["tgl_lahir"];
    $agama = $data["agama"];
    $jenis_kelamin = $data["jenis_kelamin"];
    $alamat = $data["alamat"];
    $no_hp = $data["no_hp"];
    $email = $data["email"];
    $jurusan = $data["jurusan"];
    $foto = upload();
    if (!$foto) {
        return false;
    }

    $query = "INSERT INTO datamhs VALUES
    ('', '$nim', '$nama_mahasiswa', '$tempat_lahir', '$tgl_lahir', '$agama', '$jenis_kelamin', '$alamat', ' $no_hp', '$email', '$jurusan', '$foto')
    ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}


function upload()
{
    $namaFile = $_FILES['foto']['name'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    if ($error === 4) {
        echo "
        <script>
        alert('Upload foto terlebih dahulu!');
        </script>
        ";
        return false;
    }

    $ekstensiFotoValid = ['jpg', 'jpeg', 'png'];
    $ekstensiFoto = explode('.', $namaFile);
    $ekstensiFoto = strtolower(end($ekstensiFoto));

    if (!in_array($ekstensiFoto, $ekstensiFotoValid)) {
        echo "
        <script>
        alert('Upload foto dengan format JPG/JPEG/PNG!');
        </script>
        ";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiFoto;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
}


function hapus($id_mahasiswa)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM datamhs WHERE id_mahasiswa = $id_mahasiswa");
    return mysqli_affected_rows($koneksi);
}


function ubah($data)
{
    global $koneksi;
    $id_mahasiswa = $data["id_mahasiswa"];
    $nim = $data["nim"];
    $nama_mahasiswa = $data["nama_mahasiswa"];
    $tempat_lahir = $data["tempat_lahir"];
    $tgl_lahir = $data["tgl_lahir"];
    $agama = $data["agama"];
    $jenis_kelamin = $data["jenis_kelamin"];
    $alamat = $data["alamat"];
    $no_hp = $data["no_hp"];
    $email = $data["email"];
    $jurusan = $data["jurusan"];
    $fotoLama = $data["fotoLama"];

    if ($_FILES['foto']['error'] === 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload();
    }

    $query = "UPDATE datamhs SET
    nim = '$nim',
    nama_mahasiswa = '$nama_mahasiswa',
    tempat_lahir = '$tempat_lahir',
    tgl_lahir = '$tgl_lahir',
    agama = '$agama',
    jenis_kelamin = '$jenis_kelamin',
    alamat = '$alamat',
    no_hp = '$no_hp',
    email = '$email',
    jurusan = '$jurusan',
    foto = '$foto'
    WHERE id_mahasiswa = $id_mahasiswa
    ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
