<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>feedback</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body>
    <fieldset>
        <legend>Tindak Lanjut Petugas</legend>
        <label for="TaPe">Tanggal Pemeriksaan :</label>
        <input type="Date">
        <br>
        <Label for="HaPe">Hasil Pemeriksaan : </Label>
        <br>
        <textarea name="HaPe" id="HaPe" rows="10" cols="50" maxlength="500" placeholder="Hasil Pemeriksaan Petugas..."></textarea>
        <br>
        <label for="TinYaDi">tindakan Yang Dilakukan : </label>
        <br>

        <textarea name="TinYadi" id="TinYaDi" rows="10" cols="50" maxlength="500" placeholder="Tindakan Yang Dilakukan Oleh Petugas"></textarea>
        <br>
        <br>
        <label for="statuspe">Status Penanganan :</label>
        <label for="Selesai" class="opsi"><input type="checkbox" id="Selesai">Selesai</label>
        <label for="Dalampro" class="opsi"><input type="checkbox" id="Dalampro">Dalam Proses</label>
        <label for="Menunggu" class="opsi"><input type="checkbox" id="Menunggu">Menunggu Pengadaan/Penggatian</label>
        <label for="Dite" class="opsi"><input type="checkbox" id="Dite">Diteruskan Ke Unit Terkait</label>
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