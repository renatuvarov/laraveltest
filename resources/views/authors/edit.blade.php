@extends('layout')

@section('body')
<div class="container text-center">
    <h2 class="h2 mb-5 display-4">Редактировать автора</h2>
    <form class="text-left w-50 m-auto" method="post" action="{{ route('authors.update', ['author' => $author->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group required">
            <input value="{{ old('name', $author->name) }}" type="text" class="form-control  @error('name') is-invalid @enderror" placeholder="Name" name="name">
            @error('name')
            <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
</div>
@endsection
