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
        <form action="{{ route('publisher.store') }}" class="" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control @error('name')
                  is-invalid
                @enderror"
                 name="example-text-input" placeholder="Tulis Nama" value="{{ old('name')}}">
                 @error('name')
                   <span class="invalid-feedback">{{ $message }}</span>
                 @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">address</label>
                <input type="text" name="address" class="form-control @error('address')
                is-invalid
              @enderror"
                 name="example-text-input" placeholder="Upload address" value="{{ old('address') }}">
                 @error('address')
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