<?php
session_start();

$_SESSION['user_id'] = null;
header("Location:" . $_SESSION['BASE_URL']);
exit();
?>