<?php

class PDOWrapper extends PDO
{

    public function __construct($dsn, $user = "", $password = "")
    {
        try {
            parent::__construct($dsn, $user, $password);
        } catch (PDOException $e) {
            trigger_error($e->getMessage());
            return false;
        }
    }


    public function listAll()
    {
        $query = $this->prepare("SELECT * FROM products");
        $query->execute();
        $data = array();

        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $data[] = $row;
        }

        return $data;
    }

    public function insert($name, $description, $price) {
        $stmt = $this->prepare("INSERT INTO products (`name`, `description`, `price`) VALUES (:name, :description, :price)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM products WHERE id =:id";
        $stmt = $this->prepare($sql);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
    }
}