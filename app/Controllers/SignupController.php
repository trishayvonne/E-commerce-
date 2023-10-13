<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class SignupController extends BaseController
{
    public function index()
    {
        helper(['form']);
        $data = [];
        echo view('signup', $data);
    }
  
    public function store()
    {
        helper(['form']);
        $rules = [
            'username'          => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[user.email]',
            'password'      => 'required|min_length[4]|max_length[150]',
            'confirmpassword'  => 'matches[password]'
        ];
          
        if($this->validate($rules)){
            $userModel = new UserModel();
            $data = [
                'username'     => $this->request->getVar('username'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $userModel->insert($data);
            return redirect()->to('/signin');
        }else{
            $data['validation'] = $this->validator;
            echo view('signup', $data);
        }
          
    }
}
