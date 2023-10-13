<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class AdminController extends BaseController
{
   
    public function index()
    {
        helper(['form']);
        echo view('adminLogin'); // Create an admin login view
    }

   public function adminAuth()
{
    $session = session();
    $adminModel = new AdminModel();
    $username = $this->request->getVar('username');
    $password = $this->request->getVar('password');

    $data = $adminModel->where('username', $username)->first();

    if ($data) {
        $pass = $data['password'];
        $authenticatePassword = password_verify($password, $pass);

        if ($authenticatePassword) {
            $ses_data = [
                'id' => $data['id'],
                'username' => $data['username'],
                'isAdminLoggedIn' => TRUE
            ];
            $session->set($ses_data);
            return redirect()->to('/dashboard'); // Redirect to the admin dashboard
        } else {
            $session->setFlashdata('error_msg', 'Password is incorrect.');
            return redirect()->to('/adminLogin');
        }
    } else {
        $session->setFlashdata('error_msg', 'Username does not exist.');
        return redirect()->to('/adminLogin');
    }
}
public function logout()
{
    $session = session();
    
    // Destroy the user's session data
    $session->destroy();

    // Redirect to the sign-in page
    return redirect()->to('/adminLogin');
}

}
