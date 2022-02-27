<?php
 
namespace App\Controllers;
 
use \Myth\Auth\Models\UserModel;
use \Myth\Auth\Password;
use \Myth\Auth\Authorization\GroupModel;
use Myth\Auth\Entities\User;
 
class Users extends BaseController
{
     
    public function index()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();
 
        $groupModel = new GroupModel();
 
    foreach ($data['users'] as $row) {
        $dataRow['group'] = $groupModel->getGroupsForUser($row->id);
        $dataRow['row'] = $row;
        $data['row'.$row->id] = view('users/row', $dataRow);
    }
 
    $data['groups'] = $groupModel->findAll();

        $data['title'] = 'Users';
        return view('users/index', $data);
    }
 
    public function activate()
    {
        $userModel = new UserModel();
 
        $data = [ 
            'activate_hash' => null,
            'active' => $this->request->getVar('active') == '0' || '' ? '1' : '0',
        ];
        $userModel->update($this->request->getVar('id'), $data);        
 
        return redirect()->to(base_url('/users/index'));
 
    }
 
    public function changePassword($id = null)
    {
        if ($id==null) 
        {
            return redirect()->to(base_url('/users/index'));
        } else
        {
            $data = [            
                'id' => $id,
                'title' => 'Update Password',
            ];
            return view('users/set_password', $data);            
        }
    }
 
    public function setPassword()
    {
        $id = $this->request->getVar('id');
        $rules = [
            'password'     => 'required|strong_password',
            'pass_confirm' => 'required|matches[password]',
        ];
 
        if (! $this->validate($rules))
        {
            $data = [            
                'id' => $id,
                'title' => 'Update Password',
                'validation' => $this->validator,
            ];
 
            return view('users/set_password', $data);
        }
        else
        {
            $userModel = new UserModel();
            $data = [            
                'password_hash' => Password::hash($this->request->getVar('password')),
                'reset_hash' => null,
                'reset_at' => null,
                'reset_expires' => null,
            ];
            $userModel->update($this->request->getVar('id'), $data);  
 
            return redirect()->to(base_url('/users/index'));
        }
    }

    public function changeGroup()
    {
    $userId = $this->request->getVar('id');
    $groupId = $this->request->getVar('group');
 
    $groupModel = new GroupModel();
    $groupModel->removeUserFromAllGroups(intval($userId));
 
    $groupModel->addUserToGroup(intval($userId), intval($groupId));
 
    return redirect()->to(base_url('/users/index'));
 
    }

    public function profile() {
        $data = [
            'title' => 'My Profile'

        ];
		return view('users/profile', $data);
    }
    public function change_profile($id) {

        $userModel = new UserModel();
           $data = [
            'title' => 'Change profile',
            'validation' => \Config\Services::validation(),
        ];
		return view('users/change_profile', $data);
    }
    public function update_profile()
    {
        $userModel = new UserModel();
        $userModel->save([
            'id' => user()->id,
            'id_karyawan' => $this->request->getVar('id_karyawan'),
            'fullname' => $this->request->getVar('fullname'),
            'email' => $this->request->getVar('email'),

        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('users/profile');
    }
   
}