<!DOCTYPE HTML>
<html>
<head>
  <title>Formulario de Nombres</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 20px;
    }
    h2 {
      color: #333;
    }
    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }
    input[type="text"] {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    input[type="submit"] {
      background-color: #28a745;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #218838;
    }
    ol {
      background-color: #fff;
      padding: 10px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>

<body>

  <?php
  $nombres = [];

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreNuevo = test_input($_POST["name"]);
    if (!empty($nombreNuevo)) {
      $nombres = isset($_POST['nombres']) ? json_decode($_POST['nombres']) : [];
      $nombres[] = $nombreNuevo;
    }
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>

  <h2>Formulario de Nombres</h2>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Nombre: <input type="text" name="name" required>
    <input type="hidden" name="nombres" value="<?php echo isset($_POST['nombres']) ? htmlspecialchars(json_encode($nombres)) : ''; ?>">
    <br>
    <input type="submit" name="submit" value="Añadir Nombre">
  </form>

  <?php
  if (!empty($nombres)) {
    echo "<h2>Nombres ingresados:</h2>";
    echo "<ol>";
    foreach ($nombres as $nombre) {
      echo "<li>" . htmlspecialchars($nombre) . "</li>";
    }
    echo "</ol>";
  }
  ?>

</body>
</html>
