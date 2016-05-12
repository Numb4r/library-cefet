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
    <h1>Minha Biblioteca Digital</h1><br>
    <center>
        <h2>Menu</h2>
        <!-- <a href="novoUsuario.php"><input type="button" name="name" value="Inclur novo Usuario"></a> -->
        <!-- <a href="novoLivro.php" ><input type="button" value="Incluir novo livro"></a> -->
        <!-- <a href="novoCategoria.php"><input type="button" name="name" value="Incluir nova "></a> -->
        <br>

        <a href="index.php" ><input type="button" value="Listar livros"></a>
        <a href="listarEditoras.php"  ><input   type="button" value="Listar editoras"></a>
        <a href="listarCategorias.php" ><input type="button" value="Listar categorias"></a>
        <a href="listarUsuarios.php" ><input type="button" value="Listar usuários"></a>
        <!-- <a href="log.php" ><input type="button" value="Ver Histórico/Log da Aplicação"></a> -->
        <h2>Historico/Log</h2>
    </center>
    

    <?php
        $pdo = new PDO('sqlite:' . 'banquinho.db') or die("Falha ao estabelecer ligação com a base de dados!\n");

            $sql = "SELECT * FROM historico;";
              if (!$pdo->query($sql)) {
                echo "Erro ao executar a inclusão de livros!";
                echo "<form action=\"novoLivro.php\" method=\"POST\"> ";
                echo "<input type=\"submit\" value=\"Voltar\" >";
                echo "</from>";
              } else {
                echo "<table border='3px'>";
                echo "<tr><td>Data</td><td>Tabela</td><td>Antes</td><td>Depois</td></tr>";
                $stmt_historico = $pdo->query($sql);
                        if (count($stmt_historico)) {
                           foreach ($stmt_historico as $historico) {
                             echo "<tr>";
                             echo "<td>";
                                    echo "$historico[data]";
                            echo "</td>";
                             echo "<td>";
                                    echo "$historico[tabela]";
                            echo "</td>";
                            echo "<td>";
                                    echo "$historico[antes]";
                            echo "</td>";
                            echo "<td>";
                                   echo "$historico[depois]";
                           echo "</td>";

                             echo "</tr>";
                           }
                         }
                       }
                echo "</table>";
              ?>
  </center>

</body>
</html>
