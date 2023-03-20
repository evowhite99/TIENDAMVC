<?php

class Shop
{
    private $db;

    public function __construct()
    {
        $this->db = Mysqldb::getInstance()->getDatabase();
    }

    public function getMostSold()
    {
        $sql = 'SELECT * FROM products WHERE mostSold=1 AND deleted=0 LIMIT 8';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getProductById($id)
    {
        $sql = 'SELECT * FROM products WHERE id=:id';
        $query = $this->db->prepare($sql);
        $query->execute([':id' => $id]);

        $product = $query->fetch(PDO::FETCH_OBJ);
        $relation1 = $product->relation1;
        $relation2 = $product->relation2;
        $relation3 = $product->relation3;

        $relatedProducts = $this->getRelatedProducts([$relation1, $relation2, $relation3]);

        $product->related_products = $relatedProducts;

        return $product;
    }
    public function getRelatedProducts($relatedIds)
    {
        $relacionado = implode(',', array_fill(0, count($relatedIds), '?'));
        $sql = "SELECT * FROM products WHERE id IN ($relacionado)";
        $query = $this->db->prepare($sql);
        $query->execute($relatedIds);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getNews()
    {
        $sql = 'SELECT * FROM products WHERE mostSold!=1 AND new=1 AND deleted=0 LIMIT 8';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function sendEmail($name, $email, $message)
    {
        $msg = $name . ', ha enviado un mensaje nuevo. <br>';
        $msg .= 'Su correo es: ' . $email . '<br>';
        $msg .= 'Mensaje:<br>' . $message;

        $headers = 'MIME-Version: 1.0\r\n';
        $headers .= 'Content-type:text/html; charset=UTF-8\r\n';
        $headers .= 'From: ' . $name . '\r\n';
        $headers .= 'Reply-to: ' . $email . '\r\n';

        $subject = 'Mensaje del usuario ' . $name;

        return mail('info@tiendamvc.local', $subject, $msg, $headers);

    }
}