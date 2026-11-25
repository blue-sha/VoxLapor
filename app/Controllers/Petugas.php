<?php
namespace App\Controllers;

use App\Models\LaporanModel;

class Petugas extends BaseController
{
    public function dashboard()
    {
        $model = new LaporanModel();
        return view('petugas/dashboard', [
            'total' => $model->countAllResults(),
            'baru'  => $model->where('status', 'baru')->countAllResults(),
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
        (new LaporanModel())->update($id, [
            'status'    => $this->request->getPost('status'),
            'tanggapan' => $this->request->getPost('tanggapan'),
        ]);
        return redirect()->to('/petugas/keluhan')->with('pesan', 'Laporan diperbarui.');
    }
}