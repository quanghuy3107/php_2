<?php

namespace Quanghuy\Mvcoop\Controllers\Client;

use Quanghuy\Mvcoop\Commons\Controller;
use Quanghuy\Mvcoop\Models\Posts;

class CategoryClientController extends Controller
{
    private Posts $post;

    public function __construct()
    {
        $this->post = new Posts();
    }
    public function show($id)
    {

        $postFirstLatest = $this->post->getFirstLatest($id)[0];
        $postTop6 = $this->post->getTop6($id);
        if (!empty($postFirstLatest) && !empty($postTop6)) {
            $postTop6Chunk = array_chunk($postTop6, 3);
            return $this->renderViewClient(
                'home',
                [
                    'postFirstLatest' => $postFirstLatest,
                    'postTop6Chunk' => $postTop6Chunk
                ]
            );
        } else {
            header('location:/');
        }
    }
}
