<?php
class HomeController {
    public function index() {
        $pageTitle = "Inicio - Origins Games";
        require_once "views/layouts/header.php";
        require_once "views/home.php";
        require_once "views/layouts/footer.php";
    }
}