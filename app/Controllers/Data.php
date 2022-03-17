<?php
 
namespace App\Controllers;

use App\Models\DataMesin;


class Data extends BaseController
{
    protected $datamesin;

    public function __construct()
    {
        $this->datamesin = new DataMesin();
      
    }
    public function index()
    {
        $data = [
            'title' => 'Data Mesin',
            'mesin' => $this->datamesin->getDataMesin(),
        ];
      
        return view('datamesin/index', $data);
    }
    public function addmesin()
    {
        $data = [
            'title' => 'Tambah Mesin',
            'validation' => \Config\Services::validation()
        ];
      
        return view('datamesin/addmesin', $data);
    }
    public function save()
    {
        //validaso input 
        if (!$this->validate([
            'mesin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Kolom input harap di isi',
                    //'is_unique' => '{field} sudah ada woi, cari laen'
                ]
            ],
            'foto_mesin' => [
                'rules' => 'is_image[foto_mesin]|mime_in[foto_mesin,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan ekstensi gambar'
                ]
            ]


        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
            return redirect()->to('/data/addmesin')->withInput();
        }
        //ambil gambar
       // $filesampul = $this->request->getFile('foto_mesin');

        //cek tidak ada upload sampul
       // if ($filesampul->getError() == 4) {
        //    $namasampul = 'default.png';
       // } else {

            //generate nama sampul
         //   $namasampul = $filesampul->getRandomName();

            //Pindahkan file ke folder img
         //   $filesampul->move('fotomesin', $namasampul);
       // }


        $this->datamesin->save([
            'mesin' => $this->request->getVar('mesin'),
            //'foto_mesin' => $namasampul
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/index');
    }
}