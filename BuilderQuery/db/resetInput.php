<?php
/**
 * [This function used to reset input ]
 *
 */
private function resetInput()
{
    $this->table_name = null;
    $this->columns    = [];
    $this->values     = [];

    $this->join      = null;
    $this->rightJoin = null;
    $this->leftJoin  = null;

    $this->condition   = null;
    $this->order       = null;
    $this->orderColumn = null;
    $this->limit       = null;

    $this->columnCount = null;
    $this->duplicate   = null;

    $this->result = [];
}

?>