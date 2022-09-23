<?php

namespace App\Controllers;

use App\Models\SuratKeluarModels;
use App\Models\SuratMasukModels;
use App\Models\SuratTugasModels;

class SuratMasuk extends BaseController
{
    protected $SuratMasukModels;
    protected $SuratKeluarModels;
    protected $SuratTugasModels;

    public function __construct()
    {
        $this->SuratKeluarModels = new SuratKeluarModels();
        $this->SuratMasukModels = new SuratMasukModels();
        $this->SuratTugasModels = new SuratTugasModels();
    }

    public function index()
    {

        helper(['form', 'url']);

        $data = [
            'title' => 'SISUAR',
            'suratmasuk' => $this->SuratMasukModels->findAll(),
            'jumlahSuratMasuk' => $this->SuratMasukModels->hitungSuratMasuk(),
            'jumlahSuratKeluar' => $this->SuratKeluarModels->hitungSuratKeluar(),
            'jumlahSuratTugas' => $this->SuratTugasModels->hitungSuratTugas(),
            'validation' => \Config\Services::validation(),
        ];



        return view('surat/suratmasuk/indexsuratmasuk.php', $data);
    }

    public function formTambahSuratMasuk()
    {
        helper(['form', 'url']);
        $data = [
            'title' => 'Tambah Data',
            'suratmasuk' => $this->SuratMasukModels->findAll(),
            'validation' => \Config\Services::validation(),
            'jumlahSuratMasuk' => $this->SuratMasukModels->hitungSuratMasuk(),
            'jumlahSuratKeluar' => $this->SuratKeluarModels->hitungSuratKeluar(),
            'jumlahSuratTugas' => $this->SuratTugasModels->hitungSuratTugas(),

        ];

        return view('surat/suratmasuk/formTambahSuratMasuk.php', $data);
    }

    public function tambahSuratMasuk()
    {
        helper(['form', 'url']);
        if (!$this->validate([
            'no_surat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'no surat harus diisi',
                ]
            ],
            'asal_surat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'asal surat harus diisi',
                ]
            ],
            'tujuan_surat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tujuan surat harus diisi',
                ]
            ],
            'perihal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'perihal surat harus diisi',
                ]
            ],
            'tanggal_masuk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal masuk harus diisi',
                ]
            ],
            'isi_ringkas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'isi_ringkas harus diisi',
                ]
            ],
            'ket_surat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'keterangan harus diisi',
                ]
            ],
            'alasan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'alasan harus diisi',
                ]
            ],
            'file' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'file harus diisi',
                ]
            ]

        ])) {
            return redirect()->to(base_url('/SuratMasuk/formTambahSuratMasuk'))->withInput();
        }

        $file = $this->request->getFile('file');
        $namaFile = $file->getName();
        $file->move('asset/pdf', $namaFile);
        $dataSuratMasuk = [
            'no_surat' => $this->request->getVar('no_surat'),
            'asal_surat' => $this->request->getVar('asal_surat'),
            'tujuan_surat' => $this->request->getVar('tujuan_surat'),
            'perihal' => $this->request->getVar('perihal'),
            'tanggal_masuk' => $this->request->getVar('tanggal_masuk'),
            'isi_ringkas' => $this->request->getVar('isi_ringkas'),
            'ket_surat' => $this->request->getVar('ket_surat'),
            'alasan' => $this->request->getVar('alasan'),
            'jenis_surat' => 'Masuk',
            'file' =>  $namaFile,
        ];
        session()->setFlashdata('pesan', 'Berhasil Di Tambahkan');
        $this->SuratMasukModels->save($dataSuratMasuk);
        return redirect()->to(base_url('/SuratMasuk'));
    }

    public function hapusSuratMasuk()
    {
        helper(['form', 'url']);
        $id = $this->request->uri->getSegment(2);
        $this->SuratMasukModels->delete($id);
        session()->setFlashdata('pesan', 'data berhasil di hapus');
        return redirect()->to(base_url('/SuratMasuk'));
        echo json_encode(array("status" => TRUE));
    }

    public function edit($id_surat)
    {
        $file = $this->request->getFile('file');
        $namaFile = $file->getName();
        $file->move('asset/pdf', $namaFile);
        $this->SuratMasukModels->update($id_surat, [
            'no_surat' => $this->request->getVar('no_surat'),
            'asal_surat' => $this->request->getVar('asal_surat'),
            'tujuan_surat' => $this->request->getVar('tujuan_surat'),
            'perihal' => $this->request->getVar('perihal'),
            'tanggal_masuk' => $this->request->getVar('tanggal_masuk'),
            'isi_ringkas' => $this->request->getVar('isi_ringkas'),
            'ket_surat' => $this->request->getVar('ket_surat'),
            'alasan' => $this->request->getVar('alasan'),
            'jenis_surat' => 'Surat Masuk',
            'file' => $namaFile,
        ]);

        return redirect()->to(base_url('/SuratMasuk'));
    }
}
