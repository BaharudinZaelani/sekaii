<?php 

session_start();
session_destroy();

$_SESSION[] = '';
$_SESSION['username'] = '';

header('Location: ../');