<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelNilaiPenyesuaian extends Model
{
    protected $table            = 'tbl_nilaipenyesuaian';
    protected $primaryKey       = 'id';
    // protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['id_penyesuaian', 'kode_akun3', 'debit', 'kredit', 'id_status'];

    // Dates
    protected $useTimestamps = true;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    function ambilrelasiid($id)
    {
        $builder = $this->db->table('tbl_nilaipenyesuaian');
        $builder->where("id_penyesuaian=$id");
        $builder->join('akun3s', 'akun3s.kode_akun3 = tbl_nilaipenyesuaian.kode_akun3');
        $builder->join('tbl_status', 'tbl_status.id_status = tbl_nilaipenyesuaian.id_status');
        $query = $builder->get();
        return $query->getResultObject();
    }
}
