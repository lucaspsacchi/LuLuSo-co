<?php 
session_start();

session_destroy(); // Mata tuto >;c
header('Location: login.php');
?>