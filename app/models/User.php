<?php

namespace App\Models;

use PDO;
use Core\Model;


class User extends Model
{
    private $id;
    private $email;
    private $username;
    private $passowrd;
    private $data = [];

    public function __construct($data = [])
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            } else {
                // Consider some security improvements in the future (checking for allowed properties)
                $this->data[$key] = $value;
            }
        }
    }

    public static function authenticate($email, $password)
    {
        $user = static::findUserByEmail($email);
        if ($user && password_verify($password, $user->password)) {
            return $user;
        }
        return false;
    }

    private static function findUserByEmail($email)
    {
        $query = "SELECT * FROM users WHERE email = :email ";
        $db = static::getDB();
        $statement = $db->prepare($query);
        $statement->bindParam(':email', $email);
        $statement->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        $statement->execute();
        return $statement->fetch();
    }

    public function __get($key)
    {
        if (property_exists($this, $key)) {
            return $this->$key;
        } else {
            // Consider some security improvements in the future (checking for allowed properties)
            return $this->data[$key];
        }
        return null;
    }

    public function __set($key, $value) {
        if (property_exists($this, $key)) {
            $this->$key = $value;
        } else {
            $this->data[$key] = $value;  // Store dynamic data in $data
        }
    }
}
