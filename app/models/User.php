<?php

namespace App\Models;

use PDO;
use Core\Model;
use Core\Response;


class User extends Model
{
    protected $id;
    protected $email;
    protected $username;
    protected $password;
    protected $data = [];
    protected $errors = [];

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
            return $this->data[$key];
        }
        return null;
    }

    public function __set($key, $value)
    {
        if (property_exists($this, $key)) {
            $this->$key = $value;
        } else {
            $this->data[$key] = $value;
        }
    }

    public function save($response)
    {
        if ($this->validate($response)) {
            $db = static::getDB();
            $query = "INSERT INTO users (username,email,password,phone_number) 
            values(:username,:email,:password,:phone_number)";
            $statement = $db->prepare($query);
            $statement->bindValue(":username", $this->username);
            $statement->bindValue(":email", $this->email);
            $statement->bindValue(":password", password_hash($this->password, PASSWORD_BCRYPT));
            $statement->bindValue(":phone_number", $this->data["phone"]);
            $statement->execute();
            return true;
        }
        return false;
    }

    public function validate(Response $response)
    {
        // Name validation
        if (empty($this->username)) {
            $this->errors[] = 'Name is required';
        }

        // Email validation (only format check, not sanitization)
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = 'Invalid email';
        } elseif (static::emailExists($this->email, $this->id ?? null)) {
            $this->errors[] = 'Email already taken';
        }

        // Phone number validation
        if (empty($this->phone)) {
            $this->errors[] = 'Invalid phone number format. Expected format: 123-456-7890';
        }

        // Password validation using the provided pattern
        if (isset($this->password)) {
            if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $this->password)) {
                $this->errors[] = 'Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, and one number';
            }
        }

        // Store errors in the Response class
        if (!empty($this->errors)) {
            $response->setErrors($this->errors);
            return false;
        }

        return true;
    }

    public static function emailExists($email)
    {
        if (!static::findUserByEmail($email)) {
            return false;
        }
        return true;
    }

    // I used this because the empty function calls the isset internally so it will always return false for the dynamic properties
    public function __isset($key)
    {
        return property_exists($this, $key) || array_key_exists($key, $this->data);
    }
}
