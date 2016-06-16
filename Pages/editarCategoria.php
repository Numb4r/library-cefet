<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
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
          <a class="item" href="../index.php">
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
    <h2>Editando uma Categoria</h2>

        <?php
        session_start();
        if(!isset($_SESSION['login']) && !isset($_SESSION['senha']) ){
          echo "<meta http-equiv=\"refresh\" content=\"0; url=../index.php\">";
        }
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


                </center>

                <form class="ui form" action="editarCategoria.php" method="POST">




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
              <td><input type="submit" class="ui primary button" value="Confirmar">
                  <a href="listarCategorias.php" class="ui secondary button"> Cancelar </a></td>
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
