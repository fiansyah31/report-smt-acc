<?php
 
namespace App\Controllers;

 

class Laporan extends BaseController
{

    public function index(){

        $data = ([
            'title' => 'Semua Tabel',
        ]);

        return view('tabel/index', $data);
    }
    public function addtabel(){

        $data = ([
            'title' => 'Tambah Tabel',
        ]);

        return view('tabel/addtabel', $data);
    }
    public function create(){

        

        return view('tabel/addtabel');
    }

    
}