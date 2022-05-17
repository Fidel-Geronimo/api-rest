<?php
require 'models/contacts.php';

class Contacts
{

    function index()
    {
        $con = new ContactModel();
        $resultado = $con->getAll();
        echo json_encode($resultado);
        exit();
    }

    function indexById($id)
    {
        $con = new ContactModel();
        $resultado = $con->getById($id);
        if ($resultado) {
            echo json_encode($resultado);
            exit();
        }

        http_response_code(404);
        exit();
    }
    function insert()
    {
        $data = json_decode(file_get_contents('php://input'));
        $con = new ContactModel();
        $validacion = $con->validate($data);
        if ($validacion) {
            $contacts = array();
            $contacts['Message'][] = "Error al Insertar";
            $contacts['Description'][] = "Error De Parametros";
            http_response_code(400);
            echo json_encode($contacts);
            exit();
        } else {
            $con->insert($data);
            $contacts = array();
            $contacts['Message'][] = "Insertado Correctamente";
            http_response_code(200);
            echo json_encode($contacts);
            exit();
        }
    }
    function update($id)
    {
        $data = json_decode(file_get_contents('php://input'));
        $con = new ContactModel();
        $validacion = $con->validate($data);
        if ($validacion) {
            $contacts = array();
            $contacts['Message'][] = "Error al Actualizar";
            $contacts['Description'][] = "Error De Parametros";
            http_response_code(400);
            echo json_encode($contacts);
            exit();
        } else {

            $resultado = $con->update($data, $id);
            if ($resultado) {
                $contacts = array();
                $contacts['Message'][] = "Registro Actualizado Correctamente";
                http_response_code(200);
                echo json_encode($contacts);
                exit();
            } else {
                $contacts = array();
                $contacts['Message'][] = "Error Al Actualizar Registro";
                http_response_code(400);
                echo json_encode($contacts);
            }
        }
    }

    function delete($id)
    {
        $con = new ContactModel();
        $resultado = $con->delete($id);
        if ($resultado) {
            $contacts = array();
            $contacts['Message'][] = "Registro Eliminado";
            http_response_code(200);
            echo json_encode($contacts);
            exit();
        } else {
            $contacts = array();
            $contacts['Message'][] = "Error al Eliminar";
            http_response_code(400);
            echo json_encode($contacts);
            exit();
        }
    }
}
