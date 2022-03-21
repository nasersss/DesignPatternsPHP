<?php 
require_once './dbconfig.php';

class controller extends DB{
    private $table_name;
//varible for table colunms  
private $columns    = [];
// Varible for values that will use in condition 
private $values     = [];
// Varible for counditon that will control query
private $condition;
// Varible for limit number of rows
private $limit;
// Varible for olderBy that will use for sorting query
private $orderBy;
// Varible for groupBy  that will use for grouping  query
private $groupBy;
// Varible for join statment 
private $join;
// Varible for right join statment 
private $rightJoin;
// Varible for left join statment 
private $leftJoin;
// Varible will use for prevent the repeat records 
private $duplicate;
private $columnCount;

/**
 *
 * @param string ...$column_name
 * 
 * @return DB
 * 
 */
public function select(string ...$column_name):DB
{
    $this->columns = $column_name;
    return $this;
}

/**
 * [This function return orderd data]
 *
 * @param string $order
 * @param string ...$column_name
 * 
 * @return DB
 * 
 */
public function orderBy(string $order, string ...$column_name):DB
{
    $this->orderBy = implode(',', $column_name) . " $order";
    return $this;
}

/** 
 *
 * @param string ...$column_name
 * 
 * @return DB
 * 
 */
public function groupBy(string ...$column_name):DB
{
    $this->groupBy = implode(',', $column_name);
    return $this;
}

/**
 *
 * @param string $column_name
 * @param string $opreation
 * @param mixed $value
 * 
 * @return DB
 * 
 */
public function where(string $column_name, string $opreation, $value):DB
{
    $condition = $column_name . " " . $opreation . "  '$value'";

    $this->condition === null ?
        $this->condition = $condition : 
        $this->condition .= ' AND ' . $condition;

    return $this;
}


/**
 * [orwhere statment Function]
 *
 * @param string $column
 * @param string $opreation
 * @param mixed $value
 * 
 * @return DB
 * 
 */
public function orWhere(string $column, string $opreation, $value):DB
{
    $condition = $column . " " . $opreation . "  '$value'";
    $this->condition = $this->condition . ' OR ' . $condition;

    return $this;
}

/**
 * [Used to get value ]
 *
 * @param mixed ...$values
 * 
 * @return DB
 * 
 */
public function value(...$values):DB
{
    $this->values []= $values;
    return $this;
}


/**
 * [This function used for limit statment]
 *
 * @param mixed $number
 * @param null $to
 * 
 * @return DB
 * 
 */
public function limit($number, $to = null):DB
{
    $toRecord = $to === null ? '' : ",$to";
    $this->limit = "$number".$toRecord;

    return $this;
}
 
require_once './join.php';

/**
 * [Description for get]
 *
 * @return [array of items]
 * 
 */
public function get()
{
    $this->initializStm();

    $sql = "SELECT ". $this-> columns .
            " FROM ". $this-> table_name
                    . $this-> join
                    . $this-> leftJoin
                    . $this-> rightJoin
                    . $this-> condition
                    . $this-> groupBy
                    . $this-> orderBy
                    . $this-> limit;

    $stm = $this->conn->prepare($sql);
    echo $sql;
    if ($stm->execute())
    {
        $this->result = $stm->fetchAll(PDO::FETCH_OBJ);
    }
    else
    {
        $this->result = "error";
    }

   
    
}

/**
 * [ Function for update query]

 * 
 */
public function update()
{

    $this->initializStm();

    $sql = "UPDATE ". $this->table_name
                    . " SET "
                    . $this->values
                    . $this-> condition;
   
    $this->conn->prepare($sql)->execute();

    $this->resetInput();
}



/**
 * [Count function for count recoards]
 *
 * @param string|null $column
 * @param bool $duplicate
 * 
 * 
 */
public function count(string $column = null , bool $duplicate = true)
{
    $this->columnCount = $column;
    $this->duplicate   = $duplicate;
   
    $this->initializStm();

    $sql = "SELECT COUNT (". $column ." )".
            " FROM ". $this->table_name
                    . $this->condition
                    . $this->orderBy;

    $stm = $this->conn->prepare($sql);
    if ($stm->execute())
    {
        $this->result = $stm->fetchAll(PDO::FETCH_OBJ);
    }
   
    $this->resetInput();
}

require_once './initializ.php';

require_once './resetInput.php';


}



?>