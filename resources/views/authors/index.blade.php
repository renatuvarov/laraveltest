@extends('layout')

@section('body')
    <div class="container-fluid text-center">
        <h2 class="h2 mb-5 display-4">Авторы</h2>
        <a href="{{route('authors.create')}}" class="btn btn-success d-block w-25 m-auto">Добавить</a>
    @if($authors->isNotEmpty())
            <table class="table table-bordered table-hover mt-5">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Книги</th>
                    <th scope="col">Управление</th>
                </tr>
                </thead>
                <tbody>
                @foreach($authors as $author)
                    <tr>
                        <td class="align-middle">{{$author->id}}</td>
                        <td class="align-middle">{{$author->name}}</td>
                        <td class="align-middle">{{$author->books_count}}</td>
                        <td class="align-middle">
                            <a class="btn btn-info" href="{{ route('authors.edit', ['author' => $author->id]) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button data-destroy="{{ route('authors.destroy', ['author' => $author->id]) }}" type="button"
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
