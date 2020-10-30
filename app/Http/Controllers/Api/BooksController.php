<?php

namespace App\Http\Controllers\Api;

use App\BooksRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Books\UpdateRequest;
use App\Http\Resources\BookResource;
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
        return BookResource::collection($this->repository->findAllWithAuthor());
    }

    public function show($id)
    {
        return new BookResource($this->repository->findByIdWithAuthor($id));
    }

    public function update(UpdateRequest $request, Book $book)
    {
        $book->load('author');
        $this->repository->add($request->all(), $book);
        return new BookResource($book);
    }

    public function destroy($id)
    {
        $book = $this->repository->findByIdWithAuthor($id);

        if (!is_null($book)) {
            $book->delete();
            return new BookResource($book);
        }

        return [];
    }
}
