<?php

namespace Quanghuy\Mvcoop\Controllers\Admin;

use Quanghuy\Mvcoop\Commons\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return $this->renderViewAdmin('dashboard');
    }
}
