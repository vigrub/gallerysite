<?php
// Get access to the session...
session_start();
// then destroy it...
session_destroy();
// re-direct to index.php.
header("Location: index.php");
?>