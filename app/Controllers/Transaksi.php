<?php

namespace App\Controllers;

use App\Models\ModelTransaksi;
use App\Models\ModelNilai;
use App\Models\ModelAkun3;
use App\Models\ModelStatus;
use CodeIgniter\RESTful\ResourceController;

class Transaksi extends ResourceController
{
    protected $objTransaksi;
    protected $objNilai;
    protected $objAkun3;
    protected $objStatus;
    protected $db;

    function __construct()
    {
        $this->objTransaksi = new ModelTransaksi();
        $this->objNilai     = new ModelNilai();
        $this->objAkun3     = new ModelAkun3();
        $this->objStatus    = new ModelStatus();
        $this->db           = \Config\Database::connect();
    }

    public function index()
    {
        $data['dttransaksi'] = $this->objTransaksi->findAll();
        return view('transaksi/index', $data);
    }

    public function new()
    {
        return view('transaksi/new');
    }

    public function create()
    {
        $kuitansi = $this->objTransaksi->noKwitansi();
        if ($this->request->getVar('kuitansi')) {
            $kuitansi = $this->request->getVar('kuitansi');
        }

        $data1 = [
            'kuitansi'  => $kuitansi,
            'tanggal'   => $this->request->getVar('tanggal'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'ketjurnal' => $this->request->getVar('ketjurnal'),
        ];
        $this->db->table('tbl_transaksi')->insert($data1);
        $id_transaksi = $this->objTransaksi->getInsertID();

        $kode_akun3 = $this->request->getVar('kode_akun3');
        $debit      = $this->request->getVar('debit');
        $kredit     = $this->request->getVar('kredit');
        $id_status  = $this->request->getVar('id_status');

        $data2 = [];
        if (!empty($kode_akun3)) {
            for ($i = 0; $i < count($kode_akun3); $i++) {
                $data2[] = [
                    'id_transaksi' => $id_transaksi,
                    'kode_akun3'   => $kode_akun3[$i],
                    'debit'        => $debit[$i],
                    'kredit'       => $kredit[$i],
                    'id_status'    => $id_status[$i],
                ];
            }
            $this->objNilai->insertBatch($data2);
        }

        return redirect()->to(site_url('transaksi'))->with('success', 'Data Berhasil di Simpan');
    }

    public function show($id = null)
    {
        $transaksi = $this->objTransaksi->find($id);
        if (is_object($transaksi)) {
            $data['dttransaksi'] = $transaksi;
            $data['dtnilai']     = $this->objNilai->ambilRelasiId($id);
            return view('transaksi/show', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function edit($id = null)
    {
        $transaksi = $this->objTransaksi->find($id);
        if (is_object($transaksi)) {
            $data['dttransaksi'] = $transaksi;
            $data['dtakun3']     = $this->objAkun3->findAll();
            $data['dtstatus']    = $this->objStatus->findAll();
            $data['dtnilai']     = $this->objNilai->where('id_transaksi', $id)->findAll();
            return view('transaksi/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id = null)
    {
        $data1 = [
            'tanggal'   => $this->request->getVar('tanggal'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'ketjurnal' => $this->request->getVar('ketjurnal'),
        ];
        $this->db->table('tbl_transaksi')->where('id_transaksi', $id)->update($data1);

        $id_nilai   = $this->request->getVar('id_nilai');
        $kode_akun3 = $this->request->getVar('kode_akun3');
        $debit      = $this->request->getVar('debit');
        $kredit     = $this->request->getVar('kredit');
        $id_status  = $this->request->getVar('id_status');

        $data2 = [];
        if (!empty($id_nilai)) {
            for ($i = 0; $i < count($id_nilai); $i++) {
                $data2[] = [
                    'id_nilai'   => $id_nilai[$i],
                    'kode_akun3' => $kode_akun3[$i],
                    'debit'      => $debit[$i],
                    'kredit'     => $kredit[$i],
                    'id_status'  => $id_status[$i],
                ];
            }
            $this->objNilai->updateBatch($data2, 'id_nilai');
        }

        return redirect()->to(site_url('transaksi'))->with('success', 'Data Berhasil di Update');
    }

    public function delete($id = null)
    {
        $this->objTransaksi->where('id_transaksi', $id)->delete();
        return redirect()->to(site_url('transaksi'))->with('success', 'Data Berhasil Di Hapus');
    }

    public function akun3()
    {
        $akun3 = new ModelAkun3();
        $result = $akun3->findAll();
        return $this->response->setJSON($result);
    }

    public function status()
    {
        $status = new ModelStatus();
        $result = $status->findAll();
        return $this->response->setJSON($result);
    }
}

