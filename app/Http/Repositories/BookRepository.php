<?php

namespace App\Http\Repositories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

class BookRepository
{
    public function create(Book $book): Book
    {
        $book->save();
        return $book;
    }

    /**
     * @return Collection
     */
    public function findAll(): Collection
    {
        return Book::all();
    }

    public function delete($bookId): bool
    {
        /**
         * @var $book Book
         */
        $book = Book::find($bookId);
        return $book->delete() ?? false;
    }

    public function update(Book $book)
    {
        $book->update();
        return $book;
    }
}
