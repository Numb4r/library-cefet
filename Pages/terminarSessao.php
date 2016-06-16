<?php
session_start();
session_destroy();
setcookie("nome_usuario");
setcookie("senha_usuario");
header("Location: ../index.php");
 ?>
