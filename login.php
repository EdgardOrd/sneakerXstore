<!DOCTYPE html>
<html>

<head>
    <title>Iniciar Sesión</title>
</head>

<body>
    <h2>Iniciar Sesión</h2>
    <?php
    if (isset($_GET['error'])) {
        echo "<h1>Credenciales de inicio de sesion incorrectas</h1>";
    }
    ?>
    <form action="./php/session.php" method="post">
        <label for="username">Nombre de Usuario:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Iniciar Sesión</button>
    </form>
</body>

</html>