<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$url = str_replace('/origins_games', '', $url);

switch ($url) {
    case '':
    case '/':
    case '/home':
        require_once 'controllers/HomeController.php';
        (new HomeController())->index();
        break;

    case '/auth/login':
        require_once 'controllers/AuthController.php';
        (new AuthController())->login();
        break;

    case '/auth/register':
        require_once 'controllers/AuthController.php';
        (new AuthController())->register();
        break;

    case '/auth/logout':
        require_once 'controllers/AuthController.php';
        (new AuthController())->logout();
        break;

    // Rutas de Productos
    case '/producto':
        require_once 'controllers/ProductoController.php';
        (new ProductoController())->index();
        break;

    case '/producto/admin':
        require_once 'controllers/ProductoController.php';
        (new ProductoController())->admin();
        break;

    case '/producto/guardar':
        require_once 'controllers/ProductoController.php';
        (new ProductoController())->guardar();
        break;

    case '/producto/eliminar':
        require_once 'controllers/ProductoController.php';
        (new ProductoController())->eliminar();
        break;

    // Rutas de Citas / Soporte Técnico
    case '/cita':
        require_once 'controllers/CitaController.php';
        (new CitaController())->index();
        break;

    case '/cita/guardar':
        require_once 'controllers/CitaController.php';
        (new CitaController())->guardar();
        break;

    case '/cita/admin':
        require_once 'controllers/CitaController.php';
        (new CitaController())->admin();
        break;

    default:
        http_response_code(404);
        echo "Página no encontrada";
        break;

    case '/cita/cambiarEstado':
    require_once 'controllers/CitaController.php';
    (new CitaController())->cambiarEstado();
    break;

    case '/cita/cancelar':
    require_once 'controllers/CitaController.php';
    (new CitaController())->cancelar();
    break;


    case '/carrito':
    require_once 'controllers/CarritoController.php';
    (new CarritoController())->index();
    break;

case '/carrito/agregar':
    require_once 'controllers/CarritoController.php';
    (new CarritoController())->agregar();
    break;

case '/carrito/eliminar':
    require_once 'controllers/CarritoController.php';
    (new CarritoController())->eliminar();
    break;

case '/carrito/vaciar':
    require_once 'controllers/CarritoController.php';
    (new CarritoController())->vaciar();
    break;

    case '/catalogo':
case '/productos':
    require_once 'controllers/ProductoController.php';
    (new ProductoController())->index();
    break;
}