<!DOCTYPE html>
<html>
<head>
    <?php
    session_start();
    if(!isset($_SESSION['user_id'])) {
        echo "Sem permissão para acesso a página<br>";
        echo '<a href="index.php">Ir para página inicial</a>';
        exit;
    }
    ?>
    <title>Painel do Usuário</title>
</head>
<body>
    <h2>Painel do Usuário</h2>
    <p>Bem-vindo, usuário!</p>

    <p>Clique para gerar o <a href="gera_pdf.php" target="_blank">Relatório Mensal</a></p>
    <p>Clique para gerar o <a href="gera_pdf_tabela.php" target="_blank">TABELA</a></p>
    <p>Clique para gerar o <a href="gera_pdf_salario.php" target="_blank">SALARIO</a></p>
    
    <h3>TREINO CRUD</h3>
    <p>Clique para <a href="pdo_c.php">Criar (CREATE)</a></p>
    <p>Clique para <a href="pdo_r.php">Ler (READ)</a></p>
    <p>Clique para <a href="pdo_u.php"> Atualizar (UPDATE) </a></p>
    <p>Clique para <a href="pdo_d.php"> DELETAR </a></p>
    <hr>
    <a href="logout.php">Sair</a>
</body>
</html>
