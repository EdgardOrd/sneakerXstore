<!DOCTYPE html>
<html>
<head>
    <style>
    .login{
    width: 360px;
    height: min-content;
    padding: 20px;
    margin-top: 35px;
    border-radius: 12px;
    background-color: whitesmoke;
  }

  .my-body{
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: beige;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    height: 100%;
    min-height: calc(100% - 70px);
  }

  .login h1{
    font-size: 36px;
    margin-bottom: 25px;
  }

  .login form .form-group{
    margin-bottom: 12px; 
  }

  .login form input[type="submit"]
  {
    font-size: 20px;
    margin-top: 15px;
  }

  .error
  {
    font-weight: bold;
    margin: 5px;
    padding: 5px;
  }

  button.btn.btn-sucess {
    background-color: #8B0000;
    color: white;
    }

    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">
    

    <title>Iniciar Sesión</title>
</head>

<body class="my-body">
    
    <div class="login">

    <h2 class="text-center">Iniciar Sesión</h2>

    <form action="./php/session.php" method="post">
        <div class="form-group">
            <label class="form-label" for="username">Nombre de Usuario:</label>
            <input class="form-control" type="text" id="username" name="username" required>
        </div>

        <div class="form-group">
            <label class="form-label" for="email">Email:</label>
            <input class="form-control" type="text" id="email" name="email" required>    
        </div>

        <div class="form-group">
            <label class="form-label" for="password">Contraseña:</label>
            <input class="form-control" type="password" id="password" name="password" required>    
        </div>

        <div class="form-group">
            <button class="btn btn-sucess w-100" type="submit">Iniciar Sesión</button>
            <br>

        </div>
    
    <?php
    if (isset($_GET['error'])) {
        echo "<p class='error'>Credenciales de inicio de sesión incorrectas.</p>";
    }
?>
</div> <!-- cierra el div del contenedor del formulario -->

<?php
    require_once('php/footer.php');
?>  

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>

</html>