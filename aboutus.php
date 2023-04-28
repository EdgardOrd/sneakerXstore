<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

require_once('./php/conexion.php');
require_once('./php/component.php');
require_once('./php/header.php');


// create instance of conexion class
$database = new conexion();




?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About us</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container py-3">


        <h1 style="text-align: center;">SneakerXstore</h1><br>
        <p class="blockquote" style="text-align: justify">Bienvenido/a a nuestra tienda de sneakers, donde ofrecemos una amplia selección de tenis de las marcas más populares, como Jordan,
            Adidas y Yeezy. Estamos comprometidos en brindarle la mejor experiencia de compra posible y en ayudarlo/a a encontrar el par perfecto
            de tenis que satisfagan sus necesidades. <br><br>

            En nuestra tienda, nos apasiona la cultura de las tenis y nos aseguramos de tener las últimas tendencias en calzado urbano.
            Nuestro enfoque en los zapatos de alta calidad significa que solo trabajamos con marcas de renombre y productos auténticos, lo que le
            garantiza una experiencia de compra auténtica y satisfactoria. Nos esforzamos por ofrecer una amplia variedad de tenis
            de alta calidad que se adapten a todos los gustos y presupuestos. Además de los estilos populares de Jordan,
            Adidas y Yeezy, también ofrecemos una selección de otras marcas que son populares entre
            los aficionados a las tenis.<br><br>

            Nuestra tienda no solo se trata de vender tenis. También estamos aquí para brindarle el mejor servicio posible. Nuestro equipo está
            compuesto por personas apasionadas por las tenis y están altamente capacitados para ayudarlo/a en todo lo que necesite.
            Desde ayudarlo/a a encontrar el par perfecto de tenis hasta brindarle consejos sobre el cuidado y mantenimiento de sus tenis,
            estamos aquí para ayudarlo/a en cada paso del camino.<br><br>
        </p>
    </div>


    
    <?php
    require_once('php/footer.php');
?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>