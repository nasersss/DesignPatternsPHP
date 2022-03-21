<?php 
/**
 * [ This function for reading sql queries]
 *
 * @return [type]
 * 
 */
private function initializStm()
{
    $this->table_name = $this->table_name === null ? ''  : $this->table_name;

    $this->columns    = $this->columns    === [] ? '*' : implode(', ', $this->columns);
    $this->values     = $this->values     === [] ? ''  : implode(', ', $this->values);

    $this->join      = $this->join      === null ? '' : $this->join;
    $this->rightJoin = $this->rightJoin === null ? '' : $this->rightJoin;
    $this->leftJoin  = $this->leftJoin  === null ? '' : $this->leftJoin;

    $this->condition = $this->condition === null ? ''  : " WHERE $this->condition ";
    $this->orderBy   = $this->orderBy   === null ? ''  : " ORDER BY $this->orderBy ";
    $this->limit     = $this->limit     === null ? ''  : " LIMIT $this->limit ";
    $this->groupBy   = $this->groupBy   === null ? ''  : " GROUP BY $this->groupBy ";

    $this->duplicate   = $this->duplicate   === true ? '' : 'DISTINCT';
    $this->columnCount = $this->columnCount === null ? " id " : "$this->duplicate  $this->columnCount";
}


?>