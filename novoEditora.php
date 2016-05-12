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
    <h2>Incluindo uma nova Editora</h2>

    <?php
        $pdo = new PDO('sqlite:' . 'banquinho.db') or die("Falha ao estabelecer ligação com a base de dados!\n");

        if (isset($_REQUEST['nome']) && $_REQUEST['nome']!=''){
            $sql = "INSERT INTO editora (codigo,nome) VALUES (null,\"".$_REQUEST['nome']."\")";
            if (!$pdo->query($sql)) {
                echo "Erro ao executar a inclusão de editora!";
                echo "<form action=\"novoEditora.php\" method=\"POST\"> ";
                echo "<input type=\"submit\" value=\"Voltar\" >";
                echo "</from>";
            } else {
              echo "Editora cadastrado com sucesso!";
                             echo "<br>";
                             echo "<a href=\"listarEditoras.php\"> <input type=\"button\" value=\"Voltar\" > </a>";
                         }
                     } else {

                 ?>

                 <form action="novoEditora.php" method="POST">
                     <table width="1000">
                         <tr>
                             <td width="30%">Nome:</td>
                             <td width="70%"><input type="text" name="nome" placeholder="Informe o nome da Editora"> </td>
                         </tr>

           <tr>
               <td></td>
               <td><input type="submit" value="Confirmar">
                   <a href="listarEditoras.php"> <input type="button" value="Cancelar"> </a></td>
           </tr>
       </table>
     </form>

  <?php
          }
  ?>
  </center>

</body>
</html>
