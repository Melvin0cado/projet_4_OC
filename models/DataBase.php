<?php
class DataBase
{
    private $pdo;

    private function connect()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=projet_4_oc;charset=utf8', 'root', '');
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
    }

    public function selectAll(String $table_name, String $sortType='', String $sort='')
    {
        $this->connect();

        $query = "SELECT * FROM $table_name";

        if ($sort !== '') {
            $query = $query." ORDER BY $sortType $sort";
        }

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

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
    }

    public function deleteById(String $table_name, int $id)
    {
        $this->connect();

        $query = "DELETE FROM $table_name WHERE id=?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id]);

        return $stmt->rowCount();
    }
}
