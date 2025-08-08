<?php
session_start();
require 'db_connect.php';

session_destroy();
header('location: login.php');
?>
