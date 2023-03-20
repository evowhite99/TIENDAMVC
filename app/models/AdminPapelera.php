<?php

class AdminPapelera
{
    private $db;

    public function __construct()
    {
        $this->db = Mysqldb::getInstance()->getDatabase();
    }
    public function getProducts()
    {
        $sql = 'SELECT * FROM products WHERE deleted=1';
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }


    public function getUsers()
    {
        $sql = 'SELECT * FROM admins WHERE deleted=1';
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function getProductsUpdate($id)
    {
        $sql = 'UPDATE products SET deleted = 0, deleted_at = NULL WHERE id = :id';
        $params = [
            ':id' => $id,
        ];
        $query = $this->db->prepare($sql);
        $query->execute($params);

        return $query->fetch(PDO::FETCH_OBJ);
    }
    public function getUsersUpdate($id)
    {
        $sql = 'UPDATE admins SET deleted = 0, deleted_at = NULL WHERE id = :id';
        $params = [
            ':id' => $id,
        ];
        $query = $this->db->prepare($sql);
        $query->execute($params);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}