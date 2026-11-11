<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederStatus extends Seeder
{
    public function run()
    {
        $data = [
            ['status' => 'penerimaan'],
            ['status' => 'pengeluaran'],
            ['status' => 'investasi masuk'],
            ['status' => 'investasi keluar'],
            ['status' => 'normal'],
        ];

        $this->db->table('tbl_status')->insertBatch($data);
    }
}

