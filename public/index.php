<?php
require "../vendor/autoload.php";
require "../routes/router.php";

try {
    $uri = parse_url($_SERVER["REQUEST_URI"])["path"]; // Pega a URI da página
    $request = $_SERVER["REQUEST_METHOD"]; // Retorna o tipo de requisição, se GET ou POST

    if(!isset($router[$request])) {
        throw new Exception("A rota não existe");   
    }

    if(!array_key_exists($uri, $router[$request])) {
        throw new Exception("A rota não existe");
    }
    
    // Chama o router no índice com o mesmo tipo de requisição na rota que corresponde à URI recuperada
    // depois chama a função load que executa um método do controller
    $controller = $router[$request][$uri];
    $controller();
} catch (Exception $e) {
    echo $e->getMessage();
}