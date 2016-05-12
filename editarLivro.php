<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <center>
    <h1>Minha Biblioteca Digital</h1>
    <h2>Editando um livro</h2>
        <?php
        $pdo = new PDO('sqlite:' . 'banquinho.db') or die("Falha ao estabelecer ligação com a base de dados!\n");

        if (isset($_REQUEST['titulo']) && $_REQUEST['titulo']!=''
                && isset($_REQUEST['autores']) && $_REQUEST['autores']!=''
                && isset($_REQUEST['categoria']) && $_REQUEST['categoria']!=''
                && isset($_REQUEST['editora']) && $_REQUEST['editora']!=''){
          $pdo->exec("DELETE FROM livros WHERE codigo=".$_REQUEST['livro'].";");

          $sql = "INSERT INTO livros (codigo,titulo,autores,categoria,editora) VALUES (null,\"".$_REQUEST['titulo'].
                  "\",\"".$_REQUEST['autores'].
                  "\",\"".$_REQUEST['categoria'].
                  "\",\"".$_REQUEST['editora']."\")";
                if (!$pdo->query($sql)) {
                echo "Erro ao executar a edição do livro!";
                echo "<form action=\"index.php\" method=\"POST\"> ";
                echo "<input type=\"submit\" value=\"Voltar\" >";
                echo "</from>";
            } else {
              echo "Livro editada com sucesso!";
                             echo "<br>";
                             echo "<a href=\"index.php\"> <input type=\"button\" value=\"Voltar\" > </a>";
                         }
                     } else {
                       $stmt_livro = $pdo->query("SELECT * FROM livros");
                       $stmt_editora = $pdo->query("SELECT codigo, nome FROM editora");
                       $stmt_categoria = $pdo->query("SELECT codigo, nome FROM categoria")
        ?>
        <table width="1000">
            <tr>
                <td>
                <center>
                    <h2>Menu</h2>

                </center>

                <form action="editarLivro.php" method="POST">
                    <table border="3"width="1000">
                      <tr>
                        <td width="30%">Nome do livro a ser editado:</td>
                          <td width="70%">
                            <select name="livro">
                            <?php
                                if (count($stmt_livro)) {
                                    foreach ($stmt_livro as $livro) {
                            ?>
                            <option value="<?php echo $livro['codigo']?>"><?php echo $livro['titulo']?></option>
                              <?php
                               }
                            }
                            ?>
                            </select>
                          </td>
                      </tr>
                      <tr>
                        <td colspan="2" align="center">
                        <b>Campo de edição</b>
                        </td>
                      </tr>
                        <tr>
                            <td width="30%">Nome:</td>
                            <td width="70%"><input type="text" name="titulo" placeholder="Informe o nome da livro"> </td>
                        </tr>
                        <tr>
                            <td width="30%">Nome do autor:</td>
                            <td width="70%"> <input type="text" name="autores" placeholder="Informe o nome do autor"> </td>
                        </tr>
                        <tr>
                          <td width="30">Nome da categoria:</td>
                          <td width="70%">
                            <select name="categoria">
                            <?php
                                if (count($stmt_categoria)) {
                                    foreach ($stmt_categoria as $categoria) {
                            ?>
                            <option value="<?php echo $categoria['codigo']?>"><?php echo $categoria['nome']?></option>
                              <?php
                               }
                            }
                            ?>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td width="30%">Nome da editora:</td>
                            <td width="70%">
                              <select name="editora">
                              <?php
                                  if (count($stmt_editora)) {
                                      foreach ($stmt_editora as $editora) {
                              ?>
                              <option value="<?php echo $editora['codigo']?>"><?php echo $editora['nome']?></option>
                                <?php
                                 }
                              }
                              ?>
                              </select>
                            </td>
                        </tr>

          <tr>
              <td></td>
              <td><input type="submit" value="Confirmar">
                  <a href="index.php"> <input type="button" value="Cancelar"> </a></td>
          </tr>
          </table>
          </form>
                      </center>
<?php
}
 ?>

 </select>
  </body>
</html>
