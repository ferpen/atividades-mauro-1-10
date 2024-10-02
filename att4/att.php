<?php

// conexao
$servidor = 'localhost';
$banco = 'mercadin';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

echo "Conectado!<br>";

echo "Recebido: <br>";
echo $_GET['nome'];
echo "<br>";
echo $_GET['URL'];
echo "<br>";
echo $_GET['desc'];
echo "<br>";
echo $_GET['preco'];
echo "<br>";

$codigoSQL = "INSERT INTO `produto` (`id`, `nome`, `img`, `descricao`, `preco`) VALUES (NULL, :nm, :ur, :dc, :preco);";

try {
    $comando = $conexao->prepare($codigoSQL);

    $resultado = $comando->execute(array('nm' => $_GET['nome'], 'ur' => $_GET['URL'], 'dc' => $_GET['desc'], 'preco' => $_GET['preco']));

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