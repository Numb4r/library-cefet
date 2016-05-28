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
    </head>
    <body>
    <center>
    <h1>Minha Biblioteca Digital</h1>
    <h2>Incluindo um novo Livro</h2>


    <?php
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
                  $path = "Livros".$nome_real;
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

                 <form action="novoLivro.php" method="POST" enctype="multipart/form-data">
                     <table width="1000">
                         <tr>
                             <td width="30%">Título:</td>
                             <td width="70%"><input type="text" name="titulo" placeholder="Informe o título do livro"> </td>
                         </tr>
                         <tr>
                             <td width="30%">Autores (separar com ponto-e-vírgula):</td>
                             <td width="70%"><input type="text" name="autores" placeholder="Informe o nome dos autores separados por vírgula"> </td>
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
             <td> <input type="file" name="arquivo" value=""></td>
           </tr>
           <tr>
               <td></td>
               <td><input type="submit" value="Confirmar">
                   <a href="listarLivros.php"> <input type="button" value="Cancelar"> </a></td>
           </tr>
       </table>
     </form>

  <?php
          }
  ?>
  </center>

</body>
</html>
