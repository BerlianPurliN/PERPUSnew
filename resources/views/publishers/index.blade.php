@extends('templates.default')
@php
    $title = 'Publisher';
    $preTitle = 'Data Publisher';
@endphp
@push('page-action')
    <a href="/publishers/create" class="btn btn-primary">Tambah Data</a>
@endpush

@section('content')
<div class="table-responsive">
                    <table class="table table-vcenter card-table">
                      <thead>
                        <tr>
                          <th>name</th>
                          <th>address</th>
                          <th class="w-1"></th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($publishers as $publisher)
                        <tr>
                            <td>{{ $publisher->name }}</td>
                            <td>{{ $publisher->address }}</td>
                            <td>
                                <a href="{{ route('publishers.edit', $publisher->id) }}">Edit</a>
                                <form action="{{ route('publishers.destroy', $publisher->id)}}" method="post">
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