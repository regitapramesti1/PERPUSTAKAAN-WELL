@extends('templates.default')

@php
  $title = 'Author List';
  $preTitle = 'Semua Data';
@endphp

@push('page.action')

<a href="{{ route('author.create') }}" class="btn btn-primary">+ Tambah Data</a>
  
@endpush

@section('content')
<div class="mb-3">
  <form action="{{ route('author.search') }}" class="form-inline" method="GET">
      <div class="row g-2">
          <div class="col">
              <input type="text" class="form-control" name="search" placeholder="Search for…">
          </div>
          <div class="col-auto">
              <button type="submit" class="btn btn-icon" aria-label="Button">
                  <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                      <path d="M21 21l-6 -6"></path>
                  </svg>
              </button>
          </div>
      </div>
  </form>
</div>

<div class="col-lg-15">
    <div class="card">
      <div class="table-responsive">
        <table class="table table-vcenter card-table">
          <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Photo</th>
              <th class="w-1"></th>
            </tr>
          </thead>

          <tbody>
  @foreach ( $authors as $author )
  
          
  
    <tr>
        <td>{{ $author->id }}</td>
        <td><a href="{{ route('author.show', ['author' => $author]) }}">{{ $author->name }}</a></td>
        <td><img src="{{ asset('storage/' . $author->photo ) }}" height="150px" alt="">
        </td>
      <td>
        <a href="{{ route('author.edit', $author->id) }}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ route('author.destroy', $author->id) }}" method="post">
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
