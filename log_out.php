<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="banking_system.css">
</head>
<body>
<nav>
<ul class="sidebar"> 
     <li onclick=hideSidebar()><a href="#"><img src="close_24dp_1F1F1F_FILL0_wght400_GRAD0_opsz24.svg"></a></li>  
    <li><a href="bank.php">Dashboard </a></li>
    
<li><a href="About.php">About</a></li>
    <li> <a href="contact_us.html">Contact us</a></li>
<li><a href="log out.php">log out</a></li>
        </ul>
        <ul> 
       <li class=""><a href="bank.php">Dashboard</a></li>  
       <li class="hidOnMobile"> <a href="About.php">About</a></li>
       <li class="hidOnMobile"><a href="contact_us.html">Contact us</a></li>
       
       <li class="hidOnMobile"><a href="help.html">Help</a></li>
       <li class="hidOnMobile"><a href="log out.php">log out</a></li>
       <li class="menu-button" onclick=showSidebar()><a href=#><img src="menu_24dp_1F1F1F_FILL0_wght400_GRAD0_opsz24.svg"  height="26"  width="26"></a></li>
                 </ul>
        </nav>



    
</body>
</html>



<?php
session_start();
require 'db_connect.php';

session_destroy();
header('location: login.php');


?>
