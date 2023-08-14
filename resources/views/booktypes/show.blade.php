@extends('layouts.app')

@section('content')
    <h2>Detail Jenis Buku</h2>

    <table class="table mt-3">
        <tr>
            <th>ID</th>
            <td>{{ $bookType->id }}</td>
        </tr>
        <tr>
            <th>Nama Jenis Buku</th>
            <td>{{ $bookType->name }}</td>
        </tr>
        <!-- Tambahkan detail lainnya sesuai kebutuhan -->
    </table>

    <a href="{{ route('booktypes.edit', $bookType->id) }}" class="btn btn-primary">Edit</a>
    <a href="{{ route('booktypes.index') }}" class="btn btn-secondary">Kembali</a>
@endsection
