<?php

namespace Quanghuy\Mvcoop\Models;

use Quanghuy\Mvcoop\Commons\Model;

class User extends Model
{
    public function getAllUser()
    {
        $sql = "SELECT * FROM users ";
        return $this->select($sql);
    }

    public function findUsers($id = 0)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        return $this->select($sql, ['id' => $id]);
    }

    public function updateUsers($data = [])
    {
        $sql = "UPDATE users SET username = :username, email = :email, password = :password WHERE id = :id";
        return $this->update($sql, ['username' => $data['username'], 'email' => $data['email'], 'password' => $data['password']]);
    }

    public function deleteUsers($id = 0)
    {
        $sql = "DELETE FROM users WHERE id = :id";
        return $this->delete($sql, ['id' => $id]);
    }

    public function insertUsers($data = [])
    {
        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email , :password) ";
        return $this->insert($sql, ['username' => $data['username'], 'email' => $data['email'], 'password' => $data['password']]);
    }

    public function checkEmailAndPassword($data = []){
        $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
        return $this->select($sql, ['email' => $data['email'], 'password' => $data['password']]);
    }
}
