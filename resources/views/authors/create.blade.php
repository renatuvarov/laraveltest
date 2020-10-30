@extends('layout')

@section('body')
    <div class="container text-center">
        <h2 class="h2 mb-5 display-4">Новый автор</h2>
        <form class="text-left w-50 m-auto" method="post" action="{{ route('authors.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group required">
                <input value="{{ old('name') }}" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name">
                @error('name')
                <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                @enderror
            </div>
            <p class="text-left font-weight-bold mt-3"><span class="text-danger">*</span> - обязательные поля</p>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
