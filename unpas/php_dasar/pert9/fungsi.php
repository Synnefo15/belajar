<?php
// * koneksi

$conn = mysqli_connect("localhost", "root", "", "dblatihan");

function query($query)
{
    // & agar $conn bisa kedetect
    global $conn;
    $result = mysqli_query($conn, $query);
    // & $rows -> menyiapkan wadah/kotak. $result -> lemari. $row -> baju yg diambil tiap looping
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;
    // &  ambil data tiap el dari form utk disave ke var
    // &  nyimpen ke variabel
    // &  htmlspecchart utk antisipasi hack
    $nim        = htmlspecialchars($data["nim"]);
    $nama       = htmlspecialchars($data["nama"]);
    $email      = htmlspecialchars($data["email"]);
    $jurusan    = htmlspecialchars($data["jurusan"]);
    $gambar     = htmlspecialchars($data["gambar"]);

    // * query insert data
    $query  = "INSERT INTO mahasiswa_unpas
                VALUES 
                ('','$nim','$nama','$email','$jurusan','$gambar')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa_unpas WHERE id=$id");
    return mysqli_affected_rows($conn);
}
