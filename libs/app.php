<?php
require_once 'controllers/Errors.php';

class App
{

    function __construct()
    {
        $url = $_GET['url'];
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        // var_dump($url);
        $archivoController  = 'controllers/' . $url[0] . '.php';

        if (file_exists($archivoController)) {
            require_once $archivoController;
            $controller = new $url[0];

            if (isset($url[1])) {
                $method = $_SERVER['REQUEST_METHOD'];

                if ($method == "GET" && isset($url[2])) {
                    $controller->indexById($url[2]);
                } else if ($method == "GET") {
                    $controller->index();
                } else if ($method == "PUT") {
                    if (isset($url[2])) {
                        $controller->update($url[2]);
                    } else {
                        $contacts = array();
                        $contacts['Message'][] = "Error al Actualizar";
                        $contacts['Description'][] = "Debe Enviar Un ID En La URL";
                        http_response_code(400);
                        echo json_encode($contacts);
                        exit();
                    }
                } else if ($method == "DELETE") {
                    if (isset($url[2])) {
                        $controller->delete($url[2]);
                    } else {
                        $contacts = array();
                        $contacts['Message'][] = "Error al Eliminar";
                        $contacts['Description'][] = "Debe Enviar Un ID En La URL";
                        http_response_code(400);
                        echo json_encode($contacts);
                        exit();
                    }
                } else if ($method == "POST") {
                    $controller->insert();
                }
            }
        } else {
            $controller = new Errors();
        }
    }
}
