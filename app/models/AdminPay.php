<?php

class AdminPay
{
    private $db;

    public function __construct()
    {
        $this->db = Mysqldb::getInstance()->getDatabase();
    }

    public function create($name, $code)
    {

        $query = $this->db->prepare('INSERT INTO payment_methods (name, code) VALUES (:name, :code)');
        $query->execute([
            ':name' => $name,
            ':code' => $code,
        ]);

        return true;

    }


    public function edit($id, $name, $code)
    {
        $query = $this->db->prepare('UPDATE payment_methods SET name = :name, code = :code WHERE id = :id');
        $result = $query->execute([
            ':id' => $id,
            ':name' => $name,
            ':code' => $code,
        ]);

        return $result;
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM payment_methods WHERE id=:id';
        $params = [
            'id' => $id,
        ];

        $query = $this->db->prepare($sql);

        return $query->execute($params);
    }


    public function getAll()
    {
        $query = $this->db->prepare('SELECT * FROM payment_methods');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getById($id)
    {
        $query = $this->db->prepare('SELECT * FROM payment_methods WHERE id = :id');
        $query->execute([':id' => $id]);

        return $query->fetch(PDO::FETCH_OBJ);
    }


}