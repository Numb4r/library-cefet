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
    <h2>Incluindo uma nova Categoria</h2>

    <?php
        $pdo = new PDO('sqlite:' . '../Database/banquinho.db') or die("Falha ao estabelecer ligação com a base de dados!\n");

        if (isset($_REQUEST['nome']) && $_REQUEST['nome']!=''){
            $sql = "INSERT INTO categoria (codigo,nome,codigo_pai) VALUES (null,\"".$_REQUEST['nome']."\",null)";
            if (!$pdo->query($sql)) {
                echo "Erro ao executar a inclusão de categoria!";
                echo "<form action=\"novoCategoria.php\" method=\"POST\"> ";
                echo "<input type=\"submit\" value=\"Voltar\" >";
                echo "</from>";
            } else {
              echo "Categoria cadastrada com sucesso!";
                             echo "<br>";
                             echo "<a href=\"listarCategorias.php\"> <input type=\"button\" value=\"Voltar\" > </a>";
                         }
                     } else {

                 ?>

                 <form action="novoCategoria.php" method="POST">
                     <table width="1000">
                         <tr>
                             <td width="30%">Nome:</td>
                             <td width="70%"><input type="text" name="nome" placeholder="Informe o nome da Categoria"> </td>
                         </tr>

           <tr>
               <td></td>
               <td><input type="submit" value="Confirmar">
                   <a href="listarCategorias.php"> <input type="button" value="Cancelar"> </a></td>
           </tr>
       </table>
     </form>

  <?php
          }
  ?>
  </center>

</body>
</html>
