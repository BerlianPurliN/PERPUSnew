@extends('templates.default')
@php
    $title = 'Author';
    $preTitle = 'Data Author';
@endphp
@push('page-action')
    <a href="/authors/create" class="btn btn-primary">Tambah Data</a>
@endpush

@section('content')
                  <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                      <thead>
                        <tr>
                          <th>Photo</th>
                          <th>Name</th>
                          <th class="w-1"></th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($authors as $author)
                        <tr>
                            <td>
                              <img src="{{ asset('storage/' . $author->photo) }}" height="100px" alt="">
                            </td>
                            <td>{{ $author->name }}</td>
                            <td>
                                <a href="{{ route('authors.edit', $author->id) }}">Edit</a>
                                <form action="{{ route('authors.destroy', $author->id)}}" method="post">
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