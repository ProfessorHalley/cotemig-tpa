<?php
session_start();

// Verifique se o ID do usuário foi passado por GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Consultar o registro do banco de dados com base no ID
    // (Lembre-se de adicionar a conexão PDO aqui)
    require ('pdo_con.php');

    // Verifique se o registro existe
    if ($registro) {
        $nome = $registro['nome'];
        $email = $registro['email'];
    } else {
        $_SESSION['mensagem'] = 'Registro não encontrado.';
        echo $_SESSION['mensagem'];
        //header('Location: index.php');
        exit;
    }
} else {
    $_SESSION['mensagem'] = 'ID de usuário não especificado.';
    $_SESSION['mensagem'];
    echo $_SESSION['mensagem'];
    //header('Location: index.php');
    exit;
}

// Processar a exclusão do registro
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirmar'])) {
    // Excluir o registro do banco de dados
    // (Lembre-se de adicionar a lógica PDO aqui)

    $_SESSION['mensagem'] = 'Registro excluído com sucesso!';
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Excluir Registro</title>
</head>
<body>
    <h1>Excluir Registro</h1>

    <?php if (isset($_SESSION['mensagem'])): ?>
        <p><?php echo $_SESSION['mensagem']; ?></p>
        <?php unset($_SESSION['mensagem']); ?>
    <?php endif; ?>

    <p>Tem certeza de que deseja excluir o registro de "<?php echo $nome; ?>"?</p>

    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" name="confirmar" value="Sim, Excluir">
        <a href="index.php">Cancelar</a>
    </form>
</body>
</html>
