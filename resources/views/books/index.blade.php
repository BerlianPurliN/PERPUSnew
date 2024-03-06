@extends('templates.default')
@php
    $title = 'Buku';
    $preTitle = 'Data Buku';
@endphp
@push('page-action')
    <a href="/books/create" class="btn btn-primary">Tambah Data</a>
@endpush

@section('content')
<div class="table-responsive">
                    <table class="table table-vcenter card-table">
                      <thead>
                        <tr>
                          <th>title</th>
                          <th>cover</th>
                          <th>yearr</th>
                          <th class="w-1"></th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->cover }}</td>
                            <td>{{ $book->year }}</td>
                            <td>
                                <a href="{{ route('books.edit', $book->id) }}">Edit</a>
                                <form action="{{ route('books.destroy', $book->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Hapus" class="btn btn-danger btn-sm">
                                </form>
                            </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
@endsection