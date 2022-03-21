<?php 


// This function for left join query
public function leftJoin(string $table_name, $FK, $PK):DB
{
    $this->leftJoin = " LEFT JOIN  $table_name  ON  $FK  =  $PK";
    return $this;
}


// This function for right statment

public function rightJoin(string $table_name, $FK, $PK):DB
{
    $this->rightJoin = " RIGHT JOIN  $table_name  ON  $FK  =  $PK";
    return $this;
}

public function join(string $table_name, $FK, $PK):DB
{
    $this->join = " JOIN  $table_name  ON  $FK  =  $PK";
    return $this;
}


?>