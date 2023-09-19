<?php
session_start();

// Verifique se o ID do usuário foi passado por GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Consultar o registro do banco de dados com base no ID
    // (Lembre-se de adicionar a conexão PDO aqui)
    require ('pdo_con.php');
    
    // Listar registros
    $registros = listarRegistros($pdo);

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
    echo $_SESSION['mensagem'];
    //header('Location: index.php');
    exit;
}

// Processar a atualização do registro
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    // Atualizar o registro no banco de dados
    // (Lembre-se de adicionar a lógica PDO aqui)

    if ($atualizado) {
        $_SESSION['mensagem'] = 'Registro atualizado com sucesso!';
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Erro ao atualizar o registro.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Atualizar Registro</title>
</head>
<body>
    <h1>Atualizar Registro</h1>

    <?php if (isset($_SESSION['mensagem'])): ?>
        <p><?php echo $_SESSION['mensagem']; ?></p>
        <?php unset($_SESSION['mensagem']); ?>
    <?php endif; ?>

    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" required><br><br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required><br><br>

        <input type="submit" name="submit" value="Atualizar Registro">
    </form>
</body>
</html>
