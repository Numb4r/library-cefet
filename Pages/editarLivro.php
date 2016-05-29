<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="../semantic/dist/semantic.min.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script> -->
    <script src="../jquery.min.js"> </script>
    <script src="../semantic/dist/semantic.min.js"></script>
    <?php
    $codigo = $_GET['codigo'];
    $edt = $_GET['editora'];
    $cat = $_GET['categoria'];


     ?>
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
    <h1>Minha Biblioteca Digital</h1>
    <h2>Editando um livro</h2>
        <?php
        $pdo = new PDO('sqlite:' . '../Database/banquinho.db') or die("Falha ao estabelecer ligação com a base de dados!\n");

        if (isset($_REQUEST['titulo']) && $_REQUEST['titulo']!=''
                && isset($_REQUEST['autores']) && $_REQUEST['autores']!=''
                && isset($_REQUEST['categoria']) && $_REQUEST['categoria']!=''
                && isset($_REQUEST['editora']) && $_REQUEST['editora']!=''){
                $sql = "UPDATE livros SET titulo=\"".$_REQUEST['titulo']."\",
                                          autores=\"".$_REQUEST['autores']."\",
                                          categoria=\"".$_REQUEST['categoria']."\",
                                          editora=\"".$_REQUEST['editora']."\"
                                          WHERE codigo=".$_REQUEST['codigo'].";";

                if (!$pdo->query($sql)) {
                echo "Erro ao executar a edição do livro!";
                echo "<form action=\"listarLivros.php\" method=\"POST\"> ";
                echo "<input type=\"submit\" value=\"Voltar\" >";
                echo "</from>";
            } else {
              echo "Livro editada com sucesso!";
                             echo "<br>";
                             echo "<a href=\"listarLivros.php\"> <input type=\"button\" value=\"Voltar\" > </a>";
                         }
                     } else {
                       $stmt_livro = $pdo->query("SELECT codigo,titulo,autores,categoria,editora FROM livros");
                       $stmt_editora = $pdo->query("SELECT codigo, nome FROM editora");
                       $stmt_categoria = $pdo->query("SELECT codigo, nome FROM categoria")
        ?>
        <table width="1000">
            <tr>
                <td>
                <center>
                    

                </center>

                <form class="ui form" action="editarLivro.php" method="POST">
                    <table width="1000">
                      <tr>
                        <td colspan=>
                          Livro a ser editado:
                        </td>
                        <td>

                          <?php
                          foreach ($stmt_livro as $livro) {
                            if ($codigo == $livro['codigo']) {
                              echo $livro['titulo'];;
                            }
                          } ?>
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
                            <option value="<?php echo $categoria['codigo']?>"
                              <?php if ($categoria['nome'] == $cat): ?>
                                selected="true"
                              <?php endif; ?>
                             >
                             <?php echo $categoria['nome']?><?php

                            ?></option>
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
                              <option value="<?php echo $editora['codigo']?>"
                                <?php if ($editora['nome'] == $edt ): ?>
                                  selected="true"
                                <?php endif; ?>
                                ><?php echo $editora['nome']?></option>
                                <?php
                                 }
                              }
                              ?>
                              </select>
                            </td>
                        </tr>

          <tr>
              <td></td>
              <input  disabled type='hidden' name="codigo" value=<?php echo $codigo; ?>>
              <td><input type="submit" class="ui primary button" value="Confirmar">
                  <a href="listarLivros.php" class="ui secondary button"> Cancelar </a></td>
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
