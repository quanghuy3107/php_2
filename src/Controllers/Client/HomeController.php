<?php

namespace Quanghuy\Mvcoop\Controllers\Client;

use Quanghuy\Mvcoop\Commons\Controller;
use Quanghuy\Mvcoop\Models\Posts;

class HomeController extends Controller
{
    private Posts $post;

    public function __construct()
    {
        $this->post = new Posts();
    }
    public function index()
    {
        $postFirstLatest = $this->post->getFirstLatest()[0];

        $postTop6 = $this->post->getTop6();
        $postTop6Chunk = array_chunk($postTop6, 3);
        return $this->renderViewClient(
            'home',
            [
                'postFirstLatest' => $postFirstLatest,
                'postTop6Chunk' => $postTop6Chunk
            ]
        );
    }
}
