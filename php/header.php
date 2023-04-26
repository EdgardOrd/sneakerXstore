
<header id="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-4">
    <a href="index.php" class="navbar-brand w-10 mr-0"> 
    <img src=".\upload\logo.png" class="img-fluid" style="width:100px;">
</a>
        <button class="navbar-toggler"
            type="button"
                data-toggle="collapse"
                data-target = "#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="index.php" class="nav-item nav-link active">
                    <h5 class="px-5 cart">
                        <i>Inicio</i> 
                    </h5>
                </a>
            </div>
        </div>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="nuevos.php" class="nav-item nav-link active">
                    <h5 class="px-5 cart">
                        <i>Nuevos Lanzamientos</i> 
                    </h5>
                </a>
            </div>
        </div>
        
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="aboutus.php" class="nav-item nav-link active">
                    <h5 class="px-5 cart">
                        <i>Sobre Nosotros</i> 
                    </h5>
                </a>
            </div>
        </div>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="cart.php" class="nav-item nav-link active">
                    <h5 class="px-5 cart">
                        <i class="fas fa-shopping-cart"></i> Cart
                        <?php

                        if (isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                        }
                        else
                        {
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                        }

                        ?>
                    </h5>
                </a>
            </div>
        </div>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="php/logout.php" class="nav-item nav-link active">
                    <h5 class="px-5 cart">
                        <i>Log Out</i> 
                    </h5>
                </a>
            </div>
        </div>

    </nav>
</header>






