@extends('layout')

@section('body')
    <div class="container text-center">
        <h2 class="h2 mb-5 display-4">Новая книга</h2>
        <form class="text-left w-50 m-auto" method="post" action="{{ route('books.store') }}"
              enctype="multipart/form-data">
            @csrf
            <div class="form-group required">
                <input value="{{ old('title') }}" type="text" class="form-control @error('title') is-invalid @enderror"
                       placeholder="title" name="title">
                @error('title')
                <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                @enderror
            </div>
            @if($authors->isNotEmpty())
                <div class="form-group required">
                    <label for="author">Автор</label>

                    <select class="form-control" id="author" name="author_id">
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}"
                                    @if((old('author_id') == $author->id)) selected @endif>{{ $author->name }}</option>
                        @endforeach
                    </select>
                    @error('author_id')
                    <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                    @enderror

                </div>
            @else
                <a href="{{ route('authors.create') }}" class="btn btn-block text-center btn-success">Создать автора</a>
            @endif
            <p class="text-left font-weight-bold mt-3"><span class="text-danger">*</span> - обязательные поля</p>
            <button type="submit" class="btn btn-primary" @if($authors->isEmpty()) disabled @endif>Создать</button>
        </form>
    </div>
@endsection
