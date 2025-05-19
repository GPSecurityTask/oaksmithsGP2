<?php
$host = 'localhost';
$db = 'oaksmiths';
$user = 'root';
$pass = ''; // Coloque sua senha aqui, se tiver

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Erro na conexão: " . $conn->connect_error);
}

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$mensagem = $_POST['mensagem'];

$sql = "INSERT INTO clientes (nome, email, created_at) VALUES (?, ?, NOW())";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $nome, $email);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Orçamento</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #E7D9C1, #D8C8B8);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .card {
      background-color: #fffaf5;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      text-align: center;
      max-width: 500px;
      width: 90%;
      border: 2px solid #D8C8B8;
    }

    .card h2 {
      color: #5C3A21;
      font-size: 24px;
      margin-bottom: 15px;
    }

    .card p {
      font-size: 16px;
      color: #4b3b2a;
      margin-bottom: 25px;
    }

    .success-icon {
      font-size: 48px;
      color: #5C3A21;
      margin-bottom: 15px;
    }

    .btn-voltar {
      display: inline-block;
      padding: 10px 20px;
      background-color: #5C3A21;
      color: #ffffff;
      text-decoration: none;
      border-radius: 8px;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }

    .btn-voltar:hover {
      background-color: #3e2814;
    }

    @media (max-width: 600px) {
      .card {
        padding: 25px;
      }

      .card h2 {
        font-size: 20px;
      }
    }
  </style>
</head>
<body>

<div class="card">
  <div class="success-icon">✅</div>
  <?php
  if ($stmt->execute()) {
    echo "<h2>Obrigado por solicitar seu orçamento, <strong>$nome</strong>!</h2>";
    echo "<p>Em breve entraremos em contato pelo e-mail <strong>$email</strong>.</p>";
  } else {
    echo "<h2>Erro ao enviar sua solicitação.</h2>";
    echo "<p>" . $conn->error . "</p>";
  }

  $stmt->close();
  $conn->close();
  ?>
  <a class="btn-voltar" href="index.html">Voltar para a página inicial</a>
</div>

</body>
</html>
