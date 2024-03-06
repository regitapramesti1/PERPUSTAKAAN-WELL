@extends('templates.default')
@php
  $title = 'Tambah Data';
  $preTitle = 'Semua Data';
@endphp
@push('page.action')

<a href="" class=" "></a>
  
@endpush


@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('books.store') }}" class="" method="post" enctype="multipart/form-data">
            @csrf

          
            <div class="mb-3">
              <label class="form-label">Author_id</label>
              <select name="authors_id" id="" class="form-control">
                  @foreach ($authors as $author)
                      <option value="{{ $author->id }}">{{ $author->name }}</option>
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
                 name="example-text-input" placeholder="Tulis title" value="{{ old('title') }}">
                 @error('title')
                 <span class="invalid-feedback">{{ $message }}</span>
               @enderror
              </div>

              <div class="mb-3">
                <label class="form-label">cover</label>
                <input type="file" name="cover" class="form-control @error('cover')
                is-invalid
              @enderror"
                placeholder="Upload cover" value="{{ old('cover') }}">
                 @error('cover')
                 <span class="invalid-feedback">{{ $message }}</span>
               @enderror
              </div>

              <div class="mb-3">
                <label class="form-label">year</label>
                <input type="text" name="year" class="form-control @error('year')
                is-invalid
              @enderror"
                 name="example-text-input" placeholder="Tulis Tahun" value="{{ old('year') }}">
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