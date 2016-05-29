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
              <a class="item" href="../index.html">
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
    <center>
      <h1>Historico</h1>
    <?php
        $pdo = new PDO('sqlite:' . '../Database/banquinho.db') or die("Falha ao estabelecer ligação com a base de dados!\n");

            $sql = "SELECT * FROM historico;";
              if (!$pdo->query($sql)) {
                echo "Erro ao executar a inclusão de livros!";
                echo "<form action=\"novoLivro.php\" method=\"POST\"> ";
                echo "<input type=\"submit\" value=\"Voltar\" >";
                echo "</from>";
              } else {
                echo "<table border='3px' width='100%'>";
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

</div>
</div>

</body>
</html>
