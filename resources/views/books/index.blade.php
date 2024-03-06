@extends('templates.default')

@php
  $title = 'Books List';
  $preTitle = 'Semua Data';
@endphp

@push('page.action')

<a href="{{ route('books.create') }}" class="btn btn-primary">+ Tambah Data</a>
  
@endpush

@section('content')


<div class="col-lg-15">
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
  @foreach ( $books as $books )

    <tr>
     <td>{{ $books->authors->name }}</td>
        
        <td>{{ $books->title }} </td>
        <td><img src="{{ asset('storage/' . $books->cover ) }}" height="150px" alt="">
          <td>{{ $books->year }}</td>

      <td>
        <a href="{{ route('books.edit', $books->id) }}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ route('books.destroy', $books->id) }}" method="post">
          @csrf
          @method('DELETE')
          <input type="submit" value="Hapus" class="btn btn-danger btn-sm">
        </form>
      </td>
   
  
      
  @endforeach
          </tbody>
        </table>
      </div>
     
    </div>
  </div>
@endsection
