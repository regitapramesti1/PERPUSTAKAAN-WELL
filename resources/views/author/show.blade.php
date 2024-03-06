@extends('templates.default')

@php
  $title = 'Books List';
  $preTitle = 'Semua Buku';
@endphp

@push('page.action')

<a href="" class=""></a>
  
@endpush


@section('content')

<div class="card">
    <div class="table-responsive">
        <table class="table table-vcenter card-table">
            <thead>

                <tr>

                    <th>Author_id</th>
                    <th>Title</th>
                    <th>Cover</th>
                    <th>Year</th>
                    <th class="w-1"></th>

                </tr>

            </thead>
            <tbody>

                @if(isset($author) && $author->books->count() > 0)
                @foreach ($author->books as $book)
                    <tr>
                        <td>{{ optional($book->author)->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td><img src="{{ asset('storage/' . $book->cover ) }}" height="150px" alt=""></td>
                        <td>{{ $book->year }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">No books available for this author.</td>
                </tr>
            @endif
            
            </tbody>
        </table>
    </div>
</div>

@endsection
