<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <center>
    <h1>Minha Biblioteca Digital</h1>
    <h2>Editando uma Categoria</h2>
        <?php
        $pdo = new PDO('sqlite:' . '../Database/banquinho.db') or die("Falha ao estabelecer ligação com a base de dados!\n");

        if (isset($_REQUEST['nome']) && $_REQUEST['nome']!=''
                                     && isset($_REQUEST['categoria']) && $_REQUEST['categoria']!=''){

          $sql = "UPDATE categoria SET nome=\"".$_REQUEST['nome']."\"  WHERE codigo=".$_REQUEST['categoria'].";";

            if (!$pdo->query($sql)) {
                echo "Erro ao executar a edição de categoria!";
                echo "<form action=\"listarCategorias.php\" method=\"POST\"> ";
                echo "<input type=\"submit\" value=\"Voltar\" >";
                echo "</from>";
            } else {
              echo "Categoria editada com sucesso!";
                             echo "<br>";
                             echo "<a href=\"listarCategorias.php\"> <input type=\"button\" value=\"Voltar\" > </a>";
                         }
                     } else {
                       $stmt_categoria = $pdo->query("SELECT codigo, nome FROM categoria");
                       $stmt_editora = $pdo->query("SELECT codigo, nome FROM editora");
        ?>
        <table width="1000">
            <tr>
                <td>
                <center>
                    <h2>Menu</h2>

                </center>

                <form action="editarCategoria.php" method="POST">




                    <table width="1000">
                      <tr>
                        <td width="30%">Nome a sera editado:</td>
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
                      </center>
<?php
}
 ?>

 </select>
  </body>
</html>
