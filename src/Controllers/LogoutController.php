<?php

namespace Quanghuy\Mvcoop\Controllers;

use Quanghuy\Mvcoop\Commons\Controller;

class LogoutController extends Controller
{
    public function logout()
    {
        $_SESSION['user'] = null;
        header('location:/');
    }
}