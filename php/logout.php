<?php
session_start(); 
session_destroy();
echo "<script>alert('Logout realizado com sucesso!'); document.location.href='../login.php';</script>";

?>