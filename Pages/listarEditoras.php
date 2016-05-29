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
    <link rel="stylesheet" type="text/css" href="../semantic/dist/semantic.min.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script> -->
    <script src="../jquery.min.js"> </script>
    <script src="../semantic/dist/semantic.min.js"></script>
    <body>
    <center>
        <?php
            if (isset($_GET['codigo']) && $_GET['codigo']!='' ) {
                $pdo = new PDO('sqlite:' . '../Database/banquinho.db') or die("Falha ao estabelecer ligação com a base de dados!\n");
                $rowsAffect = $pdo->exec("DELETE FROM editora WHERE codigo=".$_GET['codigo'].";");
                if ($rowsAffect > 0) {
                    echo "Registro Excluído com sucesso!";
                    echo "<br>";
                    echo '<a href="listarEditoras.php"><input type="button" value="Voltar"></a>';
                } else {
                    echo "Registro não encontrado!";
                    echo "<br>";
                    echo '<a href="listarEditoras.php"><input type="button" value="Voltar"></a>';
                }
            } else {
        ?>
        <table width="1000">
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
            <table width"100%">
              <a href="novoEditora.php" class="ui  button secondary">Incluir nova editora</a>
              <a href="editarEditora.php" class="ui  button secondary">Editar editora</a>

              <tr>
              <td>

                  <?php
                  $pdo = new PDO('sqlite:' . '../Database/banquinho.db') or die("Falha ao estabelecer ligação com a base de dados!\n");
                  $stmt = $pdo->prepare("SELECT * FROM editora");
                  $stmt->execute();

                  echo "<center>";
                  echo "<h2>Editoras Disponíveis</h2>";
                  echo "<table width=\"1000\" cellpading=10 border=1>";
                  echo "<tr>";
                  echo "<td width=\"5%\">Codigo</td>";
                  echo "<td width=\"25%\">Nome</td>";
                  // echo "<td width=\"25%\">Autores</td>";
                  // echo "<td width=\"15%\">Editora</td>";
                  // echo "<td width=\"15%\">Categoria</td>";
                  // echo "<td with=\"4%\">Ler</td>";
                  // echo "<td width=\"3%\">Editar</td>";
                  echo "<td width=\"3%\">Excluir</td>";
                  echo "</tr>";
                  while ($linha = $stmt->fetch()) {
                                          echo "<tr>";
                                          echo "<td>".$linha[0]."</td>";
                                          echo "<td>" . $linha[1] . "</td>";
                                          // echo "<td>" . "</td>";
                                          // echo "<td>" . $linha[3] . "</td>";
                                          // echo "<td>" . $linha[4] . "</td>";
                                          // echo "<td>" . "" . "</td>";
                                          // echo "<td>" . "" . "</td>";
                                          echo "<td>" . '<a href="listarEditoras.php?codigo='.$linha[0].'"> Excluir </a>' . "</td>";
                                          echo "</tr>";
                                      }
                                      echo "</table>";
                                      echo "</center>";

                                      unset($dados);
                                      }
                                      ?>
                                  </td>
                              </tr>
                          </table>
                      </center>
                    </div>
                  </div>
                  </body>
                  </html>
