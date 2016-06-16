<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Biblioteca Digital</title>
        <link rel="stylesheet" type="text/css" href="../semantic/dist/semantic.min.css">
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script> -->
        <script src="../jquery.min.js"> </script>
        <script src="../semantic/dist/semantic.min.js"></script>
    </head>
    <body>
    <center>
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
            <a class="item" href="../index.php">
              <i class="home icon"></i>
              Home
            </a>
            <a href="listarLivros.php" class="item">
              <i class="book icon"></i>
              Livros
            </a>
            <a href="listarEditoras.php" class="item">
              <i class="edit icon"></i>
              Editoras
            </a>
            <a href="listarCategorias.php" class="item">
              <i class="external icon"></i>
              Categoria
            </a>
            <a href="listarUsuarios.php" class="item">
              <i class="user icon"></i>
              Usuarios
            </a>
            <a href="log.php" class="item">
              <i class="database icon"></i>
              Historico
            </a>
          </div>
          <div class="pusher">
    <h1>Minha Biblioteca Digital</h1>
    <h2>Incluindo um novo Livro</h2>


    <?php
    session_start();
    if(!isset($_SESSION['login']) && !isset($_SESSION['senha']) ){
      echo "<meta http-equiv=\"refresh\" content=\"0; url=../index.php\">";
    }
        $pdo = new PDO('sqlite:' . '../Database/banquinho.db') or die("Falha ao estabelecer ligação com a base de dados!\n");
        if (isset($_REQUEST['titulo']) && $_REQUEST['titulo']!=''
                && isset($_REQUEST['autores']) && $_REQUEST['autores']!=''
                && isset($_REQUEST['categoria']) && $_REQUEST['categoria']!=''
                && isset($_REQUEST['editora']) && $_REQUEST['editora']!='') {
                  $nome_temporario = $_FILES['arquivo']["tmp_name"];
                  $nome_real = $_FILES['arquivo']["name"];
                  $pasta = "../Livros";
                  if (!file_exists("$pasta")) {
                    mkdir("$pasta",0777,true);
                  }
                  $path = "../Livros/".$nome_real;
                  copy($nome_temporario,"$pasta/$nome_real");

                  // echo $nome_real.".".$nome_temporario;
                  $sql = "INSERT INTO livros (codigo,titulo,autores,diretorio,categoria,editora) VALUES (null,\"".$_REQUEST['titulo'].
                    "\",\"".$_REQUEST['autores'].
                    "\",\" $path
                    \",\"".$_REQUEST['categoria'].
                    "\",\"".$_REQUEST['editora']."\")";
                  if (!$pdo->query($sql)) {
                  echo "Erro ao executar a inclusão de livros!";
                  echo "<form action=\"novoLivro.php\" method=\"POST\"> ";
                  echo "<input type=\"submit\" value=\"Voltar\" >";
                  echo "</from>";
                  } else {
                  echo "Livro cadastrado com sucesso!";
                             echo "<br>";
                             echo "<a href=\"listarLivros.php\"> <input type=\"button\" value=\"Voltar\" > </a>";
                           }
                     } else {
                         $stmt_categoria = $pdo->query("SELECT codigo, nome FROM categoria");
                         $stmt_editora = $pdo->query("SELECT codigo, nome FROM editora");
                 ?>


                 <form class="ui form" action="novoLivro.php" method="POST" enctype="multipart/form-data">
                     <table width="1000">

                         <tr>
                             <td width="30%">Título:</td>
                             <td width="70%"><div class="ui input"><input type="text" name="titulo" placeholder="Informe o título do livro"></div> </td>
                         </tr>
                         <tr>
                             <td width="30%">Autores (separar com ponto-e-vírgula):</td>
                             <td width="70%"><div class="ui input"><input type="text" name="autores" placeholder="Informe o nome dos autores separados por vírgula"></div> </td>
                         </tr>
                         <tr>

                             <td width="30%">Categoria:</td>
                             <td width="70%">
                                 <select name="categoria">
                                 <?php
                                     if (count($stmt_categoria)) {
                                         foreach ($stmt_categoria as $categoria) {
                                 ?>
                                 <option value="<?php echo $categoria['codigo']?>"><?php echo $categoria['nome']?></option>
                   <?php   }
                       }
                   ?>
                   </select>

               </td>
           </tr>
           <tr>
               <td width="30%">Editora:</td>
               <td width="70%">
                   <select name="editora">
                   <?php
                       if (count($stmt_editora)) {
                           foreach ($stmt_editora as $editora) {
                   ?>
                       <option value="<?php echo $editora['codigo']?>"><?php echo $editora['nome']?></option>
                   <?php   }
                       }
                   ?>
                   </select>
               </td>
           </tr>
           <tr>
             <td width="30%">Arquivo :</td>
             <td>

               <input type="file" class="ui button" name="arquivo" class="" value="">

            </td>
           </tr>
           <tr>
               <td></td>
               <td><input type="submit" class="ui primary button" value="Confirmar">
                   <a href="listarLivros.php" class="ui secondary button"> Cancelar </a></td>
           </tr>
       </table>
     </form>


  <?php
          }
  ?>
  </center>
</div>
</div>
</body>
</html>
