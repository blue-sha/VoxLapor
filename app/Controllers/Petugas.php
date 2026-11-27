<?php
namespace App\Controllers;

use App\Models\LaporanModel;

class Petugas extends BaseController
{
    public function dashboard()
{
    $baris  = (new LaporanModel())->select('status, COUNT(*) AS jumlah')
                                  ->groupBy('status')->findAll();
    $hitung = array_column($baris, 'jumlah', 'status');

    return view('petugas/dashboard', [
        'masuk'         => array_sum($hitung),
        'menunggu'      => (int) ($hitung['menunggu']      ?? 0),
        'proses'        => (int) ($hitung['proses']        ?? 0),
        'tindak_lanjut' => (int) ($hitung['tindak_lanjut'] ?? 0),
        'selesai'       => (int) ($hitung['selesai']       ?? 0),
        'ditolak'       => (int) ($hitung['ditolak']       ?? 0),
    ]);
}
    public function keluhan()
    {
        $status = $this->request->getGet('status') ?? 'aktif';
        $model  = new LaporanModel();

        if ($status === 'aktif') {
            $model->where('status !=', 'selesai');
        } elseif ($status !== 'semua') {
            $model->where('status', $status);
        }

        return view('petugas/keluhan', [
            'laporan' => $model->orderBy('created_at', 'DESC')->paginate(10),
            'pager'   => $model->pager,
            'status'  => $status,
        ]);
    }

    public function detail($id)
    {
        $laporan = (new LaporanModel())->find($id);
        if (! $laporan) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('petugas/detail', ['laporan' => $laporan]);
    }

public function proses($id)
{
    helper('auth');

    $status    = $this->request->getPost('status');
    $tanggapan = trim((string) $this->request->getPost('tanggapan'));

    // hanya status yang dikenal
    if (! in_array($status, ['baru', 'diproses', 'tindak_lanjut', 'selesai', 'ditolak'], true)) {
        return redirect()->back()->with('pesan', 'Status tidak valid.');
    }

    // selesai/ditolak wajib ada tanggapan
    if (in_array($status, ['selesai', 'ditolak'], true) && $tanggapan === '') {
        return redirect()->back()->withInput()->with('pesan', 'Tanggapan wajib diisi untuk status ini.');
    }

    (new LaporanModel())->update($id, [
        'id_petugas' => user_id(),
        'status'     => $status,
        'tanggapan'  => $tanggapan,
    ]);

    return redirect()->to('/petugas/keluhan')->with('pesan', 'Laporan diperbarui.');
}

    public function dashboar()
{
    $model = new LaporanModel();

    // satu query: jumlah per status
    $baris = $model->select('status, COUNT(*) AS jumlah')
                   ->groupBy('status')
                   ->findAll();

    $hitung = array_column($baris, 'jumlah', 'status');   // ['baru' => 2, 'diproses' => 1, ...]

    return view('petugas/dashboard', [
        'masuk'         => array_sum($hitung),             // total semua laporan
        'proses'        => (int) ($hitung['diproses']      ?? 0),
        'tindak_lanjut' => (int) ($hitung['tindak_lanjut'] ?? 0),
        'selesai'       => (int) ($hitung['selesai']       ?? 0),
        'ditolak'       => (int) ($hitung['ditolak']       ?? 0),
        'baru'          => (int) ($hitung['baru']          ?? 0),   // untuk menu "Keluhan (N baru)"
    ]);
}
}