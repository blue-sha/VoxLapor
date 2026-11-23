<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lapor</title>
</head>

<body>
    <h1>Pengaduan/Keluhan Sarana Prasarana</h1>
    <form action="">
        <fieldset>
            <legend>Identitas Pelapor</legend>

            <label for="namaPelapor">Nama Pelapor</label>
            <input type="text" name="namaPelapor" id="namaPelapor">
            <label for="noIdentitas">NIP/NIDN</label>
            <input type="number" name="noIdentitas" id="noIdentitas">
            <fieldset>
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
                        name="jabatanLainnya"
                        >
                </div>
            </fieldset>
            <label for="unitProgram">Unit/Progam Studi</label>
            <input type="text" name="unitProgram" id="unitProgram">
            <label for="telEmail">No.HP/Email</label>
            <input type="text" name="telEmail" id="telEmail">
            <label for="tanggalLapor">Tanggal Laporan</label>
            <input type="date" name="tanggalLapor" id="tanggalLapor">
        </fieldset>
        <fieldset>
            <legend>Detail Keluhan</legend>
            <fieldset>
                <legend>Informasi Lokasi</legend>

                <label for="gedung">Gedung</label>
                <input type="text" name="gedung" id="gedung">
                <label for="lantai">Lantai</label>
                <input type="text" name="lantai" id="lantai">
                <label for="ruanganLab">Ruangan/Laboratorium</label>
                <input type="text" name="ruanganLab" id="ruanganLab">
            </fieldset>

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

            <fieldset>
                <legend>Uraian Keluhan</legend>
                <label for="keluhan">Jelaskan kondisi atau permasalahan yang ditemukan:</label><br>
                <textarea name="keluhan" id="keluhan" rows="4" maxlength="6" placeholder="Keluhan anda..." required></textarea>
            </fieldset>
        </fieldset>
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
                if (!isLainnya){
                    input.value = '';
                }
                else {
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