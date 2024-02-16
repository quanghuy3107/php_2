<?php

namespace Quanghuy\Mvcoop\Controllers\Admin;

use Quanghuy\Mvcoop\Commons\Controller;
use Quanghuy\Mvcoop\Models\User;

class UserController extends Controller
{
    private User $user;
    private String $folder = 'users.';

    public function __construct()
    {
        $this->user = new User();
    }
    public function index()
    {

        return $this->renderViewAdmin('user');
    }
}
