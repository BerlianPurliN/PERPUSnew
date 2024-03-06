@extends('templates.default')
@php
    $title = 'Publisher';
    $preTitle = 'Tambah Data Publisher';
@endphp
@push('page-action')
    <a href="/publishers" class="btn btn-primary">Kembali</a>
@endpush
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="/publishers" class="" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name"
                        class="form-control
                        @error('name')
                            is-invalid
                        @enderror"
                        name="example-text-input" placeholder="Tulis namamu" value="{{ old('name') }}">
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" name="address"
                        class="form-control
                        @error('address')
                            is-invalid
                        @enderror"
                        name="example-text-input" placeholder="Tulis alamatmu" value="{{ old('address') }}">
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