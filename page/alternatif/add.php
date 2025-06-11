<?php
require("../controller/Alternatif.php");

$lastCode = "";
$conn = mysqli_connect("localhost", "root", "", "belajar");
$query = mysqli_query($conn, "SELECT kode_alternatif FROM alternatif ORDER BY id_guru DESC LIMIT 1");

if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    // Ambil angka dari kode, misal "C3" jadi ambil "3"
    $num = (int)substr($row['kode_alternatif'], 1);
    $nextNum = $num + 1;
    $lastCode = "C" . $nextNum;
} else {
    $lastCode = "C1";
}

if (isset($_POST["add"])) {
    if (Add("alternatif", $_POST) > 0) {
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Data berhasil masuk kedalam database',
            showClass: {
                popup: 'animate_animated animate_fadeInDown'
            },
            hideClass: {
                popup: 'animate_animated animate_fadeOutUp'
            }
        })
        </script>";
    } else {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Data gagal masuk kedalam database',
            showClass: {
                popup: 'animate_animated animate_fadeInDown'
            },
            hideClass: {
                popup: 'animate_animated animate_fadeOutUp'
            }
        }).then(function() {
            window.location.href = 'index.php?halaman=dataalternatif';
        });
        </script>";
    }
}
?>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="columns">
                <div class="column">
                    <div class="card">
                        <div class="card-header">
                            <p class="card-header-title">Form Tambah Data</p>
                            <div class="buttons card-header-icon">
                                <a class="button is-link" href="index.php?halaman=dataalternatif">
                                    <ion-icon name="arrow-back-circle" class="mr-2"></ion-icon>Kembali
                                </a>
                            </div>
                        </div>
                        <div class="card-content">
                            <form action="" method="post">
                                <div class="field">
                                    <label class="label">Kode Alternatif</label>
                                    <div class="control has-icons-left">
                                        <input class="input" type="text" placeholder="Kode Alternatif, Contoh : C1" name="kode_alternatif" value="<?= $lastCode ?>" readonly>
                                        <span class="icon is-small is-left">
                                            <ion-icon name="qr-code"></ion-icon>
                                        </span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Nama Alternatif</label>
                                    <div class="control has-icons-left">
                                        <input class="input" type="text" placeholder="Nama Guru" name="nm_guru">
                                        <span class="icon is-small is-left">
                                            <ion-icon name="person"></ion-icon>
                                        </span>
                                    </div>
                                </div>
                                <div class="buttons">
                                    <button class="button is-link" type="submit" name="add">
                                        <ion-icon name="save" class="mr-2"></ion-icon>Simpan
                                    </button>
                                    <button class="button is-link" type="reset">
                                        <ion-icon name="refresh-circle" class="mr-2"></ion-icon>Reset
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>