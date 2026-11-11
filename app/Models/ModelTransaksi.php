<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTransaksi extends Model
{
    protected $table            = 'tbl_transaksi';
    protected $primaryKey       = 'id_transaksi';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kuitansi', 'tanggal', 'deskripsi', 'ketjurnal'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function noKwitansi()
    {
        $number = $this->db->table('tbl_transaksi')
            ->select('RIGHT(kuitansi, 4) as kuitansi', false)
            ->orderBy('kuitansi', 'DESC')
            ->limit(1)
            ->get()->getRowArray();

        if ($number == null) {
            $no = 1;
        } else {
            $no = intval($number['kuitansi']) + 1;
        }
        $nomorKwitansi = str_pad($no, 4, "0", STR_PAD_LEFT);
        return $nomorKwitansi;
    }
}

