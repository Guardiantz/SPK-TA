<?php
require("../controller/Alternatif.php");

$id = $_GET['id'];

if (Delete("alternatif", "id_guru", $id) > 0) {
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
} else {
    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Data gagal dihapus',
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
