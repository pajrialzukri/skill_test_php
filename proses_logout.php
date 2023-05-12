<?php
session_start();
// session_unset('login_sess_admin');
// session_unset('login_sess_user');

session_destroy();
header("location:index.php");
?>