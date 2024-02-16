<?php

namespace Quanghuy\Mvcoop\Models;

use Quanghuy\Mvcoop\Commons\Model;

class Posts extends Model
{
    public function getAllPost()
    {
        $sql = "SELECT * FROM posts INNER JOIN categories ON posts.cateId = categories.id INNER JOIN users ON posts.author = users.id ";
        return $this->select($sql);
    }

    public function findPosts($id = 0)
    {
        $sql = "SELECT * FROM posts INNER JOIN categories ON posts.cateId = categories.id WHERE posts.postsid = :postsid";
        return $this->select($sql, ['postsid' => $id]);
    }

    public function updatePosts($data = [])
    {
        $sql = "UPDATE posts SET title = :title, content = :content, image = :image, cateId = :cateId WHERE postsid = :postsid";
        return $this->update($sql, ['postsid' => $data['postsid'], 'content' => $data['content'], 'title' => $data['title'], 'image' => $data['image'], 'cateId' => $data['cateId']]);
    }

    public function deletePosts($id = 0)
    {
        $sql = "DELETE FROM posts WHERE postsid = :postsid";
        return $this->delete($sql, ['postsid' => $id]);
    }

    public function insertPosts($data = [])
    {
        $sql = "INSERT INTO posts (title, author, content, image, cateId) VALUES (:title, :author , :content, :image, :cateId) ";
        return $this->insert($sql, ['title' => $data['title'], 'author' => $data['author'], 'image' => $data['image'], 'content' => $data['content'], 'cateId' => $data['cateId']]);
    }

    public function getFirstLatest($cate = 0)
    {
        if (empty($cate)) {
            $sql = "SELECT * FROM posts as p INNER JOIN categories as c ON p.cateId = c.id ORDER BY p.postsid DESC LIMIT 1";
            return $this->select($sql);
        } else {
            $sql = "SELECT * FROM posts as p INNER JOIN categories as c ON p.cateId = c.id WHERE p.cateId = :cateId ORDER BY p.postsid DESC LIMIT 1 ";
            return $this->select($sql, ['cateId' => $cate]);
        }
    }

    public function getTop6($cate = 0)
    {
        if (empty($cate)) {
            $sql = "SELECT * FROM posts as p INNER JOIN categories as c ON p.cateId = c.id ORDER BY p.postsid DESC LIMIT 6";
            return $this->select($sql);
        } else {
            $sql = "SELECT * FROM posts as p INNER JOIN categories as c ON p.cateId = c.id WHERE p.cateId = :cateId ORDER BY p.postsid DESC LIMIT 6 ";
            return $this->select($sql, ['cateId' => $cate]);
        }
    }
}
