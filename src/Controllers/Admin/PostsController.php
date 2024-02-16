<?php

namespace Quanghuy\Mvcoop\Controllers\Admin;

use Quanghuy\Mvcoop\Commons\Controller;
use Quanghuy\Mvcoop\Models\Category;
use Quanghuy\Mvcoop\Models\Posts;

class PostsController extends Controller
{
    private Posts $posts;
    private string $folder = 'posts.';
    const PATH_UPLOAD = '/uploads/';
    private Category $category;

    public function __construct()
    {
        $this->posts = new Posts();
    }
    public function show()
    {
        $data = $this->posts->getAllPost();
        return $this->renderViewAdmin($this->folder . __FUNCTION__, ['data' => $data]);
    }

    public function update($id)
    {
        $this->category = new Category();
        $dataCategory = $this->category->getAllCategory();
        $data = $this->posts->findPosts($id);
        return $this->renderViewAdmin($this->folder . __FUNCTION__, ['data' => $data[0], 'dataCategory' => $dataCategory]);
    }

    public function updatePost($id)
    {
        $data = $this->posts->findPosts($id)[0];
        if (empty($data)) {
            die(404);
        }

        if (!empty($_POST)) {
            $categoryID = $_POST['cate'];
            $title = $_POST['PostsTitle'];
            $content = $_POST['Content'];

            $image = $_FILES['image'] ?? null;
            $imagePath = $data['image'];

            $move = false;

            if ($image) {
                $imagePath = self::PATH_UPLOAD . time() . $image['name'];

                if (!move_uploaded_file($image['tmp_name'], PATH_ROOT . $imagePath)) {
                    $imagePath = $data['image'];
                } else {

                    $move = true;
                }
            }
            if (
                $move
                && $data['image']
                && file_exists(PATH_ROOT . $data['image'])
            ) {
                unlink(PATH_ROOT . $data['image']);
            }
            $data = [
                'postsid' => $id,
                'title' => $title,
                'content' => $content,
                'cateId' => $categoryID,
                'image' => $imagePath
            ];
            $this->posts->updatePosts($data);


            $_SESSION['success'] = "Chỉnh sửa thành công";
            header('Location:/admin/posts/update/' . $id);
            exit();
        }
    }

    public function create()
    {
        $this->category = new Category();
        $data = $this->category->getAllCategory();
        return $this->renderViewAdmin($this->folder . __FUNCTION__, ['data' => $data]);
    }

    public function createPost()
    {
        $title = $_POST['PostsTitle'];
        $content = $_POST['Content'];
        $cateId = $_POST['cate'];
        $image      = $_FILES['image'] ?? null;
        $imagePath  = null;
        if ($image) {
            $imagePath = self::PATH_UPLOAD . time() . $image['name'];

            if (!move_uploaded_file($image['tmp_name'], PATH_ROOT . $imagePath)) {
                $imagePath = null;
            }
        }

        $data = [
            'title' => $title,
            'content' => $content,
            'cateId' => $cateId,
            'author' => $_SESSION['user']['id'],
            'image' => $imagePath
        ];

        $this->posts->insertPosts($data);
        $_SESSION['success'] = "Thêm thành công";
        header('Location:/admin/posts/create');
        exit();
    }

    public function delete($id)
    {
        $status = $this->posts->deletePosts($id);
        $_SESSION['success'] = "Xóa thành công";
        header('Location:/admin/posts/');
        exit();
    }
}
