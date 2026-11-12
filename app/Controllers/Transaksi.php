<?php

namespace App\Controllers;

use App\Models\ModelAkun3;
use App\Models\ModelNilai;
use App\Models\ModelStatus;
use App\Models\ModelTransaksi;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Transaksi extends ResourceController
{
    // inisialisasi objek data
    function __construct()
    {
        $this->objTransaksi = new ModelTransaksi();
        $this->objAkun3     = new ModelAkun3();
        $this->objNilai     = new ModelNilai();
        $this->objStatus    = new ModelStatus();
        $this->db           = \Config\Database::connect();
    }

    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data['dtatransaksi'] = $this->objTransaksi->findAll();
        return view('transaksi/index', $data);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        $transaksi  = $this->objTransaksi->find($id);
        $dataakun3  = $this->objAkun3->findAll();
        $datastatus = $this->objStatus->findAll();
        $dtnilai    = $this->objNilai->ambilrelasiid($id);

        if (is_object($transaksi)) {
            $dttransaksi = $transaksi;
            $dtakun3     = $dataakun3;
            $dtstatus    = $datastatus;
            return view('transaksi/show', compact('dttransaksi', 'dtakun3', 'dtstatus', 'dtnilai'));
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        return view('transaksi/new');
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $data1 = [
            // 'kwitansi'  => $this->request->getVar('kwitansi'),
            'kwitansi'  => $this->objTransaksi->noKwitansi(),
            'tanggal'   => $this->request->getVar('tanggal'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'ketjurnal' => $this->request->getVar('ketjurnal'),
        ];
        $this->db->table('tbl_transaksi')->insert($data1);

        // ambil ID terakhir dari tbl_transaksi untuk relasi ke tbl_nilai
        $idtransaksi = $this->objTransaksi->insertID();

        $kodeakun3 = $this->request->getVar('kode_akun3');
        $debit     = $this->request->getVar('debit');
        $kredit    = $this->request->getVar('kredit');
        $idstatus  = $this->request->getVar('id_status');

        $data2 = [];
        for ($i = 0; $i < count($kodeakun3); $i++) {
            $data2[] = [
                'id_transaksi' => $idtransaksi,
                'kode_akun3'   => $kodeakun3[$i],
                'debit'        => (float) ($debit[$i] ?? 0),
                'kredit'       => (float) ($kredit[$i] ?? 0),
                'id_status'    => $idstatus[$i],
            ];
        }
        $this->objNilai->insertBatch($data2);

        return redirect()->to(site_url('transaksi'))->with('success', 'Data Berhasil di Simpan');
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        $transaksi  = $this->objTransaksi->find($id);
        $dataakun3  = $this->objAkun3->findAll();
        $datastatus = $this->objStatus->findAll();
        $dtnilai    = $this->objNilai->where('id_transaksi', $id)->findAll();

        if (is_object($transaksi)) {
            $dttransaksi = $transaksi;
            $dtakun3     = $dataakun3;
            $dtstatus    = $datastatus;
            return view('transaksi/edit', compact('dttransaksi', 'dtakun3', 'dtstatus', 'dtnilai'));
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        $data1 = [
            'tanggal'   => $this->request->getVar('tanggal'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'ketjurnal' => $this->request->getVar('ketjurnal'),
        ];

        // simpan data ke tbl_transaksi
        $this->db->table('tbl_transaksi')->where(['id_transaksi' => $id])->update($data1);

        $ids        = $this->request->getVar('id_nilai');
        $kode_akun3 = $this->request->getVar('kode_akun3');
        $debit      = $this->request->getVar('debit');
        $kredit     = $this->request->getVar('kredit');
        $id_status  = $this->request->getVar('id_status');

        foreach ($ids as $key => $value) {
            $result[] = [
                'id_nilai'   => $value,
                'kode_akun3' => $kode_akun3[$key],
                'debit'      => $debit[$key],
                'kredit'     => $kredit[$key],
                'id_status'  => $id_status[$key],
            ];
        }

        $this->objNilai->updateBatch($result, 'id_nilai');

        return redirect()->to(site_url('transaksi'))->with('success', 'Data berhasil diupdate');
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        $this->objTransaksi->where(['id_transaksi' => $id])->delete();
        return redirect()->to(site_url('transaksi'))->with('success', 'Data Berhasil Di Hapus');
    }

    public function akun3()
    {
        $akun3  = model(ModelAkun3::class);
        $result = $akun3->findAll();
        return $this->response->setJSON($result);
    }

    public function status()
    {
        $status = model(ModelStatus::class);
        $result = $status->findAll();
        return $this->response->setJSON($result);
    }
}
