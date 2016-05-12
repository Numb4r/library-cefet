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
    <center>
        <h1>Minha Biblioteca Digital</h1>
    </center>
    <body>
    <center>
        <?php
            if (isset($_GET['codigo']) && $_GET['codigo']!='' ) {
                $pdo = new PDO('sqlite:' . '../Database/banquinho.db') or die("Falha ao estabelecer ligação com a base de dados!\n");
                $rowsAffect = $pdo->exec("DELETE FROM livros WHERE codigo=".$_GET['codigo'].";");
                if ($rowsAffect > 0) {
                    echo "Registro Excluído com sucesso!";
                    echo "<br>";
                    echo '<a href="listarLivros.php"><input type="button" value="Voltar"></a>';
                } else {
                    echo "Registro não encontrado!";
                    echo "<br>";
                    echo '<a href="listarLivros.php"><input type="button" value="Voltar"></a>';
                }
            } else {
        ?>
        <table width="1000">
            <tr>
                <td>
                <center>
                    <h2>Menu</h2>
                    <!-- <a href="novoEditora.php"><input type="button" name="name" value="Inclur nova Editora"></a> -->
                    <a href="novoLivro.php" ><input type="button" value="Incluir novo livro"></a>
                    <!-- <a href="novoCategoria.php"><input type="button" name="name" value="Incluir nova "></a> -->
                    <br><br>

                    <!-- <a href="listarLivros.php" ><input type="button" value="Listar livros"></a> -->
                    <a href="listarEditoras.php" ><input type="button" value="Listar editoras"></a>
                    <a href="listarCategorias.php" ><input type="button" value="Listar categorias"></a>
                    <a href="listarUsuarios.php" ><input type="button" value="Listar usuários"></a>
                    <a href="log.php" ><input type="button" value="Ver Histórico/Log da Aplicação"></a>
                    <br><br>
                    <a href="editarLivro.php"><input type="button" name="name" value="Editar Livro"></a>
                </center>
            </td>
          </tr>
          <tr>
              <td>
                  <?php
                  $pdo = new PDO('sqlite:' . '../Database/banquinho.db') or die("Falha ao estabelecer ligação com a base de dados!\n");
                  $stmt = $pdo->prepare("SELECT * FROM grade_livros");
                  $stmt->execute();

                  echo "<center>";
                  echo "<h2>Livros Disponíveis</h2>";
                  echo "<table width=\"1000\" cellpading=10 border=1>";
                  echo "<tr>";
                  echo "<td width=\"25%\">Título</td>";
                  echo "<td width=\"25%\">Autores</td>";
                  echo "<td width=\"15%\">Editora</td>";
                  echo "<td width=\"15%\">Categoria</td>";
                  // echo "<td with=\"4%\">Ler</td>";
                  echo "<td width=\"7%\">Editar</td>";
                  echo "<td width=\"7%\">Excluir</td>";
                  echo "</tr>";
                  while ($linha = $stmt->fetch()) {
                                          echo "<tr>";
                                          echo "<td>" . $linha[1] . "</td>";
                                          echo "<td>" . $linha[2] . "</td>";
                                          echo "<td>" . $linha[3] . "</td>";
                                          echo "<td>" . $linha[4] . "</td>";

                                          echo "<td>" . '<a href="editarLivro.php?codigo='.$linha[0].'&editora='.$linha[3].'&categoria='.$linha[4].'"> Editar </a>' . "</td>";
                                          echo "<td>" . '<a href="listarLivros.php?codigo='.$linha[0].'"> Excluir </a>' . "</td>";
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
                  </body>
                  </html>
