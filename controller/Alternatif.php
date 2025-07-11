<?php
function Koneksi()
{
    return mysqli_connect("localhost", "root", "", "belajar");
}

function Index($query)
{
    $koneksi = Koneksi();
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function Add($table, $data)
{
    $koneksi = Koneksi();
    $kode = htmlspecialchars($data["kode_alternatif"]);
    $namaguru = htmlspecialchars($data["nm_guru"]);
    $query = "INSERT INTO $table VALUES (null, '$kode', '$namaguru')";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function Edit($table, $data)
{
    $koneksi = Koneksi();
    $idguru = htmlspecialchars($data["id_guru"]);
    $kode = htmlspecialchars($data["kode_alternatif"]);
    $namaguru = htmlspecialchars($data["nm_guru"]);
    $query = "UPDATE $table SET kode_alternatif = '$kode', nm_guru = '$namaguru' WHERE id_guru = $idguru";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function Delete($table, $tableid, $id)
{
    $koneksi = Koneksi();

    // Fungsi pengecekan apakah tabel ada
    function TableExists($koneksi, $tableName)
    {
        $result = mysqli_query($koneksi, "SHOW TABLES LIKE '$tableName'");
        return mysqli_num_rows($result) > 0;
    }

    // Cek relasi ke tabel penilaian
    if (TableExists($koneksi, 'penilaian')) {
        $cekPenilaian = mysqli_query($koneksi, "SELECT * FROM penilaian WHERE id_guru = $id");
        if (mysqli_num_rows($cekPenilaian) > 0) {
            return "penilaian";
        }
    }

    // Cek relasi ke tabel penilaian 
    if (TableExists($koneksi, 'penilaian')) {
        $cekpenilaian = mysqli_query($koneksi, "SELECT * FROM penilaian WHERE id_guru = $id");
        if (mysqli_num_rows($cekpenilaian) > 0) {
            return "penilaian";
        }
    }

    // Coba hapus data
    try {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $query = "DELETE FROM $table WHERE $tableid = $id";
        mysqli_query($koneksi, $query);
        return true;
    } catch (mysqli_sql_exception $e) {
        return false;
    }
}
