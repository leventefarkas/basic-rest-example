<?php

namespace App\Http\Services;

use App\Http\Repositories\BookRepository;
use App\Models\Book;

class BookService
{
    private $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function create(Book $book): Book
    {
        return $this->bookRepository->create($book);
    }

    public function getAll()
    {
        return $this->bookRepository->findAll();
    }

    public function delete($bookId): bool
    {
        return $this->bookRepository->delete($bookId);
    }

    public function update(Book $book): Book
    {
        return $this->bookRepository->update($book);
    }
}
