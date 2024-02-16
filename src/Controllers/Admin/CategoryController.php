<?php

namespace Quanghuy\Mvcoop\Controllers\Admin;

use Quanghuy\Mvcoop\Commons\Controller;
use Quanghuy\Mvcoop\Models\Category;

class CategoryController extends Controller
{
    private Category $category;
    private string $folder = 'categories.';

    public function __construct()
    {
        $this->category = new Category();
    }
    public function show()
    {
        $data = $this->category->getAllCategory();
        return $this->renderViewAdmin($this->folder . __FUNCTION__, ['data' => $data]);
    }

    public function update($id)
    {
        $data = $this->category->findCategory($id);
        return $this->renderViewAdmin($this->folder . __FUNCTION__, ['data' => $data[0]]);
    }

    public function updatePost($id)
    {
        if (!empty($_POST)) {
            $name = $_POST['CategoryName'];
            $status = $this->category->updateCategory(['CategoryId' => $id, 'CategoryName' => $name]);
            $_SESSION['success'] = "cập nhật thành công";
            header('Location:/admin/category/update/' . $id);
            exit();
        }

        header('Location:/admin/category');
    }

    public function create()
    {
        return $this->renderViewAdmin($this->folder . __FUNCTION__);
    }

    public function createPost()
    {
        $name = $_POST['CategoryName'];
        $status = $this->category->insertCategory(['CategoryName' => $name]);
        $_SESSION['success'] = "Thêm thành công";
        header('Location:/admin/category/create');
        exit();
    }

    public function delete($id)
    {
        $status = $this->category->deleteCategory($id);
        $_SESSION['success'] = "Xóa thành công";
        header('Location:/admin/category/');
        exit();
    }
}
