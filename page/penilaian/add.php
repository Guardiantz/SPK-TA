<?php
require("../controller/Penilaian.php");

$alternatif = Index("SELECT * FROM alternatif");
$kriteria = Index("SELECT * FROM kriteria");

if (isset($_POST["add"])) {
    // Validasi inputan
    $id_guru = isset($_POST['id_guru']) ? trim($_POST['id_guru']) : '';
    $id_kriteria = isset($_POST['id_kriteria']) ? trim($_POST['id_kriteria']) : '';
    $nilai = isset($_POST['nilai']) ? trim($_POST['nilai']) : '';

    // Cek apakah ada input kosong
    if (empty($id_guru) || empty($id_kriteria) || $id_kriteria === "Pilih Kriteria" || empty($nilai)) {
        echo "<script>
        Swal.fire({
            icon: 'warning',
            title: 'Perhatian',
            text: 'Semua field wajib diisi!',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        });
        </script>";
    }
    // Validasi nilai tidak mengandung koma
    elseif (strpos($nilai, ',') !== false) {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Format Angka Salah',
            text: 'Gunakan tanda titik (.) sebagai pemisah desimal, bukan koma (,).',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        });
        </script>";
        exit;
    }
    // Validasi nilai harus antara 10 sampai 100
    elseif (!is_numeric($nilai) || $nilai < 10 || $nilai > 100) {
        echo "<script>
        Swal.fire({
            icon: 'warning',
            title: 'Nilai Tidak Valid',
            text: 'Nilai harus berada dalam rentang 10 sampai 100.',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        });
        </script>";
        exit;
    } else {
        // Cek duplikat data
        $cek = Index("SELECT * FROM penilaian WHERE id_guru = '$id_guru' AND id_kriteria = '$id_kriteria'");
        if (count($cek) > 0) {
            echo "<script>
            Swal.fire({
                icon: 'warning',
                title: 'Duplikat Data',
                text: 'Penilaian untuk guru dan kriteria ini sudah ada.',
            }).then(() => {
                window.location.href = 'index.php?halaman=databobot';
            });
            </script>";
            exit;
        }

        // Simpan data
        if (Add("penilaian", $_POST) > 0) {
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
}
?>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="columns">
                <div class="column">
                    <div class="card">
                        <div class="card-header">
                            <p class="card-header-title">Form Tambah pembobotan</p>
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
                                        <div class="select">
                                            <select name="id_guru">
                                                <option selected disabled>Pilih Alternatif</option>
                                                <?php foreach ($alternatif as $row) : ?>
                                                    <option value="<?= $row["id_guru"] ?>"><?= $row["nm_guru"] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="icon is-small is-left">
                                            <ion-icon name="chevron-down"></ion-icon>
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Data Kriteria</label>
                                    <div class="control has-icons-left">
                                        <div class="select">
                                            <select name="id_kriteria" required>
                                                <option selected disabled>Pilih Kriteria</option>
                                                <?php foreach ($kriteria as $row) : ?>
                                                    <option value="<?= $row["id_kriteria"] ?>"><?= $row["nm_kriteria"] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="icon is-small is-left">
                                            <ion-icon name="chevron-down"></ion-icon>
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Nilai</label>
                                    <div class="control has-icons-left">
                                        <input class="input" type="text" placeholder="Nilai untuk setiap alternatif" name="nilai">
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