<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>feedback</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body>
    <form action="<?= base_url('petugas/balasan'); ?>" method="post">
        <fieldset>
            <legend>Tindak Lanjut Petugas</legend>
            <label for="tanggalPemeriksaan">Tanggal Pemeriksaan :</label>
            <input type="Date" name="tanggalPemeriksaan" id="tanggalPemeriksaan">
            <br>
            <Label for="hasilPemeriksaan">Hasil Pemeriksaan : </Label>
            <br>
            <textarea name="hasilPemeriksaan" id="hasilPemeriksaan" rows="10" cols="150" maxlength="500" placeholder="Hasil Pemeriksaan Petugas..."></textarea>
            <br>
            <label for="tindakan">Tindakan Yang Dilakukan : </label>
            <br>

            <textarea name="tindakan" id="tindakan" rows="10" cols="150" maxlength="500" placeholder="Tindakan Yang Dilakukan Oleh Petugas"></textarea>
            <br>
            <br>
            <label for="statusPenanganan">Status Penanganan :</label>
            <label for="selesai" class="opsi"><input type="checkbox" id="selesai" name="selesai">Selesai</label>
            <label for="proses" class="opsi"><input type="checkbox" id="proses" name="proses">Dalam Proses</label>
            <label for="menunggu" class="opsi"><input type="checkbox" id="menunggu" name="menunggu">Menunggu Pengadaan/Penggatian</label>
            <label for="diteruskan" class="opsi"><input type="checkbox" id="diteruskan" name="diteruskan">Diteruskan Ke Unit Terkait</label>
            <br>
            <br>
            <label for="Target">Target Penyselesaian:</label>
            <input type="text" id="Target" style="width: 50%;">
        </fieldset>
        <fieldset>
            <legend>Pengesahan</legend>
            <table border="1" cellspacing="0,5px" cellpadding="5">
                <tr>
                    <th></th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Tanda Tangan</th>
                </tr>
                <tr>
                    <td>
                        Pelapor/Pengguna Ruangan
                    </td>
                    <td><input type="text" style="border: none;"></td>
                    <td><input type="Date" style="border: none;"></td>
                    <td><canvas id="ttd" width="300" height="120" style="border: none;"></canvas>
                        <button type="button" onclick="hapus()">hapus</button>
                    </td>

                </tr>
            </table>
        </fieldset>
        <button type="submit">Submit Balasan</button>
    </form>
    <script>
        var canvas = document.getElementById("ttd");
        var ctx = canvas.getContext("2d");
        var lagiGambar = false;

        canvas.addEventListener("mousedown", function(e) {
            lagiGambar = true;
            ctx.beginPath();
            ctx.moveTo(e.offsetX, e.offsetY);
        });

        canvas.addEventListener("mousemove", function(e) {
            if (lagiGambar) {
                ctx.lineTo(e.offsetX, e.offsetY);
                ctx.stroke();
            }
        });

        canvas.addEventListener("mouseup", function() {
            lagiGambar = false;
        });

        function hapus() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        }
    </script>
</body>

</html>