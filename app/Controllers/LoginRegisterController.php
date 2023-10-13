<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Libraries\Hash;

class LoginRegisterController extends BaseController
{
    public function index()
    {
      
    }

    public function __construct(){
        helper(['url', 'form']);
    }

    public function register()
    {

        $validation = $this->validate([

                'username' => 'required',
                'email' => 'required|valid_email|is_unique[user.email]',
                'password' => 'required|min_length[4]|max_length[12]',
                'confirmpassword' => 'required|min_length[4]|max_length[12]|matches[password]'
        ]);



        if(!$validation){
            return view('/register', ['validation'=>$this->validator]);
        }else{
            $userModel = new UserModel();

            $username = $this->request->getPost('username');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
    
    
            $data = [
                'username' => $username,
                'email' => $email,
                'password' => Hash::make($password),
            ];
            $r = $userModel->insert($data);
            if($r){
            return redirect()->to('/login')->with('success', 'Login your created account');
            }else{
                return redirect()->to('/register')->with('fail', 'Something went wrong');
            }
        }
       
    }

    public function login()
{
    $validation = $this->validate([
        'email' => [
            'rules' => 'required|valid_email',
            'errors' => [
                'required' => 'Email is required',
                'valid_email' => 'Enter a valid email address',
            ],
        ],
        'password' => 'required|min_length[4]|max_length[12]',
    ]);

    if (!$validation) {
        return view('/userLogin', ['validation' => $this->validator]);
    } else {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $userModel = new \App\Models\UserModel();
        $user_info = $userModel->where('email', $email)->first();

        if (!$user_info) {
            session()->setFlashdata('fail', 'Invalid Email');
            return redirect()->to('/login')->withInput();
        }

        // Check if the entered password matches the stored hashed password
        if (password_verify($password, $user_info['password'])) {
            session()->setFlashdata('fail', 'Incorrect Password');
            return redirect()->to('/login')->withInput();
        } else {
         
            $user_id = $user_info['id'];
            session()->set('loggedUser', $user_id);
            return redirect()->to('/ecommerce');
        }
    }
}

    

    
    public function logout(){
        if(session()->has('loggedUser')){
            session()->remove('loggedUser');
            return redirect()->to('/login?access=out')->with('fail', 'You are Logout');
        }
    }
}
