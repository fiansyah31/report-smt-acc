<?php

namespace App\Controllers;
use \Myth\Auth\Models\UserModel;
use App\Models\LaporanModel;
use CodeIgniter\I18n\Time;

class Home extends BaseController
{
        public function login() {
            $data['title'] = 'Login';

            return view('auth/login', $data);
        }
        public function register() {
            $data['title'] = 'Register';

            return view('auth/register', $data);
        }
        public function forgot() {
            $data['title'] = 'Forgot Password';

            return view('auth/forgot', $data);
        }
}
