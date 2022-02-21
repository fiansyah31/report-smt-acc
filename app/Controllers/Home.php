<?php

namespace App\Controllers;
use \Myth\Auth\Models\UserModel;
use App\Models\LaporanModel;
use CodeIgniter\I18n\Time;

class Home extends BaseController
{
    public function index()
    {
        $usermodel = new UserModel();
        $laporanmodel = new LaporanModel();

        //jumlah users
        $usermodel->select('username');
        $query = $usermodel->get()->getNumRows();

        //jumlah laporan
        $laporanmodel->select('nama');
        $query = $laporanmodel->get()->getNumRows();
      
        $data['title'] = 'Dashboard';
        $data['user'] = $query;
        $data['laporan'] = $query;
       // $data['mingguan'] = $laporanmodel->Mingguan();
       // $data['bulanan'] = $laporanmodel->Bulanan();
        return view('home/home', $data);
    }
}
