<?php

namespace Quanghuy\Mvcoop\Controllers\Client;

use Quanghuy\Mvcoop\Commons\Controller;
use Quanghuy\Mvcoop\Models\Posts;

class PostsController extends Controller
{
    private Posts $posts;
    public function __construct()
    {
        $this->posts = new Posts();
    }

    public function show($id)
    {
        $data = $this->posts->findPosts($id)[0];
        $this->renderViewClient('post-show', ['post' => $data,]);
    }
}
