<?php
setcookie('user_nama', '', time() - 3600, "/");
setcookie('user_id', '', time() - 3600, "/");
header('Location: http://localhost/whistleblowing_system/');
?>
