<?php

session_start();
unset($_SESSION["username"]);
unset($_SESSION["admin_id"]);
session_destroy();
header("location:login.php");