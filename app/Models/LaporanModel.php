<?php
namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $table         = 'laporan';
    protected $primaryKey    = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'nama_pelapor','no_identitas','jabatan','unit_program','kontak',
        'gedung','lantai','ruangan','objek','keluhan','tanggal_ditemukan',
        'dampak','prioritas','foto','status','id_petugas','tanggapan',
    ];
}