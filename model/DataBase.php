<?php

final class DataBase
{
    private $pdo;
    
    private function connect()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=projet_4_oc;charset=utf8', 'Melvin', 'P9qbyuNzEaPeetFk');
    }

    private function disconnect()
    {
        $this->pdo = null;
    }

    public function insert(String $table_name, array $type_items, array $items)
    {
        $this->connect();
        $string_query = '';
        $string_interrogation_point = '';

        for ($i = 0; $i < count($type_items); $i++) {
            $string_query = $string_query.$type_items[$i];
            $string_interrogation_point = $string_interrogation_point.'?';
            if ($i !== count($type_items) - 1) {
                $string_query = "$string_query, ";
                $string_interrogation_point = "$string_interrogation_point, ";
            }
        }

        $query = "INSERT INTO $table_name ($string_query) VALUES ($string_interrogation_point)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($items);

        $this->disconnect();
    }

    public function selectAll(String $table_name, String $sortBy='', String $sort='', String $class='')
    {
        $this->connect();

        $query = "SELECT * FROM $table_name";

        if ($sort !== '') {
            $query = "$query ORDER BY $sortBy $sort";
        }

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        $this->disconnect();

        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        return $stmt->fetchAll();
    }

    public function selectByElement(String $table_name, String $elementType, String $element, String $sortBy='', String $sort='', String $class='', bool $all=false)
    {
        $this->connect();

        $query = "SELECT * FROM $table_name WHERE $elementType=?";
        if ($sort !== '') {
            $query = "$query ORDER BY $sortBy $sort";
        }

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$element]);

        $this->disconnect();

        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        if ($all === true) {
            return $stmt->fetchAll();
        }
        return $stmt->fetch();
    }

    public function updateById(String $table_name, int $id, array $type_items, array $items)
    {
        $this->connect();
        $string_query = '';

        for ($i = 0; $i < count($type_items); $i++) {
            $string_query = "$string_query $type_items[$i]=?";
            if ($i !== count($type_items) - 1) {
                $string_query = "$string_query, ";
            }
        }

        $itemsToExecute = $items;
        $count = count($itemsToExecute);
        array_push($itemsToExecute, "$id");

        $query = "UPDATE $table_name SET $string_query WHERE id=? ";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($itemsToExecute);
                
        $this->disconnect();
    }

    public function deleteById(String $table_name, int $id)
    {
        $this->connect();

        $query = "DELETE FROM $table_name WHERE id=?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id]);

        $this->disconnect();
    }

    public function query(String $query, $class = null, bool $all = false){
        $this->connect();

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        $this->disconnect();

        if($class !== null){
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        }
        if ($all === true) {
            return $stmt->fetchAll();
        }
        return $stmt->fetch();

    }
}
