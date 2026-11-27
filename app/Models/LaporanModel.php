<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $table            = 'laporan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nomor_laporan', 'nama_pelapor', 'no_identitas','jabatan','unit_program','kontak',
        'gedung','lantai','ruangan','objek','keluhan','tanggal_ditemukan',
        'dampak','prioritas','foto','status','petugas_id', 'user_id',
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = false;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function generateNomorLaporan(){
        $prefix = "LAP";
        $tahunBulan = date('Ym');
        $kepalaNomor = $prefix . "-" . $tahunBulan;

        $terakhir = $this->select('nomor_laporan')
            ->like('nomor_laporan', $kepalaNomor, 'after')
            ->orderBy('nomor_laporan', 'DESC')
            ->first();

        $nomorBerikutnya = 1;

        if ($terakhir) {
            $digitTerakhir = (int) substr($terakhir['nomor_laporan'], -4);
            $nomorBerikutnya = $digitTerakhir + 1;
        }

        if($nomorBerikutnya > 9999){
            throw new \RuntimeException(('Kuota nomor laporan bulan ini sudah mencapai batas maksimal (9999)'));
        }

        $urutan = str_pad((string) $nomorBerikutnya, 4, 0, STR_PAD_LEFT);

        return $kepalaNomor . "-" . $urutan;
    }

    public function getLaporanWithUsers($id = false){
        $laporan = $this->select('laporan.*, 
        pel.username AS pelapor_username,
        pel.email AS pelapor_email,
        pet.username AS petugas_username,
        pet.email AS petugas_email,
        pet.full_name AS petugas_full_name');

        $laporan->join('users as pel', 'pel.id = laporan.user_id', 'left');

        $laporan->join('users as pet', 'pet.id = laporan.petugas_id', 'left');

        if ($id === false){
            return $this->findAll();
        }

        return $this->where("laporan.id", $id)->first();
    }

    public function getLaporanByUser($id){
        $laporan = $this->select('laporan.*')
            ->where('laporan.id', $id)
            ->findAll();
        
        return $laporan;
    }
}
