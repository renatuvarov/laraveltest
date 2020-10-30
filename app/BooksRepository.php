<?php

namespace App;

use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

class BooksRepository
{
    public function findAllWithAuthor(): Collection
    {
        return Book::query()->with('author')->get();
    }

    public function findByIdWithAuthor($id): ?Book
    {
        return Book::find($id)->load('author');
    }

    public function add(array $data, Book $book = null): Book
    {
        if (is_null($book)) {
            return Book::query()->create($this->withFields($data));
        }

        $book->update($this->withFields($data));

        return $book;
    }

    private function withFields(array $data): array
    {
        return [
            'title' => $data['title'],
            'author_id' => $data['author_id'],
        ];
    }
}
