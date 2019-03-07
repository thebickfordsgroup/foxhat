<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set("display_errors", 1);

include_once('../include/config.php');

include('../login/include/webzone.php');
$u1 = new YgpUserSession();
if(!$u1->isConnected()) header('Location: ../login/');

include_once('./include/functions/functions.php');
include_once('./include/functions/display_functions.php');
include_once('./include/functions/db_functions.php');
include_once('./include/functions/Forms.php');

include_once('./include/db/db_class.php');

?>