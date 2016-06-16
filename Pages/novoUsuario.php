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
    <center>
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
          <h1>Minha Biblioteca Digital</h1>
          <h2>Incluindo um novo Usuario</h2>
    <?php
        $pdo = new PDO('sqlite:' . '../Database/banquinho.db') or die("Falha ao estabelecer ligação com a base de dados!\n");

        if (isset($_REQUEST['nome']) && $_REQUEST['nome']!=''
                        && isset($_REQUEST['login']) && $_REQUEST['login']!=''
                        && isset($_REQUEST['senha']) && $_REQUEST['senha']!=''
                        && isset($_REQUEST['email']) && $_REQUEST['email']!=''){
            // $sql = "INSERT INTO usuario (codigo,nome,login,senha,email) VALUES ((SELECT max(codigo) FROM usuario)+1,\"".$_REQUEST['nome'].
            $sql = "INSERT INTO usuario (codigo,nome,login,senha,email) VALUES (null,\"".$_REQUEST['nome'].
                            "\",\"".$_REQUEST['login'].
                            "\",\"".$_REQUEST['senha'].
                            "\",\"".$_REQUEST['email']."\")";
            // $sql = "INSERT INTO livros (codigo,titulo,autores,categoria,editora) VALUES (null,\"".$_REQUEST['titulo'].



            $to = $_REQUEST['email'];
$assunto_email = 'Library Cefet - Atualização de Cadastro';
$corpo_email = 'Olá!\nSeu cadastro no site Library Cefet acaba de ser atualizado.';
// cabeçalho do e-mail
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// cabeçaho do e-mail
$headers .= 'To: <'.$_REQUEST['email'].'>' . "\r\n";
$headers .= 'From: <Noreplyfakeaccontl@gmail.com>' . "\r\n";

// envia o e-mail
$email_enviado = mail($to, $assunto_email, $corpo_email, $headers);
// verifica se o e-mail foi enviado
if ($email_enviado) {
   echo "<br\><br\>";
   echo "Atualização: e-mail enviado para o usuário!\n";
   echo "<br\>";
} else {
   echo "<br\><br\>";
   echo "Atualização: e-mail não pode ser enviado para o usuário!\n";
   echo "<br\>";
}

            if (!$pdo->query($sql)) {
                echo "Erro ao executar o cadastro do usuario!";
                echo "<form action=\"novoUsuario.php\" method=\"POST\"> ";
                echo "<input type=\"submit\" value=\"Voltar\" >";
                echo "</from>";
            } else {
              echo "Usuario cadastrado com sucesso!";
                             echo "<br>";
                             echo "<a href=\"../index.php\"> <input type=\"button\" value=\"Voltar\" > </a>";
                         }
                     } else {

                 ?>

                 <form action="novoUsuario.php" class="ui form"method="POST">
                     <table width="1000">
                         <tr>
                             <td width="30%">Nome:</td>
                             <td width="70%"><input type="text" name="nome" placeholder="Informe o nome do Usuario"> </td>
                           </tr>
                           <tr>
                             <td width=30%>Login:</td>
                             <td width="70%"><input type="text" name="login" placeholder="Informe o login"> </td>
                           </tr>
                           <tr>
                             <td width="30%">Email:</td>
                             <td width="70%"><input type="email" name="email" placeholder="Informe o email"> </td
                           </tr>
                           <tr>
                                 <td width="30%">Senha:</td>
                                 <td width="70%"><input type="password" name="senha" placeholder="Informe a senha"><td>
                           </tr>


           <tr>
               <td></td>
               <td><input type="submit" class="ui primary button"value="Confirmar">
                   <a href="../index.php" class="ui secondary button"> Cancelar </a></td>
           </tr>
       </table>
     </form>

  <?php
          }
  ?>
  </center>

</body>
</html>
