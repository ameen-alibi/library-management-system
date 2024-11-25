<?php

namespace App\controllers;

use Core\View;
use Exception;
use Core\Request;
use Core\Response;
use App\Models\Book;
use Core\Middleware;

class LibraryHomeController
{
    public function displayBooks(Request $request)
    {
        Middleware::handle();
        $page =  max(intval(htmlspecialchars($request->getBodyParam('page'))),1);
        $booksPerPage = 8;
        $books = Book::getPaginatedBooks($page, $booksPerPage);
        $totalBooks = Book::getTotalBooks();
        $totalPages = ceil($totalBooks / $booksPerPage);

        if ($request->isAjax()) {
            View::renderPartial('book-grid.php', [
                'books' => $books,
                'currentPage' => $page,
                'totalPages' => $totalPages
            ]);
        } else {
            View::renderTemplate('library-home.php', [
                'books' => $books,
                'currentPage' => $page,
                'totalPages' => $totalPages
            ]);
        }
    }
}
