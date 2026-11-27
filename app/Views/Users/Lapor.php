<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lapor</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php if (session()->getFlashdata('pesan')): ?>
        <p style="color:green"><?= esc(session()->getFlashdata('pesan')) ?></p>
    <?php endif ?>
    <h1>Pengaduan/Keluhan Sarana Prasarana</h1>
    <form action="<?= base_url('lapor/simpan') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="container mt-5 mb-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <!-- // Identitas pelapod  -->
                    <div class="row bg-light rounded-5 pb-5">
                        <div class="col-12 bg-primary rounded-top-5 text-light pt-2 mb-3">
                            <h4>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-fill" viewBox="0 5 17 10">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                </svg>
                                Identitas Pelapor
                            </h4>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="namaPelapor" class="form-label">Nama Pelapor :</label>
                            <input type="text" class="form-control" name="namaPelapor" id="namaPelapor" required placeholder="Masukan Nama Anda">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="noIdentitas" class="form-label">NIP/NIDN :</label>
                            <input type="number" class="form-control" name="noIdentitas" id="noIdentitas" required>
                        </div>
                        <fieldset class="col-md-6 mb-3">
                            <label class="form-label">Jabatan</label>
                            <select name="jabatan" id="jabatan" class="selectDenganLainnya form-control">
                                <option value="" selected disabled>Pilih Jabatan</option>
                                <option value="dosen">Dosen</option>
                                <option value="tenagaKependidikan">Tenaga Kependidikan</option>
                                <option value="mahasiswa">Mahasiswa</option>
                                <option value="lainnya">Lainnya</option>
                            </select>

                            <div class="lainnyaContainer" hidden>
                                <input
                                    type="text"
                                    class="lainnya"
                                    name="jabatanLainnya">
                            </div>
                        </fieldset>

                        <div class="col-md-6 mb-3">
                            <label for="unitProgram" class="form-label">Unit/Progam Studi :</label>
                            <input type="text" class="form-control" name="unitProgram" id="unitProgram" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="telEmail" class="form-label">No.HP/Email :</label>
                            <input type="text" class="form-control" name="telEmail" id="telEmail" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tanggalLapor" class="form-label">Tanggal Laporan :</label>
                            <input type="date" class="form-control" name="tanggalLapor" id="tanggalLapor" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5 mb-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row bg-light rounded-5 pb-5">
                        <div class="col-12 bg-primary rounded-top-5 text-light pt-2 mb-3">
                            <h4>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-fill" viewBox="0 5 17 10">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                </svg>
                                Informasi lokasi, Jenis Keluhan dan uraian keluhan
                            </h4>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="gedung" class="form-label">Gedung :</label>
                            <input type="text" name="gedung" id="gedung" required class="form-control">

                            <label for="lantai" class="form-label">Lantai :</label>
                            <input type="text" name="lantai" id="lantai" required class="form-control">

                            <label for="ruanganLab" class="form-label">Ruangan/Laboratorium :</label>
                            <input type="text" name="ruanganLab" id="ruanganLab" required class="form-control">

                            <label class="form-label">Jenis Keluhan</label>
                            <div class="input-group mb-3" data-position-control>
                                <select name="objekFasil" id="objekFasil" class="selectDenganLainnya form-control">
                                    <option value="ac">AC</option>
                                    <option value="komputer">Komputer</option>
                                    <option value="proyektor">Proyektor</option>
                                    <option value="jaringanInternet">Jaringan Internet</option>
                                    <option value="mejaKursi">Meja/Kursi</option>
                                    <option value="listrik">Listrik</option>
                                    <option value="lampuPenerangan">lampu Penerangan</option>
                                    <option value="pintuJendela">Pintu/Jendela</option>
                                    <option value="lantaiKeramik">Lantai/Keramik</option>
                                    <option value="toilet">Toilet</option>
                                    <option value="kebersihanRuangan">Kebersihan Ruangan</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="lainnyaContainer" hidden>
                                <input type="text" name="objekFasilLainnya" id="objekFasilLainnya" class="lainnya">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="keluhan" class="form-label">Uraian Keluhan</label>
                            <textarea class="form-control" id="keluhan" name="keluhan" rows="7" placeholder="Keluhan anda..." required></textarea>

                            <label for="tanggaldi" class="form-label">Tanggal Ditemukan :</label>
                            <input type="date" name="tanggaldi" id="tanggaldi" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5 mb-5">
            <div class="row justify-conten-center">
                <div class="col-12">
                    <div class="row bg-light rounded-5 pb-5">
                        <div class="col-12 bg-primary rounded-top-5 text-light pt-2 mb-3">
                            <h4>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-fill" viewBox="0 5 17 10">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                </svg>
                                Dampak Yang Ditimbulkan & Dokumentasi
                            </h4>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Dampak Yang Ditimbulkan :</label>
                            <select name="dampak" id="dampak" class="selectDenganLainnya form-control">
                                <option value="MeGePer">Mengganggu Kegiatan Perkuliahan</option>
                                <option value="MenGePrak">Mengganggu Kegiatan Praktikum</option>
                                <option value="MePeA">Mengganggu Pelayanan Administrasi</option>
                                <option value="MeKePeRu">Mengganggu Kenyamanan Pengguna Ruangan</option>
                                <option value="BeMeKe">Berpotensi Menimbulan Kecelakaan/Cedera</option>
                                <option value="BeMePeLa">Berpotensi Merusak Peralatan Lainya</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                            <div class="lainnyaContainer" hidden>
                                <input
                                    type="text"
                                    class="lainnya"
                                    name="DampaknyaLainnya">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="foto">Lampiran Foto (Opsional):</label>
                            <input type="file" name="foto" id="foto" accept="image/*" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <p class="form-label fw-semibold mb-2">Tingkat Prioritas:</p>
                            <div class="d-flex flex-wrap gap-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="prioritasRendah" name="prioritas" value="rendah" required>
                                    <label class="form-check-label" for="prioritasRendah">Rendah</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="prioritasSedang" name="prioritas" value="sedang">
                                    <label class="form-check-label" for="prioritasSedang">Sedang</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="prioritasTinggi" name="prioritas" value="tinggi">
                                    <label class="form-check-label" for="prioritasTinggi">Tinggi</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="prioritasSangatMendesak" name="prioritas" value="sangat_mendesak">
                                    <label class="form-check-label" for="prioritasSangatMendesak">Sangat Mendesak</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-start gap-2 mt-3">
                            <button type="submit" class="btn btn-primary px-4">Kirim Laporan</button>
                            <a href="<?= base_url('/') ?>" class="btn btn-secondary px-4">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        const selectInput = document.querySelectorAll('.selectDenganLainnya');
        const inputLainnya = document.querySelectorAll('.lainnya');
        const wadahLainnya = document.querySelectorAll('.lainnyaContainer');

        function ToggleLainnya(index) {
            const select = selectInput[index];
            const wadah = wadahLainnya[index];
            const input = inputLainnya[index];

            if (!select || !wadah) return;

            const isLainnya = select.value === 'lainnya';

            wadah.style.display = isLainnya ? 'block' : 'none';

            if (input) {
                input.required = isLainnya;
                if (!isLainnya) {
                    input.value = '';
                } else {
                    input.focus();
                }
            }
        }

        selectInput.forEach((select, index) => {
            ToggleLainnya(index);

            select.addEventListener('change', () => ToggleLainnya(index));
        })
    </script>
</body>

</html>