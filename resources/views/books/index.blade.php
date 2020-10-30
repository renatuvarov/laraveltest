@extends('layout')

@section('body')
    <div class="container-fluid text-center">
        <h2 class="h2 mb-5 display-4">Книги</h2>
        <a href="{{route('books.create')}}" class="btn btn-success d-block w-25 m-auto">Добавить</a>
        @if($books->isNotEmpty())
            <table class="table table-bordered table-hover mt-5">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                    <th scope="col">Автор</th>
                    <th scope="col">Управление</th>
                </tr>
                </thead>
                <tbody>
                @foreach($books as $book)
                    <tr>
                        <td class="align-middle">{{$book->id}}</td>
                        <td class="align-middle">{{$book->title}}</td>
                        <td class="align-middle">{{$book->author->name ?? ''}}</td>
                        <td class="align-middle">
                            <a class="btn btn-info" href="{{ route('books.edit', ['book' => $book->id]) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button data-destroy="{{ route('books.destroy', ['book' => $book->id]) }}"
                                    type="button"
                                    class="btn btn-danger btn-destroy">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @include('inc.modal')
        @else
            @include('inc.nothing_found')
        @endif
    </div>
@endsection
