@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <h1 class="mb-4">Available Books</h1>

            <!-- Search Form -->
            <form method="GET" action="{{ route('books.index') }}" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search by title or author" value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>

            <!-- Books List -->
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>${{ $book->price }}</td>
                                <td><a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm">View Details</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination Links -->
            <div class="d-flex justify-content-center">
                {{ $books->links('vendor.pagination.bootstrap-4') }} <!-- Use the customized pagination view -->
            </div>
        </div>
        

        <!-- Sidebar Section -->
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Welcome to Our Bookstore</h5>
                    <p class="card-text">Explore our collection of books and find your next favorite read.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
