<?php

$dbhost = 'localhost:3306';
$dbuser = 'root';
$dbpass = '';

$connection = mysqli_connect($dbhost, $dbuser, $dbpass);

if (!$connection) {
  echo 'Error connecting';
}

mysqli_select_db($connection, 'shoppingItems');
