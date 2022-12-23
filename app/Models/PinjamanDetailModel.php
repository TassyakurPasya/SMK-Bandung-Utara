<?php

namespace App\Models;

use CodeIgniter\Model;

class PinjamanDetailModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pinjaman_detail';
    protected $primaryKey       = 'id_pinjaman_detail';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_pinjaman','id_buku','status_buku'];

    // Dates
    protected $useTimestamps = false;
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
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getPinjaman($id)
    {        
        return $this->db->table('pinjaman_detail')->where('pinjaman_detail.id_pinjaman', $id)
            ->join('pinjaman', 'pinjaman.id_pinjaman = pinjaman_detail.id_pinjaman')                            
            ->join('buku', 'buku.id_buku = pinjaman_detail.id_buku')                            
            ->get()->getResultArray();
    }
    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_pinjaman_detail' => $id])->first();
    }
    public function getStatus($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }                        
        return $this->select('status_buku')->where('id_pinjaman', $id)->groupBy('status_buku')->findAll();
        // return $this->select('status_po')->where('id_po', $id)->findAll();
    }
}
