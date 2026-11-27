<?php
namespace App\Controllers;

use App\Models\LaporanModel;

class Lapor extends BaseController
{
    public function index()
    {
        return view('Lapor/Lapor');   // sesuai lokasi view form Anda
    }

    public function simpan()
    {
        $laporanModel = new LaporanModel();
        $userId = user_id();
        $noLapor = $laporanModel->generateNomorLaporan();
        $jabatan = $this->request->getPost('jabatan');
        if ($jabatan === 'lainnya') $jabatan = $this->request->getPost('jabatanLainnya');

        $objek = $this->request->getPost('objekFasil');
        if ($objek === 'lainnya') $objek = $this->request->getPost('objekFasilLainnya');

        $dampak = $this->request->getPost('dampak');
        if ($dampak === 'lainnya') $dampak = $this->request->getPost('DampaknyaLainnya');

        // Upload foto (opsional)
        $namaFoto = null;
        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && ! $foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move(FCPATH . 'uploads/laporan', $namaFoto);
        }

        ($laporanModel)->insert([
            'nama_pelapor'      => $this->request->getPost('namaPelapor'),
            'no_identitas'      => $this->request->getPost('noIdentitas'),
            'nomor_laporan'     => $noLapor,
            'jabatan'           => $jabatan,
            'unit_program'      => $this->request->getPost('unitProgram'),
            'kontak'            => $this->request->getPost('telEmail'),
            'gedung'            => $this->request->getPost('gedung'),
            'lantai'            => $this->request->getPost('lantai'),
            'ruangan'           => $this->request->getPost('ruanganLab'),
            'objek'             => $objek,
            'keluhan'           => $this->request->getPost('keluhan'),
            'tanggal_ditemukan' => $this->request->getPost('tanggaldi'),
            'dampak'            => $dampak,
            'prioritas'         => $this->request->getPost('prioritas'),
            'foto'              => $namaFoto,
            'user_id'           => $userId,
        ]);

        return redirect()->to('/lapor')->with('pesan', 'Laporan berhasil dikirim.');
    }
}