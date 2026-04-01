<?php

function load(string $controller, string $action) {
    try {
        // primeiro preciso verificar se o controller existe
        $controllerNamespace = "app\\controllers\\$controller";
    
        // Se a classe não existir
        if(!class_exists($controllerNamespace)) {
            throw new Exception("O controller $controller não existe");
        }

        $controllerInstance = new $controllerNamespace();
            
        // Verifica se o método passado como parâmetro existe
        if(!method_exists($controllerInstance, $action)) {
            throw new Exception("O método $action não existe no controller $controller");
        }
    
        $controllerInstance->$action((object)$_REQUEST);

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

$router = [
    "GET" => [
        "/" => fn() => load("HomeController", "index"),
        "/contact" => fn() => load("ContactController", "index")
    ],
    "POST" => [
        "/contact" => fn() => load("ContactController", "store"),
    ],
];