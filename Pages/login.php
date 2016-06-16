<?php
// obtém os valores digitados
$username = $_POST["login"];
$senha = $_POST["senha"];
// acesso ao banco de dados
$pdo = new PDO('sqlite:' . '../Database/banquinho.db') or die("Falha ao estabelecer ligação com a base de dados!\n");
// $resultado = $pdo->query("SELECT login FROM usuario where login = '$username' and senha = '$senha'");
$smt = $pdo->query("SELECT * FROM usuario ");
// echo $resultado;
if (count($smt)) {
  # code...
  foreach ($smt as $key ) {
    if ($key['login'] == $username) {
      if ($key['senha'] == $senha) {
        setcookie("nome_usuario", $username);
        setcookie("senha_usuario", $senha);
        session_start();
        $_SESSION['login'] = $username;
        $_SESSIOn['senha'] = $senha;
      }
    }
  }
}
// setcookie("nome_usuario");
// setcookie("senha_usuario");
print_r($_COOKIE);

header ("Location: ../index.php");


// session_start();
// if(!isset($_SESSION['usuario'])){
//   echo "<meta http-equiv=\"refresh\" content=\"0; url=../index.php\">";
// }



?>
