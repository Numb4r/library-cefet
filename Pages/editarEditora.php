<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../semantic/dist/semantic.min.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script> -->
    <script src="../jquery.min.js"> </script>
    <script src="../semantic/dist/semantic.min.js"></script>
    <title></title>
  </head>
  <body><div class="ui inverted menu">
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
      <h2>Editando uma editora</h2>
        <?php
        $pdo = new PDO('sqlite:' . '../Database/banquinho.db') or die("Falha ao estabelecer ligação com a base de dados!\n");

        if (isset($_REQUEST['nome']) && $_REQUEST['nome']!=''
                                     && isset($_REQUEST['editora']) && $_REQUEST['editora']!=''){
          $sql = "UPDATE editora SET nome=\"".$_REQUEST['nome']."\" WHERE codigo=".$_REQUEST['editora'].";";
            if (!$pdo->query($sql)) {
                echo "Erro ao executar a edição de editora!";
                echo "<form action=\"listarEditoras.php\" method=\"POST\"> ";
                echo "<input type=\"submit\" value=\"Voltar\" >";
                echo "</from>";
            } else {
              echo "Editora editada com sucesso!";
                             echo "<br>";
                             echo "<a href=\"listarEditoras.php\"> <input type=\"button\" value=\"Voltar\" > </a>";
                         }
                     } else {
                       $stmt_editora = $pdo->query("SELECT codigo, nome FROM editora");
                       $stmt_editora = $pdo->query("SELECT codigo, nome FROM editora");
        ?>
        <table width="1000">
            <tr>
                <td>


                <form class="ui form" action="editarEditora.php" method="POST">




                    <table width="1000">
                      <tr>
                        <td width="30%">Nome a sera editado:</td>
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
                            <td width="30%">Nome:</td>
                            <td width="70%"><input type="text" name="nome" placeholder="Informe o nome da Editora"> </td>
                        </tr>

          <tr>
              <td></td>
              <td><input type="submit" class="ui primary button" value="Confirmar">
                  <a href="listarEditoras.php" class="ui secondary button">Cancelar </a></td>
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
