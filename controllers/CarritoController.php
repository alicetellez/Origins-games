<?php
require_once "models/Producto.php";
require_once "config/AuthMiddleware.php";

class CarritoController {
    
    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }
    }

    public function index() {
        $carrito = $_SESSION['carrito'];
        $total = 0;
        foreach ($carrito as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }

        $pageTitle = "Mi Carrito - Origins Games";
        require_once 'views/layouts/header.php';
        require_once 'views/carrito/index.php';
        require_once 'views/layouts/footer.php';
    }

    public function agregar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = intval($_POST['id'] ?? 0);
            $nombre = trim($_POST['nombre'] ?? '');
            $precio = floatval($_POST['precio'] ?? 0);
            $cantidad = intval($_POST['cantidad'] ?? 1);

            if ($id > 0) {
                if (isset($_SESSION['carrito'][$id])) {
                    $_SESSION['carrito'][$id]['cantidad'] += $cantidad;
                } else {
                    $_SESSION['carrito'][$id] = [
                        'id' => $id,
                        'nombre' => $nombre,
                        'precio' => $precio,
                        'cantidad' => $cantidad
                    ];
                }
            }
        }
        header("Location: /origins_games/carrito");
        exit();
    }

    public function eliminar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = intval($_POST['id'] ?? 0);
            if (isset($_SESSION['carrito'][$id])) {
                unset($_SESSION['carrito'][$id]);
            }
        }
        header("Location: /origins_games/carrito");
        exit();
    }

    public function vaciar() {
        $_SESSION['carrito'] = [];
        header("Location: /origins_games/carrito");
        exit();
    }
}