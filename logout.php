<?php
if (!isset($_SESSION)) session_start();
session_destroy();
header('Location: http://localhost/whistleblowing_system/');
?>
