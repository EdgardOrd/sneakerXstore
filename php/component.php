<?php

function component($productname, $productprice, $productimg, $productid){
    if($productprice <130)
    {
        $old = $productprice + 100;
        $element = "
        
        <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
                    <form action=\"index.php\" method=\"post\">
                        <div class=\"card shadow\">
                            <div>
                                <img src=\"$productimg\" alt=\"Image1\" class=\"img-fluid card-img-top\">
                            </div>
                            <div class=\"card-body\">
                                <h5 class=\"card-title\">$productname</h5>
                                
                                <h6>
                                    <i class=\"fas fa-star\"></i>
                                    <i class=\"fas fa-star\"></i>
                                    <i class=\"fas fa-star\"></i>
                                    <i class=\"fas fa-star\"></i>
                                    <i class=\"far fa-star\"></i>
                                </h6>
                                <p class=\"card-text\">
                                    Some quick example text to build on the card.
                                </p>
                                <h5>
                                    <small><s class=\"text-secondary\">$$old</s></small>
                                    <span class=\"price\">$$productprice</span>
                                </h5>

                                <button type=\"submit\" class=\"btn btn-warning my-3 mt-10\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
                                <input type='hidden' name='product_id' value='$productid'>
                            </div>
                        </div>
                    </form>
                </div>
        ";
    }
    else
    {
        $old = $productprice + 200;
        $element = "
        
        <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
                    <form action=\"index.php\" method=\"post\">
                        <div class=\"card shadow\">
                            <div>
                                <img src=\"$productimg\" alt=\"Image1\" class=\"img-fluid card-img-top\">
                            </div>
                            <div class=\"card-body\">
                                <h5 class=\"card-title\">$productname</h5>
                                
                                <h6>
                                    <i class=\"fas fa-star\"></i>
                                    <i class=\"fas fa-star\"></i>
                                    <i class=\"fas fa-star\"></i>
                                    <i class=\"fas fa-star\"></i>
                                    <i class=\"fas fa-star\"></i>
                                </h6>
                                <p class=\"card-text\">
                                    Some quick example text to build on the card.
                                </p>
                                <h5>
                                    <small><s class=\"text-secondary\">$$old</s></small>
                                    <span class=\"price\">$$productprice</span>
                                    
                                </h5>

                                <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
                                <input type='hidden' name='product_id' value='$productid'>
                            </div>
                        </div>
                    </form>
                </div>
        ";
    }
    echo $element;
}

function cartElement($productimg, $productname, $productprice, $productid,$cantidad,$talla){
    $element = "
    
    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
    <div class=\"border rounded\">
        <div class=\"row bg-white p-3\">
            <div class=\"col-md-3 pl-0\">
                <img src=$productimg alt=\"Image1\" class=\"img-fluid\">
            </div>
            <div class=\"col-md-9\">
                <h5 class=\"pt-2\">$productname</h5>
                <small class=\"text-secondary\">Vendido por: sneakerXstore</small>
                <div class=\"d-flex align-items-center mb-4 w-100\">
                    <h5 class=\"pt-2\">$$productprice</h5>
                    <label for=\"cantidad\" class=\"txt-dark mx-3\">Cantidad:</label>
                    <input type=\"number\" id=\"cantidad\" class=\"form-control w-25 d-inline\" name=\"cantidad\" value=\"1\" min=\"1\" max=\"$cantidad\">
                    <label for=\"talla\" class=\"txt-dark mx-3\">Talla:</label>
                    <input type=\"text\" id=\"talla\" class=\"form-control w-25 d-inline\" name=\"talla\" value=\"$talla\" readonly>
                </div>

                <button type=\"submit\" class=\"btn btn-warning\">Guardar para después</button>
                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Eliminar del carrito</button>
            </div>
        </div>
    </div>
    </form>

    
    ";
    echo  $element;
}

















