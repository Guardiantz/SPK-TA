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
    $kode = htmlspecialchars($data["kode_kriteria"]);
    $namaguru = htmlspecialchars($data["nm_kriteria"]);
    $bobot = htmlspecialchars($data["bobot"]);
    $status = htmlspecialchars($data["status"]);
    $query = "INSERT INTO $table VALUES (null, '$kode', '$namaguru','$bobot','$status')";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function Edit($table, $data)
{
    $koneksi = Koneksi();
    $idkriteria = htmlspecialchars($data["id_kriteria"]);
    $kode = htmlspecialchars($data["kode_kriteria"]);
    $namaguru = htmlspecialchars($data["nm_kriteria"]);
    $bobot = htmlspecialchars($data["bobot"]);
    $status = htmlspecialchars($data["status"]);
    $query = "UPDATE $table SET kode_kriteria = '$kode', nm_kriteria = '$namaguru', bobot = '$bobot', status = '$status' WHERE id_kriteria = $idkriteria";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function Delete($table, $tableid, $id)
{
    $koneksi = Koneksi();
    $id = (int)$id;

    if ($table === 'kriteria') {
        $check = mysqli_query($koneksi, "SELECT * FROM penilaian WHERE $tableid = $id");
        if (mysqli_num_rows($check) > 0) {
            echo "Data tidak dapat dihapus karena masih digunakan dalam penilaian.";
            return 0;
        }
    }

    $query = "DELETE FROM `$table` WHERE `$tableid` = $id";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
