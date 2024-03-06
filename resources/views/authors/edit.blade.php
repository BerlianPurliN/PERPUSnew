@extends('templates.default')
@php
    $title = 'Author';
    $preTitle = 'Edit Data Author';
@endphp
@push('page-action')
    <a href="/authors" class="btn btn-primary">Kembali</a>
@endpush
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('authors.update',$author->id) }}" class="" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name"
                        class="form-control
                        @error('name')
                            is-invalid
                        @enderror"
                        name="example-text-input" placeholder="Tulis namamu" value="{{ $author->name }}">
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Foto</label>
                    <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror"
                        placeholder="Foto" value="{{ old('photo') }}">
                    @error('photo')
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