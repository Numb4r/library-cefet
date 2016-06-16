<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Biblioteca Digital</title>
    <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script> -->
    <script src="jquery.min.js"> </script>
    <script src="semantic/dist/semantic.min.js"></script>
</head>
<body>

  <div class="ui inverted menu">
    <div class="item">
      <a href="#" onclick="$('.ui.sidebar').sidebar('toggle');"><i class="icon large sidebar"></i>Menu</a>
    </div>
    <div class="item">
      Minha Biblioteca Digital
    </div>

    </div>
    <div class="ui bottom  attached pushable">
      <div style="" class="ui inverted labeled left inline vertical sidebar menu uncover ">
        <a class="item" href="index.php">
          <i class="home icon"></i>
          Home
        </a>
        <a href="Pages/listarLivros.php" class="item">
          <i class="book icon"></i>
          Livros
        </a>
        <a href="Pages/listarEditoras.php" class="item">
          <i class="edit icon"></i>
          Editoras
        </a>
        <a href="Pages/listarCategorias.php" class="item">
          <i class="external icon"></i>
          Categoria
        </a>
        <a href="Pages/listarUsuarios.php" class="item">
          <i class="user icon"></i>
          Usuarios
        </a>
        <a href="Pages/log.php" class="item">
          <i class="database icon"></i>
          Historico
        </a>
      </div>
      <div class="pusher">

  <?php
    // print_r($_COOKIE);
    // print_r($_SESSION);
  ?>
  <?php
  session_start();

  if(!isset($_SESSION['login']) && !isset($_SESSION['senha']) ){
    ?>
<form method="POST" class="ui form" action="Pages/login.php">
<p align="center"><input placeholder="Usuario" type="text" name="login"
size="10"></p>
<p align="center"><input type="password" placeholder="Senha" name="senha" size="10"></p>
<p align="center"><input type="submit" class="ui primary button" value="Logar" name="enviar"><a  class="ui secondary button "href="Pages/novoUsuario.php" class="ui  button secondary">Registrar</a>

</p>
</form>
<?php
}else{
?>
<a class="ui red button" href="Pages/terminarSessao.php">Deslogar</a>
<?php
} ?>
      </div>
    </div>
<!--Fim menu  -->
  </body>
</html>
