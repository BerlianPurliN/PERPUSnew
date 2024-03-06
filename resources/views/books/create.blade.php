@extends('templates.default')
@php
    $title = 'Buku';
    $preTitle = 'Tambah Data Buku';
@endphp
@push('page-action')
    <a href="/books" class="btn btn-primary">Kembali</a>
@endpush
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="/books" class="" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title"
                        class="form-control
                        @error('title')
                            is-invalid
                        @enderror"
                        placeholder="Tulis judulmu" value="{{ old('title') }}">
                    @error('title')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Cover</label>
                    <input type="text" name="cover"
                        class="form-control
                        @error('cover')
                            is-invalid
                        @enderror"
                        placeholder="Tulis covermu" value="{{ old('cover') }}">
                    @error('cover')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Year</label>
                    <input type="text" name="year"
                        class="form-control
                        @error('year')
                            is-invalid
                        @enderror"
                        placeholder="Tulis tahunnya" value="{{ old('year') }}">
                    @error('year')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <select name="author_id">
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <input type="submit" value="Simpan" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection
