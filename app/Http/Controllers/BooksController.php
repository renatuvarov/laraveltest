<?php

namespace App\Http\Controllers;

use App\BooksRepository;
use App\Http\Requests\Books\CreateRequest;
use App\Http\Requests\Books\UpdateRequest;
use App\Models\Author;
use App\Models\Book;

class BooksController extends Controller
{
    /**
     * @var BooksRepository
     */
    private $repository;

    public function __construct(BooksRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $books = $this->repository->findAllWithAuthor();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }

    public function store(CreateRequest $request)
    {
        $this->repository->add($request->all());
        return $this->toIndex();
    }

    public function edit($id)
    {
        $authors = Author::all();
        $book = $this->repository->findByIdWithAuthor($id);
        return view('books.edit', compact('book', 'authors'));
    }

    public function update(UpdateRequest $request, Book $book)
    {
        $this->repository->add($request->all(), $book);
        return $this->toIndex();
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return $this->toIndex();
    }

    private function toIndex()
    {
        return redirect()->route('books.index');
    }
}
