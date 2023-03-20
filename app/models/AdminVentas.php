<?php

class AdminVentas
{
    private $db;

    public function __construct()
    {
        $this->db = Mysqldb::getInstance()->getDatabase();
    }

    public function getSales() {
        $sql = 'SELECT carts.date as sale_date, carts.id as idCart, users.email as email, carts.user_id as user_id,
            SUM(carts.quantity) as total_quantity, 
            SUM(carts.discount) as total_discount, 
            SUM(carts.send) as total_send, 
            SUM(carts.total) as total_amount
            FROM carts 
            JOIN users ON carts.user_id = users.id 
            WHERE carts.state = 1
            GROUP BY sale_date
            ORDER BY sale_date';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getSalesDetails($user_id, $sale_date) {
        $sql = 'SELECT carts.*, products.name, products.price
        FROM carts
        JOIN products ON carts.product_id = products.id
        WHERE carts.user_id = :user_id AND carts.date = :sale_date AND carts.state = 1';
        $query = $this->db->prepare($sql);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $query->bindParam(':sale_date', $sale_date, PDO::PARAM_STR);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}