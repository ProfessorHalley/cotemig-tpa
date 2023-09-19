<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    echo "Sem permissão para acesso a página<br>";
    echo '<a href="index.php">Ir para página inicial</a>';
    exit;
}
require ('pdo_con.php');
// Função para listar todos os registros do banco de dados
function listarRegistros($pdo) {
    $sql = "SELECT * FROM usuarios";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// Listar registros
$registros = listarRegistros($pdo);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulário CRUD com PHP e MySQL</title>
</head>
<body>
    <h1>LENDO REGISTRO - READ</h1>

    <?php if (isset($_SESSION['mensagem'])): ?>
        <p><?php echo $_SESSION['mensagem']; ?></p>
        <?php unset($_SESSION['mensagem']); ?>
    <?php endif; ?>

    <h2>Registros:</h2>
    <ul>
        <?php foreach ($registros as $registro): ?>
            <li><?php echo $registro['nome']; ?> - <?php echo $registro['email']; ?></li>
        <?php endforeach; ?>
    </ul>
    <hr>
    <a href="dashboard.php">Dashboard</a><br>
    <a href="logout.php">Sair</a>
</body>
</html>
