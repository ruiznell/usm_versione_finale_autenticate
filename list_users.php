<?php
require "./__autoload.php";
use sarassoroberto\usm\model\UserModel;
session_start();

$model = new UserModel();
$title = "List User";
include './src/view/list_users_view.php';
?>
