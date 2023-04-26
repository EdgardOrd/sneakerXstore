<?php


class conexion
{
    private $host = 'localhost'; // 127.0.0.1
    private $user = 'root';      // no debe ser publciada en repositorios
    private $password = '1234567';  // no debe ser publciada en repositorios
    private $database = 'store';
    
    private $connection;

        // claconstructor
    public function __construct()
    {
        try{
            $this->connection = new PDO("mysql:host={$this->host};dbname={$this->database}",
                $this->user, $this->password );
            $this->connection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO:: ERRMODE_EXCEPTION);
 //           echo "ok";
        }catch (PDOException $e){
            echo "Error: ". $e->getMessage();
        }
    }


    public function getConnection()
    {
        return $this->connection;
    }
    
    // public function login($username, $password)
    // {
    //     try {
    //         $sql = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";
    //         $stmt = $this->connection->prepare($sql);
    //         $stmt->execute();
    //         return $stmt;
    //     } catch(PDOException $e) {
    //         echo $sql . "<br>" . $e->getMessage();
    //     }
    // }

    public function getData()
    {
        try {
            $sql = "SELECT * FROM sneakers";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            return $stmt;
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function getTallas()
    {
        try {
            $sql = "SELECT * FROM tallas";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            return $stmt;
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function getInStock($talla)
    {
        try {
            if($talla == 0)
            {
                $sql =" SELECT z.id, z.nombre, z.marca, z.precio, z.imagen,t.talla, s.cantidad
                FROM sneakers AS z
                JOIN stock AS s ON z.id = s.sneaker_id
                JOIN tallas AS t ON t.id = s.talla_id";
            }
            else
            {
                $sql = "SELECT z.id, z.nombre, z.marca, z.precio, z.imagen,t.talla, s.cantidad
                FROM sneakers AS z
                JOIN stock AS s ON z.id = s.sneaker_id
                JOIN tallas AS t ON t.id = s.talla_id
                WHERE t.talla = $talla AND s.cantidad > 0";
            }
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            return $stmt;
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
    
}






