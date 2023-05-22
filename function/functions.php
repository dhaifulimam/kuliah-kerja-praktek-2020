<?php
$conn = mysqli_connect("localhost", "root", "", "datakoperasi");


function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;

    $namakoperasi = strtolower(htmlspecialchars($data["namakoperasi"]));
    $alamat = htmlspecialchars($data["alamat"]);
    $isi = strval(htmlspecialchars($data["isi"]));

    $hero = upload();

    if (!$hero) {
        return false;
    }

    $result = mysqli_query($conn, "SELECT nama_koperasi FROM koperasi WHERE nama_koperasi = '$namakoperasi'");


    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                    alert('nama koperasi telah terdaftar');
                  </script>";
        return false;
    }

    $query = "INSERT INTO koperasi
                    VALUES
                 ('', '$namakoperasi', '$alamat', '$isi', '$hero')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {
        echo "<script>
                    alert('pilih gambar dulu');
                  </script>";
        return false;
    }

    $ekstensigambarvalid = ['jpg', 'jpeg', 'png'];
    $ekstensigambar = explode('.', $namaFile);
    $ekstensigambar = strtolower(end($ekstensigambar));

    if (!in_array($ekstensigambar, $ekstensigambarvalid)) {
        echo "<script>
                    alert('yang anda upload bukan gambar');
                  </script>";
        return false;
    }


    $namaFilebaru = uniqid();
    $namaFilebaru .= '.';
    $namaFilebaru .= $ekstensigambar;

    $nama_dir = '../imgcontent';

    move_uploaded_file($tmpName, "$nama_dir/$namaFilebaru");

    return $namaFilebaru;
}


function hapus($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM koperasi WHERE id = $id");

    return mysqli_affected_rows($conn);
}


function ubah($data)
{
    global $conn;

    $id = $data["id"];
    $namakoperasi = htmlspecialchars($data["namakoperasi"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $isi = htmlspecialchars($data["isi"]);

    $gambarlama = htmlspecialchars($data["gambarlama"]);


    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarlama;
    } else {
        $gambar = upload();
    }

    if (!$gambar) {
        return false;
    }

    $query = "UPDATE koperasi SET
                    nama_koperasi = '$namakoperasi',
                    alamat = '$alamat', 
                    isi_koperasi = '$isi',
                    gambar_koperasi = '$gambar'
                    WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "SELECT * FROM pelayanan WHERE 
                    nik LIKE '%$keyword%' OR
                    nama LIKE '%$keyword%' OR
                    alamat LIKE '%$keyword%'
                    ";

    return query($query);
}

function daftar($data)
{

    global $conn;

    // $username = strtolower(stripslashes($data["username"]));
    $nama = $data["nama"];
    $username = $data["username"];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);


    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username' ");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                    alert('username telah terdaftar');
                  </script>";
        return false;
    }

    if ($password !== $password2) {
        echo "<script>
                    alert('password tidak sesuai');
                  </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    // $password = md5($password);

    mysqli_query($conn, "INSERT INTO user VALUES('','$nama', '$username', '$password')");

    return mysqli_affected_rows($conn);
}
