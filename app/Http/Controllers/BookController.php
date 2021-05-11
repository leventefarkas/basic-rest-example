<?php

namespace App\Http\Controllers;

use App\Http\Services\BookService;
use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class BookController
{
    private $bookService;

    /**
     * BookController constructor.
     * @param BookService $bookService
     */
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    /**
     * @param Request $request
     * @return Book|null
     */
    public function createBook(Request $request): ?Book
    {
        $book = new Book();
        $book->setTitle($request->input('title'));
        $book->setPublished($request->input('published'));
        $book->setVotes($request->input('votes'));

        return $this->bookService->create($book);
    }

    /**
     * @param Request $request
     * @return Collection
     */
    public function getBooks(Request $request): Collection
    {
        return $this->bookService->getAll();
    }

    public function delete(Request $request): bool
    {
        return $this->bookService->delete($request->input('book_id'));
    }

    public function update(Request $request): ?Book
    {
        $book = new Book();
        $book->setId($request->input('id'));
        $book->setTitle($request->input('title'));
        $book->setPublished($request->input('published'));
        $book->setVotes($request->input('votes'));

        return $this->bookService->update($book);
    }
}
