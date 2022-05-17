<?php
header('Content-Type: application/json');
require_once "config/db.php";

class ContactModel extends Database
{

    function getAll()
    {
        $query = "SELECT * FROM contacts";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $contacts = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $contacts['contacts'][] = $row;
        }
        return $contacts;
    }

    function getById($id)
    {
        $query = "SELECT * FROM contacts WHERE id= :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR, 25);
        $stmt->execute();
        $contacts = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $contacts['contact'][] = $row;
        }
        return $contacts;
    }
    function insert($data)
    {
        $nombre = $data->nombre;
        $apellido =  $data->apellido;
        $email =  $data->email;
        $cel =  strval($data->cel);
        $tel = null;

        if (isset($data->tel)) {
            $tel = strval($data->tel);
        }

        $query = "INSERT INTO contacts(nombre,apellido,email,cel,tel) values(:nombre,:apellido,:email,:cel,:tel)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR, 25);
        $stmt->bindParam(':apellido', $apellido, PDO::PARAM_STR, 25);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR, 25);
        $stmt->bindParam(':cel', $cel, PDO::PARAM_STR, 25);
        $stmt->bindParam(':tel', $tel, PDO::PARAM_STR, 25);
        $stmt->execute();
    }
    function update($data, $id)
    {
        $nombre = $data->nombre;
        $apellido =  $data->apellido;
        $email =  $data->email;
        $cel =  strval($data->cel);
        $tel = null;

        if (isset($data->tel)) {
            $tel = strval($data->tel);
        }
        $query = "UPDATE contacts SET nombre= :nombre, apellido = :apellido, email = :email, cel = :cel, tel = :tel WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR, 25);
        $stmt->bindParam(':apellido', $apellido, PDO::PARAM_STR, 25);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR, 25);
        $stmt->bindParam(':cel', $cel, PDO::PARAM_STR, 25);
        $stmt->bindParam(':tel', $tel, PDO::PARAM_STR, 25);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    function delete($id)
    {
        $query = "DELETE FROM contacts WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function validate($json)
    {
        $data = $json;

        if (isset($data->nombre) && isset($data->apellido) && isset($data->email) && isset($data->cel)) {
            $nombre = trim($data->nombre);
            $apellido = trim($data->apellido);
            $email = trim($data->email);
            $cel = trim($data->cel);

            if ($nombre === "" || $apellido === "" || $email === "" || $cel === "") {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }
}
