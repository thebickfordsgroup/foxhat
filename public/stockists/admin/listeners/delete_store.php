<?php
include('../../include/webzone.php');

$store_id = $_POST['id'];

$s1 = new MySqlTable();
$sql = 'DELETE FROM '.$GLOBALS['db_table_name'].' WHERE id="'.$s1->escape($store_id).'"';
$s1->executeQuery($sql);

?>