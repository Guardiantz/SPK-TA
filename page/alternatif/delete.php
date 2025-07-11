<?php
require("../controller/Alternatif.php");

$id = $_GET['id'];
$hapus = Delete("alternatif", "id_guru", $id);

if ($hapus === true) {
    echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Data berhasil dihapus',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        }).then(function() {
            window.location.href = 'index.php?halaman=dataalternatif';
        });
    </script>";
} elseif ($hapus === "penilaian") {
    echo "<script>
        Swal.fire({
            icon: 'warning',
            title: 'Gagal Menghapus',
            text: 'Data tidak dapat dihapus karena masih digunakan dalam tabel Penilaian. Silakan hapus penilaian terlebih dahulu.',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        }).then(function() {
            window.location.href = 'index.php?halaman=dataalternatif';
        });
    </script>";
} elseif ($hapus === "penilaian") {
    echo "<script>
        Swal.fire({
            icon: 'warning',
            title: 'Gagal Menghapus',
            text: 'Data tidak dapat dihapus karena masih digunakan dalam tabel penilaian. Silakan hapus penilaian terlebih dahulu.',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        }).then(function() {
            window.location.href = 'index.php?halaman=dataalternatif';
        });
    </script>";
} else {
    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Terjadi kesalahan saat menghapus data.',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        }).then(function() {
            window.location.href = 'index.php?halaman=dataalternatif';
        });
    </script>";
}
