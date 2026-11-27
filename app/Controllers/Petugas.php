<?php
namespace App\Controllers;

use App\Models\LaporanModel;

class Petugas extends BaseController
{
    public function dashboard()
    {
        helper('url');
        $model = new LaporanModel();

        $month = filter_var($this->request->getGet('bulan'), FILTER_VALIDATE_INT);
        $year = filter_var($this->request->getGet('tahun'), FILTER_VALIDATE_INT);
        $monthNames = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember',
        ];
        if ($month === false || $month < 1 || $month > 12) {
            $month = (int) date('n');
        }
        if ($year === false || $year < 1000 || $year > 9998) {
            $year = (int) date('Y');
        }

        $selectedDate = new \DateTimeImmutable(sprintf('%04d-%02d-01', $year, $month));
        $previousMonth = $selectedDate->modify('-1 month');
        $nextMonth = $selectedDate->modify('+1 month');
        $startDate = $selectedDate->format('Y-m-d');
        $endDate = $nextMonth->format('Y-m-d');

        $objectLabels = [
            'ac' => 'AC',
            'komputer' => 'Komputer',
            'proyektor' => 'Proyektor',
            'jaringaninternet' => 'Jaringan Internet',
            'mejakursi' => 'Meja/Kursi',
            'listrik' => 'Listrik',
            'lampupenerangan' => 'Lampu Penerangan',
            'pintujendela' => 'Pintu/Jendela',
            'lantaikeramik' => 'Lantai/Keramik',
            'lantai/keramik' => 'Lantai/Keramik',
            'toilet' => 'Toilet',
            'kebersihanruangan' => 'Kebersihan Ruangan',
            'lainnya' => 'Lainnya',
        ];
        $categoryColors = ['#0d235c', '#6f42c1', '#fd7e14', '#198754', '#b02a37', '#0dcaf0', '#6c757d'];

        $monthlyObjectRows = $model->builder()
            ->select('objek, COUNT(*) AS jumlah', false)
            ->where('created_at >=', $startDate)
            ->where('created_at <', $endDate)
            ->groupBy('objek')
            ->get()
            ->getResultArray();

        $monthlyTotal = 0;
        $categoryCounts = [];
        $categoryNames = [];
        foreach ($monthlyObjectRows as $row) {
            $count = (int) $row['jumlah'];
            $monthlyTotal += $count;

            $object = trim((string) $row['objek']);
            $normalizedObject = strtolower($object);
            $key = $normalizedObject !== '' ? $normalizedObject : 'tidak ditentukan';
            $categoryNames[$key] = $objectLabels[$normalizedObject] ?? ($object !== '' ? ucfirst($object) : 'Tidak ditentukan');
            $categoryCounts[$key] = ($categoryCounts[$key] ?? 0) + $count;
        }

        $categories = [];
        arsort($categoryCounts);
        $categoryIndex = 0;
        foreach ($categoryCounts as $key => $count) {
            $categories[] = [
                'label' => $categoryNames[$key],
                'count' => $count,
                'percentage' => $monthlyTotal > 0
                    ? (int) round($count * 100 / $monthlyTotal)
                    : 0,
                'color' => $categoryColors[$categoryIndex % count($categoryColors)],
            ];
            $categoryIndex++;
        }

        $monthUrl = static function (\DateTimeImmutable $date): string {
            return site_url('petugas') . '?' . http_build_query([
                'bulan' => (int) $date->format('n'),
                'tahun' => (int) $date->format('Y'),
            ]);
        };

        return view('petugas/dashboard', [
            'total' => $model->countAllResults(),
            'baru'  => $model->where('status', 'baru')->countAllResults(),
            'bulanAktif' => (int) $selectedDate->format('n'),
            'tahunAktif' => (int) $selectedDate->format('Y'),
            'namaBulanAktif' => $monthNames[(int) $selectedDate->format('n')],
            'daftarBulan' => $monthNames,
            'jumlahBulanan' => $monthlyTotal,
            'kategoriLaporan' => $categories,
            'urlBulanSebelumnya' => $monthUrl($previousMonth),
            'urlBulanBerikutnya' => $monthUrl($nextMonth),
            'hideFooter' => true,
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