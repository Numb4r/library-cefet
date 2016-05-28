<?php
$pdo = new PDO('sqlite:' . '../Database/banquinho.db') or die("Falha ao estabelecer ligação com a base de dados!\n");
if (isset($_REQUEST['titulo']) && $_REQUEST['titulo']!=''
        && isset($_REQUEST['autores']) && $_REQUEST['autores']!=''
        && isset($_REQUEST['categoria']) && $_REQUEST['categoria']!=''
        && isset($_REQUEST['editora']) && $_REQUEST['editora']!='') {

            $nome_temporario = $_FILES['arquivo']["tmp_name"];
            $nome_real = $_FILES['arquivo']["name"];
            $pasta = "Livros"
            if (!file_exists("$pasta")) {
              mkdir("$pasta",0777,true);
            }
            $path = "Livros".$nome_real;
            copy($nome_temporario,"$pasta/$nome_real");

            // echo $nome_real.".".$nome_temporario;
            $sql = "INSERT INTO livros (codigo,titulo,autores,diretorio,categoria,editora) VALUES (null,\"".$_REQUEST['titulo'].
              "\",\"".$_REQUEST['autores'].
              "\",\".$path.
              \",\"".$_REQUEST['categoria'].
              "\",\"".$_REQUEST['editora']."\")";
            if (!$pdo->query($sql)) {
            echo "Erro ao executar a inclusão de livros!";
            echo "<form action=\"novoLivro.php\" method=\"POST\"> ";
            echo "<input type=\"submit\" value=\"Voltar\" >";
            echo "</from>";
            } else {
            echo "Livro cadastrado com sucesso!";
                       echo "<br>";
                       echo "<a href=\"listarLivros.php\"> <input type=\"button\" value=\"Voltar\" > </a>";
       }
   }  ?>
