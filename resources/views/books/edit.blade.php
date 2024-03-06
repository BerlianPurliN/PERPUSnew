@extends('templates.default')
@php
    $title = 'Buku';
    $preTitle = 'Edit Data Buku';
@endphp
@push('page-action')
    <a href="/books" class="btn btn-primary">Kembali</a>
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('books.update',$book->id) }}" class="" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="name"
                        class="form-control @error('name')
                            is-invalid
                        @enderror"
                        name="example-text-input" placeholder="Tulis namamu" value="{{ old('name') ?? $book->name }}">
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Cover</label>
                    <input type="text" name="cover"
                        class="form-control @error('cover')
                            is-invalid
                        @enderror"
                        name="example-text-input" placeholder="Tulisa alamat lengkapmu"
                        value="{{ old('address') ?? $book->address }}">
                    @error('address')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Year</label>
                    <input type="text" name="year"
                        class="form-control @error('year')
                            is-invalid
                        @enderror"
                        name="example-text-input" placeholder="Tulis nomer telpon"
                        value="{{ old('phone_number') ?? $book->phone_number }}">
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