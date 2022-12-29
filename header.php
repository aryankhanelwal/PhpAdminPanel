<?php
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'jpr';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);


?>


<html>
<head>
<title></title>
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/footer.css">


</head>
<body>
<nav class="nav">
  <img  class="logo" src="img/logo.png">
  <ul id="menuList" class="menu inactive">
    <li class="item active"><a href="http://localhost/Project/index.php">Home</a></li>
    <li class="item"><a href="http://localhost/Project/user_data.php">User</a></li>
    <li class="item"><a href="#">Hello Admin</a></li>

  </ul>
</nav>
