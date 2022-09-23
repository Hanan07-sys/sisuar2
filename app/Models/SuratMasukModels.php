<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratMasukModels extends Model
{
    protected $table = 'surat_masuk';
    protected $primaryKey = 'id_surat';
    protected $allowedFields = 
    ['no_surat',
    'asal_surat',
    'tujuan_surat',
    'perihal', 
    'tanggal_masuk', 
    'isi_ringkas', 
    'ket_surat',
    'alasan',
    'file',
    'alasan',
    'jenis_surat'];

    public function hitungSuratMasuk()
    {
        return $this->db->table('surat_masuk')->countAll();
    }

    public function getOne($id)
    {
        return $this->where(['id_surat' => $id])->first();
    }
}
