<?php

class AdminNuevo
{
    private $db;

    public function __construct()
    {
        $this->db = Mysqldb::getInstance()->getDatabase();
    }

    public function getUsers()
    {
        $sql = 'SELECT * FROM users ';
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function getUserById($id)
    {
        $sql = 'SELECT * FROM users WHERE id = :id';
        $query = $this->db->prepare($sql);
        $query->execute([':id' => $id]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function setUser($user)
    {
        $errors = [];

        if ($user['password']) {

            $sql = 'UPDATE users SET first_name=:first_name, email=:email, password=:password, last_name_1=:last_name_1, last_name_2=:last_name_2, address=:address, 
                 city=:city, state=:state, zipcode=:zipcode, country=:country, is_admin=:is_admin
                    WHERE id=:id';
            $pass = hash_hmac('sha512', $user['password'], ENCRIPTKEY);
            $params = [
                ':id' => $user['id'],
                ':first_name' => $user['first_name'],
                ':email' => $user['email'],
                ':password' => $pass,
                ':last_name_1' => $user['last_name_1'],
                ':last_name_2' => $user['last_name_2'],
                ':address' => $user['address'],
                ':city' => $user['city'],
                ':state' => $user['state'],
                ':zipcode' => $user['zipcode'],
                ':country' => $user['country'],
                ':is_admin' => $user['is_admin'] ? 1 : 0,

            ];

        } else {

            $sql = 'UPDATE users SET first_name=:first_name, email=:email, last_name_1=:last_name_1, last_name_2=:last_name_2, address=:address, 
                 city=:city, state=:state, zipcode=:zipcode, country=:country, is_admin=:is_admin
                    WHERE id=:id';
            $params = [
                ':id' => $user['id'],
                ':first_name' => $user['first_name'],
                ':email' => $user['email'],
                ':last_name_1' => $user['last_name_1'],
                ':last_name_2' => $user['last_name_2'],
                ':address' => $user['address'],
                ':city' => $user['city'],
                ':state' => $user['state'],
                ':zipcode' => $user['zipcode'],
                ':country' => $user['country'],
                ':is_admin' => $user['is_admin'] ? 1 : 0,

            ];

        }

        $query = $this->db->prepare($sql);

        if ( ! $query->execute($params) ) {
            array_push($errors, 'Error al modificar el usuario');
        }

        return $errors;

    }

    public function delete($id)
    {
        $errors = [];

        $sql = 'DELETE FROM users WHERE id=:id';
        $params = [
            'id' => $id,
        ];

        $query = $this->db->prepare($sql);

        if ( ! $query->execute($params) ) {
            array_push($errors, 'Error al eliminar el usuario administrador');
        }

        return $errors;
    }

}