@extends('templates.default')
@php
  $title = 'Edit Data';
  $preTitle = 'Semua Data';
@endphp
@push('page.action')

<a href="" class=" "></a>
  
@endpush


@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('books.update', $books->id) }}" class="" method="post" enctype="multipart/form-data">
            @csrf

            @method('PUT')

            <div class="mb-3">
              <label class="form-label">Author_id</label>
              <select name="authors_id" id="" class="form-control">
                  @foreach ($authors as $author)
                      <option value="{{ $author->id }}" @selected($author->id == $books->authors_id)>{{ $author->name }}</option>
                  @endforeach
              </select>
              @error('Author_id')
                  <span class="invalid-feedback">{{ $message }}</span>
              @enderror
          </div>
          
              <div class="mb-3">
                <label class="form-label">title</label>
                <input type="text" name="title" class="form-control @error('title')
                is-invalid
              @enderror"
                 name="example-text-input" placeholder="Upload title" value="{{ old('title') ?? $books->title}}">
                 @error('title')
                 <span class="invalid-feedback">{{ $message }}</span>
               @enderror
              </div>

              <div class="mb-3">
                <label class="form-label">cover</label>
                <input type="file" name="cover" class="form-control
                 @error('cover')
                is-invalid
              @enderror"
                placeholder="Upload cover" value="{{ old('cover') ?? $books->cover}}">
                 @error('cover')
                 <span class="invalid-feedback">{{ $message }}</span>
               @enderror
              </div>

              <div class="mb-3">
                <label class="form-label">year</label>
                <input type="text" name="year" class="form-control @error('year')
                is-invalid
              @enderror"
                 name="example-text-input" placeholder="Upload year" value="{{ old('year') ?? $books->year}}">
                 @error('year')
                 <span class="invalid-feedback">{{ $message }}</span>
               @enderror
              </div>

              <div class="mb-3">
               <input type="submit" value="Simpan" class="btn btn-primary">
              </div>
        </form>
    </div>
</div>
@endsection