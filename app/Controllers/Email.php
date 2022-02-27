<?php  

namespace App\Controllers;
use \Myth\Auth\Models\UserModel;
use App\Models\EmailModel;


use Config\Services;
 

class Email extends BaseController
{
    protected $emailmodel;

    public function __construct()
    {
       
        $this->emailmodel = new EmailModel();
    }
    public function index() {
        $data = [
            'title' => 'Mengatur Email',
            'email' => $this->emailmodel->getEmail(),
        ];
      
        return view('email/index', $data);
    }
    public function tesemail(){

        $email = \Config\Services::email();
        $emailss = $this->emailmodel->getEmail();
        $message=  "Email yang anda gunakan aktif";
        $email->setFrom('admin@report-smt-acc.site', 'Tes Email');
        foreach ($emailss as $k):
        $email->setTo($k['email']);
        endforeach;
        $email->setSubject('Tes Email');
        $email->setMessage($message);
        $email->send();
        session()->setFlashdata('pesan', "Email berhasil di kirim, silahkan periksa email.");
        return redirect()->to('email/index');
    }
    public function change($id_email) {
        
        $data = [
            'title' => 'Change Email',
            'change' => $this->emailmodel->getEmail($id_email),
        ];   
        return view('email/change', $data);
    }
    public function updateemail($id_email){
        
        $this->emailmodel->save([
            'id_email' => $id_email,
            'email' => $this->request->getVar('email'),
            'user_id' => user()->id,
        ]);
        session()->setFlashdata('pesan', "Email berhasil di update.");

        return redirect()->to('email/index');
    }
}
?>