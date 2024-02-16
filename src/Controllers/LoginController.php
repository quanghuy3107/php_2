<?php

namespace Quanghuy\Mvcoop\Controllers;

use Quanghuy\Mvcoop\Commons\Controller;
use Quanghuy\Mvcoop\Models\User;

class LoginController extends Controller
{
    private $user;
    public function __construct()
    {
        $this->user = new User();
    }
    public function index()
    {
        $this->renderViewAdmin('login');
    }

    public function check()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $data = [
            'email' => $email,
            'password' => $password
        ];
        $checkUser = $this->user->checkEmailAndPassword($data);
        if(!empty($checkUser))
        {
            $_SESSION['user'] = $checkUser[0];
            $this->renderViewAdmin('dashboard');
        }else
        {
            $_SESSION['danger'] = "Kiểm tra lại tài khoản, mật khẩu";
            $this->renderViewAdmin('login');
        }

        die;
    }
}
