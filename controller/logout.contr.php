<?php 
// to use setion
session_start();
// to remove setion
session_unset();

session_destroy();

header ("location:../index.php");