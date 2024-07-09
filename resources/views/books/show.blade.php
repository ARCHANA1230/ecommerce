@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">{{ $book->title }}</h1>
                    <p class="card-text"><strong>Author:</strong> {{ $book->author }}</p>
                    <p class="card-text"><strong>Description:</strong> {{ $book->description }}</p>
                    <p class="card-text"><strong>Price:</strong> ${{ $book->price }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                @if ($book->image)
                <img src="{{ asset('storage/' . $book->image) }}" class="card-img-top" alt="{{ $book->title }}">
                @else
                <div class="card-body">
                    <p class="card-text">No image available</p>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="mt-4">
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Back to Books List</a>
    </div>
</div>
@endsection
