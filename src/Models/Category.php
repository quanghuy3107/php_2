<?php

namespace Quanghuy\Mvcoop\Models;

use Quanghuy\Mvcoop\Commons\Model;

class Category extends Model
{
    public function getAllCategory()
    {
        $sql = "SELECT * FROM categories";
        return $this->select($sql);
    }

    public function findCategory($id = 0)
    {
        $sql = "SELECT * FROM categories WHERE id = :id";
        return $this->select($sql, ['id' => $id]);
    }

    public function updateCategory($data = [])
    {
        $sql = "UPDATE categories SET name = :name WHERE id = :id";
        return $this->update($sql, ['id' => $data['CategoryId'], 'name' => $data['CategoryName']]);
    }

    public function deleteCategory($id = 0)
    {
        $sql = "DELETE FROM categories WHERE id = :id";
        return $this->delete($sql, ['id' => $id]);
    }

    public function insertCategory($data = [])
    {
        $sql = "INSERT INTO categories (name) VALUES (:name) ";
        return $this->insert($sql, ['name' => $data['CategoryName']]);
    }
}
