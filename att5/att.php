<?php

// conexao
$servidor = 'localhost';
$banco = 'biblioteca';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

echo "Conectado!<br>";

echo "Recebido: <br>";
echo $_GET['titulo'];
echo "<br>";
echo $_GET['idioma'];
echo "<br>";
echo $_GET['paginas'];
echo "<br>";
echo $_GET['editora'];
echo "<br>";
echo $_GET['publicado'];
echo "<br>";
echo $_GET['ISBN'];
echo "<br>";

$codigoSQL = "INSERT INTO `livro` (`id`, `titulo`, `idioma`, `paginas`, `editora`, `data de pucliacao`, `ISBN`) VALUES (NULL, :ti, :id, :pg, :ed, :pub, :isbn);";

try {
    $comando = $conexao->prepare($codigoSQL);

    $resultado = $comando->execute(array('ti' => $_GET['titulo'], 'id' => $_GET['idioma'], 'pg' => $_GET['paginas'], 'ed' => $_GET['editora'],'pub' => $_GET['publicado'],'isbn' => $_GET['ISBN']));

    if($resultado) {
	echo "Comando executado!";
    } else {
	echo "Erro ao executar o comando!";
    }
} catch (Exception $e) {
    echo "Erro $e";
}

$conexao = null;

?>