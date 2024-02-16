<?php

namespace Quanghuy\Mvcoop\Commons;

class Model
{
    protected \PDO|null $conn;

    public function __construct()
    {
        $host = DB_HOST;
        $post = DB_PORT;
        $dbname = DB_NAME;
        $username = DB_USERNAME;
        $password = DB_PASSWORD;

        try {
            $this->conn = new \PDO("mysql:host=$host;port=$post;dbname=$dbname", $username, $password);

            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        } catch (\PDOException $PDOException) {
            echo "Kết nối thất bại: " . $PDOException->getMessage();
            die;
        }
    }

    public function select($sql, $parameters = [])
    {
        try {
            $stmt = $this->query($sql, $parameters);
            $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            // $this->conn = $this->disConnect();
            return $data;
        } catch (\Exception $e) {
            $e->getMessage();
            die;
        }
    }


    public function update($sql, $parameters = [])
    {
        try {
            $this->query($sql, $parameters);
            // $this->conn = $this->disConnect();
            return true;
        } catch (\Exception $e) {
            $e->getMessage();
            die;
        }
    }


    public function insert($sql, $parameters = [])
    {
        try {

            $this->query($sql, $parameters);
            return true;
        } catch (\Exception $e) {
            $e->getMessage();
            return false;
        }
    }

    public function insertGetId($sql, $parameters = [])
    {
        try {
            $this->query($sql, $parameters);
            $id = $this->conn->lastInsertId();
            // $this->conn = $this->disConnect();
            return $id;
        } catch (\Exception $e) {
            $e->getMessage();
            return false;
        }
    }

    public function delete($sql, $parameters = [])
    {
        try {
            $this->query($sql, $parameters);

            // $this->conn = $this->disConnect();
            return true;
        } catch (\Exception $e) {
            $e->getMessage();
            return false;
        }
    }

    public function query($sql, $parameters = [])
    {
        $stmt = $this->conn->prepare($sql);
        if (!empty($parameters)) {
            foreach ($parameters as $key => &$value) {
                $stmt->bindParam(":$key", $value);
            }
        }

        $stmt->execute();
        return $stmt;
    }


    public function __destruct()
    {
        $this->conn = null;
    }
}
