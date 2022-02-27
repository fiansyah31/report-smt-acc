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
        $userid = user()->id;
        $usermodel->select('username');
        $querys = $usermodel->get()->getNumRows();

        //jumlah laporan
        $laporanmodel->select('user_id');
        if(in_groups('administrator')) {
            $query = $laporanmodel->get()->getNumRows();
        }
        else {  
            $laporanmodel->where('user_id', $userid);
            $query = $laporanmodel->get()->getNumRows();
        }

        $data['title'] = 'Dashboard';
        $data['catatan'] = '*Silahkan lengkapi data diri anda di menu profile/setting. Klik button Ubah, kemudian isikan data yang kosong. Anda juga bisa merubah data melalui form tersebut.';
        $data['user'] = $querys;
        $data['laporan'] = $query ;
       // $data['mingguan'] = $laporanmodel->Mingguan();
       // $data['bulanan'] = $laporanmodel->Bulanan();
        return view('home/home', $data);
    }
    public function print(){
        return view('laporan_print/index');
    }
}
