<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lapor</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body>
    <?php if (session()->getFlashdata('pesan')): ?>
        <p style="color:green"><?= esc(session()->getFlashdata('pesan')) ?></p>
    <?php endif ?>
    <h1>Pengaduan/Keluhan Sarana Prasarana</h1>
    <form action="<?= base_url('lapor/simpan') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <!-- // Identitas pelapod  -->
        <fieldset>
            <legend>Identitas Pelapor</legend>

            <label for="namaPelapor">Nama Pelapor :</label>
            <input type="text" name="namaPelapor" id="namaPelapor" required>
            <label for="noIdentitas">NIP/NIDN :</label>
            <input type="number" name="noIdentitas" id="noIdentitas" required>
            <fieldset>

                <!-- Jabatan Pelapor -->

                <legend>Jabatan pelapor</legend>
                <select name="jabatan" id="jabatan" class="selectDenganLainnya">
                    <option value="" selected disabled>Jabatan</option>
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

                <!-- Keluhan -->

            </fieldset>
            <label for="unitProgram">Unit/Progam Studi :</label>
            <input type="text" name="unitProgram" id="unitProgram" required>
            <label for="telEmail">No.HP/Email :</label>
            <input type="text" name="telEmail" id="telEmail" required>
            <label for="tanggalLapor">Tanggal Laporan :</label>
            <input type="date" name="tanggalLapor" id="tanggalLapor" required>
        </fieldset>

        <!-- Detail keluhan -->

        <fieldset>
            <legend>Detail Keluhan </legend>
            <fieldset>

                <!--  Lokasi Tempat Kejadian Perkara -->

                <legend>Informasi Lokasi</legend>

                <label for="gedung">Gedung :</label>
                <input type="text" name="gedung" id="gedung" required>
                <label for="lantai">Lantai :</label>
                <input type="text" name="lantai" id="lantai" required>
                <label for="ruanganLab">Ruangan/Laboratorium :</label>
                <input type="text" name="ruanganLab" id="ruanganLab" required   >
            </fieldset>

            <!-- Jenis Keluhan -->

            <fieldset>
                <legend>Jenis Keluhan</legend>

                <label for="objekFasil">Objek/Fasilitas yang Dikeluhkan:</label>
                <select name="objekFasil" id="objekFasil" class="selectDenganLainnya">
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
                <div class="lainnyaContainer" hidden>
                    <input type="text" name="objekFasilLainnya" id="objekFasilLainnya" class="lainnya">
                </div>
            </fieldset>

            <!-- Uraian Keluhan -->

            <fieldset>
                <legend>Uraian Keluhan</legend>
                <label for="keluhan">Jelaskan kondisi atau permasalahan yang ditemukan:</label><br>
                <textarea name="keluhan" id="keluhan" rows="4" maxlength="500" placeholder="Keluhan anda..." required></textarea>
                <br>
                <label for="tanggaldi">Tanggal Ditemukan :</label>
                <input type="date" name="tanggaldi" id="tanggaldi">
            </fieldset>

            <!-- Dampaknya -->

            <fieldset>
                <legend>Dampak Dari Keluhan</legend>
                <label for="dampak">Dampak : </label>
                <select name="dampak" id="dampak" class="selectDenganLainnya">
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
                <label>Tingkat Prioritas :</label>
                <label class="opsi"><input type="radio" name="prioritas" value="rendah" required> Rendah</label>
                <label class="opsi"><input type="radio" name="prioritas" value="sedang"> Sedang</label>
                <label class="opsi"><input type="radio" name="prioritas" value="tinggi"> Tinggi</label>
                <label class="opsi"><input type="radio" name="prioritas" value="sangat_mendesak"> Sangat Mendesak</label>
            </fieldset>
            <fieldset>
                <legend>Dokumentasi</legend>
                <label for="foto">Lampiran Foto (opsional):</label>
                <input type="file" name="foto" id="foto" accept="image/*">
            </fieldset>
        </fieldset>
        <pre><button type="submit">Kirim Laporan</button>    <a href="<?= base_url('/') ?>"><button type="button">Kembali</button></a></pre>
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