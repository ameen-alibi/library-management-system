<?php

namespace App\Models;

use PDO;
use Core\Model;
use Core\Response;


class Book extends Model
{
    public static function getPaginatedBooks($page = 1, $booksPerPage = 8)
    {
        $offset = max(($page - 1),0) * $booksPerPage;

        $db = static::getDB();
        $query = "SELECT * FROM books LIMIT $offset,$booksPerPage ";
        $stmt = $db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function getTotalBooks()
    {
        $db = static::getDB();
        $query = "SELECT COUNT(*) as total FROM books";
        return $db->query($query)->fetchColumn();
    }
}
