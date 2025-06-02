<?php
require_once('../includes/utils.php');

logoutUser();

// Redirect to login page after logout
header('Location: ../authPages/login.php');
exit;

?>