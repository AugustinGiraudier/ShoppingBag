<?php
session_start();

$_SESSION['user_id'] = null;
header("Location:" . _BASE_URL);
exit();
?>