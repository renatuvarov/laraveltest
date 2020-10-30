<?php

namespace App\Http\Controllers;

use App\Http\Requests\Authors\Request;
use App\Models\Author;

class AuthorsController extends Controller
{
    public function index()
    {
        $authors = Author::query()->withCount('books')->get();
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        Author::query()->create([
            'name' => $request->input('name'),
        ]);

        return $this->toIndex();
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $author->update([
            'name' => $request->input('name'),
        ]);

        return $this->toIndex();
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return $this->toIndex();
    }

    private function toIndex()
    {
        return redirect()->route('authors.index');
    }
}
