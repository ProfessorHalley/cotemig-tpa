<?php
session_start();
if(isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}
$message = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifique o login do usuário (faça a validação adequada)
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Verifique no banco de dados ou onde quer que estejam as informações do usuário
    if($username === 'halley' && $password === 'senha') {
        $_SESSION['user_id'] = 1;
        header("Location: dashboard.php");
        exit;
    } else {
        $message = "Nome de usuário ou senha incorretos.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!-- Adicione os links para os arquivos CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mt-5">Login</h2>
                <form method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Usuário:</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha:</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </form>
                <p class="mt-3 text-danger"><?php echo $message; ?></p>
            </div>
        </div>
    </div>

    <!-- Adicione os links para os arquivos JS do Bootstrap, se necessário -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
