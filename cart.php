<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

require_once("./php/conexion.php");
require_once("./php/component.php");

$db = new conexion();

if (isset($_POST['remove'])) {
    if ($_GET['action'] == 'remove') {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value["product_id"] == $_GET['id']) {
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Product has been Removed...!')</script>";
                echo "<script>window.location = 'cart.php'</script>";
            }
        }
    }
}


?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mi carrito</title>
    <link rel="icon" href="upload/logo2.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-light">

    <?php
    require_once('php/header.php');
    $precios = [];
    ?>

    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-7">
                <div class="shopping-cart">
                    <h6>Mi carrito</h6>
                    <hr>

                    <?php

                    $total = 0;
                    if (isset($_SESSION['cart'])) {
                        $product_id = array_column($_SESSION['cart'], 'product_id');

                        $result = $db->getInStock(0);
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            foreach ($product_id as $id) {
                                if ($row['id'] == $id) {
                                    // cartElement($row['imagen'], $row['nombre'], $row['precio'], $row['id'],$row['cantidad'],$row['talla']);
                                    $total = $total + (int)$row['precio'];
                                    echo "
                                <div class=\"border rounded\">
                                    <div class=\"row bg-white p-3\">
                                        <div class=\"col-md-3 pl-0\">
                                            <img src={$row['imagen']} alt=\"Image1\" class=\"img-fluid\">
                                        </div>
                                        <div class=\"col-md-9\">
                                            <h5 class=\"pt-2\">{$row['nombre']} - $ {$row['precio']}</h5>
                                            <small class=\"text-secondary\">Vendido por: sneakerXstore</small>
                                            <div class=\"d-flex align-items-center mb-4 w-100\">
                                                <label for=\"cantidad\" class=\"txt-dark mx-3\">Cantidad:</label>
                                                <input type=\"number\" id=\"cantidad\" class=\"form-control w-25 d-inline\" name=\"cantidad\" value=\"1\" min=\"1\" max=\"{$row['cantidad']}\" onchange='cantidadChange({$row['precio']} )'>
                                                <label for=\"talla\" class=\"txt-dark mx-3\">Talla:</label>
                                                <input type=\"text\" id=\"talla\" class=\"form-control w-25 d-inline\" name=\"talla\" value=\"{$row['talla']}\" readonly>
                                            </div>
                            
                                            <button type=\"submit\" class=\"btn btn-warning\">Guardar para después</button>
                                            <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Eliminar del carrito</button>
                                        </div>
                                    </div>
                                </div>
                                    ";
                                    // array_push($precios, $row['precio']);
                                }
                            }
                        }
                    } else {
                        echo "<h5>El carrito está vacío</h5>";
                    }

                    ?>

                </div>
            </div>
            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

                <div class="pt-4">
                    <h6>DETALLES</h6>
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-6">
                            <?php
                            if (isset($_SESSION['cart'])) {
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Precio ($count items)</h6>";
                            } else {
                                echo "<h6>Precio (0 items)</h6>";
                            }
                            ?>
                            <h6>Cargos por Entrega</h6>
                            <hr>
                            <h6>Monto a pagar</h6>
                        </div>
                        <div class="col-md-6">
                            <h6>$<?php echo $total; ?></h6>
                            <h6 class="text-success">FREE</h6>
                            <hr>
                            <h6>$<span id='total'>
                                    <?php
                                    echo $total;
                                    ?>
                                </span></h6>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-dark btn-lg btn-block my-4">COMPRAR</button>
            </div>
        </div>
    </div>


    <script>
        const cantidadChange = (precio) => {
            let prevTotal = document.getElementById('total').innerText;
            let nextTotal = parseInt(prevTotal) + precio;
            document.getElementById('total').innerText = nextTotal
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>