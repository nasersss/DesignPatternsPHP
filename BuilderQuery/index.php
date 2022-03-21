<?php

require_once './controller.php'
// Select statment example
$DB_Query=new DB();

$DB_Query->table("gatagorey")->select("*")->get();
echo "<hr>";
print_r($DB_Query->result);
$DB_Join = new DB();

//  JOIN statment example
$DB_Join -> table('gatagorey')
-> select('gatagorey.id', 'gatagorey.name', 'product.prodName')
-> join('product', 'gatagorey.id', 'product.gataID')
-> get();

echo "<hr>";
echo "Example JOIN";
print_r($DB_Join->result);
echo "<hr>";





//  LEFT JOIN statment example

$DB_leftJoin = new DB();
$DB_leftJoin -> table('gatagorey')
-> select('gatagorey.id', 'gatagorey.name', 'product.prodName')
-> leftJoin('product', 'gatagorey.id', 'product.gataID')
-> get();


echo "<hr>";
echo "Example JOIN";
print_r($DB_leftJoin->result);
echo "<hr>";

// // Example RIGHT JOIN

$DB_rightJoin = new DB();
$DB_rightJoin -> table('gatagorey')
-> select('gatagorey.id', 'gatagorey.name', 'product.prodName')
-> rightJoin('product', 'gatagorey.id', 'product.gataID')
-> get();

echo "<hr>";
echo "Example JOIN";
print_r($DB_rightJoin->result);
echo "<hr>";
?>