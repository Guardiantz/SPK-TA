<?php
require("../controller/Penilaian.php");

$alternatif = Index("SELECT * FROM alternatif");
$kriteria = Index("SELECT * FROM kriteria");


$id = $_GET["id"];
$query = Index("SELECT * FROM penilaian WHERE id_nilai = $id");

foreach ($query as $data) {
    $data["id_guru"];
    $data["id_kriteria"];
    $data["nilai"];
}

if (isset($_POST["add"])) {
    if (Edit("penilaian", $_POST) > 0) {
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Data berhasil masuk kedalam database',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        }).then(function() {
            window.location.href = 'index.php?halaman=databobot';
        });
        </script>";
    } else {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Data gagal masuk kedalam database',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        }).then(function() {
            window.location.href = 'index.php?halaman=databobot';
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
                            <p class="card-header-title">Form Edit Data pembobotan</p>
                            <div class="buttons card-header-icon">
                                <a class="button is-link" href="index.php?halaman=databobot">
                                    <ion-icon name="arrow-back-circle" class="mr-2"></ion-icon>Kembali
                                </a>
                            </div>
                        </div>
                        <div class="card-content">
                            <form action="" method="post">
                                <div class="field">
                                    <label class="label">Data Alternatif</label>
                                    <div class="control has-icons-left">
                                        <!-- Hidden untuk kirim nilai id_guru -->
                                        <input type="hidden" name="id_guru" value="<?= $data["id_guru"]; ?>">

                                        <!-- Tampilkan nama guru readonly -->
                                        <input class="input" type="text" placeholder="Nama Guru"
                                            value="<?php
                                                    foreach ($alternatif as $row) {
                                                        if ($row["id_guru"] == $data["id_guru"]) {
                                                            echo $row["nm_guru"];
                                                            break;
                                                        }
                                                    }
                                                    ?>" readonly>

                                        <!-- Ikon kiri -->
                                        <span class="icon is-small is-left">
                                            <ion-icon name="person"></ion-icon>
                                        </span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Data Kriteria</label>
                                    <div class="control has-icons-left">
                                        <!-- Hidden untuk kirim nilai id_kriteria -->
                                        <input type="hidden" name="id_kriteria" value="<?= $data["id_kriteria"]; ?>">

                                        <!-- Tampilkan nama kriteria readonly -->
                                        <input class="input" type="text" placeholder="Nama Kriteria"
                                            value="<?php
                                                    foreach ($kriteria as $row) {
                                                        if ($row["id_kriteria"] == $data["id_kriteria"]) {
                                                            echo $row["nm_kriteria"];
                                                            break;
                                                        }
                                                    }
                                                    ?>" readonly>

                                        <!-- Ikon kiri -->
                                        <span class="icon is-small is-left">
                                            <ion-icon name="pricetag"></ion-icon> <!-- Ganti ikon sesuai kebutuhan -->
                                        </span>
                                    </div>
                                </div>

                                <div class="field">
                                    <label class="label">Nilai</label>
                                    <div class="control has-icons-left">
                                        <input type="hidden" value="<?= $data["id_nilai"]; ?>" name="id_nilai">
                                        <input class="input" type="number" placeholder="Nilai untuk setiap alternatif" name="nilai" value="<?= $data["nilai"] ?>">
                                        <span class="icon is-small is-left">
                                            <ion-icon name="barbell"></ion-icon>
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